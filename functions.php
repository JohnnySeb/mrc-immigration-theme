<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (!function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

function custom_block_category($categories, $post)
{
    return array_merge(
        array(
            array(
                'slug'  => 'blocs-Tolle',
                'title' => 'Blocs Tollé',
                'icon'  => 'megaphone',
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'custom_block_category', 10, 2);

function custom_block_category_order($categories)
{
    if (isset($categories['blocs-Tolle'])) {
        $custom_category = array('blocs-Tolle' => $categories['blocs-Tolle']);
        unset($categories['blocs-Tolle']);
        return array_merge($custom_category, $categories);
    }
    return $categories;
}
add_filter('block_categories', 'custom_block_category_order', 10, 2);

function acf_populate_gf_forms_ids($field)
{
    if (class_exists('GFFormsModel')) {
        $choices = [];

        foreach (\GFFormsModel::get_forms() as $form) {
            $choices[$form->id] = $form->title;
        }

        $field['choices'] = $choices;
    }

    return $field;
}

add_filter('acf/load_field/name=gravity_form_id', 'acf_populate_gf_forms_ids');

// Ajout d'un icône dans le menu
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $menu_icon = get_field('menuIcon', $item);

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $output .= '<li class="' . esc_attr($class_names) . '">';

        $icon_html = '';
        if (!empty($menu_icon)) {
            $icon_html = '<i class="' . esc_attr($menu_icon) . '"></i> ';
        }

        $output .= '<a href="' . esc_url($item->url) . '">' . '<span class="icon">' . $icon_html . '</span>' . '<span class="text">' . esc_html($item->title) . '</span>' . '</a>';
    }
}
