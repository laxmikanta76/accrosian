# Accrosian – Laravel 9 CMS Website

A fully dynamic **Laravel 9 CMS** conversion of the Accrosian static website. Built with PHP 8.1, MySQL, and Blade templating. Includes a complete admin panel, contact form storage, SEO management, and logo/favicon upload.

---

## 🚀 Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.1 + Laravel 9 |
| Database | MySQL |
| Frontend | Blade + original CSS/JS (preserved) |
| Auth | Laravel Session Auth with roles |
| Storage | Laravel Storage (public disk) |
| Admin | Custom admin panel (no third-party) |

---

## ✅ Features

- **CMS Admin Panel** – manage all content without touching code
- **Services CRUD** – add/edit/delete services with images and SEO
- **Portfolio CRUD** – manage projects with categories and images
- **Blog CMS** – full blog with rich HTML content, featured images, SEO
- **Contact Form** – saves to MySQL, admin can view/mark/delete
- **Site Settings** – logo, favicon, social links, contact info, Google Analytics
- **SEO Management** – meta title/description/keywords per page, service, post
- **User Roles** – `admin` and `user` with middleware protection
- **Auth System** – login, register, logout, forgot password
- **Responsive** – original design fully preserved, mobile-ready

---

## 📋 Requirements

- PHP **8.1+**
- Composer **2+**
- MySQL **5.7+** or **8.0+**
- Node.js (optional, only if compiling assets)
- Web server: Apache (with `mod_rewrite`) or Nginx

---

## ⚙️ Installation

### 1. Extract / Clone the project

```bash
# If you downloaded a ZIP, extract it then enter the folder:
cd accrosian-laravel
```

### 2. Install PHP dependencies

```bash
composer install
```

> **Note:** Requires PHP 8.1+. Run `php -v` to confirm your version.

### 3. Copy environment file

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure your database

Open `.env` and update:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=accrosian
DB_USERNAME=root
DB_PASSWORD=your_password
```

Create the database in MySQL first:

```sql
CREATE DATABASE accrosian CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Run migrations and seed default data

```bash
php artisan migrate --seed
```

This will create all tables and seed:
- ✅ Admin user: `admin@example.com` / `password123`
- ✅ Demo user: `user@example.com` / `password123`
- ✅ Site settings with default values
- ✅ 6 services (Web Dev, Mobile, Cloud, UI/UX, AI/ML, Consulting)
- ✅ 6 portfolio items
- ✅ 3 blog posts
- ✅ 6 CMS pages

### 7. Create storage symlink

```bash
php artisan storage:link
```

This links `public/storage` → `storage/app/public` so uploaded files are accessible.

### 8. Start the development server

```bash
php artisan serve
```

Visit: **http://localhost:8000**

---

## 🔐 Default Login Credentials

| Role | Email | Password |
|---|---|---|
| **Admin** | admin@example.com | password123 |
| **User** | user@example.com | password123 |

> ⚠️ **Change these passwords immediately** in production!

---

## 🗂️ Project Structure

```
accrosian-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          ← Admin panel controllers
│   │   │   ├── Auth/           ← Auth controllers
│   │   │   └── Frontend/       ← Public site controllers
│   │   ├── Middleware/
│   │   │   ├── AdminMiddleware.php
│   │   │   └── RoleMiddleware.php
│   │   └── Kernel.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Setting.php
│   │   ├── Service.php
│   │   ├── PortfolioItem.php
│   │   ├── BlogPost.php
│   │   ├── ContactSubmission.php
│   │   └── Page.php
│   └── Providers/
│       └── AppServiceProvider.php  ← Shares $setting globally
├── database/
│   ├── migrations/             ← 7 migration files
│   └── seeders/                ← 6 seeders + DatabaseSeeder
├── public/
│   ├── assets/
│   │   ├── css/style.css       ← Original CSS (preserved)
│   │   ├── js/script.js        ← Original JS (preserved)
│   │   └── images/             ← Original images
│   └── uploads/                ← Admin uploaded files
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php       ← Frontend layout
│   │   └── admin.blade.php     ← Admin panel layout
│   ├── partials/
│   │   ├── navbar.blade.php
│   │   ├── footer.blade.php
│   │   └── mobile-nav.blade.php
│   ├── frontend/               ← Public pages
│   │   ├── home.blade.php
│   │   ├── about.blade.php
│   │   ├── services.blade.php
│   │   ├── service-detail.blade.php
│   │   ├── portfolio.blade.php
│   │   ├── blog.blade.php
│   │   ├── blog-detail.blade.php
│   │   └── contact.blade.php
│   ├── admin/                  ← Admin panel views
│   │   ├── dashboard/
│   │   ├── services/
│   │   ├── portfolio/
│   │   ├── blog/
│   │   ├── contact/
│   │   ├── settings/
│   │   ├── users/
│   │   └── pages/
│   └── auth/                   ← Login / Register / Forgot
└── routes/
    └── web.php                 ← All routes
```

