# WafiTechParts - Custom PC Parts E-commerce Website

A dynamic e-commerce website for computer parts and custom PC building, built with PHP, MySQL, HTML5, CSS3, and JavaScript.

## Features

### Frontend Client Interface
- **Interactive Functionality**: Full interactive features using HTML5, CSS, JavaScript
- **Multimedia Content**: Images, videos, interactive maps, menus, and data visualization
- **Dynamic Pages**: 20+ unique dynamic pages with 5+ static pages
- **User Authentication**: Public and private areas with user registration/login
- **Responsive Design**: Works on both desktop and mobile platforms
- **SEO Optimized**: Proper meta tags, descriptions, and structured content

### Admin Interface
- **Theme Switching**: 3 different site templates (Dark, Light, Gamer themes)
- **Data Management**: Edit products, services, and other data records
- **User Administration**: Manage user accounts (enable/disable, delete)
- **System Monitoring**: Real-time status monitoring of website services

### Backend Features
- **Database**: MySQL database with 20+ product records
- **PHP Functionality**: Dynamic web pages with server-side processing
- **Contact Forms**: Interactive forms with validation
- **Order Management**: Complete order tracking system


## Quick Start

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

### Installation

1. **Clone or download the project**
   ```bash
   git clone https://github.com/yourusername/wafitechparts.git
   cd wafitechparts
   ```

2. **Set up the database**
   - Create a MySQL database
   - Import the database schema:
   ```bash
   mysql -u your_username -p your_database < database_setup.sql
   ```

3. **Configure database connection**
   - Edit `includes/db.php` with your database credentials
   - Update the connection parameters:
   ```php
   $host = 'localhost';
   $db   = 'your_database_name';
   $user = 'your_username';
   $pass = 'your_password';
   ```

4. **Upload to your web server**
   - Upload all files to your web server directory
   - Ensure proper file permissions

5. **Test the installation**
   - Visit your website URL
   - Run the database checker: `your-domain.com/check-database.php`

## Themes

The website includes three different themes:

1. **Dark Theme** - Modern dark interface (default)
2. **Light Theme** - Clean professional look
3. **Gamer Theme** - Neon colors and futuristic design

Users can switch themes using the theme selector in the header.

## User Features

- **Registration/Login**: Secure user authentication
- **Profile Management**: Update email and password
- **Order History**: View complete order history
- **Build Calculator**: Interactive PC component selector
- **Theme Switching**: Choose from 3 different themes

## Admin Features

- **Dashboard**: System statistics and monitoring
- **Product Management**: Add, edit, delete products
- **User Management**: Manage user accounts
- **System Settings**: Configure site settings

## Documentation

The website includes comprehensive help documentation:

- **FAQ**: Frequently asked questions
- **How to Build**: Step-by-step PC building guide
- **How to Buy**: Component selection guide
- **Wiki**: General help and resources

## Technical Details

### Technologies Used
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript
- **Frameworks**: Pure PHP (no external frameworks)

### Database Tables
- `users` - User accounts and authentication (add `is_admin` TINYINT(1), `is_active` TINYINT(1) DEFAULT 1)
- `products` - Product catalog (ensure `brand`, `image`, `featured`, `created_at` columns)
- `orders` - Customer orders (include `user_id` NULLABLE, `total_amount`, `status`, `shipping_address`, `created_at`)
- `order_items` - Individual items in orders
- `contact_messages` - Contact form submissions
- `system_status` - System monitoring data
- `product_reviews` - Product ratings and reviews (product_id, reviewer, rating INT 1-5, review_text, created_at)

### Key Features
- **Responsive Design**: Mobile-first approach
- **SEO Optimized**: Meta tags, structured data
- **Security**: Password hashing, SQL injection prevention
- **Performance**: Optimized queries and caching
- **Shopping Cart & Checkout**: Session-based cart with order creation

## Live Demo

The project is hosted on myweb.cs.uwindsor.ca:
- **URL**: [https://myweb.cs.uwindsor.ca/~hassan95/3340-project/](https://hassan95.myweb.cs.uwindsor.ca/3340-project/)
- **Admin Login**: Use the admin account created in database_setup.sql

## License

This project is created for educational purposes as part of a university course assignment.

---

**Created by**: Wafi Hassan  
**Course**: COMP-3340 Web Technologies  
**Institution**: University of Windsor  
**Date**: August 2025 
