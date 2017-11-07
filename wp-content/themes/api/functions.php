<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

include_once('advanced-custom-fields/acf.php');
function wpm_custom_post_type()
{
    $labels = array(
        'name' => _x('Prestations', 'Post Type General Name'),
        'singular_name' => _x('Prestation', 'Post Type Singular Name'),
        'menu_name' => __('Prestations'),
        'all_items' => __('Toutes les Prestations'),
        'view_item' => __('Voir les Prestations'),
        'add_new_item' => __('Ajouter une nouvelle Prestation'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Editer la Prestation'),
        'update_item' => __('Modifier la Prestation'),
        'search_items' => __('Rechercher une Prestation'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );
    $args = array(
        'label' => __('Prestations'),
        'description' => __('Tous sur Prestations'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'prestations'),
    );
    register_post_type('prestations', $args);
    $labels = array(
        'name' => _x('FAQ', 'Post Type General Name'),
        'singular_name' => _x('FAQ', 'Post Type Singular Name'),
        'menu_name' => __('FAQ'),
        'all_items' => __('Toutes les FAQ'),
        'view_item' => __('Voir les FAQ'),
        'add_new_item' => __('Ajouter une nouvelle FAQ'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Editer la FAQ'),
        'update_item' => __('Modifier la FAQ'),
        'search_items' => __('Rechercher une FAQ'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );
    $args = array(
        'label' => __('FAQ'),
        'description' => __('Tous sur FAQ'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'faq'),
    );
    register_post_type('faq', $args);
    $labels = array(
        'name' => _x('About', 'Post Type General Name'),
        'singular_name' => _x('About', 'Post Type Singular Name'),
        'menu_name' => __('About'),
        'all_items' => __('Toutes les About'),
        'view_item' => __('Voir les About'),
        'add_new_item' => __('Ajouter une nouvelle About'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Editer la About'),
        'update_item' => __('Modifier la About'),
        'search_items' => __('Rechercher une About'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );
    $args = array(
        'label' => __('About'),
        'description' => __('Tous sur About'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'about'),
    );
    register_post_type('about', $args);
    $labels = array(
        'name' => _x('Portfolio', 'Post Type General Name'),
        'singular_name' => _x('Portfolio', 'Post Type Singular Name'),
        'menu_name' => __('Portfolio'),
        'all_items' => __('Toutes les Portfolio'),
        'view_item' => __('Voir les Portfolio'),
        'add_new_item' => __('Ajouter une nouvelle Portfolio'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Editer la Portfolio'),
        'update_item' => __('Modifier la Portfolio'),
        'search_items' => __('Rechercher une Portfolio'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );
    $args = array(
        'label' => __('Portfolio'),
        'description' => __('Tous sur Portfolio'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
    );
    register_post_type('portfolio', $args);
    $labels = array(
        'name' => _x('Items about', 'Post Type General Name'),
        'singular_name' => _x('Item about', 'Post Type Singular Name'),
        'menu_name' => __('Item about'),
        'all_items' => __('Toutes les Item about'),
        'view_item' => __('Voir les Item about'),
        'add_new_item' => __('Ajouter une nouvelle Item about'),
        'add_new' => __('Ajouter'),
        'edit_item' => __('Editer la Item about'),
        'update_item' => __('Modifier la Item about'),
        'search_items' => __('Rechercher une Item about'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );
    $args = array(
        'label' => __('Item about'),
        'description' => __('Tous sur Item about'),
        'labels' => $labels,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'item-about'),
    );
    register_post_type('item-about', $args);
}

add_action('init', 'wpm_custom_post_type', 9);
function add_custom_taxonomies()
{
    register_taxonomy('items-about-taxo-item', 'item-about', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Types', 'taxonomy general name'),
            'singular_name' => _x('Type', 'taxonomy singular name'),
            'search_items' => __('Search Types'),
            'all_items' => __('All Types'),
            'parent_item' => __('Parent Types'),
            'parent_item_colon' => __('Parent Types:'),
            'edit_item' => __('Edit Type'),
            'update_item' => __('Update Type'),
            'add_new_item' => __('Add New Type'),
            'new_item_name' => __('New Type Name'),
            'menu_name' => __('Types'),
        ),
        'rewrite' => array(
            'slug' => 'about-item-type',
            'with_front' => false,
            'hierarchical' => true
        ),
    ));
    register_taxonomy('prestation-taxo-item', 'prestations', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Types', 'taxonomy general name'),
            'singular_name' => _x('Type', 'taxonomy singular name'),
            'search_items' => __('Search Types'),
            'all_items' => __('All Types'),
            'parent_item' => __('Parent Types'),
            'parent_item_colon' => __('Parent Types:'),
            'edit_item' => __('Edit Type'),
            'update_item' => __('Update Type'),
            'add_new_item' => __('Add New Type'),
            'new_item_name' => __('New Type Name'),
            'menu_name' => __('Types'),
        ),
        'rewrite' => array(
            'slug' => 'prestation-type',
            'with_front' => false,
            'hierarchical' => true
        ),
    ));
    register_taxonomy('faq-taxo-item', 'faq', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Types', 'taxonomy general name'),
            'singular_name' => _x('Type', 'taxonomy singular name'),
            'search_items' => __('Search Types'),
            'all_items' => __('All Types'),
            'parent_item' => __('Parent Types'),
            'parent_item_colon' => __('Parent Types:'),
            'edit_item' => __('Edit Type'),
            'update_item' => __('Update Type'),
            'add_new_item' => __('Add New Type'),
            'new_item_name' => __('New Type Name'),
            'menu_name' => __('Types'),
        ),
        'rewrite' => array(
            'slug' => 'faq-type',
            'with_front' => false,
            'hierarchical' => true
        ),
    ));
    register_taxonomy('portfolio-taxo-item', 'portfolio', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Types', 'taxonomy general name'),
            'singular_name' => _x('Type', 'taxonomy singular name'),
            'search_items' => __('Search Types'),
            'all_items' => __('All Types'),
            'parent_item' => __('Parent Types'),
            'parent_item_colon' => __('Parent Types:'),
            'edit_item' => __('Edit Type'),
            'update_item' => __('Update Type'),
            'add_new_item' => __('Add New Type'),
            'new_item_name' => __('New Type Name'),
            'menu_name' => __('Types'),
        ),
        'rewrite' => array(
            'slug' => 'portfolio-type',
            'with_front' => false,
            'hierarchical' => true
        ),
    ));
}

add_action('init', 'add_custom_taxonomies', 10);

function deployed_field_custom()
{
    if (function_exists("register_field_group")) {
        register_field_group(array(
            'id' => 'acf_prestations-fields',
            'title' => 'Prestations fields',
            'fields' => array(
                array(
                    'key' => 'field_59faf6c683357',
                    'label' => 'price',
                    'name' => 'prestation_price',
                    'type' => 'number',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '€',
                    'min' => '',
                    'max' => '',
                    'step' => '',
                ),
                array(
                    'key' => 'field_59fafed290558',
                    'label' => 'Lien',
                    'name' => 'prestation_lien',
                    'type' => 'text',
                    'instructions' => 'Champs lien de forme http(s)://www.link.ext',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'prestations',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array(
                'position' => 'side',
                'layout' => 'no_box',
                'hide_on_screen' => array(
                    0 => 'custom_fields',
                    1 => 'discussion',
                    2 => 'comments',
                    3 => 'author',
                    4 => 'format',
                    5 => 'send-trackbacks',
                ),
            ),
            'menu_order' => 0,
        ));

        register_field_group(array(
            'id' => 'acf_about-fields',
            'title' => 'About fields',
            'fields' => array(
                array(
                    'key' => 'field_59fb0f7f2a165',
                    'label' => 'Nom',
                    'name' => 'about_nom',
                    'type' => 'text',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_59fb0f8f2a166',
                    'label' => 'Prénom',
                    'name' => 'about_prenom',
                    'type' => 'text',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_59fb0f962a167',
                    'label' => 'Poste',
                    'name' => 'about_poste',
                    'type' => 'text',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'html',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_59fb0fce2a168',
                    'label' => 'Item',
                    'name' => 'about_item',
                    'type' => 'relationship',
                    'required' => 1,
                    'return_format' => 'object',
                    'post_type' => array(
                        0 => 'item-about',
                    ),
                    'taxonomy' => array(
                        0 => 'all',
                    ),
                    'filters' => array(
                        0 => 'post_type',
                    ),
                    'result_elements' => array(
                        0 => 'post_type',
                        1 => 'post_title',
                    ),
                    'max' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'about',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array(
                'position' => 'normal',
                'layout' => 'no_box',
                'hide_on_screen' => array(
                    0 => 'excerpt',
                    1 => 'custom_fields',
                    2 => 'discussion',
                    3 => 'comments',
                    4 => 'revisions',
                    5 => 'author',
                    6 => 'format',
                    7 => 'categories',
                    8 => 'tags',
                    9 => 'send-trackbacks',
                ),
            ),
            'menu_order' => 0,
        ));
        if(function_exists("register_field_group"))
        {
            register_field_group(array (
                'id' => 'acf_portfolio',
                'title' => 'portfolio',
                'fields' => array (
                    array (
                        'key' => 'field_5a00f137d4b9b',
                        'label' => 'Link',
                        'name' => 'portfolio_link',
                        'type' => 'text',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'portfolio',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'no_box',
                    'hide_on_screen' => array (
                        0 => 'excerpt',
                        1 => 'custom_fields',
                        2 => 'discussion',
                        3 => 'comments',
                        4 => 'revisions',
                        5 => 'author',
                        6 => 'format',
                        7 => 'tags',
                        8 => 'send-trackbacks',
                    ),
                ),
                'menu_order' => 0,
            ));
        }

    }
}

add_action('init', 'deployed_field_custom', 11);
/**
 * Add REST API support to an already registered post type.
 */
function item_post_type_rest_support()
{
    global $wp_post_types;
    $array = ['prestations', 'faq', 'about', 'portfolio', 'item-about'];
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        $post_type_name = $array[$i];
        if (isset($wp_post_types[$post_type_name])) {
            $wp_post_types[$post_type_name]->show_in_rest = true;
            $wp_post_types[$post_type_name]->rest_base = $post_type_name;
            $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
        }
    }
}
add_action('init', 'item_post_type_rest_support', 12);

/**
 * Add REST API support to an already registered taxonomy.
 */
function types_item_taxonomy_rest_support()
{
    global $wp_taxonomies;
    $array = ['items-about-taxo-item', 'prestation-taxo-item', 'portfolio-taxo-item', 'faq-taxo-item'];
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        $taxonomy_name = $array[$i];
        if (isset($wp_taxonomies[$taxonomy_name])) {
            $wp_taxonomies[$taxonomy_name]->show_in_rest = true;
            $wp_taxonomies[$taxonomy_name]->rest_base = $taxonomy_name;
            $wp_taxonomies[$taxonomy_name]->rest_controller_class = 'WP_REST_Terms_Controller';
        }
    }
}
add_action('init', 'types_item_taxonomy_rest_support', 12);


add_filter( 'wpcf_type', 'add_show_in_rest_func', 15, 2);
function add_show_in_rest_func($data, $post_type) {
    //if(in_array($post_type, $post_types_all)){
    $data['show_in_rest'] = true;
    //}
    return $data;
}