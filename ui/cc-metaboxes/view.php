<?php
    $metaboxes = get_option( 'metaboxes' );
    $fields = get_option( 'fields' );
    // var_dump($post_types);
?>
<div class="wrap">
    <!-- <pre>
        <?php 
            // var_dump( get_option( 'metaboxes' ) );
            // var_dump( get_option( 'fields' ) );
        ?> 
    </pre> -->
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    <form action="options.php" method="post">
    <div class="metaboxes">
        <div class="cc-metaboxes_column metabox_column">
            <header class="column-header">
                <h2><?= __( 'Metaboxes', 'codein-core' ); ?></h2>
                <button title="<?= __( 'Add metabox', 'codein-core' ); ?>" class="dashicons-plus ajax-add setting-btn button-primary" name="cc_add_metabox" type="button"><?= __( 'Add metabox', 'codein-core' ); ?></button>
            </header>
            <div class="metaboxes_box ajax_box">
                <?php if( $metaboxes && is_array( $metaboxes ) ) : ?>

                <?php foreach( $metaboxes as $box_num => $box ) : ?>
                    <?php cc_metabox( $box_num, $box ); ?>
                <?php endforeach; ?>
                <?php else : ?>
                    <p class="ajax-nodata"><?= __( 'No metaboxes.', 'codein-core' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="cc-metaboxes_column fields_column">
            <header class="column-header">
                <h2><?= __( 'Fields', 'codein-core' ); ?></h2>
            </header>
            <div class="fields_box">
                <?php if( is_array( $fields ) ) : ?>
                <?php foreach( $fields as $field => $label ) : ?>
                    <div class="<?= $field ?> field" data-field="<?= $field; ?>">
                        <?= $label; ?>
                    </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
        <?php 
            settings_fields( 'cc-metaboxes' );
            // do_settings_sections( 'cc-metaboxes' );

            submit_button( __( 'Save Settings', 'codein-core' ) ); 
        ?>
    </form>
</div>