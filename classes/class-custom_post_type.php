<?php

namespace Codein\Core;

class CustomPostType {
    public $posttype_name;
    public $posttype_args;
    public $posttype_labels;

    public function __construct( $name, $args = array(), $labels = array() ) {
        $this->posttype_name = strlower( str_replace( ' ', '_', $name ) );
        $this->posttype_args = $args;
        $this->posttype_args = $labels;

        if( ! post_type_exists( $this->post_type_name ) ) {
            add_action( 'init', array( &$this, 'register_post_type' ) );
        }

        // $this->save();
    }

    public function register_post_type() {
        $name       = ucwords( str_replace( '_', ' ', $this->post_type_name ) );
        $plural     = $name . 's';

        $labels = array_merge(
            array(
                'name'                  => _x( $plural, 'post type general name' ),
                'singular_name'         => _x( $name, 'post type singular name' ),
                'add_new'               => _x( 'Add New', strtolower( $name ) ),
                'add_new_item'          => __( 'Add New ' . $name ),
                'edit_item'             => __( 'Edit ' . $name ),
                'new_item'              => __( 'New ' . $name ),
                'all_items'             => __( 'All ' . $plural ),
                'view_item'             => __( 'View ' . $name ),
                'search_items'          => __( 'Search ' . $plural ),
                'not_found'             => __( 'No ' . strtolower( $plural ) . ' found'),
                'not_found_in_trash'    => __( 'No ' . strtolower( $plural ) . ' found in Trash'),
                'parent_item_colon'     => '',
                'menu_name'             => $plural
            ),

            $this->post_type_labels
        );

        $args = array_merge(
            array(
                'label'                 => $plural,
                'labels'                => $labels,
                'public'                => true,
                'publicly_queryable'    => true,
                'show_ui'               => true,
                'supports'              => array( 'title', 'editor', 'thumbnail' ),
                'show_in_nav_menus'     => true,
                '_builtin'              => false,
                'has_archive'           => true
            ),

            $this->post_type_args
        );

        register_post_type( $this->post_type_name, $args );
    }


}