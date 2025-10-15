<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }} - {{ config('app.description') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-900">
        <header class="bg-white dark:bg-gray-800 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <img src="{{ Vite::asset('resources/images/logo-dark.png') }}" alt="Logo Small" height="104px" width="200px">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ config('app.name') }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ config('app.description') }}</p>
                        </div>
                    </div>
                    @if (Route::has('login'))
                        <nav class="flex items-center gap-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 transition">
                                    Log in
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>
        <section class="relative text-white overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-blue-600 opacity-90"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
                <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4">
                    Powering Payments, Simplified
                </h2>
                <p class="text-lg md:text-xl max-w-3xl mx-auto mb-8 text-purple-100">
                    A robust, distributed monolith for seamless payment processing, providing detailed insights and enterprise-grade security.
                </p>
            </div>
        </section>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <section id="features" class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 text-center">Why Choose Us?</h3>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center feature-card p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">1. Receive ID</h4>
                        <p class="text-gray-600 dark:text-gray-400">Receive order ID via API</p>
                    </div>
                    <div class="text-center feature-card p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">2. Retrieve Data</h4>
                        <p class="text-gray-600 dark:text-gray-400">Extract data from 2EARN database</p>
                    </div>
                    <div class="text-center feature-card p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">3. Process Payment</h4>
                        <p class="text-gray-600 dark:text-gray-400">Execute secure payment</p>
                    </div>
                </div>
            </section>
            @if(config('payment2earn.show_api_documentation', true))
            <section id="api-docs" class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">API Documentation</h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="bg-blue-500 text-white px-3 py-1 rounded text-sm mr-3">POST</span>
                            Request
                        </h4>
                        <p class="text-gray-600 dark:text-gray-400 mb-4"><code class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">{{ config('payment2earn.api_endpoint', '/api/payment/process') }}</code></p>
                        <div class="code-block">
<pre class="text-sm">{
  "order_id": "ORD-12345"
}</pre>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="bg-green-500 text-white px-3 py-1 rounded text-sm mr-3">200</span>
                            Success Response
                        </h4>
                        <div class="code-block">
<pre class="text-sm">{
  "status": "success",
  "order_id": "ORD-12345",
  "transaction_id": "TXN-67890",
  "amount": 150.00,
  "currency": "EUR",
  "payment_method": "card",
  "timestamp": "2025-10-15T14:30:00Z",
  "message": "Payment processed successfully"
}</pre>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 md:col-span-2">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <span class="bg-red-500 text-white px-3 py-1 rounded text-sm mr-3">400</span>
                            Error Response
                        </h4>
                        <div class="code-block">
<pre class="text-sm">{
  "status": "error",
  "order_id": "ORD-12345",
  "error_code": "INSUFFICIENT_FUNDS",
  "message": "Insufficient funds",
  "timestamp": "2025-10-15T14:30:00Z"
}</pre>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <section class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Key Features</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 feature-card">
                        <div class="text-3xl mb-3">✅</div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Information Retrieval</h5>
                        <p class="text-gray-600 dark:text-gray-400">Direct connection to 2EARN database for data extraction</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 feature-card">
                        <div class="text-3xl mb-3">💳</div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Payment Execution</h5>
                        <p class="text-gray-600 dark:text-gray-400">Secure transaction processing with validation</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 feature-card">
                        <div class="text-3xl mb-3">📊</div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Detailed JSON Reports</h5>
                        <p class="text-gray-600 dark:text-gray-400">Structured response with status and complete details</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 feature-card">
                        <div class="text-3xl mb-3">🔒</div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Enhanced Security</h5>
                        <p class="text-gray-600 dark:text-gray-400">Data validation and error handling</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 feature-card">
                        <div class="text-3xl mb-3">📝</div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Complete Logs</h5>
                        <p class="text-gray-600 dark:text-gray-400">Full traceability of all operations</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 feature-card">
                        <div class="text-3xl mb-3">⚡</div>
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Performance</h5>
                        <p class="text-gray-600 dark:text-gray-400">Horizontal scalability and high availability</p>
                    </div>
                </div>
            </section>
            <section class="mb-16">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Technologies</h3>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
                    <div class="flex flex-wrap justify-center gap-6">
                        <div class="text-center">
                            <div class="bg-red-100 dark:bg-red-900 px-6 py-3 rounded-lg">
                                <span class="text-xl font-bold text-red-600 dark:text-red-400">Laravel 12.x</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-purple-100 dark:bg-purple-900 px-6 py-3 rounded-lg">
                                <span class="text-xl font-bold text-purple-600 dark:text-purple-400">PHP 8.4+</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="bg-blue-100 dark:bg-blue-900 px-6 py-3 rounded-lg">
                                <span class="text-xl font-bold text-blue-600 dark:text-blue-400">MySQL</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="text-center text-gray-600 dark:text-gray-400">
                    <p class="mb-2">Developed with ❤️ by the 2EARN team</p>
                    <p class="text-sm">© 2025 Payment-2earn. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
