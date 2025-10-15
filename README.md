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
