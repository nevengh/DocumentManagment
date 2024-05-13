# Document Management System
A comprehensive Document Management System (DMS) built using Laravel, allowing users to securely manage and organize various types of documents.
## Features

- User authentication using JWT
- Document upload, retrieval, update, and deletion
- Support for multiple file types
- Complex relationships using morph relations
- Data validation using FormRequests
- Performance optimization through caching strategies
- Security measures to protect against common vulnerabilities
## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/nevengh/DocumentManagment.git
2. Install dependencies:
    ```bash
    composer install
3. Create a .env file and configure your database connection:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=documentmanagment
    DB_USERNAME=root
    DB_PASSWORD=
4.  Generate an application key:
    ```bash
    php artisan key:generate
5. Run database migrations:
    ```bash
    php artisan migrate
6. Start the development server:
    ```bash
    php artisan serve
7. You Must run the migrations and seeders:
    ```bash
    php artisan migrate --seed

# Api Documentation URL
    ```bash
    https://documenter.getpostman.com/view/32061004/2sA3JNc1fp

