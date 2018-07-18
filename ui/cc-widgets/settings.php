<?php

add_settings_section(
    'cc-widgets',
    __( 'Codein Core Widgets', 'codein-core' ),
    function() {
?>
<p><?= __( 'Toggle the main Codein Core features.', 'codein-core' ); ?></p>
<?php
    },
    $this->MENU_SLUG
);