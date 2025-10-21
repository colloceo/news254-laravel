# News254 Laravel - Kenya's Premier News Platform

![News254 Logo](https://iili.io/FULcRiF.png)

A modern, responsive news blog website built with Laravel, designed specifically for Kenyan audiences, featuring local, political, technology, business, and entertainment news coverage.

## 🌟 Live Demo

**Website:** [https://news254.co.ke](https://news254.co.ke)

**🔐 Admin Panel (Secret Access):** [https://news254.co.ke/admin/login](https://news254.co.ke/admin/login)
- **Username:** admin@news254.co.ke
- **Password:** admin123
- **Note:** Admin access is hidden from public users and only accessible via direct URL

## 🚀 SEO Optimizations for Google Rankings

### **🎯 Kenya-Focused SEO Strategy**
- **Geo-targeted Keywords**: Kenya news, Nairobi news, East Africa news
- **Local SEO**: Geo tags for Kenya, Nairobi coordinates, KE region targeting
- **Language Targeting**: en-KE locale, Kenyan English content optimization
- **News-specific Keywords**: Breaking news Kenya, Kenya politics, Kenya business

### **📊 Technical SEO Implementation**
- **XML Sitemaps**: Automated sitemaps for articles, categories, and pages
- **Google News Sitemap**: Specialized sitemap for Google News inclusion
- **Robots.txt**: Optimized crawling instructions for search engines
- **Canonical URLs**: Prevents duplicate content issues
- **Meta Tags**: Comprehensive title, description, and keyword optimization

### **🔍 Structured Data & Rich Snippets**
- **NewsMediaOrganization Schema**: Identifies site as news organization
- **Article Schema**: Rich snippets for individual articles
- **Organization Schema**: Complete business information
- **BreadcrumbList Schema**: Enhanced navigation for search engines
- **FAQ Schema**: Structured Q&A content

### **📱 Core Web Vitals Optimization**
- **Mobile-First Design**: Optimized for mobile search rankings
- **Fast Loading**: Optimized images, lazy loading, efficient caching
- **Responsive Design**: Perfect display across all devices
- **Accessibility**: WCAG compliant for better search rankings

### **🌐 Social Media Integration**
- **Open Graph Tags**: Optimized Facebook sharing
- **Twitter Cards**: Enhanced Twitter link previews
- **Social Sharing**: Easy sharing across all platforms
- **Social Proof**: Integrated social media presence

## 🎯 Project Overview

News254 Laravel is a comprehensive news platform built with Laravel 11, offering a seamless experience for both readers and content managers. The platform focuses on delivering timely, relevant news to Kenyan audiences with an emphasis on mobile-first design and user engagement.

## ✨ Key Features

### 🖥️ Public Website
- **Responsive Design**: Mobile-first approach with optimized layouts for all devices
- **Breaking News Banner**: Real-time breaking news alerts with marquee animation
- **Comprehensive Categories**: 20+ news categories including Politics, Business, Technology, Sports, Entertainment, Health, Education, Lifestyle, Environment, Crime, International, Economy, Agriculture, Transport, Tourism, Weather, Opinion, Culture, Science, Religion
- **Advanced Search**: Keyword-based article discovery with full-text search
- **Social Sharing**: WhatsApp, Facebook, Twitter, LinkedIn integration with auto-sharing
- **SEO Optimized**: Meta tags, structured data, and optimized URLs
- **Comment System**: Reader engagement with moderated comments and email notifications
- **Trending Articles**: Popular content based on views and engagement
- **Complete Page Suite**: About, Contact, Privacy Policy, Terms of Service, Careers
- **Mobile Sidebar Navigation**: Complete category navigation with emoji icons
- **Dark Mode Support**: Full light/dark theme switching with localStorage persistence
- **Professional Error Pages**: Custom 404, 500, 403, 419, 429, 503 error pages
- **Newsletter Subscription**: Backend-powered email subscription system
- **RSS Feeds**: Main and category-specific RSS feeds
- **Multi-language Support**: English and Swahili language support
- **Advanced Caching**: Intelligent caching for improved performance

### 🛠️ Admin Dashboard
- **Enhanced Header**: System information bar with environment, versions, and resource usage
- **Interactive Dashboard**: Real-time statistics, activity feed, and performance metrics
- **Content Management**: Create, edit, delete, and schedule articles with AJAX functionality
- **Trix Rich Text Editor**: Professional WYSIWYG editor with dark theme support
- **Dual Media Management**: Support for both external URLs and local file uploads
- **Comprehensive Analytics**: Interactive charts, growth metrics, and performance tracking with Chart.js
- **Mobile-Responsive Admin**: Fully responsive admin panel with touch-friendly interfaces
- **Profile Management**: Complete admin profile settings with password changes
- **Site Configuration**: Feature toggles, cache management, and system settings
- **Database Integration**: SQLite/MySQL with automatic fallback and error handling
- **Hidden Access**: Completely hidden admin panel with no public links or registration
- **Secure Authentication**: Admin-only access with role-based permissions
- **Newsletter Management**: Subscriber management and email campaign tools
- **Comment Moderation**: Approve/reject comments with email notifications
- **Social Media Integration**: Auto-posting to Facebook and Twitter
- **Cache Management**: Advanced caching controls and cache warming
- **Multi-language Content**: Create content in multiple languages

### 📱 User Experience
- **Fast Loading**: Optimized performance with Laravel caching
- **Accessibility**: WCAG compliant design with proper contrast ratios
- **Social Integration**: Easy sharing across popular platforms
- **Related Articles**: Content recommendations based on categories
- **Reading Time**: Estimated reading duration for each article
- **Ad-Ready**: Prepared for Google AdSense integration
- **Non-Intrusive Design**: Clean, professional layout

### 🎯 SEO Content Strategy
- **Kenya-Focused Content**: Local news, politics, business, sports
- **Breaking News Coverage**: Real-time updates for trending topics
- **Long-tail Keywords**: Specific Kenyan topics and locations
- **Content Freshness**: Regular updates for better search rankings
- **Internal Linking**: Strategic linking between related articles

## 🚀 Tech Stack

### Backend
- **Laravel 11** - Modern PHP framework
- **PHP 8.2+** - Latest PHP features
- **MySQL/SQLite** - Flexible database options
- **Eloquent ORM** - Database relationships and queries
- **Custom Authentication** - Secure admin authentication system
- **Advanced Middleware** - Security and locale middleware
- **Service Layer** - Caching, social media, and email services
- **Queue System** - Background job processing
- **Mail System** - Email notifications and newsletters

### Frontend
- **Blade Templates** - Laravel's templating engine
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Fast build tool and development server
- **Trix Editor** - Rich text editing for admin
- **Chart.js** - Interactive analytics charts
- **AJAX Forms** - Dynamic form submissions
- **Progressive Enhancement** - Works without JavaScript

### SEO & Analytics
- **XML Sitemaps** - Automated sitemap generation
- **Google News Sitemap** - News-specific search optimization
- **Structured Data** - Schema.org markup for rich snippets
- **Google Analytics** - Traffic and performance tracking
- **Google Search Console** - Search performance monitoring
- **RSS Feeds** - Main and category-specific feeds
- **Social Media Meta** - Open Graph and Twitter Cards
- **Multi-language SEO** - Language-specific optimization
- **Robots.txt** - Search engine crawling control

### Development Tools
- **Composer** - PHP dependency management
- **NPM** - Node.js package management
- **Laravel Artisan** - Command-line interface
- **Database Migrations** - Version control for database schema
- **Model Factories & Seeders** - Test data generation

## 📁 Project Structure

```
news254-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── ArticleController.php
│   │   ├── CategoryController.php
│   │   ├── NewsletterController.php
│   │   ├── RssController.php
│   │   └── Admin/
│   │       ├── AdminController.php
│   │       ├── AdminAuthController.php
│   │       └── ArticleController.php
│   ├── Http/Middleware/
│   │   ├── AdminMiddleware.php
│   │   ├── HideAdminMiddleware.php
│   │   └── LocaleMiddleware.php
│   ├── Services/
│   │   ├── CacheService.php
│   │   └── SocialMediaService.php
│   ├── Mail/
│   │   └── CommentNotification.php
│   └── Models/
│       ├── Article.php
│       ├── Category.php
│       ├── Author.php
│       ├── Comment.php
│       ├── User.php
│       └── NewsletterSubscriber.php
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_articles_table.php
│   │   ├── create_categories_table.php
│   │   ├── create_comments_table.php
│   │   ├── create_newsletter_subscribers_table.php
│   │   ├── add_role_to_users_table.php
│   │   └── add_language_to_articles_table.php
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   └── admin.blade.php
│   │   ├── home.blade.php
│   │   ├── articles/
│   │   ├── categories/
│   │   ├── pages/
│   │   ├── emails/
│   │   │   └── comment-notification.blade.php
│   │   └── admin/
│   │       ├── login.blade.php
│   │       ├── dashboard.blade.php
│   │       └── articles/
│   ├── lang/
│   │   ├── en/
│   │   └── sw/
│   ├── css/
│   │   └── app.css
│   └── js/
│       └── app.js
├── routes/
│   └── web.php
├── public/
├── .env.example
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
└── README.md
```

## 🛠️ Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or SQLite

### Local Development

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd news254-laravel
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Set up environment variables**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=news254
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seed database**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

9. **Open in browser**
   ```
   http://localhost:8000
   ```

### Database Setup

The application comes with pre-configured migrations and seeders:

- **Categories**: Politics, Business, Technology, Sports, Entertainment, Lifestyle
- **Authors**: Sample authors with profiles and social links
- **Articles**: Sample news articles with content, images, and metadata
- **Admin User**: Default admin account for dashboard access

### Admin Access

**🔐 HIDDEN ADMIN ACCESS (Direct URL Only):**
- **Local:** http://localhost:8000/admin/login
- **Production:** https://news254.co.ke/admin/login
- **Default Credentials:** admin@news254.co.ke / admin123
- **Note:** Admin panel is completely hidden from public users
- **Security:** No registration links, no public access, blocked from search engines

## 🎨 Design System

### Color Palette
- **Primary Green**: #16A34A (Kenya flag inspired)
- **Secondary Red**: #DC2626 (Breaking news, alerts)
- **Accent Colors**: Various category-specific colors
- **Neutral Gray**: #6B7280 (Text, backgrounds)

### Typography
- **System Fonts**: Optimized font stack with fallbacks
- **Responsive Text**: Scales appropriately across devices
- **Readable Line Heights**: 1.6 for optimal readability

### Responsive Breakpoints
- **Mobile**: 320px - 768px
- **Tablet**: 768px - 1024px
- **Desktop**: 1024px+

## 📊 Features Deep Dive

### Article Management
- **CRUD Operations**: Full create, read, update, delete functionality
- **Category System**: Hierarchical content organization
- **Tag Management**: Flexible tagging for content discovery
- **Featured Articles**: Highlight important content
- **Breaking News**: Special designation for urgent updates
- **Draft Mode**: Save and preview before publishing
- **View Tracking**: Automatic view counting with analytics
- **Multi-language**: Create articles in multiple languages
- **Social Auto-posting**: Automatic sharing to social media
- **Email Notifications**: Comment notifications to admins

### SEO Optimization
- **Dynamic Meta Tags**: Title, description, and Open Graph tags
- **Clean URLs**: SEO-friendly slug-based URLs
- **Structured Data**: Complete JSON-LD markup implementation
- **Image Optimization**: Proper alt tags and responsive images
- **XML Sitemaps**: Automated generation for search engines
- **Google News Integration**: Specialized news sitemap
- **Local SEO**: Kenya-specific geo-targeting
- **Core Web Vitals**: Optimized for Google's ranking factors

### Social Features
- **Share Buttons**: Native sharing for major platforms
- **Auto Social Posting**: Automatic Facebook and Twitter sharing
- **Comment System**: Moderated user discussions with email notifications
- **Author Profiles**: Detailed author information and social links
- **Related Articles**: Category-based content recommendations
- **Newsletter System**: Backend-powered email subscriptions
- **RSS Feeds**: Syndication for content distribution

## 🔧 Configuration

### Environment Variables
```env
# Application
APP_NAME="News254"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news254
DB_USERNAME=root
DB_PASSWORD=

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admin@news254.co.ke
MAIL_FROM_NAME="News254"

# Social Media APIs
FACEBOOK_ACCESS_TOKEN=your-facebook-token
TWITTER_BEARER_TOKEN=your-twitter-token

# Admin Credentials
ADMIN_EMAIL=admin@news254.co.ke
ADMIN_PASSWORD=admin123
```

### Customization
- **Colors**: Update `tailwind.config.js` for brand colors
- **Categories**: Modify database seeders for content categories
- **Layout**: Adjust Blade templates in `resources/views/`
- **Styling**: Update `resources/css/app.css` for custom styles
- **Languages**: Add new language files in `resources/lang/`
- **Social Media**: Configure API tokens in services config
- **Caching**: Adjust cache durations in CacheService
- **Email Templates**: Customize email views in `resources/views/emails/`

## 🚀 Deployment

### Production Setup
1. **Server Requirements**
   - PHP 8.2+
   - MySQL 8.0+
   - Composer
   - Node.js & NPM

2. **Environment Configuration**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://news254.co.ke
   ```

3. **Optimization Commands**
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   npm run build
   ```

4. **Web Server Configuration**
   - Point document root to `public/` directory
   - Configure URL rewriting for clean URLs
   - Set proper file permissions

### Database Migration
```bash
php artisan migrate --force
php artisan db:seed --force
```

## 🔒 Security Features

- **CSRF Protection**: Laravel's built-in CSRF protection
- **SQL Injection Prevention**: Eloquent ORM parameterized queries
- **XSS Protection**: Blade template escaping
- **Custom Authentication**: Secure admin authentication system
- **Role-based Authorization**: Admin-only access control
- **Input Validation**: Comprehensive form validation
- **Hidden Admin Access**: Completely hidden admin panel with no public exposure
- **Security Middleware**: Additional protection layers
- **Session Security**: Secure session management
- **Password Hashing**: Bcrypt password encryption
- **Admin Privilege Verification**: Multi-layer admin access checks
- **Search Engine Blocking**: Admin routes blocked in robots.txt

## 📊 SEO Performance & Analytics

### **🎯 Target Keywords for Kenya**
- **Primary**: "Kenya news", "breaking news Kenya", "Nairobi news"
- **Secondary**: "Kenya politics", "Kenya business", "Kenya sports"
- **Long-tail**: "latest news Kenya today", "Kenya headlines", "East Africa news"
- **Local**: "Nairobi breaking news", "Kenya government news"

### **📈 SEO Monitoring Tools**
- **Google Search Console**: Search performance and indexing
- **Google Analytics**: Traffic sources and user behavior
- **Core Web Vitals**: Page speed and user experience metrics
- **Mobile Usability**: Mobile search optimization
- **Rich Results**: Structured data performance

### **🚀 Performance Metrics**
- **Page Speed**: < 3 seconds load time
- **Mobile Score**: 95+ on Google PageSpeed Insights
- **SEO Score**: 100/100 on Lighthouse
- **Accessibility**: WCAG 2.1 AA compliant
- **Core Web Vitals**: All metrics in green zone

### **📊 Content Strategy for Rankings**
- **Daily Updates**: Fresh content for better rankings
- **Breaking News**: Real-time coverage of trending topics
- **Local Focus**: Kenya-specific news and events
- **User Engagement**: Comments, shares, and time on page
- **Internal Linking**: Strategic content connections

## 📈 Performance Optimizations

- **Database Indexing**: Optimized database queries
- **Eager Loading**: Prevent N+1 query problems
- **Advanced Caching**: Multi-layer caching with cache warming
- **Asset Optimization**: Vite build optimization
- **Image Optimization**: Responsive images with proper sizing
- **Code Splitting**: Optimized JavaScript loading
- **Query Optimization**: Efficient database queries
- **Cache Strategies**: Featured articles, categories, and trending content caching
- **CDN Ready**: Optimized for content delivery networks

## 🧪 Testing

### Running Tests
```bash
php artisan test
```

### Available Test Suites
- Feature tests for HTTP endpoints
- Unit tests for model functionality
- Database tests with factories

## 🤝 Contributing

1. **Fork the repository**
2. **Create a feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```
3. **Commit your changes**
   ```bash
   git commit -m 'Add amazing feature'
   ```
4. **Push to the branch**
   ```bash
   git push origin feature/amazing-feature
   ```
5. **Open a Pull Request**

### Development Guidelines
- Follow PSR-12 coding standards
- Write comprehensive tests
- Update documentation as needed
- Use semantic commit messages

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Team

### Core Contributors
- **Lead Developer**: Collins Otieno
- **Content Manager**: Justin Ludeki
- **UI/UX Design**: News254 Team

### Contact Information
- **Email**: justintech81@gmail.com
- **Phone**: +254 751 153 333
- **Website**: https://news254.co.ke
- **Location**: Nairobi, Kenya

## 🗺️ Roadmap

### Phase 1 (✅ Completed)
- ✅ Laravel application setup
- ✅ Database schema and models
- ✅ Admin dashboard with CRUD operations
- ✅ Public website with responsive design
- ✅ Authentication system
- ✅ Content management system
- ✅ SEO optimization
- ✅ Comment system

### Phase 2 (✅ Completed)
- ✅ Advanced analytics dashboard with charts
- ✅ Image upload and management system
- ✅ Social media integration
- ✅ Mobile-responsive admin panel
- ✅ SEO optimization with sitemaps
- ✅ Google News integration
- ✅ Structured data implementation

### Phase 3 (✅ Completed - Latest Updates)
- ✅ Newsletter subscription backend system with database storage
- ✅ Social media API integrations (Facebook, Twitter auto-posting)
- ✅ Advanced caching strategies with CacheService and cache warming
- ✅ Email notifications for comments with Mail system
- ✅ RSS feed generation (main feed and category-specific feeds)
- ✅ Multi-language support (English/Swahili) with locale middleware
- ✅ Hidden admin authentication system (completely hidden from public)
- ✅ Enhanced security middleware (AdminMiddleware, HideAdminMiddleware)
- ✅ Role-based user system with admin privileges
- ✅ Complete admin panel isolation (no public registration/links)
- ✅ Search engine blocking for admin routes
- ✅ Production-ready security implementation

### Phase 4 (🔄 Future Enhancements)
- 📅 API development for mobile apps
- 📅 Advanced search functionality with filters
- 📅 Real-time notifications
- 📅 Progressive Web App (PWA)
- 📅 Advanced user roles and permissions
- 📅 Content scheduling system
- 📅 Performance monitoring dashboard
- 📅 A/B testing framework

## 🆘 Support

### Getting Help
- **Documentation**: Check this README and Laravel docs
- **Issues**: Report bugs via GitHub Issues
- **Email**: Technical support at tech@news254.co.ke

### Common Issues & Solutions
1. **Migration Errors**: Run `php artisan migrate` to apply database changes
2. **Permission Errors**: Check file permissions on storage and cache directories
3. **Asset Build Errors**: Run `npm install` and `npm run build`
4. **Environment Issues**: Verify .env file configuration
5. **Admin Access**: Use direct URL `/admin/login` - completely hidden from public
6. **Cache Issues**: Run `php artisan cache:clear` to clear application cache
7. **Email Issues**: Configure SMTP settings in .env for comment notifications
8. **Social Media**: Add API tokens in .env for auto-posting features
9. **Language Issues**: Ensure locale files exist in `resources/lang/`
10. **Newsletter**: Configure mail settings for subscription confirmations

### Quick Commands
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Rebuild assets
npm run build

# Reset database with fresh data
php artisan migrate:fresh --seed

# Check application status
php artisan about
```

## 🔧 SEO Setup Guide

### **Google Search Console Setup**
1. Add https://news254.co.ke to Google Search Console
2. Verify ownership using meta tag verification
3. Submit XML sitemaps: `/sitemap.xml`, `/sitemap-articles.xml`
4. Monitor search performance and indexing

### **Google Analytics Setup**
1. Create GA4 property for news254.co.ke
2. Replace `G-XXXXXXXXXX` with your tracking ID in layout
3. Set up goals for article views and engagement
4. Configure enhanced ecommerce tracking

### **Google News Inclusion**
1. Apply for Google News Publisher Center
2. Submit news sitemap: `/sitemap-articles.xml`
3. Follow Google News content policies
4. Maintain regular publishing schedule

### **Local SEO Optimization**
1. Claim Google My Business listing for News254
2. Add location-specific content and keywords
3. Target Kenya-specific search terms
4. Build local citations and backlinks

---

**Built with ❤️ for Kenya using Laravel | Optimized for Google Rankings**

*Kenya's Premier News Platform - Keeping Kenya informed, one story at a time.*

**🌐 Live at: [https://news254.co.ke](https://news254.co.ke)**