---

## 🌐 URL Structure

### Public Routes
| URL | Page |
|---|---|
| `/` | Home |
| `/about` | About |
| `/services` | Services Listing |
| `/services/{slug}` | Service Detail (dynamic) |
| `/portfolio` | Portfolio |
| `/blog` | Blog Listing |
| `/blog/{slug}` | Blog Post Detail |
| `/contact` | Contact (+ POST submit) |

### Auth Routes
| URL | Page |
|---|---|
| `/login` | Login |
| `/register` | Register |
| `/forgot-password` | Forgot Password |
| `/logout` | POST Logout |

### Admin Routes (requires `auth` + `admin` middleware)
| URL | Page |
|---|---|
| `/admin` | Dashboard |
| `/admin/services` | Services CRUD |
| `/admin/portfolio` | Portfolio CRUD |
| `/admin/blog` | Blog Posts CRUD |
| `/admin/contact` | Contact Submissions |
| `/admin/settings` | Site Settings & Branding |
| `/admin/users` | User Management |
| `/admin/pages` | Page SEO Management |

---

## 🗄️ Database Tables

| Table | Purpose |
|---|---|
| `users` | Authenticated users with roles (admin/user) |
| `settings` | Global site settings, logo, favicon, SEO |
| `services` | Services with SEO, images, status |
| `portfolio_items` | Portfolio projects |
| `blog_posts` | Blog articles with SEO |
| `contact_submissions` | Contact form entries with status tracking |
| `pages` | CMS-backed static pages with SEO |

---

## 🛡️ Access Control

- **Admin middleware** (`AdminMiddleware`) – blocks non-admin users from `/admin/*`
- **Role middleware** (`RoleMiddleware`) – granular role-based access
- **CSRF protection** – on all POST forms via `@csrf`
- **Password hashing** – `bcrypt` via Laravel's `Hash::make()`
- **Session auth** – standard Laravel session driver

---

## 🎨 Admin Panel

Access at: `http://localhost:8000/admin`

The admin panel lets you:

1. **Dashboard** – overview stats: contacts, services, posts, users
2. **Services** – full CRUD with image upload, HTML description, SEO fields
3. **Portfolio** – full CRUD with category filter, images, SEO
4. **Blog** – full CRUD with rich HTML editor, featured images, publish toggle
5. **Contact** – view all submissions, mark as new/read/replied, quick reply via email
6. **Settings** – site name, logo, favicon, social links, contact info, Google Analytics, OG image
7. **Pages** – edit SEO meta per page, banner image, status
8. **Users** – create/edit/delete users, assign roles

---

## 📁 File Uploads

All admin-uploaded files are stored in `storage/app/public/` and served via `/storage/`:

| Upload Type | Storage Path |
|---|---|
| Logo / Favicon | `storage/app/public/branding/` |
| Service Images | `storage/app/public/services/` |
| Portfolio Images | `storage/app/public/portfolio/` |
| Blog Images | `storage/app/public/blog/` |
| Page Banners | `storage/app/public/pages/` |

Run `php artisan storage:link` once to activate.

---

## 🔍 SEO Features

- Dynamic `<title>` and `<meta>` tags from database per page
- Per-page, per-service, per-post SEO fields (title, description, keywords)
- Open Graph meta tags for social sharing
- Dynamic favicon from settings
- Clean slug-based URLs (`/services/web-development`)
- `og:image` support per page/post/service

---

## 🚀 Production Deployment

```bash
# 1. Set environment
APP_ENV=production
APP_DEBUG=false

# 2. Optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Storage link
php artisan storage:link

# 4. Set permissions
chmod -R 775 storage bootstrap/cache

# 5. Point web server document root to /public
```

### Nginx Config Example
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/accrosian/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

---

## 🐛 Common Issues

**Issue: 500 error on first load**
```bash
php artisan key:generate
chmod -R 775 storage bootstrap/cache
```

**Issue: Uploaded images not showing**
```bash
php artisan storage:link
```

**Issue: Class not found after adding files**
```bash
composer dump-autoload
```

**Issue: DB migration errors**
```bash
# Drop and re-run all migrations
php artisan migrate:fresh --seed
```

---

## 📝 Customisation

### Changing the site name/logo
Log in as admin → go to **Admin → Settings** → update Site Name, upload Logo/Favicon.

### Adding a new service
Admin → Services → Add Service → fill in title, description, image, SEO fields.

### Editing homepage content
The homepage dynamically renders services, portfolio, and blog from the database. Add/edit services and blog posts from the admin panel to update the homepage.

### Customising CSS
Edit `public/assets/css/style.css` – the original design file is preserved in full.

---

## 🙏 Credits

- **Design & Frontend**: Original Accrosian static site design preserved
- **Framework**: Laravel 9 (https://laravel.com)
- **Icons**: Font Awesome 6 (https://fontawesome.com)

---

*Built with ❤️ — Accrosian Laravel CMS*
