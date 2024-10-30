<?php

/*
 * HOOKS AND FILTERS FOR POSTFILTERS
 */

//action for posts, archives and other content
add_filter("posts_where_request", "cls_adjust_where_query");

//filters for nav
add_filter("get_previous_post_where", "cls_adjust_query_nav");
add_filter("get_next_post_where", "cls_adjust_query_nav");

//filters for archives listing
add_action("getarchives_where", "cls_adjust_query_archive_list");

/*
 * FUNCTIONS FOR POSTFILTERS
 */

function cls_adjust_query_nav($arg) {
    $arg = cls_generate_query($arg, "p");

    return $arg;
}

function cls_adjust_query_archive_list($arg) {
    if (!is_admin() ) {
        global $wpdb;

        $prefix = $wpdb->base_prefix;

        $arg = cls_generate_query($arg, $prefix."posts");
    }

    return $arg;
}

function cls_adjust_where_query($arg) {
    if (!is_admin() ) {
        global $wpdb;

        $prefix = $wpdb->base_prefix;

        $arg = cls_generate_query($arg, $prefix."posts");
    }

    return $arg;
}

function cls_generate_query($arg, $table) {
    global $wpdb;

    $prefix = $wpdb->base_prefix;

    //add to query to filter out all stuff not for this language
    $arg = $arg . " AND EXISTS (
        SELECT *
        FROM " . $prefix . "term_relationships AS t1
        INNER JOIN " . $prefix . "terms AS t2 ON t1.term_taxonomy_id = t2.term_id
        WHERE t1.object_id = " . $table . ".ID
        AND t2.name = '" . get_locale() . "'
    )";

    return $arg;
}

?>