<?php

function post_email_type($data)
{
    $args = array(
        'post_type'    => 'email',
        'post_title'   => $_POST['email'],
        'post_content' => $_POST['obj'],
        'author'       => 1

    );
    wp_insert_post($args);

    return $_POST;
}

function add_routes_email_to_api()
{
    register_rest_route('types/content', '/email/', array(
        'methods'  => 'POST',
        'callback' => 'post_email_type',
    ));
}

//add_action('rest_api_init', 'add_routes_email_to_api', 30);