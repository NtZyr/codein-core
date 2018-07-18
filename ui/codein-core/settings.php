<?php

add_settings_section(
    'core_settings',
    __( 'Core Settings', 'codein-core' ),
    function() {
?>
<p><?= __( 'Toggle the main Codein Core features.', 'codein-core' ); ?></p>
<?php
    },
    $this->MENU_SLUG
);

add_settings_field(
    'core_widgets',
    __( 'Core Widgets', 'codein-core' ),
    function() {
?>
<input id="core_widgets" value="1" name="core_widgets" <?= checked( 1, get_option( 'core_widgets' ), false ); ?> type="checkbox"/>
<label for="core_widgets"><?= __( 'Toggle CC Widgets', 'codein-core' ); ?></label>
<?php
    },
    $this->MENU_SLUG,
    'core_settings'
);

add_settings_field(
    'core_shortcodes',
    __( 'Core Shortcodes', 'codein-core' ),
    function() {
?>
<input id="core_shortcodes" value="1" name="core_shortcodes" <?= checked( 1, get_option( 'core_shortcodes' ), false ); ?> type="checkbox"/>
<label for="core_shortcodes"><?= __( 'Toggle CC Shortcodes', 'codein-core' ); ?></label>
<?php
    },
    $this->MENU_SLUG,
    'core_settings'
);

register_setting( 'core_settings', 'core_widgets' );
register_setting( 'core_settings', 'core_shortcodes' );