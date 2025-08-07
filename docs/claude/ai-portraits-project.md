# AI Portraits Project - Site-Specific Details

## Project Overview

WordPress-based website for showcasing AI-generated portrait art with Google Ads eligibility. Features a curated collection of AI-generated portraits with comprehensive navigation and substantive content.

## Local Development Configuration

- **Local Domain:** `modeaiarts.local`
- **Database Socket:** `/Users/edede/Library/Application Support/Local/run/18tcPIiBl/mysql/mysqld.sock`
- **Theme Name:** `ai-portraits`
- **Custom Post Type:** `ai_portrait`

## Theme Structure (AI Portraits Specific)

### Core Theme Files
- `functions.php` - AI portrait post type, ACF integration, navigation functions
- `style.css` - Portrait gallery responsive styling
- `index.php` - Homepage with portrait grid
- `single-ai_portrait.php` - Individual portrait display with ACF fields
- `js/navigation.js` - Keyboard/swipe navigation for portraits

### ACF Field Groups (AI Portraits)

#### Field Group: "AI Portrait Details"
- **ai_model** (Select): Midjourney, DALL-E 3, Stable Diffusion, Leonardo AI, Runway ML, Other
- **generation_date** (Date Picker): When portrait was generated
- **style_description** (Textarea): Artistic style description  
- **mood** (Text): Emotional tone (Contemplative, Joyful, Mysterious, etc.)
- **technique** (Checkbox): Digital Painting, Photo Realistic, Oil Painting Style, Watercolor Style, etc.
- **prompt_text** (Textarea): AI prompt used (optional)
- **color_palette** (Color Picker): Primary color of portrait

#### Field Group: "Gallery Settings" (Options Page)
- **portraits_per_page** (Number): Default 12
- **gallery_layout** (Radio): Grid/Masonry/Carousel
- **enable_lightbox** (True/False): Lightbox functionality

### Page Templates
- `page-templates/about.php` - About AI art and creative process
- `page-templates/privacy-policy.php` - Google Ads compliant privacy policy
- `page-templates/terms-of-service.php` - Terms covering AI-generated content

## Content Strategy

### Blog Content Topics
- The Evolution of AI Portrait Art
- Understanding AI Art Generation Technology
- Ethics of AI-Generated Portraits
- Sample posts available in `sample-blog-posts.php`

### Google Ads Requirements Met
- ✅ About page (500+ words explaining AI art)
- ✅ Privacy Policy (comprehensive, includes Analytics)  
- ✅ Terms of Service (AI content specific)
- ✅ Substantive blog content (400-600 words each)
- ✅ Mobile-responsive gallery design
- ✅ SEO optimization with structured data

## Deployment Configuration

### Bluehost Specific
- **cPanel Username:** `ezfjslmy` 
- **Server:** `home4` (Bluehost server designation)
- **SSH IP:** `50.87.169.177`
- **Live Domain:** `http://website-ee9ed2f3.ezf.jsl.mybluehost.me/`
- **Deployment Path:** `/home4/ezfjslmy/public_html/website_ee9ed2f3`
- **Deployment Strategy:** GitHub Actions with SSH (clean file deployment)

### Site Migration Method Used
- **Duplicator Pro** package migration from Local by Flywheel
- **Complete site transfer** including database, ACF Pro fields, and theme
- **Important:** Archive filename must keep original hash for installer to work

## Navigation Features

### Keyboard Navigation
- **Left/Right Arrows:** Navigate between portraits
- **Escape Key:** Return to gallery
- **Enter:** Open portrait in lightbox (if enabled)

### Touch/Swipe Support
- **Swipe Left/Right:** Navigate between portraits on mobile
- **Pinch to Zoom:** Zoom into portrait details
- **Tap:** Open portrait details or lightbox

### Gallery Features
- **Related Portraits:** 3 random portraits displayed on single pages
- **Masonry Layout:** Responsive grid that adapts to portrait dimensions
- **Lazy Loading:** Images load as user scrolls
- **SEO Optimized:** Each portrait has structured data

## SEO Implementation

### Structured Data (Schema.org)
- **ImageObject** for each portrait
- **CreativeWork** for AI-generated content
- **WebSite** for site-wide SEO
- **BreadcrumbList** for navigation

### Meta Tags
- **AI Model used** in meta description
- **Style and mood** keywords
- **Open Graph** tags for social sharing
- **Twitter Cards** for Twitter sharing

## Database Queries (Common)

### Get All AI Portraits
```sql
SELECT * FROM wp_posts WHERE post_type='ai_portrait' AND post_status='publish';
```

### Get Portraits by AI Model
```bash
./local-db.sh wp post list --post_type=ai_portrait --meta_key=ai_model --meta_value=midjourney
```

### Update ACF Field for Multiple Posts
```bash
./local-db.sh wp acf update_field field_ai_model "dalle3" --post_id=123
```

## Content Guidelines

### Portrait Requirements
- **High Resolution:** Minimum 800x1200px for portrait-large size
- **Multiple Formats:** JPEG for photos, PNG for illustrations
- **Alt Text:** Descriptive alt text including style and mood
- **File Naming:** Use descriptive names (ai-portrait-contemplative-woman.jpg)

### SEO Content Requirements
- **Title:** Descriptive and unique for each portrait
- **Description:** Include AI model, style, and mood
- **Tags:** Style tags, mood tags, technique tags
- **Categories:** Organized by art style or AI model