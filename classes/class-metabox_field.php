<?php 

namespace Codein\Core\Metabox;

class MetaboxField {
    public function __construct( $type, $label ) {
        $fields = get_option( 'fields' );
        if( $fields == '' ) {
            $fields = array();
        }
        $fields[$type] = $label;
        update_option( 'fields', $fields );

        // var_dump( plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/assets/admin_assets.php' );

        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/assets/admin_assets.php' ) ) {
            add_action( 'admin_enqueue_scripts', function( $hook )use( $type ) {
                // var_dump( $hook );
                if( $hook == 'post-new.php' || $hook == 'post.php' ) {
                    require plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/assets/admin_assets.php';
                }
            });
        }
    }

    public static function field_init( $type ) {
        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/form.php' ) ) {
            require plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/form.php';
        }
    }

    public static function field_front( $type ) {
        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/front.php' ) ) {
            require plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/front.php';
        }
    }

    public static function field_admin( $index, $field, $box_id, $meta ) {
        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $field['type'] . '/admin.php' ) ) {
            require plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $field['type'] . '/admin.php';
        }
    }
}