<?php

add_settings_section(
    'cc-posttypes',
    __( 'Codein Core Posttypes', 'codein-core' ),
    function() {
?>
<!-- <p><?= __( 'Toggle needed Codein Core Shortcodes', 'codein-core' ); ?></p> -->
<?php
    },
    $this->MENU_SLUG
);

add_settings_field(
    'posttypes',
    __( 'Metaboxes', 'codein-core' ),
    function() {
?>
<!-- <input id="core_widgets" value="1" name="metaboxes" type="hidden"/> -->
<?php
    },
    $this->MENU_SLUG,
    'cc-posttypes'
);

register_setting( 'cc-posttypes', 'posttypes' );