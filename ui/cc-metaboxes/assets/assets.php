<?php
wp_enqueue_script( 'dropped_box_js' );
wp_enqueue_script( $this->MENU_SLUG . '_scripts', plugins_url( '/assets/js/scripts.js', __DIR__ ), array( 'jquery' ) );
wp_enqueue_script( 'jquery-ui-sortable' );

wp_enqueue_style( $this->MENU_SLUG . '_style', plugins_url( '/assets/css/style.css', __DIR__ ) );

$wp_post_types = get_post_types( array(
    'public' => true
), 'objects' );

foreach( $wp_post_types as $type ) {
    $post_types[$type->name] = $type->label;
}

$visibility = array(
    'normal' => __( 'Normal', 'codein-core'),
    'advanced' => __( 'Advanced', 'codein-core'),
    'side' => __( 'Side', 'codein-core'),
);

/**
 * METABOXES
 */
wp_enqueue_script( $this->MENU_SLUG . '_metaboxes', plugins_url( '/assets/js/metaboxes.js', __DIR__ ), array( 'jquery' ) );
// wp_localize_script( $this->MENU_SLUG . '_metaboxes', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
wp_localize_script( $this->MENU_SLUG . '_metaboxes', 'post_types', $post_types );
wp_localize_script( $this->MENU_SLUG . '_metaboxes', 'visibility', $visibility );