<?php

wp_register_script( 'dropped_box_js', plugins_url( '/libs/dropped-box/js/dropped-box.js', __DIR__ ), array( 'jquery' ) );
wp_enqueue_style( 'dropped_box_css', plugins_url( '/libs/dropped-box/css/dropped-box.css', __DIR__ ) );