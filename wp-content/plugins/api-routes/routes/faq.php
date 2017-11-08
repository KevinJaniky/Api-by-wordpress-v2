<?php

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

function add_routes_faq_to_api (){

    register_rest_route('types/content', '/faq/', array(
        'methods' => 'GET',
        'callback' => 'get_faq_types',
    ));
}


add_action('rest_api_init', 'add_routes_faq_to_api', 30);