<?php

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



function get_portfolio_types_by_id($data)
{
    $posts = get_post($data['id']);

    if (empty($posts)) return null;
    $items = array();
    $id = $posts->ID;
    $fields = get_field_objects($id);
    if ($posts->post_status == 'publish') {
        if (empty($fields)) return null;
        $id = $posts->ID;
        $fields = get_field_objects($id);
        $items['id'] = $id;
        $items['uri'] = $posts->post_name;
        $items['title'] = $posts->post_title;
        $items['content'] = $posts->post_content;
        $taxo = get_the_terms($id, 'portfolio-taxo-item');
        $items['taxo'] = $taxo[0]->name;
        $items['img'] = get_the_post_thumbnail_url($id, 'full');
        $items['link'] = $fields['portfolio_link']['value'];
    }

    return $items;
}


function add_routes_portfolio_to_api()
{
    register_rest_route('types/content', '/portfolio/', array(
        'methods' => 'GET',
        'callback' => 'get_portfolio_types',
    ));
    register_rest_route('types/content', '/portfolio/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_prestation_types_by_id',
    ));
}


add_action('rest_api_init', 'add_routes_portfolio_to_api', 30);