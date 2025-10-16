<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    private const PROCESS_ORDER_ENDPOINT = '/api/order/process';
    private const LOG_PREFIX = 'PaymentController: ';

    public function handlePayment(Request $request): JsonResponse
    {
        Log::info(self::LOG_PREFIX . 'Payment request received', ['request' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'MISSING_ORDER_ID',
                'message' => 'The order_id parameter is required.',
            ], 400);
        }

        $orderId = $request->input('order_id');

        try {
            $baseUrl = config('services.payment2earn.base_url');
            $response = Http::post($baseUrl . self::PROCESS_ORDER_ENDPOINT, [
                'order_id' => $orderId,
            ]);

            if ($response->status() === 422) {
                $errorResponse = response()->json([
                    'error' => 'UNPROCESSABLE_CONTENT',
                    'message' => 'The request was well-formed but was unable to be followed due to semantic errors.',
                    'details' => $response->json(),
                ], 422);
                Log::error(self::LOG_PREFIX . 'Unprocessable Content', ['response' => $errorResponse]);
                return $errorResponse;
            }

            if ($response->failed()) {
                $errorResponse = response()->json([
                    'error' => 'API_COMMUNICATION_FAILURE',
                    'message' => 'Failed to communicate with the payment gateway.',
                ], 502);


                Log::error(self::LOG_PREFIX . 'API communication failure', ['response' => $errorResponse]);
                return $errorResponse;
            }

            $data = $response->json();

            if (isset($data['status']) && $data['status'] === 'error') {

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
                Log::error(self::LOG_PREFIX . 'Payment gateway error', ['response' => $errorResponse]);
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

            Log::info(self::LOG_PREFIX . 'Payment request successful', ['response' => $successResponse]);
            return $successResponse;

        } catch (\Exception $e) {
            $errorResponse = response()->json([
                'error' => 'INTERNAL_SERVER_ERROR',
                'message' => 'An internal server error occurred.',
            ], 500);
            Log::critical(self::LOG_PREFIX . 'Internal server error', ['exception' => $e->getMessage(), 'response' => $errorResponse]);
            return $errorResponse;
        }
    }
}
