<?php
/**
 * ACF Pro Configuration
 * Handles ACF field groups and JSON sync
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Set ACF JSON save point
 */
add_filter('acf/settings/save_json', 'ai_portraits_acf_json_save_point');
function ai_portraits_acf_json_save_point($path) {
    // Update path to theme's acf-json folder
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

/**
 * Set ACF JSON load point
 */
add_filter('acf/settings/load_json', 'ai_portraits_acf_json_load_point');
function ai_portraits_acf_json_load_point($paths) {
    // Remove original path
    unset($paths[0]);
    
    // Add theme's acf-json folder
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    return $paths;
}

/**
 * Register ACF Field Groups programmatically
 * This will be auto-exported to JSON when saved in admin
 */
add_action('acf/init', 'ai_portraits_register_field_groups');
function ai_portraits_register_field_groups() {
    
    // Check if function exists (ACF Pro required)
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    // AI Portrait Details Field Group
    acf_add_local_field_group(array(
        'key' => 'group_ai_portrait_details',
        'title' => 'AI Portrait Details',
        'fields' => array(
            array(
                'key' => 'field_ai_model',
                'label' => 'AI Model',
                'name' => 'ai_model',
                'type' => 'select',
                'instructions' => 'Select the AI model used to generate this portrait',
                'required' => 0,
                'choices' => array(
                    'midjourney' => 'Midjourney',
                    'dalle3' => 'DALL-E 3',
                    'stable_diffusion' => 'Stable Diffusion',
                    'leonardo' => 'Leonardo AI',
                    'runway' => 'Runway ML',
                    'other' => 'Other'
                ),
                'default_value' => 'midjourney',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_generation_date',
                'label' => 'Generation Date',
                'name' => 'generation_date',
                'type' => 'date_picker',
                'instructions' => 'When was this portrait generated?',
                'required' => 0,
                'display_format' => 'F j, Y',
                'return_format' => 'Y-m-d',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_style_description',
                'label' => 'Style Description',
                'name' => 'style_description',
                'type' => 'textarea',
                'instructions' => 'Describe the artistic style of this portrait',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'e.g., Impressionist style with vibrant colors and bold brushstrokes',
                'maxlength' => '',
                'rows' => 3,
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_mood',
                'label' => 'Mood',
                'name' => 'mood',
                'type' => 'text',
                'instructions' => 'What mood does this portrait convey?',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'e.g., Contemplative, Joyful, Mysterious',
                'prepend' => '',
                'append' => '',
                'maxlength' => 100,
            ),
            array(
                'key' => 'field_technique',
                'label' => 'Technique',
                'name' => 'technique',
                'type' => 'checkbox',
                'instructions' => 'Select techniques used in this portrait',
                'required' => 0,
                'choices' => array(
                    'digital_painting' => 'Digital Painting',
                    'photo_realistic' => 'Photo Realistic',
                    'oil_painting' => 'Oil Painting Style',
                    'watercolor' => 'Watercolor Style',
                    'pencil_sketch' => 'Pencil Sketch',
                    'abstract' => 'Abstract',
                    'surreal' => 'Surreal',
                    'minimalist' => 'Minimalist',
                ),
                'allow_custom' => 1,
                'default_value' => array(),
                'layout' => 'horizontal',
                'toggle' => 0,
                'return_format' => 'value',
                'save_custom' => 1,
            ),
            array(
                'key' => 'field_prompt_text',
                'label' => 'AI Prompt',
                'name' => 'prompt_text',
                'type' => 'textarea',
                'instructions' => 'The prompt used to generate this portrait (optional)',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'Enter the AI prompt if you want to share it',
                'maxlength' => '',
                'rows' => 2,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_color_palette',
                'label' => 'Color Palette',
                'name' => 'color_palette',
                'type' => 'color_picker',
                'instructions' => 'Primary color of the portrait',
                'required' => 0,
                'default_value' => '#000000',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'ai_portrait',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array('custom_fields'),
        'active' => true,
        'description' => 'Additional details about the AI-generated portrait',
        'show_in_rest' => 1,
    ));
    
    // Gallery Settings Field Group (for theme options page)
    acf_add_local_field_group(array(
        'key' => 'group_gallery_settings',
        'title' => 'Gallery Settings',
        'fields' => array(
            array(
                'key' => 'field_portraits_per_page',
                'label' => 'Portraits Per Page',
                'name' => 'portraits_per_page',
                'type' => 'number',
                'instructions' => 'Number of portraits to display per page',
                'required' => 0,
                'default_value' => 12,
                'placeholder' => '',
                'prepend' => '',
                'append' => 'portraits',
                'min' => 6,
                'max' => 30,
                'step' => 3,
            ),
            array(
                'key' => 'field_gallery_layout',
                'label' => 'Gallery Layout',
                'name' => 'gallery_layout',
                'type' => 'radio',
                'instructions' => 'Choose the gallery layout style',
                'required' => 0,
                'choices' => array(
                    'grid' => 'Grid Layout',
                    'masonry' => 'Masonry Layout',
                    'carousel' => 'Carousel Layout',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'masonry',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_enable_lightbox',
                'label' => 'Enable Lightbox',
                'name' => 'enable_lightbox',
                'type' => 'true_false',
                'instructions' => 'Enable lightbox for portrait images',
                'required' => 0,
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Enabled',
                'ui_off_text' => 'Disabled',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'ai-portraits-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Gallery display settings',
        'show_in_rest' => 0,
    ));
}

/**
 * Add ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    
    acf_add_options_page(array(
        'page_title'    => 'AI Portraits Settings',
        'menu_title'    => 'AI Portraits',
        'menu_slug'     => 'ai-portraits-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-format-image',
        'position'      => 30
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Gallery Settings',
        'menu_title'    => 'Gallery',
        'parent_slug'   => 'ai-portraits-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'SEO Settings',
        'menu_title'    => 'SEO',
        'parent_slug'   => 'ai-portraits-settings',
    ));
}