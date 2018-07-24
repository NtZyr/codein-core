<?php
    $input_name = $box_id . '_' . $field['id'] . '_' . $index;
    var_dump( $meta[$input_name] );
?>
<div class="gallery">
    <div class="gallery-controls">
        <button type="button" class="manage_gallery"><?= __( 'Manage gallery', 'codein-core' ); ?></button>
        <button type="button" class="empty_gallery"><?= __( 'Reset gallery', 'codein-core' ); ?></button>
        <input name="<?= $input_name ?>" class="gallery_case" type="hidden">
    </div>
    <div class="gallery-body">
        <p><?= __( 'Gallery is empty', 'codein-core' ); ?></p>
    </div>
</div>