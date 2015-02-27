<?php
/**
* Plugin Name: SDSS' Custom Post Types for Data Release Content
* Plugin URI: http://github.com/tgelles/
* Description: A simple plugin that adds custom post types and taxonomies for Data Release 12
* Version: 0.1
* Author: Timmy Gelles
* Authoe URI: http://timmygelles.com
* License GPL2
*/

/*  Copyright 2014  TIMOTHYGELLES  (email : TIMMYINTRANSIT@GMAIL.COM)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function my_custom_posttypes() {
    $labels = array(
        'name'               => 'DR12 Documentation',
        'singular_name'      => 'DR12',
        'menu_name'          => 'DR12 Documentation',
        'name_admin_bar'     => 'DR12 Docs',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New DR12 Doc',
        'new_item'           => 'New DR12 Doc',
        'edit_item'          => 'Edit DR12 Doc',
        'view_item'          => 'View DR12 Doc',
        'all_items'          => 'All DR12 Docs',
        'search_items'       => 'Search DR12 Docs',
        'parent_item_colon'  => 'Parent DR12 Docs:',
        'not_found'          => 'No DR12 Docs found.',
        'not_found_in_trash' => 'No DR12 Docs found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-book-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dr12/%classification%', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'revisions', 'page-attributes', 'post-formats' )
    );
    register_post_type('dr12-documentation', $args);

}
add_action ('init', 'my_custom_posttypes');

// Flush rewrite rules to add "datarelease-12" as a permalink slug
function my_rewrite_flush() {
    my_custom_posttypes();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

// Custom Taxonomies
function my_custom_taxonomies() {
    
    // DR 12 Category taxonomy
    $labels = array(
        'name'              => 'classification',
        'singular_name'     => 'DR12 Classification',
        'search_items'      => 'Search DR12 Classifications',
        'all_items'         => 'All DR12 Classifications',
        'parent_item'       => 'Parent Type of DR12 Classification',
        'parent_item_colon' => 'Parent Type of DR12 Classification',
        'edit_item'         => 'Edit Type of DR12 Classification',
        'update_item'       => 'Update Type of DR12 Classification',
        'add_new_item'      => 'Add New Type of DR12 Classification',
        'new_item_name'     => 'New Type of DR12 Classification',
        'menu_name'         => 'DR12 Classification',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'datarelease-12' ),
    );

    register_taxonomy( 'classification', array( 'dr12-documentation' ), $args );

}

add_action( 'init', 'my_custom_taxonomies' );

add_filter('post_link', 'classification_permalink', 1, 3);
add_filter('post_type_link', 'classification_permalink', 1, 3);

function classification_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%classification%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'classification');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-classification';

    return str_replace('%classification%', $taxonomy_slug, $permalink);
}

?>