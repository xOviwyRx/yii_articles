# Yii Articles Management System

A content management system built with Yii 2 Framework featuring user authentication, role-based access control, and article management.

## Features

- **User Authentication**: Login/registration system
- **Role-Based Access Control**: Admin and regular user permissions
- **Article Management**: CRUD operations for articles and categories
- **User Management**: Admin interface for managing users and roles

## Technology Stack

- **Backend**: Yii 2 Framework (PHP)
- **Database**: MySQL
- **Frontend**: Bootstrap
- **Security**: RBAC, password hashing, CSRF protection

## Quick Start

1. Clone the repository
   ```bash
   git clone https://github.com/xOviwyRx/yii_articles.git
   cd yii_articles
   
2. Install dependencies
   ```bash
   composer install
3. Configure database in config/db.php
4. Run migrations
   ```bash
   php yii migrate
   php yii rbac/init
5. Start the development server
   ```bash
   php yii serve
##  User Roles

- **Regular Users**: View published articles
- **Admin Users**: Manage articles, categories, and user roles

##  Demo
The application demonstrates:

- Secure authentication and authorization
- Database design with proper relationships
- Admin panel for content management
- Responsive user interface