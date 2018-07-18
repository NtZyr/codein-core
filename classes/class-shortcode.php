<?php

namespace Codein\Core;

class Shortcode {
    /**
     * Contents of arrays
     * LABELS
     *   - shortcode_name
     *   - shortcode_label
     * 
     * SETTINGS 
     *   - row
     */
    public $SC_NAME;
    public $SC_SETTINGS;
    public $SC_LABELS;

    public function __construct( $labels = array(), $settings = array() ) {
        $this->SC_NAME = $labels['shortcode_name'];
        $this->SC_LABELS = $labels;
        $this->SC_SETTINGS = $settings;

        $name = $labels['shortcode_name'];

        add_option( 'sc_' . $name, 1 );
        add_action( 'admin_init', array( $this, 'shortcode_toggle' ) );
        if( get_option( 'sc_' . $name ) == 1 ) {
            add_shortcode( $name, array( $this, 'shortcode_view' ) );
        }

        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/shortcodes/' . $this->SC_NAME . '/button.js' ) ) {
            add_filter( 'mce_external_plugins', array( $this, 'register_tinymce_js' ) );
        }
        
        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/shortcodes/' . $this->SC_NAME . '/translations.php' ) ) {
            add_filter( 'mce_external_languages', array( $this, 'shortcode_translations' ) );
        }

        switch( $settings['row'] ) {
            case 2 :
                add_filter( 'mce_buttons_2', function( $buttons ) use( $name ) {
                    $buttons[] = $name;
                    return $buttons;
                } );

                break;

            case 3 :
                add_filter( 'mce_buttons_3', function( $buttons ) use( $name ) {
                    $buttons[] = $name;
                    return $buttons;
                } );
                break;
            default :
                add_filter( 'mce_buttons', function( $buttons ) use( $name ) {
                    array_push( $buttons, 'separator', $name );
                    return $buttons;
                } );
        }
    }

    public function shortcode_toggle() {
        add_settings_field(
            'sc_' . $this->SC_NAME,
            __( 'Shortcode "', 'codein-core' ) . $this->SC_LABELS['shortcode_label'] . '"',
            function() {
?>
    <input id="<?= 'sc_' . $this->SC_NAME; ?>" value="1" name="<?= 'sc_' . $this->SC_NAME; ?>" <?= checked( 1, get_option( 'sc_' . $this->SC_NAME ), false ); ?> type="checkbox"/>
<?php
            },
            'cc-shortcodes',
            'cc-shortcodes'
        );

        register_setting( 'cc-shortcodes', 'sc_' . $this->SC_NAME );
    }

    public function shortcode_view( $atts, $content = null ) {
        $shortcode_label = $this->SC_LABELS['shortcode_label'];

        if( file_exists( plugin_dir_path( __DIR__ ) . 'core/shortcodes/' . $this->SC_NAME . '/view.php' ) ) {
            require plugin_dir_path( __DIR__ ) . 'core/shortcodes/' . $this->SC_NAME . '/view.php';
        } else {
            $message .= __( 'No found shortcode view: ', 'codein-core' );
            $message .= $shortcode_label;
            // $message .= __( 'Please ', 'codein-core' );
            return $message;
        }
    }

    public function register_tinymce_js( $plugin_array ) {
        $name = $this->SC_NAME;

        $plugin_array[ $name ] = plugin_dir_url( __DIR__ ) . 'core/shortcodes/' . $this->SC_NAME . '/button.js';

        return $plugin_array;
    }

    public function shortcode_translations( $mce_external_languages ) {
        $mce_external_languages[ 'getPosts' ] = plugin_dir_path( __DIR__ ) . 'shortcodes/' . $this->SC_NAME . '/translations.php';
        return $mce_external_languages;
    }
}