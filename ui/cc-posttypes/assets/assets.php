<?php
wp_enqueue_script( 'dropped_box_js' );
wp_enqueue_script( 'jquery-ui-sortable' );

wp_enqueue_script( $this->MENU_SLUG . '_scripts', plugins_url( '/assets/js/scripts.js', __DIR__ ), array( 'jquery' ) );