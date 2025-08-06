# WordPress Theme Structure

## Core Theme Files

- `functions.php` - Theme functions, custom post type registration, ACF integration
- `style.css` - Complete responsive styling for portrait gallery
- `index.php` - Main homepage and archive template
- `single-ai_portrait.php` - Individual portrait display with ACF field integration
- `js/navigation.js` - Keyboard/swipe navigation and interactive features

## Includes

- `inc/acf-config.php` - ACF Pro field groups and configuration
- `inc/seo-analytics.php` - SEO optimization and Google Analytics integration

## ACF Integration

- `acf-json/` - ACF field group JSON files for version control
- All custom fields managed through ACF Pro
- JSON sync enabled for field group versioning

## Page Templates

- `page-templates/about.php` - About page (Google Ads requirement)
- `page-templates/privacy-policy.php` - Privacy policy (Google Ads requirement)
- `page-templates/terms-of-service.php` - Terms of service (Google Ads requirement)

## Navigation Features

- **Keyboard Navigation:** Arrow keys and Escape
- **Touch/Swipe Support:** Mobile gestures
- **Related Portraits:** Random selection of 3 related works
- **Gallery Grid:** Responsive masonry layout