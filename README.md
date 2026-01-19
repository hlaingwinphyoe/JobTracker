# JobTracker

A modern job posting and application management platform built with Laravel 11 and Filament 3.

## Features

- **Job Postings** - Create, manage, and publish job listings with categories, regions, and types
- **Application Management** - Track job applications from employers/employees
- **Admin Panel** - Beautiful Filament-powered admin dashboard
- **Role-Based Access Control** - Powered by Spatie Permissions with Admin/Developer/User roles
- **User Management** - Manage employers, employees, and admin users
- **Categories & Types** - Organize jobs with customizable categories and job types
- **Region Support** - Location-based job filtering
- **FAQs & Legal Pages** - Built-in FAQ, Privacy Policy, and Terms & Conditions management

## Tech Stack

- **Framework**: Laravel 11
- **Admin Panel**: Filament 3
- **Authentication**: Laravel Sanctum + Filament Breezy
- **Authorization**: Spatie Laravel Permission
- **Frontend**: Livewire 3
- **Icons**: Blade FontAwesome

## Requirements

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

## Installation

1. **Clone the repository**

   ```bash
   git clone <repository-url>
   cd JobTracker
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install NPM dependencies**

   ```bash
   npm install && npm run build
   ```

4. **Environment setup**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database** in `.env`

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=jobtracker
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seeders**

   ```bash
   php artisan migrate --seed
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

## Admin Panel

Access the admin panel at `/admin`

### Default Roles

- **Admin** - Full access to all features
- **Developer** - Full access including roles & permissions management
- **Employer** - Can create and manage their own job postings
- **Employee** - Can view and apply to jobs

## Development

```bash
# Run development server
php artisan serve

# Build assets
npm run dev

# Run tests
php artisan test

# Clear caches
php artisan optimize:clear
```

## Deployment

The project includes support for Hostinger deployment via:

```bash
php artisan hostinger:deploy-and-setup-cicd
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
