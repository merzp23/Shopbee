# Shopbee

## 📚 E-commerce Platform for Books

Shopbee is a modern e-commerce platform built specifically for selling and purchasing books online. With an intuitive user interface and robust backend, it provides a seamless shopping experience for book lovers.

## ✨ Features

- **User Authentication**: Secure registration and login system
- **Book Catalog**: Browse books by genre, author, or popularity
- **Search Functionality**: Find books quickly with advanced search options
- **Shopping Cart**: Add books to cart and manage quantities
- **Wishlist**: Save books for future purchase
- **Order Management**: Track orders and view purchase history
- **Payment Processing**: Secure checkout process
- **Rating System**: Rate and review books after purchase
- **Responsive Design**: Works on desktop and mobile devices

## 🛠️ Technologies Used

- **Backend**: [Laravel](https://laravel.com/) PHP Framework
- **Frontend**: HTML, CSS, JavaScript, [Bootstrap](https://getbootstrap.com/)
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel's built-in authentication system
- **Payment Integration**: Various payment gateways

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL or PostgreSQL
- Web server (Apache, Nginx)

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/shopbee.git
   cd shopbee
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install NPM dependencies**
   ```bash
   npm install
   ```

4. **Create .env file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database in .env file**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=shopbee
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

8. **Compile assets**
   ```bash
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Visit [http://localhost:8000](http://localhost:8000) in your browser**

## 💻 Usage

1. **Register a new account** or login with existing credentials
2. **Browse the book catalog** by navigating through categories or using the search function
3. **Add books to cart** and proceed to checkout when ready
4. **Complete payment** using your preferred payment method
5. **Track your order** through the user dashboard
6. **Leave reviews** for books you've purchased

## 📁 Project Structure

```
app/
├── Console/          # Console commands
├── Exceptions/       # Exception handlers
├── Helpers/          # Helper functions
├── Http/             # Controllers, middleware, requests
├── Models/           # Database models
└── Providers/        # Service providers

public/               # Publicly accessible files
├── assets/           # Compiled assets
├── css/              # CSS files
├── frontend/         # Frontend assets
└── img/              # Images

resources/            # Uncompiled assets
├── css/              # CSS source files
├── js/               # JavaScript source files
└── views/            # Blade templates

routes/               # Application routes
└── web.php           # Web routes
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request


## 🙏 Acknowledgments

- Laravel team for the amazing framework
- All contributors who have helped this project grow
```

