# WafiTechParts - Installation Guide

## Overview
WafiTechParts is a dynamic e-commerce website for computer parts and custom PC building. This guide will help you install and set up the project on your local or production server.

## Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher (or MariaDB 10.2+)
- Web server (Apache/Nginx)
- Composer (optional, for dependency management)

## Installation Steps

### 1. Download/Clone the Project
```bash
# Option 1: Download ZIP
# Download from your repository and extract to web server directory

# Option 2: Clone from Git
git clone https://github.com/yourusername/wafitechparts.git
cd wafitechparts
```

### 2. Set Up Database
1. Create a new MySQL database:
```sql
CREATE DATABASE wafitechparts;
CREATE USER 'wafitechparts_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON wafitechparts.* TO 'wafitechparts_user'@'localhost';
FLUSH PRIVILEGES;
```

2. Import the database schema:
```bash
mysql -u wafitechparts_user -p wafitechparts < database_setup.sql
```

### 3. Configure Database Connection
Edit `includes/db.php` with your database credentials:
```php
<?php
$host = 'localhost';      // Your MySQL host
$db   = 'wafitechparts'; // Your database name
$user = 'wafitechparts_user'; // Your database username
$pass = 'your_secure_password'; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
```

### 4. Set Up File Permissions
```bash
# Create assets directories
mkdir -p assets/images/products
mkdir -p assets/videos
mkdir -p assets/images/thumbnails

# Set proper permissions
chmod 755 assets/
chmod 755 assets/images/
chmod 755 assets/videos/
chmod 644 assets/images/products/*
chmod 644 assets/videos/*
```

### 5. Add Required Assets
Run the asset generation script to check what files you need:
```bash
php generate_assets.php
```

Download or create the required images and videos:
- **Product Images**: 40+ product images (400x400px recommended)
- **Site Images**: Logo, favicon, hero backgrounds
- **Videos**: 3+ videos (MP4 format recommended)

### 6. Configure Web Server

#### Apache Configuration
Create `.htaccess` file in the root directory:
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

# Security headers
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
```

#### Nginx Configuration
Add to your nginx site configuration:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

### 7. Create Admin Account
The database setup includes a default admin account:
- **Username**: admin
- **Password**: admin123

**Important**: Change the admin password immediately after installation!

### 8. Test Installation
1. Visit your website URL
2. Test user registration and login
3. Test admin panel access
4. Verify all pages load correctly
5. Test the build calculator functionality

## Configuration Options

### Theme Customization
The site supports 3 themes (Dark, Light, Gamer). Edit theme files in `templates/`:
- `templates/dark.css` - Dark theme
- `templates/light.css` - Light theme  
- `templates/gamer.css` - Gamer theme

### Adding Products
1. Access admin panel: `/admin/dashboard.php`
2. Use "Manage Products" to add/edit products
3. Upload product images to `assets/images/products/`
4. Update database with correct image paths

### Customizing Content
- Edit `about.php` for company information
- Edit `contact.php` for contact details
- Edit wiki pages in `wiki/` directory
- Update footer links in `includes/footer.php`

## Security Considerations

### Production Deployment
1. **Change default passwords**:
   - Admin password
   - Database password
   - Any other default credentials

2. **Secure file permissions**:
```bash
chmod 644 *.php
chmod 644 includes/*.php
chmod 755 admin/
chmod 755 user/
```

3. **Enable HTTPS**:
   - Install SSL certificate
   - Redirect HTTP to HTTPS
   - Update all internal links

4. **Database security**:
   - Use strong passwords
   - Limit database user privileges
   - Regular backups

### File Upload Security
- Validate all uploaded files
- Restrict file types and sizes
- Store uploads outside web root if possible

## Troubleshooting

### Common Issues

**Database Connection Error**
- Verify database credentials in `includes/db.php`
- Check MySQL service is running
- Ensure database exists and user has permissions

**404 Errors**
- Check `.htaccess` file exists and is readable
- Verify Apache mod_rewrite is enabled
- Check file permissions

**Images Not Loading**
- Verify image files exist in correct directories
- Check file permissions (644 for images)
- Update database with correct image paths

**Admin Panel Access**
- Ensure user has `is_admin = 1` in database
- Check session is working properly
- Verify admin files are accessible

### Performance Optimization

1. **Enable PHP OPcache**:
```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=4000
```

2. **Image Optimization**:
- Compress images (JPEG quality 80-85)
- Use WebP format where possible
- Implement lazy loading

3. **Database Optimization**:
- Add indexes on frequently queried columns
- Regular database maintenance
- Consider caching for product listings

## Backup and Maintenance

### Regular Backups
```bash
# Database backup
mysqldump -u username -p wafitechparts > backup_$(date +%Y%m%d).sql

# File backup
tar -czf wafitechparts_backup_$(date +%Y%m%d).tar.gz /path/to/website
```

### Update Process
1. Backup current installation
2. Download new version
3. Update files (preserve customizations)
4. Run database migrations if needed
5. Test thoroughly
6. Update live site

## Support and Documentation

### Project Structure
```
wafitechparts/
├── admin/              # Admin panel
├── assets/             # Images, videos, CSS, JS
├── includes/           # PHP includes (header, footer, db)
├── products/           # Product pages
├── templates/          # CSS themes
├── user/               # User account pages
├── wiki/               # Help documentation
├── index.php           # Home page
├── about.php           # About page
├── contact.php         # Contact page
└── database_setup.sql  # Database schema
```

### Key Features
- ✅ 20+ dynamic pages
- ✅ 3 theme system (Dark, Light, Gamer)
- ✅ User registration/authentication
- ✅ Admin panel with product management
- ✅ Interactive build calculator
- ✅ Comprehensive help wiki
- ✅ Responsive design
- ✅ SEO optimized
- ✅ Contact form with database storage
- ✅ System monitoring dashboard

### Contact Support
For technical support or questions:
- Email: support@wafitechparts.com
- Documentation: `/wiki/` directory
- GitHub Issues: [Repository Issues Page]

## License
This project is created for educational purposes. Please respect copyright and licensing requirements for any third-party assets used.

---

**Installation completed successfully!** 🎉

Your WafiTechParts website should now be fully functional. Remember to:
1. Change default passwords
2. Add your product images and videos
3. Customize content for your business
4. Test all functionality thoroughly
5. Set up regular backups 