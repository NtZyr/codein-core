<?php

add_settings_section(
    'cc-metaboxes',
    __( 'Codein Core Metaboxes', 'codein-core' ),
    function() {
?>
<!-- <p><?= __( 'Toggle needed Codein Core Shortcodes', 'codein-core' ); ?></p> -->
<?php
    },
    $this->MENU_SLUG
);

add_settings_field(
    'metaboxes',
    __( 'Metaboxes', 'codein-core' ),
    function() {
?>
<!-- <input id="core_widgets" value="1" name="metaboxes" type="hidden"/> -->
<?php
    },
    $this->MENU_SLUG,
    'cc-metaboxes'
);

add_settings_field(
    'fields',
    __( 'Fields', 'codein-core' ),
    '',
    $this->MENU_SlUG,
    'cc-metaboxes'
);

register_setting( 'cc-metaboxes', 'metaboxes' );
register_setting( 'cc-metaboxes', 'fields' );