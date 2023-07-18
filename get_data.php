<?php

    // make sure to call this page or put this code in functions.php

    add_action('rest_api_init', function() {
        register_rest_route('/theme-text-domain/v2', '/custom_function', array(
            'methods' => 'POST',
            'callback' => 'search_post_query_function',
            // 'permission_callback' => '__return_true',
        ));
    });
    
    function search_post_query_function($request) {
        $data = $request->get_params(); 
        
        $search = $data['search'];
        $pageNo = $data['pageNo'];
        $postPerPage = $data['postPerPage'];
        $search_category_id = $data['search_cat_id'];
       
        $offset = ($pageNo - 1) * $postPerPage;

        global $wpdb;
        // all posts (you can set your condition here for search by keyword or category)
        $posts = $wpdb->get_results("SELECT p.*, COUNT(*) OVER() AS total_posts 
            WHERE p.post_type = 'post' AND p.post_status = 'publish' 
            ORDER BY p.ID ASC LIMIT $postPerPage OFFSET $offset");
            
        return $posts;

    }
    
?>