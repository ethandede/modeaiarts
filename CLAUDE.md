# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a WordPress-based website for showcasing AI-generated portrait art with a focus on Google Ads eligibility. The site features a curated collection of beautiful AI-generated portraits with comprehensive navigation and substantive content.

## WordPress Theme Structure

**Theme Location:** `wp-content/themes/ai-portraits/`

### Key Theme Files
- `functions.php` - Main theme functions, custom post type, and meta fields
- `style.css` - Complete responsive styling for portrait gallery
- `index.php` - Main homepage and archive template
- `single-ai_portrait.php` - Individual portrait display with navigation
- `js/navigation.js` - Keyboard/swipe navigation and interactive features
- `inc/seo-analytics.php` - SEO optimization and Google Analytics integration

### Page Templates
- `page-templates/about.php` - Comprehensive about page (Google Ads requirement)
- `page-templates/privacy-policy.php` - Privacy policy (Google Ads requirement)
- `page-templates/terms-of-service.php` - Terms of service (Google Ads requirement)

## Custom Post Type

**AI Portraits** (`ai_portrait`)
- Custom fields: AI model, generation date, style description, mood, technique
- Featured image support with multiple image sizes
- SEO-optimized single page template
- Prev/next navigation between portraits

## Content Strategy for Google Ads

### Required Pages (All Created)
1. **About Page** - Detailed explanation of AI art and creative process (500+ words)
2. **Privacy Policy** - Comprehensive privacy policy including Google Analytics
3. **Terms of Service** - Complete terms covering AI-generated content
4. **Blog Section** - Multiple substantial articles about AI art (400-600 words each)

### Blog Content Topics
- The Evolution of AI Portrait Art
- Understanding AI Art Generation Technology  
- Ethics of AI-Generated Portraits
- Additional posts available in `sample-blog-posts.php`

## SEO Features

- Comprehensive meta tags and Open Graph integration
- Google Analytics 4 integration
- Structured data (Schema.org) for portraits and website
- Custom XML sitemap generation
- SEO-friendly URLs and breadcrumbs
- Image optimization with multiple sizes

## Navigation Features

- **Keyboard Navigation:** Left/Right arrows, Escape key
- **Touch/Swipe Support:** Mobile-friendly gesture navigation
- **Related Portraits:** Random selection of 3 related artworks
- **Gallery Grid:** Responsive masonry-style layout

## Development Commands

Since this is a WordPress theme, development involves:

1. **Local WordPress Setup:** Use Local by Flywheel, XAMPP, or similar
2. **Theme Activation:** Activate the "AI Portraits" theme in WordPress admin
3. **Content Creation:** Add AI portraits using the custom post type
4. **SEO Configuration:** Set Google Analytics ID in Settings > AI Portraits SEO

## Google Ads Preparation Checklist

- ✅ Substantive content (10+ pages with 300-500 words each)
- ✅ Privacy Policy and Terms of Service
- ✅ About page explaining the site's purpose
- ✅ Regular blog content about AI art
- ✅ Mobile-responsive design
- ✅ Fast loading times with image optimization
- ✅ SSL certificate support (WordPress standard)
- ✅ Google Analytics integration
- ✅ SEO optimization

## Theme Customization

To modify the theme:
- **Colors/Styling:** Edit `style.css`
- **Layout Changes:** Modify template files
- **Functionality:** Add to `functions.php` or create new includes
- **Navigation:** Customize `js/navigation.js`

## Content Management

1. **Adding Portraits:** Use WordPress admin > AI Portraits > Add New
2. **Fill Metadata:** Complete all custom fields for SEO benefits
3. **Featured Images:** Upload high-quality portrait images
4. **Blog Posts:** Create regular content using provided examples

This theme provides a complete foundation for a Google Ads-eligible AI portrait gallery with comprehensive SEO and user experience features.