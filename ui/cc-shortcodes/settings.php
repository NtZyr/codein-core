<?php

add_settings_section(
    'cc-shortcodes',
    __( 'Codein Core Shortcodes', 'codein-core' ),
    function() {
?>
<p><?= __( 'Toggle needed Codein Core Shortcodes', 'codein-core' ); ?></p>
<?php
    },
    $this->MENU_SLUG
);