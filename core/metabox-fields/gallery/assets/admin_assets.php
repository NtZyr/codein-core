<?php

wp_enqueue_script( 'metabox_field-gallery-js', plugins_url( '/assets/admin/js/gallery.js', __DIR__ ), array( 'jquery' ) );
wp_enqueue_style( 'metabox_field-gallery-css', plugins_url( '/assets/admin/css/gallery.css', __DIR__ ) );