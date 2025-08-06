# WordPress Development Patterns

## Custom Post Type Template

```php
// Register Custom Post Type
function register_custom_post_type() {
    $args = array(
        'label' => 'Custom Posts',
        'labels' => array(
            'name' => 'Custom Posts',
            'singular_name' => 'Custom Post',
            'add_new' => 'Add New Post',
            'add_new_item' => 'Add New Custom Post',
            'edit_item' => 'Edit Custom Post',
            'new_item' => 'New Custom Post',
            'view_item' => 'View Custom Post',
            'search_items' => 'Search Custom Posts',
            'not_found' => 'No posts found',
            'not_found_in_trash' => 'No posts found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'custom'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    );
    register_post_type('custom_post', $args);
}
add_action('init', 'register_custom_post_type');
```

## Theme Setup Template

```php
// Theme Support
function theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    
    // Custom image sizes
    add_image_size('custom-large', 800, 600, true);
    add_image_size('custom-medium', 400, 300, true);
    add_image_size('custom-thumbnail', 200, 150, true);
}
add_action('after_setup_theme', 'theme_setup');

// Enqueue Scripts and Styles
function theme_enqueue_scripts() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
    
    // Localize script for AJAX
    wp_localize_script('theme-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('theme_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
```

## Navigation Menu Template

```php
// Register Navigation Menus
function register_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'register_menus');

// Fallback menu function
function fallback_menu() {
    wp_list_pages(array(
        'title_li' => '',
        'depth' => 1
    ));
}
```

## SEO Meta Template

```php
// Basic SEO Meta Tags
function add_seo_meta() {
    if (is_singular()) {
        global $post;
        $description = get_the_excerpt() ?: wp_trim_words(get_the_content(), 25);
        echo '<meta name="description" content="' . esc_attr($description) . '">';
        
        // Open Graph
        echo '<meta property="og:title" content="' . get_the_title() . '">';
        echo '<meta property="og:description" content="' . esc_attr($description) . '">';
        echo '<meta property="og:url" content="' . get_permalink() . '">';
        
        if (has_post_thumbnail()) {
            echo '<meta property="og:image" content="' . get_the_post_thumbnail_url() . '">';
        }
    }
}
add_action('wp_head', 'add_seo_meta');
```

## Helper Functions Template

```php
// Get custom post type posts
function get_custom_posts($post_type = 'post', $posts_per_page = -1) {
    return new WP_Query(array(
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
}

// Get related posts
function get_related_posts($post_id = null, $count = 3) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    return new WP_Query(array(
        'post_type' => get_post_type($post_id),
        'posts_per_page' => $count,
        'post__not_in' => array($post_id),
        'orderby' => 'rand'
    ));
}

// Get adjacent post navigation
function get_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    
    $navigation = '<div class="post-navigation">';
    
    if ($prev_post) {
        $navigation .= '<a href="' . get_permalink($prev_post->ID) . '" class="nav-previous">';
        $navigation .= '<span>Previous: ' . get_the_title($prev_post->ID) . '</span>';
        $navigation .= '</a>';
    }
    
    if ($next_post) {
        $navigation .= '<a href="' . get_permalink($next_post->ID) . '" class="nav-next">';
        $navigation .= '<span>Next: ' . get_the_title($next_post->ID) . '</span>';
        $navigation .= '</a>';
    }
    
    $navigation .= '</div>';
    
    return $navigation;
}
```