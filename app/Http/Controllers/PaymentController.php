<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function handlePayment(Request $request): JsonResponse
    {
        Log::info('Payment request received', ['request' => $request->all()]);

        $validated = $request->validate([
            'order_id' => 'required|string',
        ]);

        $orderId = $validated['order_id'];

        try {
            $baseUrl = config('services.payment2earn.base_url');
            $response = Http::post($baseUrl . '/process-payment', [
                'order_id' => $orderId,
            ]);

            if ($response->failed()) {
                $errorResponse = response()->json([
                    'error' => 'API_COMMUNICATION_FAILURE',
                    'message' => 'Failed to communicate with the payment gateway.',
                ], 502);
                Log::error('API communication failure', ['response' => $errorResponse]);
                return $errorResponse;
            }

            $data = $response->json();

            if (isset($data['status']) && $data['status'] === 'error') {
                // Handle specific errors from the payment gateway
                $errorCode = $data['error_code'] ?? 'UNKNOWN_ERROR';
                $errorMessage = $data['message'] ?? 'An unknown error occurred.';

                $statusCode = match ($errorCode) {
                    'ORDER_NOT_FOUND' => 404,
                    'INSUFFICIENT_BALANCE' => 400,
                    default => 500,
                };

                $errorResponse = response()->json([
                    'error' => $errorCode,
                    'message' => $errorMessage,
                ], $statusCode);
                Log::error('Payment gateway error', ['response' => $errorResponse]);
                return $errorResponse;
            }

            $successResponse = response()->json([
                "order_id" => $data['order_id'] ?? $orderId,
                "status" => "success",
                "amount" => $data['amount'] ?? 0,
                "currency" => $data['currency'] ?? 'USD',
                "Discount-available" => $data['discount_available'] ?? 0,
                "Lost-Discount" => $data['lost_discount'] ?? 0,
                "paid-with-BFS" => $data['paid_with_bfs'] ?? 0,
                "paid-with-Cash" => $data['paid_with_cash'] ?? 0,
                "transaction_id" => $data['transaction_id'] ?? 'N/A',
                "message" => "Payment completed successfully",
                "timestamp" => now()->toIso8601String(),
            ]);

            Log::info('Payment request successful', ['response' => $successResponse]);
            return $successResponse;

        } catch (\Exception $e) {
            // Handle unexpected exceptions
            $errorResponse = response()->json([
                'error' => 'INTERNAL_SERVER_ERROR',
                'message' => 'An internal server error occurred.',
            ], 500);
            Log::critical('Internal server error', ['exception' => $e->getMessage(), 'response' => $errorResponse]);
            return $errorResponse;
        }
    }
}
