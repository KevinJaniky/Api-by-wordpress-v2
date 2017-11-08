<?php


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


function get_prestation_types_per_page($data)
{
        $posts = get_posts(array(
            'post_type' => 'prestations',
            'numberposts' => $data['nb'],
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


function get_prestation_types_by_id($data)
{
    $posts = get_post($data['id']);

    if (empty($posts)) return null;
    $items = array();
    $id = $posts->ID;
    $fields = get_field_objects($id);
    if ($posts->post_status == 'puOUblish') {
        if (empty($fields)) return null;
        $items['id'] = $posts->ID;
        $items['title'] = $posts->post_title;
        $items['uri'] = $posts->post_name;
        $items['description'] = $posts->post_content;
        $items['price'] = $fields['prestation_price']['value'];
        $items['link'] = $fields['prestation_lien']['value'];
        $taxo = get_the_terms($id, 'prestation-taxo-item');
        $items['taxo'] = $taxo[0]->name;
        $items['img'] = get_the_post_thumbnail_url($id, 'full');
    }

    return $items;
}


function add_routes_prestation_to_api()
{

    register_rest_route('types/content', '/prestations/', array(
        'methods' => 'GET',
        'callback' => 'get_prestation_types',
    ));
    register_rest_route('types/content', '/prestations/per_page/(?P<nb>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_prestation_types_per_page',
    ));
    register_rest_route('types/content', '/prestations/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_prestation_types_by_id',
    ));

}


add_action('rest_api_init', 'add_routes_prestation_to_api', 30);