<?php
    $posttypes = get_option( 'posttypes' );
?>
<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    <form action="options.php" method="post">
    <?php

    ?>
    <div class="posttypes">
        <div class="posttype_column">
            <header class="setting_box-header">
                <h2><?= __( 'Post Types', 'codein-core' ) ?></h2>
                <button title="<?= __( 'Add post type', 'codein-core' ); ?>" class="dashicons-plus ajax-add setting-btn button-primary" name="cc_add_posttype" type="button"><?= __( 'Add post type', 'codein-core' ); ?></button>
            </header>
            <div class="posttype_box ajax_box">
                <?php if( $posttypes ) : ?>
                <?php foreach ( $posttypes as $posttype_num => $posttype ) : ?>
                    <?php cc_posttype( $posttype_num, $posttype ); ?>
                <?php endforeach; ?>
                <?php else : ?>
                    <p class="ajax-nodata"><?= __( 'No additional post types', 'codein-core' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php 
        settings_fields( 'cc-posttypes' );
        // do_settings_sections( 'cc-metaboxes' );

        submit_button( __( 'Save Settings', 'codein-core' ) ); 
    ?>
    </form>
</div>