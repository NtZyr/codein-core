<?php
function cc_metabox( $box_num, $box = null ) {
    $box_id = ( $box[ 'metabox_id' ] ? $box[ 'metabox_id' ] : '' );
    $box_title = ( $box[ 'metabox_title' ] ? $box[ 'metabox_title' ] : '' );
    $box_types = ( $box['metabox_post_types'] ? $box['metabox_post_types'] : '' );
    $box_visibility = ( $box['metabox_visibility'] ? $box['metabox_visibility'] : '' );
    $box_fields = ( $box['fields'] ? $box['fields'] : '' );

    $wp_post_types = get_post_types( array(
        'public' => true
    ), 'objects' );
    foreach( $wp_post_types as $type ) {
        $post_types[$type->name] = $type->label;
    }
    $visibilities = array(
        'normal' => __( 'Normal', 'codein-core'),
        'advanced' => __( 'Advanced', 'codein-core'),
        'side' => __( 'Side', 'codein-core'),
    );
?>
<div class="metabox setting-box ajax-block">
    <header class="setting-header">
        <h4><?= ( $box_title ? $box_title : __( 'Metabox Name', 'codein-core' ) ); ?></h4>
        <div class="dropped_controls">
            <button class="dashicons-no-alt dropped_remove" type="button"><?= __( 'Remove', 'codein-core' ); ?></button>
            <button class="dashicons-arrow-down-alt2 dropped_toggle" type="button"><?= __( 'Toggle', 'codein-core' ); ?></button>
        </div>
    </header>
    <div class="dropped-body">
        <div class="metabox_settings setting-body">
            <label>
                <span><?= __( 'Metabox ID', 'codein-core' ); ?></span>
                <input name="metaboxes[<?= $box_num; ?>][metabox_id]" value="<?= $box_id; ?>" type="text">
            </label>
            <label>
                <span><?= __( 'Metabox title', 'codein-core' ); ?></span>
                <input class="ajax-title" value="<?= $box_title; ?>" name="metaboxes[<?= $box_num; ?>][metabox_title]" type="text">
            </label>
            <label>
                <span><?= __( 'Post types', 'codein-core' ); ?></span>
                <select multiple name="metaboxes[<?= $box_num; ?>][metabox_post_types][]">
                    <?php foreach( $post_types as $name => $label ) : ?>

                    <option <?php if( is_array( $box_types ) ) { foreach( $box['metabox_post_types'] as $box_type ) { echo ( $box_type == $name ? 'selected' : '' ); } } ?> value="<?= $name; ?>"><?= $label; ?></option>

                    <?php endforeach; ?>
                </select>
            </label>
            <label>
                <span><?= __( 'Visibility', 'codein-core' ); ?></span>
                <select name="metaboxes[<?= $box_num; ?>][metabox_visibility]">
                <?php foreach( $visibilities as $value => $name ) : ?>
                    
                    <option <?= ( $box_visibility == $value ? 'selected' : '' ); ?> value="<?= $value; ?>"><?= $name; ?></option>

                <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="fields">
            <?php if( is_array( $box_fields ) ) : ?>
                <?php foreach( $box_fields as $field_num => $field ) : 
                    $field_id = $field['field_id'];
                    $field_title = $field['field_title'];
                    $field_type = $field['field_type'];
                ?>
                    <div class="<?= $field_type ?> field" data-field="<?= $field_type; ?>">
                        <?php field_body( $field_title, $field_type, $field_num, $box_num, $field_id ); ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <span style="font-style: italic;"><?= __( 'No fields', 'codein-core' ); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
}

function cc_add_metabox() {
    if( isset( $_POST[ 'count' ] ) ) {
        $box_num = $_POST[ 'count' ];
    }

    cc_metabox( $box_num );

    wp_die();
?>

<?php
    // wp_die();
}

add_action( 'wp_ajax_cc_add_metabox', 'cc_add_metabox' );