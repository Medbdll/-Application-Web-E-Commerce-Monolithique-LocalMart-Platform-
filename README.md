# LocalMart E-Commerce Platform

A comprehensive monolithic e-commerce platform built with Laravel 11, featuring role-based access control, product management, shopping cart functionality, and order processing.

![Laravel](https://img.shields.io/badge/Laravel-11.31-red)
![PHP](https://img.shields.io/badge/PHP-^8.2-blue)
![Livewire](https://img.shields.io/badge/Livewire-3.6.4-purple)
![License](https://img.shields.io/badge/License-MIT-green)

## 🛍️ Features

### Core Functionality
- **Multi-role Authentication**: Admin, Seller, Moderator, and Client roles
- **Product Management**: Full CRUD operations with categories and inventory tracking
- **Shopping Cart**: Add, update, and remove items with real-time calculations
- **Order Processing**: Complete order lifecycle from cart to payment
- **User Profiles**: Comprehensive user management with profile photos
- **Review System**: Product ratings and customer feedback
- **Address Management**: Shipping and billing addresses

### Technical Features
- **Role-based Access Control**: Using Spatie Laravel Permission
- **Two-Factor Authentication**: Enhanced security with Laravel Fortify
- **API Tokens**: RESTful API support with Laravel Sanctum
- **Real-time Updates**: Livewire components for dynamic UI
- **Soft Deletes**: Data recovery for products and orders
- **File Uploads**: Product image management
- **Email Verification**: User account verification

## 🏗️ Architecture

### Technology Stack
- **Backend**: Laravel 11.31
- **Frontend**: Blade Templates with TailwindCSS
- **JavaScript**: Vite build system with Axios
- **Database**: MySQL (configurable)
- **Authentication**: Laravel Fortify + Jetstream
- **Real-time**: Livewire 3.6.4
- **Permissions**: Spatie Laravel Permission 6.24

### Project Structure
```
├── app/
│   ├── Actions/Fortify/          # Custom authentication actions
│   ├── Http/Controllers/         # API and web controllers
│   ├── Livewire/                # Real-time components
│   ├── Models/                  # Eloquent models
│   └── Providers/               # Service providers
├── database/
│   ├── factories/               # Model factories
│   ├── migrations/             # Database schema
│   └── seeders/                # Sample data
├── resources/
│   ├── views/                  # Blade templates
│   └── js/                     # Frontend assets
└── routes/                     # Application routes
```

## 🚀 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and npm
- Database (MySQL/PostgreSQL/SQLite)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd Application-Web-E-Commerce-Monolithique-LocalMart-Platform-
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=localmart
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Create storage link**
   ```bash
   php artisan storage:link
   ```

7. **Compile assets**
   ```bash
   npm run build
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

## 👥 User Roles & Permissions

### Admin
- Full system access
- User management and role assignment
- Product and category oversight
- Order management
- System configuration

### Seller
- Product management (create, edit, delete)
- Order processing
- Inventory management
- Sales analytics

### Moderator
- Content moderation
- Review management
- User support
- Order dispute resolution

### Client
- Browse products
- Shopping cart management
- Order placement
- Review products
- Profile management

## 📱 Core Modules

### Product Management
- Category-based organization
- Inventory tracking
- Product images
- Pricing and stock management
- Soft delete functionality

### Shopping Cart
- Real-time cart updates
- Quantity management
- Price calculations
- Session persistence

### Order Processing
- Order creation from cart
- Order status tracking
- Payment integration ready
- Order history

### User Management
- Registration and authentication
- Profile management
- Address book
- Order history

## 🔧 Development

### Available Commands

**Development Server**
```bash
php artisan serve
```

**Queue Processing**
```bash
php artisan queue:work
```

**Asset Compilation**
```bash
npm run dev     # Development
npm run build   # Production
```

**Testing**
```bash
php artisan test
```

**Code Style**
```bash
php artisan pint
```

### Database Migrations
Key tables include:
- `users` - User accounts with roles
- `products` - Product catalog
- `categories` - Product categories
- `carts` & `cart_items` - Shopping cart
- `orders` & `order_items` - Order management
- `reviews` - Product reviews
- `addresses` - User addresses

## 🔐 Security Features

- **Authentication**: Laravel Fortify with 2FA
- **Authorization**: Role-based permissions
- **CSRF Protection**: Built-in Laravel protection
- **Input Validation**: Comprehensive validation rules
- **SQL Injection Prevention**: Eloquent ORM
- **XSS Protection**: Blade templating auto-escaping

## 📊 API Endpoints

The application provides RESTful API endpoints for:
- Product management
- Order processing
- User management
- Cart operations

API authentication via Laravel Sanctum tokens.

## 🎨 Frontend Technologies

- **Styling**: TailwindCSS with custom components
- **Icons**: Lucide icons
- **Interactivity**: Livewire components
- **Build Tool**: Vite for fast development
- **AJAX**: Axios for API calls

## 📝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 🤝 Support

For support and questions:
- Create an issue in the repository
- Check the documentation
- Review existing issues

---

**Built with ❤️ using Laravel 11**
