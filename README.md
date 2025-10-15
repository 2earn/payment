<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Payment-2earn

**Distributed Monolith for Payment Management**

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2%2B-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

## Description

Payment-2earn is a distributed monolith designed to manage payments in a robust and secure manner. The system takes an order ID as input, retrieves the associated information from the 2EARN database, executes the payment, and then returns a detailed JSON report of the result.

## Key Features

- ✅ **Order Information Retrieval** - Connection to the 2EARN database
- 💳 **Payment Execution** - Secure transaction processing
- 📊 **Detailed JSON Reports** - Structured response with status and details
- 🔒 **Enhanced Security** - Data validation and error handling
- 📝 **Complete Logs** - Traceability of all operations

## Architecture

The system is structured as a distributed monolith allowing:
- Horizontal scalability
- Service isolation
- Centralized payment management
- Resilience and high availability

## Prerequisites

- PHP >= 8.2
- Composer
- Laravel 11.x
- Database (MySQL, PostgreSQL, SQLite)
- Access to the 2EARN database

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-repo/payment-2earn.git
   cd payment-2earn
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure the database**
   
   Edit the `.env` file with your connection parameters:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=payment_2earn
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Configure Payment-2earn Settings** (Optional)
   
   Edit the `.env` file to configure API documentation visibility:
   ```env
   # Show or hide API documentation on the welcome page
   SHOW_API_DOCUMENTATION=true
   
   # Custom API endpoint (optional)
   PAYMENT_API_ENDPOINT=/api/payment/process
   ```
   
   - Set `SHOW_API_DOCUMENTATION=false` to hide the API documentation section
   - Set `SHOW_API_DOCUMENTATION=true` to display the API documentation section (default)

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Start the server**
   ```bash
   php artisan serve
   ```

## Usage

### API Endpoint

**POST** `/api/payment/process`

**Input parameters:**
```json
{
  "order_id": "ORD-12345"
}
```

**JSON Response:**
```json
{
  "status": "success",
  "order_id": "ORD-12345",
  "transaction_id": "TXN-67890",
  "amount": 150.00,
  "currency": "EUR",
  "payment_method": "card",
  "timestamp": "2025-10-15T14:30:00Z",
  "message": "Payment processed successfully"
}
```

**Error response:**
```json
{
  "status": "error",
  "order_id": "ORD-12345",
  "error_code": "INSUFFICIENT_FUNDS",
  "message": "Insufficient funds",
  "timestamp": "2025-10-15T14:30:00Z"
}
```

## Project Structure

```
payment-2earn/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PaymentController.php
│   ├── Models/
│   │   ├── Order.php
│   │   └── Payment.php
│   └── Services/
│       ├── PaymentService.php
│       └── TwoEarnService.php
├── config/
├── database/
│   └── migrations/
├── routes/
│   ├── api.php
│   └── web.php
└── tests/
```

## Security

- Strict input data validation
- Protection against SQL injection
- Authentication and authorization
- Encryption of sensitive data
- Security logs

## Tests

Run unit and functional tests:

```bash
php artisan test
```

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the project
2. Create a branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## Support

For any questions or issues, please open an issue on GitHub.

## License

This project is licensed under the [MIT](https://opensource.org/licenses/MIT) license.

## Authors

- **2EARN Team** - *Initial development*

## Acknowledgments

- Laravel Framework
- PHP Community
- All contributors

---

**Last updated:** October 15, 2025
