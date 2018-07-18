<?php
$plugin_dir = ABSPATH . 'wp-content/plugins/codein-core/';
require $plugin_dir . 'classes/class-metabox_field.php';

$input_group = new Codein\Core\Metabox\MetaboxField( 'input_group', __( 'Input Group', 'codein-core' ) );
$gallery = new Codein\Core\Metabox\MetaboxField( 'gallery', __( 'Gallery', 'codein-core' ) );