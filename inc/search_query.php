<?php
add_action('wp_ajax_nopriv_check_city', 'check_city');
add_action('wp_ajax_check_city', 'check_city');
function check_city()
{
    $name = $_POST['data']['name'];
    $name = strtolower($name);
    global $wpdb;
    $wild = "%";
    $like = $wild . $wpdb->esc_like($name) . $wild;
    $query = $wpdb->prepare("SELECT * FROM `wp_posts` WHERE `post_title` LIKE %s AND `post_type` = 'city' AND `post_status` = 'publish' LIMIT 6;",$like);
    $response_data = array();
    $results = $wpdb->get_results($query);
        foreach ($results as $result) {
            array_push($response_data,
                array('title' => $result->post_title, 'url' => get_post_permalink($result->ID))
            );
        }
    if (!empty($response_data)){
        wp_send_json_success($response_data);
    } else {
        wp_send_json_error($response_data);
    }

}