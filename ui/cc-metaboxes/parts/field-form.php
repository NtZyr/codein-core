<?php

function field_body( $label, $type, $count, $box_num, $field_id = null ) {
    $field_id = ( $field_id != null ? $field_id : '' );
?>
    <header>
        <?= $label; ?>
        <div class="dropped_controls">
            <button class="dashicons-no-alt dropped_remove" type="button"><?= __( 'Remove', 'codein-core' ); ?></button>
            <button class="dashicons-arrow-down-alt2 dropped_toggle" type="button"><?= __( 'Toggle', 'codein-core' ); ?></button>
        </div>
    </header>
    <div class="dropped-body">
        <p>
            <label><?= __( 'Field ID', 'codein-core' ); ?>
                <input value="<?= $field_id; ?>" name="metaboxes[<?= $box_num; ?>][fields][<?= $count; ?>][field_id]" type="text">
            </label>
            <label><?= __( 'Field Name', 'codein-core' ); ?>
                <input value="<?= $label; ?>" name="metaboxes[<?= $box_num; ?>][fields][<?= $count; ?>][field_title]" type="text">
            </label>
            <input value="<?= $type; ?>" name="metaboxes[<?= $box_num; ?>][fields][<?= $count; ?>][field_type]" type="hidden">
        </p>
        <?php
            Codein\Core\Metabox\MetaboxField::field_init( $type );
        ?>
    </div>
<?php
}

function cc_add_field() {
    $label = $_POST['label'];
    $type = $_POST['type'];
    $count = $_POST['count'];
    $box_num = $_POST['box_num'];

    field_body( $label, $type, $count, $box_num );

    wp_die();
}

add_action( 'wp_ajax_cc_add_field', 'cc_add_field' );