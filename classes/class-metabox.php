<?php

namespace Codein\Core;

class Metabox {
    public function __construct( $box = array() ) {
        $box_id = $box['metabox_id'];
        $box_title = $box['metabox_title'];
        $box_types = $box['metabox_post_types'];
        $box_visibility = $box['metabox_visibility'];
        // $box_fields = $box['metabox_fields'];

        if( get_option( 'core_metaboxes' ) == 1 ) {
            add_action( 'add_meta_boxes', function() use( $box_id, $box_title, $box_types, $box_visibility ) {
                add_meta_box( $box_id, $box_title, array( $this, 'metabox_view' ), $box_types, $box_visibility );
            } );
        }
    }

    public function metabox_view( $post, $meta ) {
        global $post;

        // Nonce field for some validation
        wp_nonce_field( plugin_basename( __FILE__ ), 'custom_post_type' );
        
        echo 'lol';
    }
}