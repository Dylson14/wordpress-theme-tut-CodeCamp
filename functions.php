<?php

function followdylson_theme_support()
{

    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'followdylson_theme_support');


function followdylson_menus()
{

    // allows us to add menu locations
    $locations = array(
        'primary' => 'desktop primary left sidebar',
        'footer' => 'footer menu items'
    );

    // allows us to set up menus in the appearance section
    register_nav_menus($locations);
}

add_action('init', 'followdylson_menus');


function followdylson_register_styles()
{

    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('followdylson-style', get_template_directory_uri() . "/style.css", array("followdylson-bootstrap"), $version, 'all');
    wp_enqueue_style('followdylson-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('followdylson-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'followdylson_register_styles');



function followdylson_register_scripts()
{

    wp_enqueue_script('followdylson-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);

    wp_enqueue_script('followdylson-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);

    wp_enqueue_script('followdylson-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);

    wp_enqueue_script('followdylson-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'followdylson_register_scripts');


function followdylson_widget_areas()
{
    register_sidebar(
        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(

        array(
            'before_title' => '<h2>',
            'after_title' => '</h2>',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'footer Area',
            'id' => 'footer-1',
            'description' => 'footer Widget Area'
        )
    );
}

add_action('widgets_init', 'followdylson_widget_areas');
