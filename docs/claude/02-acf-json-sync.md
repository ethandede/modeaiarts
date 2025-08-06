# ACF Pro JSON Sync Setup

## Initial Setup

### 1. Create JSON Directory

```bash
mkdir -p wp-content/themes/[theme-name]/acf-json
```

### 2. Add to functions.php or create inc/acf-config.php

```php
<?php
// ACF JSON Save Point
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

// ACF JSON Load Point
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

// Helper function for getting ACF fields
function get_acf_field($field_name, $post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    if (function_exists('get_field')) {
        return get_field($field_name, $post_id);
    }
    return '';
}
```

## Version Control

### Always Commit ACF JSON Files

```bash
# After making field group changes in admin
git add acf-json/
git commit -m "Update ACF field groups"
```

## Directory Structure

```
theme-name/
├── acf-json/           # Auto-synced field groups
│   ├── group_*.json    # Field group files
│   └── index.php       # Security file
├── inc/
│   └── acf-config.php  # ACF configuration
└── functions.php       # Include ACF config
```

## Field Group Registration (Optional)

For programmatic field group creation:

```php
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_unique_key',
        'title' => 'Field Group Title',
        'fields' => array(
            // Field definitions
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));
}
```

## Benefits

- **Version Control:** Track field changes in Git
- **Team Sync:** Auto-sync fields across environments
- **Deployment:** Fields deploy with code
- **Performance:** Faster than database-only storage