# Picstagram

An Instagram-style photo sharing app built with **Laravel 5.8** and **MySQL**.

This is a **training project**. I built it as a code-along for corporate Laravel workshops, to show developers how Laravel's conventions work (routing, controllers, Eloquent, migrations, auth scaffolding) by building something familiar. It is not a production application.

## Features

- User registration and login (Laravel auth scaffolding)
- User profiles, with profile creation and editing
- Follow and unfollow other users
- Create, view, edit and delete posts (image uploads)
- Like and comment on posts
- Search

## Tech stack

- PHP 7.1.3+
- Laravel 5.8
- MySQL
- [Intervention Image](http://image.intervention.io/) for image handling
- Laravel Mix (webpack) for front-end assets
- PHPUnit for tests

## Prerequisites

- PHP 7.1.3 or higher (with the usual Laravel extensions)
- [Composer](https://getcomposer.org/)
- MySQL
- Node.js and npm (only if you want to rebuild front-end assets)

## Getting started

1. Clone the repo and open the folder:

   ```bash
   git clone https://github.com/veliyat/picstagram.git
   cd picstagram
   ```

2. Create an empty MySQL database (for example `picstagram`).

3. Copy the environment file and add your database details:

   ```bash
   cp .env.example .env
   ```

   Then set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`.

4. Install dependencies and generate the app key:

   ```bash
   composer install
   php artisan key:generate
   php artisan config:cache
   ```

5. Set the default string length. Older MySQL versions limit index key length, so add this to the `boot()` method of `app/Providers/AppServiceProvider.php`:

   ```php
   use Illuminate\Support\Facades\Schema;

   public function boot()
   {
       Schema::defaultStringLength(191);
   }
   ```

6. Run the migrations and seed the database:

   ```bash
   php artisan migrate --seed
   ```

7. Link the storage folder so uploaded images are publicly visible:

   ```bash
   php artisan storage:link
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

   Open http://127.0.0.1:8000 in your browser.

### Optional: rebuild front-end assets

```bash
npm install
npm run dev
```

## Running the tests

```bash
vendor/bin/phpunit
```

## Project layout

| Path | What lives there |
|---|---|
| `routes/web.php` | All routes: auth, profiles (`/u/...`), posts (`/p/...`), search (`/s`) |
| `app/Http/Controllers` | `HomeController`, `ProfilesController`, `PostsController`, `UsersController`, `SearchController` |
| `database/migrations`, `database/seeds` | Schema and seed data |
| `resources/views` | Blade templates |

## Status and limitations

- Built on Laravel 5.8 and PHP 7.1, both of which are end-of-life. Fine for learning, not for deployment as is.
- Likes and follows use GET routes to keep the workshop code simple. A production app should use POST/DELETE with CSRF protection.

## Author

Ravi Veliyat: [GitHub](https://github.com/veliyat) · [YouTube](https://www.youtube.com/raviveliyat)
