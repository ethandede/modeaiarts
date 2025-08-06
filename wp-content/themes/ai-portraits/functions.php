<?php
/**
 * AI Portraits Theme Functions
 */

// Enqueue styles and scripts
function ai_portraits_enqueue_scripts() {
    wp_enqueue_style('ai-portraits-style', get_stylesheet_uri());
    wp_enqueue_script('ai-portraits-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.0', true);
    
    // Localize script for AJAX
    wp_localize_script('ai-portraits-navigation', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ai_portraits_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'ai_portraits_enqueue_scripts');

// Theme support
function ai_portraits_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_image_size('portrait-large', 800, 1200, true);
    add_image_size('portrait-medium', 400, 600, true);
    add_image_size('portrait-thumbnail', 200, 300, true);
}
add_action('after_setup_theme', 'ai_portraits_theme_support');

// Register Custom Post Type for AI Portraits
function register_ai_portrait_post_type() {
    $args = array(
        'label' => 'AI Portraits',
        'labels' => array(
            'name' => 'AI Portraits',
            'singular_name' => 'AI Portrait',
            'add_new' => 'Add New Portrait',
            'add_new_item' => 'Add New AI Portrait',
            'edit_item' => 'Edit AI Portrait',
            'new_item' => 'New AI Portrait',
            'view_item' => 'View AI Portrait',
            'search_items' => 'Search AI Portraits',
            'not_found' => 'No portraits found',
            'not_found_in_trash' => 'No portraits found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portrait'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-image',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true
    );
    register_post_type('ai_portrait', $args);
}
add_action('init', 'register_ai_portrait_post_type');

// Add custom fields for AI Portrait metadata
function add_ai_portrait_meta_boxes() {
    add_meta_box(
        'ai_portrait_details',
        'AI Portrait Details',
        'ai_portrait_details_callback',
        'ai_portrait',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_ai_portrait_meta_boxes');

function ai_portrait_details_callback($post) {
    wp_nonce_field('ai_portrait_meta_nonce', 'ai_portrait_meta_nonce_field');
    
    $ai_model = get_post_meta($post->ID, '_ai_model', true);
    $generation_date = get_post_meta($post->ID, '_generation_date', true);
    $style_description = get_post_meta($post->ID, '_style_description', true);
    $mood = get_post_meta($post->ID, '_mood', true);
    $technique = get_post_meta($post->ID, '_technique', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="ai_model">AI Model Used</label></th>
            <td><input type="text" id="ai_model" name="ai_model" value="<?php echo esc_attr($ai_model); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="generation_date">Generation Date</label></th>
            <td><input type="date" id="generation_date" name="generation_date" value="<?php echo esc_attr($generation_date); ?>" /></td>
        </tr>
        <tr>
            <th><label for="style_description">Style Description</label></th>
            <td><textarea id="style_description" name="style_description" rows="3" class="large-text"><?php echo esc_textarea($style_description); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="mood">Mood/Emotion</label></th>
            <td><input type="text" id="mood" name="mood" value="<?php echo esc_attr($mood); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="technique">AI Technique/Parameters</label></th>
            <td><textarea id="technique" name="technique" rows="2" class="large-text"><?php echo esc_textarea($technique); ?></textarea></td>
        </tr>
    </table>
    <?php
}

// Save custom fields
function save_ai_portrait_meta($post_id) {
    if (!isset($_POST['ai_portrait_meta_nonce_field']) || !wp_verify_nonce($_POST['ai_portrait_meta_nonce_field'], 'ai_portrait_meta_nonce')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (isset($_POST['post_type']) && 'ai_portrait' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }
    
    $fields = array('ai_model', 'generation_date', 'style_description', 'mood', 'technique');
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_ai_portrait_meta');

// Custom navigation functions
function get_adjacent_portrait($next = true) {
    global $post;
    
    $adjacent = get_adjacent_post(false, '', !$next, 'ai_portrait');
    return $adjacent;
}

function get_portrait_navigation() {
    $prev_post = get_adjacent_portrait(false);
    $next_post = get_adjacent_portrait(true);
    
    $navigation = '<div class="portrait-navigation">';
    
    if ($prev_post) {
        $navigation .= '<a href="' . get_permalink($prev_post->ID) . '" class="nav-previous">';
        $navigation .= '<span class="nav-text">Previous</span>';
        $navigation .= '<span class="nav-title">' . get_the_title($prev_post->ID) . '</span>';
        $navigation .= '</a>';
    }
    
    if ($next_post) {
        $navigation .= '<a href="' . get_permalink($next_post->ID) . '" class="nav-next">';
        $navigation .= '<span class="nav-text">Next</span>';
        $navigation .= '<span class="nav-title">' . get_the_title($next_post->ID) . '</span>';
        $navigation .= '</a>';
    }
    
    $navigation .= '</div>';
    
    return $navigation;
}

// Register navigation menus
function ai_portraits_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('init', 'ai_portraits_menus');

// SEO enhancements
function ai_portraits_seo_meta() {
    if (is_singular('ai_portrait')) {
        global $post;
        $description = get_post_meta($post->ID, '_style_description', true);
        $mood = get_post_meta($post->ID, '_mood', true);
        
        if ($description || $mood) {
            $meta_description = $description . ' ' . $mood;
            echo '<meta name="description" content="' . esc_attr(wp_trim_words($meta_description, 25)) . '">';
        }
    }
}
add_action('wp_head', 'ai_portraits_seo_meta');

// Include SEO and Analytics functions
require_once get_template_directory() . '/inc/seo-analytics.php';
?>