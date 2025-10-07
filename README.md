# DMT Cricket Website

A modern, responsive website for DMT Cricket - your premier destination for cricket equipment and accessories.

## 🏏 About DMT Cricket

DMT Cricket is dedicated to providing high-quality cricket equipment, accessories, and services to cricket enthusiasts worldwide. Our website showcases our product range and provides easy access to our services.

## 🚀 Features

### Frontend
- **Responsive Design**: Mobile-first approach with modern UI/UX
- **Product Showcase**: Dynamic product listings with detailed information
- **Contact System**: Integrated contact form with email notifications
- **SEO Optimized**: Clean URLs, meta tags, and sitemap generation
- **Custom Scripts**: Flexible script injection system for analytics and tracking

### Admin Panel
- **Product Management**: Create, edit, and manage cricket products
- **Contact Leads**: View and manage customer inquiries
- **Email Queue**: Process and manage email communications
- **Custom Scripts**: Manage JavaScript and CSS injections
- **Legal Pages**: Edit privacy policy and terms & conditions
- **URL Redirects**: Handle product URL changes seamlessly

### Security Features
- **Authentication**: Secure admin login system
- **CSRF Protection**: Cross-site request forgery prevention
- **File Upload Security**: Validated image uploads with security checks
- **Input Validation**: Server-side and client-side validation
- **Password Security**: Strong password requirements and hashing

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **UI Framework**: Bootstrap 5
- **Icons**: Flaticon
- **Email**: PHPMailer
- **Admin UI**: Custom Dashboard Theme

## 📋 Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- mod_rewrite enabled (for clean URLs)
- GD extension (for image processing)

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/solluton/dmt.lk.git
   cd dmt.lk
   ```

2. **Set up environment variables**
   ```bash
   cp env.example .env
   # Edit .env with your database credentials
   ```

3. **Configure database**
   - Create a MySQL database
   - Update database credentials in `.env` file
   - Import the database schema from `database/dmt_deta.sql`

4. **Set permissions**
   ```bash
   chmod 755 uploads/
   chmod 755 uploads/main/
   chmod 755 uploads/featured-home/
   chmod 755 uploads/spec/
   ```

5. **Configure web server**
   - Point document root to the project directory
   - Ensure mod_rewrite is enabled
   - Configure virtual host if needed

## 📁 Project Structure

```
dmt.lk/
├── admin/                 # Admin panel files
│   ├── includes/         # Admin includes (header, sidebar, footer)
│   ├── uploads/          # Admin uploaded files
│   └── *.php            # Admin pages
├── config/               # Configuration files
│   ├── database.php      # Database connection
│   ├── email.php         # Email configuration
│   ├── security.php      # Security functions
│   └── *.json           # Configuration data
├── includes/             # Frontend includes
│   ├── navbar-global.php # Navigation
│   ├── footer-global.php # Footer
│   └── scripts-global.php # Scripts
├── uploads/              # User uploaded files
│   ├── main/            # Main product images
│   ├── featured-home/   # Homepage featured images
│   └── spec/            # Product specification images
├── css/                  # Stylesheets
├── js/                   # JavaScript files
├── images/               # Static images
├── fonts/                # Font files
├── *.php                 # Main website pages
├── .htaccess             # Apache configuration
├── robots.txt            # SEO robots file
└── sitemap.xml           # XML sitemap
```

## 🔐 Admin Access

1. **Default Admin Account**
   - Username: `admin`
   - Password: `admin123` (change immediately after first login)

2. **Password Reset**
   - Use the password reset functionality in the admin panel
   - Or contact the system administrator

## 📧 Email Configuration

The system uses PHPMailer for email functionality. Configure SMTP settings in `config/email.php`:

```php
// SMTP Configuration
$smtp_host = 'your-smtp-host';
$smtp_port = 587;
$smtp_username = 'your-email@domain.com';
$smtp_password = 'your-email-password';
```

## 🎨 Customization

### Adding New Products
1. Login to admin panel
2. Navigate to Products → Create Product
3. Fill in product details and upload images
4. Set SEO meta information
5. Save and publish

### Custom Scripts
1. Go to Settings → Custom Scripts
2. Add JavaScript/CSS code for head or body sections
3. Toggle scripts on/off as needed
4. Scripts are automatically injected into pages

### Legal Pages
1. Navigate to Settings → Legal Pages
2. Edit Privacy Policy and Terms & Conditions
3. Changes are reflected immediately on the website

## 🔒 Security Considerations

- **Change default passwords** immediately after installation
- **Keep PHP and MySQL updated** to latest versions
- **Regular backups** of database and files
- **Monitor file uploads** for malicious content
- **Use HTTPS** in production environment
- **Regular security audits** of the codebase

## 📊 SEO Features

- **Clean URLs**: SEO-friendly product and page URLs
- **Meta Tags**: Dynamic meta titles and descriptions
- **Sitemap**: Automatic XML sitemap generation
- **Robots.txt**: Proper search engine directives
- **Structured Data**: Ready for schema markup implementation

## 🐛 Troubleshooting

### Common Issues

1. **Images not uploading**
   - Check file permissions on uploads directory
   - Verify PHP upload limits in php.ini
   - Check .htaccess rules

2. **Clean URLs not working**
   - Ensure mod_rewrite is enabled
   - Check .htaccess file is present
   - Verify Apache configuration

3. **Email not sending**
   - Check SMTP credentials
   - Verify firewall settings
   - Test with different SMTP providers

4. **Database connection errors**
   - Verify database credentials in .env
   - Check MySQL service is running
   - Ensure database exists

## 📝 License

This project is proprietary software developed for DMT Cricket. All rights reserved.

## 🤝 Support

For technical support or questions:
- **Email**: support@solluton.com
- **Website**: https://solluton.com

## 🔄 Updates

Regular updates and improvements are made to enhance functionality and security. Always backup your data before updating.

---

**Developed by [Solluton](https://solluton.com)** - Professional Web Development Services
