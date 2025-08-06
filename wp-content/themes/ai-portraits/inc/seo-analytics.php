<?php
/**
 * SEO and Analytics Functions for AI Portraits Theme
 */

// Add to functions.php: require_once get_template_directory() . '/inc/seo-analytics.php';

// Enhanced SEO meta tags
function ai_portraits_enhanced_seo() {
    global $post;
    
    // Only add enhanced SEO on single portrait pages and key pages
    if (is_singular('ai_portrait') || is_page() || is_home()) {
        
        // Open Graph and Twitter Card meta tags
        echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
        echo '<meta property="og:type" content="' . (is_singular('ai_portrait') ? 'article' : 'website') . '">' . "\n";
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        
        if (is_singular('ai_portrait')) {
            // Portrait-specific SEO
            $title = get_the_title();
            $description = get_post_meta($post->ID, '_style_description', true);
            $mood = get_post_meta($post->ID, '_mood', true);
            $ai_model = get_post_meta($post->ID, '_ai_model', true);
            
            // Create comprehensive description
            $full_description = $title . ' - ';
            if ($description) $full_description .= $description . '. ';
            if ($mood) $full_description .= 'Mood: ' . $mood . '. ';
            if ($ai_model) $full_description .= 'Created with ' . $ai_model . '. ';
            $full_description .= 'AI-generated portrait from our curated digital art collection.';
            
            echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
            echo '<meta property="og:description" content="' . esc_attr($full_description) . '">' . "\n";
            echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
            echo '<meta name="twitter:description" content="' . esc_attr($full_description) . '">' . "\n";
            
            // Featured image for social sharing
            if (has_post_thumbnail()) {
                $image_url = get_the_post_thumbnail_url($post->ID, 'large');
                echo '<meta property="og:image" content="' . esc_url($image_url) . '">' . "\n";
                echo '<meta name="twitter:image" content="' . esc_url($image_url) . '">' . "\n";
                echo '<meta property="og:image:width" content="800">' . "\n";
                echo '<meta property="og:image:height" content="1200">' . "\n";
            }
            
            // Structured data for portraits
            $structured_data = array(
                '@context' => 'https://schema.org',
                '@type' => 'CreativeWork',
                'name' => $title,
                'description' => $full_description,
                'creator' => array(
                    '@type' => 'Organization',
                    'name' => get_bloginfo('name')
                ),
                'dateCreated' => get_the_date('c'),
                'url' => get_permalink(),
                'genre' => 'Digital Art'
            );
            
            if (has_post_thumbnail()) {
                $structured_data['image'] = get_the_post_thumbnail_url($post->ID, 'large');
            }
            
            if ($ai_model) {
                $structured_data['technique'] = $ai_model;
            }
            
            echo '<script type="application/ld+json">' . json_encode($structured_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
            
        } elseif (is_home() || is_front_page()) {
            // Homepage SEO
            $site_description = get_bloginfo('description') ?: 'Curated collection of AI-generated portrait art featuring beautiful digital artwork created with cutting-edge artificial intelligence technology.';
            
            echo '<meta property="og:title" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
            echo '<meta property="og:description" content="' . esc_attr($site_description) . '">' . "\n";
            echo '<meta name="twitter:title" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
            echo '<meta name="twitter:description" content="' . esc_attr($site_description) . '">' . "\n";
            
            // Homepage structured data
            $homepage_structured_data = array(
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                'name' => get_bloginfo('name'),
                'description' => $site_description,
                'url' => home_url(),
                'potentialAction' => array(
                    '@type' => 'SearchAction',
                    'target' => home_url('?s={search_term_string}'),
                    'query-input' => 'required name=search_term_string'
                )
            );
            
            echo '<script type="application/ld+json">' . json_encode($homepage_structured_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        }
        
        // Canonical URL
        echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '">' . "\n";
        
        // Additional meta tags
        echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";
        echo '<meta name="author" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    }
}
add_action('wp_head', 'ai_portraits_enhanced_seo', 5);

// Google Analytics 4 Integration
function ai_portraits_google_analytics() {
    $ga_id = get_option('ai_portraits_ga_id');
    
    if ($ga_id && !is_admin() && !current_user_can('manage_options')) {
        ?>
        <!-- Google Analytics 4 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo esc_js($ga_id); ?>', {
                page_title: document.title,
                page_location: window.location.href
            });
            
            // Enhanced tracking for portrait views
            <?php if (is_singular('ai_portrait')) : ?>
            gtag('event', 'portrait_view', {
                'portrait_title': '<?php echo esc_js(get_the_title()); ?>',
                'portrait_id': '<?php echo get_the_ID(); ?>',
                'ai_model': '<?php echo esc_js(get_post_meta(get_the_ID(), "_ai_model", true)); ?>'
            });
            <?php endif; ?>
        </script>
        <?php
    }
}
add_action('wp_head', 'ai_portraits_google_analytics', 10);

// Add settings page for Google Analytics
function ai_portraits_admin_menu() {
    add_options_page(
        'AI Portraits SEO Settings',
        'AI Portraits SEO',
        'manage_options',
        'ai-portraits-seo',
        'ai_portraits_settings_page'
    );
}
add_action('admin_menu', 'ai_portraits_admin_menu');

function ai_portraits_settings_page() {
    if (isset($_POST['submit'])) {
        if (wp_verify_nonce($_POST['ai_portraits_nonce'], 'ai_portraits_settings')) {
            update_option('ai_portraits_ga_id', sanitize_text_field($_POST['ga_id']));
            update_option('ai_portraits_site_verification', sanitize_text_field($_POST['site_verification']));
            echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
        }
    }
    
    $ga_id = get_option('ai_portraits_ga_id', '');
    $site_verification = get_option('ai_portraits_site_verification', '');
    ?>
    <div class="wrap">
        <h1>AI Portraits SEO Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('ai_portraits_settings', 'ai_portraits_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Google Analytics 4 ID</th>
                    <td>
                        <input type="text" name="ga_id" value="<?php echo esc_attr($ga_id); ?>" class="regular-text" placeholder="G-XXXXXXXXXX" />
                        <p class="description">Enter your Google Analytics 4 measurement ID (starts with G-)</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Google Site Verification</th>
                    <td>
                        <input type="text" name="site_verification" value="<?php echo esc_attr($site_verification); ?>" class="regular-text" />
                        <p class="description">Enter your Google Search Console verification code</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
        
        <h2>SEO Tips</h2>
        <ul>
            <li>Add unique, descriptive titles to each portrait</li>
            <li>Fill in style descriptions and mood fields for better SEO</li>
            <li>Create regular blog content about AI art</li>
            <li>Submit your sitemap to Google Search Console</li>
            <li>Monitor your analytics for insights about visitor behavior</li>
        </ul>
    </div>
    <?php
}

// Site verification meta tag
function ai_portraits_site_verification() {
    $verification = get_option('ai_portraits_site_verification');
    if ($verification) {
        echo '<meta name="google-site-verification" content="' . esc_attr($verification) . '">' . "\n";
    }
}
add_action('wp_head', 'ai_portraits_site_verification');

// Generate XML sitemap for portraits
function ai_portraits_generate_sitemap() {
    if (get_query_var('ai_portraits_sitemap')) {
        header('Content-Type: application/xml; charset=utf-8');
        
        $portraits = get_posts(array(
            'post_type' => 'ai_portrait',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));
        
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Homepage
        echo '<url>';
        echo '<loc>' . esc_url(home_url('/')) . '</loc>';
        echo '<changefreq>daily</changefreq>';
        echo '<priority>1.0</priority>';
        echo '</url>';
        
        // Portrait pages
        foreach ($portraits as $portrait) {
            echo '<url>';
            echo '<loc>' . esc_url(get_permalink($portrait->ID)) . '</loc>';
            echo '<lastmod>' . date('Y-m-d', strtotime($portrait->post_modified)) . '</lastmod>';
            echo '<changefreq>weekly</changefreq>';
            echo '<priority>0.8</priority>';
            echo '</url>';
        }
        
        echo '</urlset>';
        exit;
    }
}
add_action('template_redirect', 'ai_portraits_generate_sitemap');

// Add sitemap rewrite rule
function ai_portraits_rewrite_rules() {
    add_rewrite_rule('^portraits-sitemap\.xml$', 'index.php?ai_portraits_sitemap=1', 'top');
}
add_action('init', 'ai_portraits_rewrite_rules');

function ai_portraits_query_vars($vars) {
    $vars[] = 'ai_portraits_sitemap';
    return $vars;
}
add_filter('query_vars', 'ai_portraits_query_vars');

// SEO-friendly URLs and breadcrumbs
function ai_portraits_breadcrumbs() {
    if (is_singular('ai_portrait')) {
        echo '<nav class="breadcrumbs">';
        echo '<a href="' . home_url() . '">Gallery</a> &gt; ';
        echo '<span>' . get_the_title() . '</span>';
        echo '</nav>';
    }
}

// Meta keywords for portraits (optional, as Google doesn't use them)
function ai_portraits_meta_keywords() {
    if (is_singular('ai_portrait')) {
        global $post;
        $keywords = array();
        $keywords[] = 'AI portrait';
        $keywords[] = 'digital art';
        $keywords[] = 'artificial intelligence';
        
        $style = get_post_meta($post->ID, '_style_description', true);
        if ($style) $keywords[] = $style;
        
        $mood = get_post_meta($post->ID, '_mood', true);
        if ($mood) $keywords[] = $mood;
        
        $ai_model = get_post_meta($post->ID, '_ai_model', true);
        if ($ai_model) $keywords[] = $ai_model;
        
        if (!empty($keywords)) {
            echo '<meta name="keywords" content="' . esc_attr(implode(', ', $keywords)) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'ai_portraits_meta_keywords');
?>