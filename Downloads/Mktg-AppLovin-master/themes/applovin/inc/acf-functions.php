<?php

// Remove delault editor from specific pages
function hide_editor_on_specific_pages($post_id) {
    // Array of specific page IDs where the editor should be hidden
    $pages_to_hide_editor = array(35040, 36529); // Add your page IDs

    // Check if the current post ID matches one of the specified IDs
    if (in_array($post_id, $pages_to_hide_editor)) {
        remove_post_type_support('page', 'editor'); // Remove editor for pages
    }
}

function execute_hide_editor() {
    global $pagenow;

    // Ensure this only runs on the post editing screen
    if ($pagenow === 'post.php') {
        $post_id = isset($_GET['post']) ? intval($_GET['post']) : null;

        if ($post_id) {
            hide_editor_on_specific_pages($post_id);
        }
    }
}
add_action('admin_init', 'execute_hide_editor');
