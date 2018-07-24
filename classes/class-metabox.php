<?php
namespace Codein\Core;

// require 'class-metabox_field.php';

class Metabox {
    public $box_id;
    public $box_types;
    public $box_fields;

    public function __construct( $box = array() ) {
        $box_id = $box['id'];
        $box_title = $box['title'];
        $box_types = $box['post_types'];
        $box_visibility = $box['visibility'];
        $box_fields = $box['fields'];

        $this->box_id = $box_id;
        $this->box_types = $box_types;
        $this->box_fields = $box_fields;

        // var_dump( $box );

        if( get_option( 'core_metaboxes' ) == 1 ) {
            add_action( 'add_meta_boxes', function() use( $box_id, $box_title, $box_types, $box_visibility, $box_fields ) {
                add_meta_box( $box_id, $box_title, array( $this, 'metabox_view' ), $box_types, $box_visibility, 'default', $box_fields );
            } );
        }

        $this->save();
    }

    public function metabox_view( $post, $meta ) {
        global $post;

        // Nonce field for some validation
        wp_nonce_field( plugin_basename( __FILE__ ), 'custom_post_type' );

        $fields = $meta['args'];
        $meta = get_post_custom( $post->ID );

        if( $fields ) {
            foreach( $fields as $index => $field ) {
                Metabox\MetaboxField::field_admin( $index, $field, $this->box_id, $meta );
            }
        } else {
            echo __('No fields found', 'codein-core');
        }
    }

    public function save() {
        $post_type_name = $this->box_types['0'];

        add_action( 'save_post',
            function() use( $post_type_name ) {
                // Deny the WordPress autosave function
                if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

                if ( ! wp_verify_nonce( $_POST['custom_post_type'], plugin_basename(__FILE__) ) ) return;

                global $post;

                if( isset( $_POST ) && isset( $post->ID ) && get_post_type( $post->ID ) == $post_type_name ) {

                    $fields = $this->box_fields;
                    $box_id = $this->box_id;

                    if( $fields ) {
                        foreach( $fields as $index => $field ) {
                            $input_name = $box_id . '_' . $field['id'] . '_' . $index;
                            update_post_meta( $post->ID, $input_name, (string)$_POST[$input_name] );
                            
                        }
                    }
                }
            }
        );
    }
}