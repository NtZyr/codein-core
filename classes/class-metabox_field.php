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
    }

    public static function field_init( $type ) {
        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/form.php' ) ) {
            require plugin_dir_path( __DIR__ ) . 'core/metabox-fields/' . $type . '/form.php';
        }
    }
}