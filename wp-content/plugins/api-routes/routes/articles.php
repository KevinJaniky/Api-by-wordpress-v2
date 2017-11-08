<?php

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

function get_articles_types_per_page($data)
{
    $posts = get_posts(array(
        'post_type' => 'post',
        'numberposts' => $data['nb'],
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

function get_articles_types_by_id($data)
{
    $posts = get_post($data['id']);

    if (empty($posts)) return null;

    $items = array();
    if ($posts->post_status == 'publish') {
        $id = $posts->ID;
        $items['id'] = $posts->ID;
        $items['uri'] = $posts->post_name;
        $items['date'] = $posts->post_date;
        $items['content'] = $posts->post_content;
        $items['title'] = $posts->post_title;
        $taxo = get_the_terms($id, 'category');
        $items['taxo'] = $taxo[0]->name;
        $items['img'] = get_the_post_thumbnail_url($id, 'full');
    }

    return $items;
}

function add_routes_articles_to_api()
{
    register_rest_route('types/content', '/articles/', array(
        'methods' => 'GET',
        'callback' => 'get_articles_types',
    ));
    register_rest_route('types/content', '/articles/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_articles_types_by_id',
    ));
    register_rest_route('types/content', '/articles/per_page/(?P<nb>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_articles_types_per_page',
    ));
}

add_action('rest_api_init', 'add_routes_articles_to_api', 30);