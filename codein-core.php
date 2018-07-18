<?php
/*
    Plugin Name: Codein Core
    Version: und0
    Author: Codein Design
    Text Domain: codein-core
    License:
    Description: Core plugin for themes by Codein Team. Codein Core provides next features: custom post type admin page, metaboxes, additional shortcodes, additional widgets.
*/

require 'classes/class-settings_page.php';
require 'classes/class-shortcode.php';
require 'classes/class-metabox.php';
// require 'classes/class-metabox_field.php';

add_action( 'admin_enqueue_scripts', function() {
    require 'libs/init.php';
} );

// Metabox fields
require 'core/metabox-fields/init.php';

// Widgets
require 'core/widgets/terms_widget/init.php';

// Settings Pages
$codein_core = new Codein\Core\SettingsPage( 
    __( 'Codein Core Settings', 'codein-core' ), 
    __( 'Codein Core', 'codein-core' ), 
    'codein-core' 
);

$core_widgets = new Codein\Core\SettingsPage( 
    __( 'Codein Widgets Settings', 'codein-core' ), 
    __( 'Codein Widgets', 'codein-core' ), 
    'cc-widgets',
    'codein-core'
);

$core_shortcodes = new Codein\Core\SettingsPage( 
    __( 'Codein Shortcodes Settings', 'codein-core' ), 
    __( 'Codein Shortcodes', 'codein-core' ), 
    'cc-shortcodes',
    'codein-core'
);

$core_metaboxes = new Codein\Core\SettingsPage( 
    __( 'Codein Metaboxes Settings', 'codein-core' ), 
    __( 'Codein Metaboxes', 'codein-core' ), 
    'cc-metaboxes',
    'codein-core'
);

$core_posttypes = new Codein\Core\SettingsPage(
    __( 'Codein Post Types Settings', 'codein-core' ),
    __( 'Codein Post Types', 'codein-core' ),
    'cc-posttypes',
    'codein-core'
);

// Shortcodes
$get_posts = new Codein\Core\Shortcode(
    array(
        'shortcode_name' => 'get_posts',
        'shortcode_label' => __( 'Get Posts', 'codein-core' )
    ),
    array(
        'row' => 1
    )
);

// Metaboxes
$metaboxes = get_option( 'metaboxes' );

if( $metaboxes && is_array( $metaboxes ) ) {
    foreach( $metaboxes as $box ) {
        new Codein\Core\Metabox( $box );
    }
}