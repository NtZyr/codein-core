<?php
$strings =
    'tinyMCE.addI18n( 
        "' . $mce_locale .'.getPosts", 
            {
                buttonText: "' . esc_js( __( 'Get Posts', 'codein-core' ) ) . '",
                title: "' . esc_js( __( 'Get Posts Shortcode', 'codein-core' ) ) . '",
                posttypeLabel: "' . esc_js( __( 'Post Type', 'codein-core' ) ) . '",
                postsCountLabel: "' . esc_js( __( 'Posts Count', 'codein-core' ) ) . '",
                scTitle: "' . esc_js( __( 'Shortcode Title', 'codein-core' ) ) . '",
            } 
        );
    ';