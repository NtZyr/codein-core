<?php

function posttype_form() {
?>
    <div class="posttype">
        <header style="
            position: relative;
            display: inline-block;
            width: 100%;
        ">
            <h4><?= __( 'New Post Type', 'codein-core' ); ?></h4>
            <div class="dropped_controls">
                <button class="dashicons-no-alt dropped_remove" type="button"><?= __( 'Remove', 'codein-core' ); ?></button>
                <button class="dashicons-arrow-down-alt2 dropped_toggle" type="button"><?= __( 'Toggle', 'codein-core' ); ?></button>
            </div>
        </header>
        <div class="dropped-body">
            <label>
                <span><?= __( 'Post Type Name', 'codein-core' ); ?></span>
                <input name="posttypes[0][name]" type="text">
            </label></br>
            <label>
                <span><?= __( 'Description', 'codein-core' ); ?></span></br>
                <textarea name="posttypes[0][description]" id="" cols="30" rows="10"></textarea>
            </label>
        </div>
    </div>
<?php
}