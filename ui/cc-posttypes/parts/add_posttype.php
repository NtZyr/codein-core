<?php
function cc_add_posttype() {
    if( isset( $_POST[ 'count' ] ) ) {
        $box_num = $_POST[ 'count' ];
    }

    cc_posttype( $box_num );

    wp_die();
}

add_action( 'wp_ajax_cc_add_posttype', 'cc_add_posttype' );

function cc_posttype( $posttype_num, $posttype = null ) {
?>
    <div class="posttype setting-box ajax-block">
        <header class="setting-header">
            <h4><?= ( $posttype['label'] ? $posttype['label'] : __( 'New Post Type', 'codein-core' ) ); ?></h4>
            <div class="dropped_controls">
                <button class="dashicons-no-alt dropped_remove" type="button"><?= __( 'Remove', 'codein-core' ); ?></button>
                <button class="dashicons-arrow-down-alt2 dropped_toggle" type="button"><?= __( 'Toggle', 'codein-core' ); ?></button>
            </div>
        </header>
        <div class="dropped-body posttype-settings setting-body">
            <div class="posttype-col pt-col">
                <label>
                    <span><?= __( 'Post Type ID: ', 'codein-core' ); ?></span></br>
                    <input value="<?= $posttype['id'] ? $posttype['id'] : '' ?>" name="posttypes[<?= $posttype_num ?>][id]" type="text">
                </label>
                <label>
                    <span><?= __( 'Post Type Label: ', 'codein-core' ); ?></span></br>
                    <input class="ajax-title" value="<?= $posttype['label'] ? $posttype['label'] : '' ?>" name="posttypes[<?= $posttype_num ?>][label]" type="text">
                </label>
                <label>
                    <span><?= __( 'Description: ', 'codein-core' ); ?></span></br>
                    <textarea style="resize:none;width:100%;" name="posttypes[<?= $posttype_num; ?>][args][description]" rows="6"><?= $posttype['args']['description'] ?></textarea>
                </label>
            </div>

            <div class="posttype-col pt-col-2">
                <h5><?= __( 'Post Type Settings', 'codein-core' ); ?></h5>
                <label>
                    <span><?= __( 'Exclude from search', 'codein-core' ); ?></span>
                    <input type="checkbox" <?= ( $posttype['args']['exclude_from_search'] == true ? 'checked' : '' ); ?> value="true" name="posttypes[<?= $posttype_num ?>][args][exclude_from_search]">
                </label>
                <label>
                    <span><?= __( 'Public', 'codein-core' ); ?></span>
                    <input <?= ( $posttype['args']['public'] == true ? 'checked' : '' ); ?> value="true" type="checkbox" name="posttypes[<?= $posttype_num ?>][args][public]">
                </label>
                <label>
                    <span><?= __( 'Publicly Queryable', 'codein-core' ); ?></span>
                    <input <?= ( $posttype['args']['publicly_queryable'] == true ? 'checked' : '' ); ?> type="checkbox" name="posttypes[<?= $posttype_num ?>][args][publicly_queryable]" value="true">
                </label>
                <label>
                    <span><?= __( 'Show UI', 'codein-core' ); ?></span>
                    <input <?= ( $posttype['args']['show_ui'] == true ? 'checked' : '' ); ?> type="checkbox" name="posttypes[<?= $posttype_num ?>][args][show_ui]" value="true">
                </label>

                <h5><?= __( 'Supports', 'codein-core' ); ?></h5>
                <label><?= __( 'Title', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'title', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="title">
                </label>
                <label> <?= __( 'Editor', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'editor', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="editor">
                </label>
                <label> <?= __( 'Author', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'author', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="author">
                </label>
                <label> <?= __( 'Thumbnail', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'thumbnail', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="thumbnail">
                </label>
                <label> <?= __( 'Excerpts', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'excerpts', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="excerpts">
                </label>
                <label> <?= __( 'Trackbacks', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'trackbacks', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="trackbacks">
                </label>
                <label> <?= __( 'Custom fields', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'custom-fields', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="custom-fields">
                </label>
                <label> <?= __( 'Comments', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'comments', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="comments">
                </label>
                <label> <?= __( 'Revisions', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'revisions', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="revisions">
                </label>
                <label> <?= __( 'Post formats', 'codein-core' ); ?>
                    <input type="checkbox" name="posttypes[<?= $posttype_num ?>][args][supports][]" <?= ( in_array( 'post-formats', $posttype['args']['supports'] ) ? 'checked' : '' ); ?> value="post-formats">
                </label>
            </div>

        </div>
    </div>
<?php
}