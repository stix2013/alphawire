# Laravel Livewire Starter Kit

The official Laravel starter kit for Livewire.

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate into the project directory:
   ```bash
   cd <project-directory>
   ```
3. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
4. Install Composer dependencies:
   ```bash
   composer install
   ```
5. Generate the application key:
   ```bash
   php artisan key:generate
   ```
6. Run database migrations:
   ```bash
   php artisan migrate
   ```
7. Install NPM dependencies:
   ```bash
   npm install
   ```
8. Build front-end assets:
   ```bash
   npm run dev
   ```

## Features

### Product Management
- This application includes a product management feature.
- It utilizes a `Product` model to store product information.
- Users can view a list of all products at the `/products` page.
- Detailed information for each product can be accessed via pages like `/products/{id}` (e.g., `/products/1`).

## Running the Development Server

To run the basic development server, use the following Artisan command:

```bash
php artisan serve
```

For a more comprehensive development environment that includes running the queue worker and Vite, you can use the `dev` script defined in `composer.json`:

```bash
composer run dev
```

## Running Tests

To run the automated tests, use the following Composer script:

```bash
composer test
```

This command executes the test suite, which by default uses Pest and runs `php artisan test` under the hood.

This includes tests for the Product Management feature, such as:
- `tests/Feature/Products/ProductPageTest.php`
- `tests/Unit/ProductTest.php`
