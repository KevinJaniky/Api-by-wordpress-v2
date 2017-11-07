<?php
/*qq
Plugin Name: API Routes
Description: Custom route for API - depend du thème API
Version: 0.1
Author: Kevin JANIKY
*/

/**
 * Grab articles with custom field acf
 *
 * @param array $data Options for the function.
 * @return string|null Post title for the latest,
 * or null if none.
 */
function get_about_type($data)
{
    $posts = get_posts(array(
        'post_type' => 'about',
    ));

    if (empty($posts)) return null;
    $items = array();
    $count = count($posts);
    for ($i = 0; $i < $count; $i++) {
        $id = $posts[$i]->ID;
        $fields = get_field_objects($id);
        if (empty($fields)) return null;
        if ($posts[$i]->post_status == 'publish') {
            $items[$i]['id'] = $posts[$i]->ID;
            $items[$i]['uri'] = $posts[$i]->post_name;
            $items[$i]['title'] = $posts[$i]->post_title;
            $items[$i]['content'] = $posts[$i]->post_content;
            $items[$i]['nom'] = $fields['about_nom']['value'];
            $items[$i]['prenom'] = $fields['about_prenom']['value'];
            $items[$i]['poste'] = $fields['about_poste']['value'];
            $items[$i]['img'] = get_the_post_thumbnail_url($id, 'full');
            $taxo = $fields['about_item']['value'];
            $array_taxo = [];
            for ($j = 0; $j < count($taxo); $j++) {
                $id = $posts[$i]->about_item[$j];
                $item_taxo = get_the_terms($id, 'items-about-taxo-item');
                $array_taxo[$fields['about_item']['value'][$j]->post_title] = $item_taxo[0]->name;
            }
            $items[$i]['about_item'] = $array_taxo;
        }
    }
    return $items;
}


function get_prestation_types($data)
{

    $posts = get_posts(array(
        'post_type' => 'prestations',
    ));
    if (empty($posts)) return null;
    $items = array();
    $count = count($posts);
    for ($i = 0; $i < $count; $i++) {
        $id = $posts[$i]->ID;
        $fields = get_field_objects($id);
        if ($posts[$i]->post_status == 'publish') {
            if (empty($fields)) return null;
            $items[$i]['id'] = $posts[$i]->ID;
            $items[$i]['title'] = $posts[$i]->post_title;
            $items[$i]['uri'] = $posts[$i]->post_name;
            $items[$i]['description'] = $posts[$i]->post_content;
            $items[$i]['price'] = $fields['prestation_price']['value'];
            $items[$i]['link'] = $fields['prestation_lien']['value'];
            $taxo = get_the_terms($id, 'prestation-taxo-item');
            $items[$i]['taxo'] = $taxo[0]->name;
            $items[$i]['img'] = get_the_post_thumbnail_url($id, 'full');
        }
    }
    return $items;
}

function get_articles_types($data)
{

    $posts = get_posts(array(
        'post_type' => 'post',
    ));
    if (empty($posts)) return null;
    $items = array();
    $count = count($posts);
    for ($i = 0; $i < $count; $i++) {
        $id = $posts[$i]->ID;
        $items[$i]['id'] = $posts[$i]->ID;
        $items[$i]['uri'] = $posts[$i]->post_name;
        $items[$i]['date'] = $posts[$i]->post_date;
        $items[$i]['content'] = $posts[$i]->post_content;
        $items[$i]['title'] = $posts[$i]->post_title;
        $taxo = get_the_terms($id, 'category');
        $items[$i]['taxo'] = $taxo[0]->name;
        $items[$i]['img'] = get_the_post_thumbnail_url($id, 'full');
    }
    return $items;
}

function get_faq_types($data)
{

    $posts = get_posts(array(
        'post_type' => 'faq',
    ));
    if (empty($posts)) return null;
    $items = array();
    $count = count($posts);
    for ($i = 0; $i < $count; $i++) {
        $id = $posts[$i]->ID;
        $items[$i]['id'] = $id;
        $items[$i]['uri'] = $posts[$i]->post_name;
        $items[$i]['question'] = $posts[$i]->post_title;
        $items[$i]['reponse'] = $posts[$i]->post_content;
    }
    return $items;
}

function get_portfolio_types($data)
{

    $posts = get_posts(array(
        'post_type' => 'portfolio',
    ));
    if (empty($posts)) return null;
    $items = array();
    $count = count($posts);
    for ($i = 0; $i < $count; $i++) {
        $id = $posts[$i]->ID;
        $fields = get_field_objects($id);
        $items[$i]['id'] = $id;
        $items[$i]['uri'] = $posts[$i]->post_name;
        $items[$i]['title'] = $posts[$i]->post_title;
        $items[$i]['content'] = $posts[$i]->post_content;
        $taxo = get_the_terms($id, 'portfolio-taxo-item');
        $items[$i]['taxo'] = $taxo[0]->name;
        $items[$i]['img'] = get_the_post_thumbnail_url($id, 'full');
        $items[$i]['link'] = $fields['portfolio_link']['value'];

    }
    return $items;
}


add_action('rest_api_init', function () {
    register_rest_route('types/content', '/about/', array(
        'methods' => 'GET',
        'callback' => 'get_about_type',
    ));
}, 30);

add_action('rest_api_init', function () {
    register_rest_route('types/content', '/prestations/', array(
        'methods' => 'GET',
        'callback' => 'get_prestation_types',
    ));
}, 30);

add_action('rest_api_init', function () {
    register_rest_route('types/content', '/articles/', array(
        'methods' => 'GET',
        'callback' => 'get_articles_types',
    ));
}, 30);
add_action('rest_api_init', function () {
    register_rest_route('types/content', '/faq/', array(
        'methods' => 'GET',
        'callback' => 'get_faq_types',
    ));
}, 30);
add_action('rest_api_init', function () {
    register_rest_route('types/content', '/portfolio/', array(
        'methods' => 'GET',
        'callback' => 'get_portfolio_types',
    ));
}, 30);