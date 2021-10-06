<?php
function create_taxonomy()
{
    // create a new taxonomy
    register_taxonomy(
        'cities',
        ['city'],
        array(
            "hierarchical" => true,
            "label" => "Рубрики для городов",
            'labels' => array(
                'add_new_item' => 'Добавить город'
            ),
            "singular_label" => "cities",
            'show_in_rest'          => true,
            'public'                => true,
            "rewrite" => array('slug' => 'cities')//, 'hierarchical' => true
        )
    );


}


function create_post_type (){
    register_post_type('city', array(
        'supports' => array('title' ,'editor'),
        'public' => true,
        'publicly_queryable' => true,
        'labels' => array(
            'name' => 'Города',
            'add_new' => 'Добавить город',
            'add_new_item' => 'Добавить город',
            'edit_item' => 'Изменить город',
            'all_items' => 'Все города',
            'singular_name' => 'Город'
        ),
        'rewrite' => [
            'slug'                  => 'city'],
        'taxonomies'=> array( 'cities' ),
        'menu_icon' => 'dashicons-admin-comments'
    ));
}
add_action('init', 'create_taxonomy');

add_action('init', 'create_post_type');