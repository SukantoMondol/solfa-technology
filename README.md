# Solfa Technologies — Company Website (Laravel)

A full company website built with Laravel 11, styled after a modern digital agency layout, using the Solfa Technologies purple branding. Includes a public website and a full admin panel with database-driven content.

## Features

### Public Website
- **Home** — hero, stats, services grid, featured projects, testimonials, FAQs, blog preview, newsletter signup
- **About** — company story, vision and mission
- **Services** — listing + detail pages (dynamic from database)
- **Blog** — listing + detail pages
- **Careers** — job openings listing + detail pages
- **Contact (Let's Talk)** — contact form saved to database

### Admin Panel (`/admin`)
- Login with email + password (Laravel session auth)
- Dashboard with content counts and latest messages
- Full CRUD for: Services, Projects, Blog Posts, Job Openings, Testimonials, FAQs
- Contact message inbox and newsletter subscriber list
- Site Settings editor (hero text, contact info, social links, stats, etc.)

## Requirements

- PHP 8.2+
- Composer
- SQLite (default, zero config) or MySQL

## Setup

```bash
# 1. Install dependencies
composer install

# 2. Create your environment file
cp .env.example .env

# 3. Generate the application key
php artisan key:generate

# 4. Create the SQLite database file (skip if using MySQL)
touch database/database.sqlite

# 5. Run migrations and seed demo content
php artisan migrate --seed

# 6. Start the development server
php artisan serve
```

The site will be available at `http://localhost:8000`.

## Admin Login

- URL: `http://localhost:8000/admin/login`
- Email: `admin@solfatechnologies.com`
- Password: `password`

**Change this password immediately after your first login** (or edit the seeder before running it).

## Using MySQL instead of SQLite

Edit `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=solfa
DB_USERNAME=root
DB_PASSWORD=your_password
```

Then run `php artisan migrate --seed` again.

## Project Structure

```
app/
  Http/Controllers/          Public site controllers
  Http/Controllers/Admin/    Admin panel controllers (auth + CRUD)
  Models/                    Eloquent models
database/
  migrations/                Users + all content tables
  seeders/DatabaseSeeder.php Admin user, settings, and demo content
resources/views/
  layouts/app.blade.php      Public site layout (header, footer)
  layouts/admin.blade.php    Admin panel layout (sidebar, topbar)
  home.blade.php             Homepage
  about / services / blog / careers / contact
  admin/                     All admin panel pages
public/
  css/style.css              Public site styles (Solfa purple theme)
  css/admin.css              Admin panel styles
  js/main.js                 Menu, FAQ accordion, testimonial slider
  images/logo.png            Solfa Technologies logo
routes/web.php               All public + admin routes
```

## Managing Content

All website content is dynamic. Log in to `/admin` and use the sidebar:

| Section       | Controls                                             |
|---------------|------------------------------------------------------|
| Site Settings | Hero title/text, contact info, social links, stats   |
| Services      | Cards on homepage + services page + detail pages     |
| Projects      | Portfolio grid with category and featured flags      |
| Blog Posts    | Blog listing and detail pages (draft via empty date) |
| Job Openings  | Careers page listings and detail pages               |
| Testimonials  | Homepage testimonial slider                          |
| FAQs          | Homepage FAQ accordion                               |
| Messages      | Contact form submissions inbox                       |
| Subscribers   | Newsletter email signups                             |

## Deployment Notes

- Set `APP_ENV=production` and `APP_DEBUG=false` in production
- Point your web server's document root to the `public/` directory
- Run `php artisan config:cache && php artisan route:cache && php artisan view:cache`
