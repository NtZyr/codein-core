<?php
    $input_name = $box_id . '_' . $field['id'] . '_' . $index;
    $gallery = ( !empty($meta[$input_name][0]) ? explode( ',', $meta[$input_name][0]) : '' );
?>
<div class="gallery">
    <div class="gallery-controls">
        <button type="button" class="manage_gallery"><?= __( 'Manage gallery', 'codein-core' ); ?></button>
        <button type="button" class="empty_gallery"><?= __( 'Reset gallery', 'codein-core' ); ?></button>
        <input name="<?= $input_name ?>" class="gallery_case" type="hidden">
    </div>
    <div class="gallery-body">
        <?php if( $gallery ) : ?>
            <?php foreach( $gallery as $image_id ) : ?>
                <div class="gallery-item">
                    <div class="remove">x</div>
                    <?= wp_get_attachment_image( $image_id, 'large' ); ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p><?= __( 'Gallery is empty', 'codein-core' ); ?></p>
        <?php endif; ?>
    </div>
</div>