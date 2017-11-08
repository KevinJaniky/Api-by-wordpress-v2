<?php

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

function add_routes_about_to_api()
{
    register_rest_route('types/content', '/about/', array(
        'methods' => 'GET',
        'callback' => 'get_about_type',
    ));
}

add_action('rest_api_init', 'add_routes_about_to_api', 30);