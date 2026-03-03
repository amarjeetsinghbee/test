# AdminLaravel (MySQL Backend)

A Laravel-style admin management project with backend logic for:
- Category management
- Product management
- Order and order item management
- Dashboard stats

## Setup

1. Install dependencies:
   ```bash
   composer install
   ```
2. Configure env:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Set MySQL credentials in `.env`.
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Start server:
   ```bash
   php artisan serve
   ```

## Admin Routes
- `/admin/dashboard`
- `/admin/categories`
- `/admin/products`
- `/admin/orders`

## API Routes
- `GET /api/dashboard/summary`
- Full CRUD under `/api/admin/...`
