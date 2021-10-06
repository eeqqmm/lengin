<?php
add_action('wp_ajax_nopriv_check_city', 'check_city');
add_action('wp_ajax_check_city', 'check_city');
function check_city()
{

    $name = $_POST['data']['name'];
    var_dump($name);




    global $wpdb;
    $result = $wpdb->get_results(quotemeta('SELECT * FROM `wp_posts` WHERE `post_title` LIKE /%"'.$name.'/%" AND `post_type` = "city"'));
    return $result;
}