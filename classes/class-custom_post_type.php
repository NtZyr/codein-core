<?php

namespace Codein\Core;

class CustomPostType {
    // public $posttype_name;
    // public $posttype_args;
    // public $posttype_labels;
    public $posttype_id;
    public $posttype_label;
    public $posttype_args;
    public $posttype_labels;

    public function __construct( $posttype ) {
        // $this->posttype_name = strlower( str_replace( ' ', '_', $name ) );
        // $this->posttype_args = $args;
        // $this->posttype_args = $labels;

        // $this->save();
        
        $this->posttype_id = $posttype['id'];
        $this->posttype_label = $posttype['label'];
        $this->posttype_args = $posttype['args'];
        $this->posttype_labels = array();

        if( ! post_type_exists( $this->posttype_id ) ) {
            add_action( 'init', array( $this, 'register_post_type' ) );
        }

        // flush_rewrite_rules();

        // var_dump( $this->posttype_id );
        // var_dump( get_post_types() );

        // $this->save();
    }

    public function register_post_type() {
        $name       = $this->posttype_label;
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

            $this->posttype_labels
        );

        $args = array_merge(
            array(
                'label'                 => $plural,
                'labels'                => $labels,
                'show_in_menu'          => true
            ),

            $this->posttype_args
        );

        register_post_type( $this->posttype_id, $args );
    }
}