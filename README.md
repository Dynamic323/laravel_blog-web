## Laravel Blog with Admin Panel
A simple blog website built with Laravel, featuring an admin panel for managing posts.

## Features
Public blog page to view posts.
Authenticated admin panel for post management (create, edit, delete).
Basic user authentication for admin access.
Requirements
PHP >= 8.0
Composer
Laravel >= 9.x
MySQL or SQLite (or other supported DB)
Installation
Clone the repository:

bash
Copy code
git clone https://github.com/yourusername/laravel-blog.git
cd laravel-blog
Install dependencies:

bash
Copy code
composer install
Set up the .env file with your database details.

Run migrations and seed the database:

bash
Copy code
php artisan migrate --seed
Start the development server:

bash
Copy code
php artisan serve
Usage
Visit /login to log in as an admin.
Admin can create, edit, and delete blog posts from the admin panel.
License
This project is open-source and available under the MIT License.

