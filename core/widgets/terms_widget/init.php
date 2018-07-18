<?php

// namespace Codein\Core;

class terms_widget extends WP_Widget {
    function __construct() {
        add_option( 'terms_widget', 1 );
        if( get_option( 'terms_widget' ) == 1 ) {
            parent::__construct(
                'terms_widget',
                __( 'Codein Terms Widget', 'codein-core' ),
                array(
                    'description' => __( 'Widget for showing terms.', 'codein-core' )
                )
            );
        }

        if( get_option( 'core_widgets' ) == 1 ) {
            add_action( 'widgets_init', function() {
                if( get_option( 'terms_widget' ) == 1 ) {
                    register_widget( 'terms_widget' );
                }
            } );
        }

        add_action( 'admin_init', array( $this, 'widget_settings' ) );
    }

    public function widget_settings() {
        add_settings_field(
            'terms_widget',
            __( 'Terms Widget', 'codein-core' ),
            function() {
        ?>
        <input id="terms_widget" value="1" name="terms_widget" <?= checked( 1, get_option( 'terms_widget' ), false ); ?> type="checkbox"/>
        <?php
            },
            'cc-widgets',
            'cc-widgets'
        );

        register_setting( 'cc-widgets', 'terms_widget' );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $work_tags = get_terms( $instance['tax'] );
?>
        <?= $args['before_widget']; ?>
            <?php if( $title ) : ?>
                <?= $args['before_title'] . $title . $args['after_title']; ?>
            <?php endif; ?>
            <ul>
                <?php foreach( $work_tags as $tag ) : ?>
                    <li><a href="<?= get_term_link( $tag->term_id ); ?>"><?= $tag->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?= $args['after_widget']; ?>
<?php
    }

    public function form( $instance ) {
        if( $instance[ 'title' ] ) $title = $instance[ 'title' ];
        if( $instance[ 'tax' ] ) $widget_tax = $instance[ 'tax' ];
        $taxes = get_taxonomies( '', 'objects' );

        unset( $taxes[ 'post_format' ] );
        unset( $taxes[ 'link_category' ] );
        unset( $taxes[ 'nav_menu' ] );
?>
        <p>
            <label for="<?= $this->get_field_id( 'title' ); ?>"><?= __( 'Title: ', 'codein-core' ); ?></label>
            <input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" value="<?= esc_attr( $title ); ?>" type="text"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id( 'tax' ); ?>"><?= __( 'Taxonomy: ', 'codein-core' ); ?></label>
            <select name="<?= $this->get_field_name( 'tax' ); ?>" id="<?= $this->get_field_id( 'tax' ); ?>">
                <?php foreach( $taxes as $tax ) : ?>
                    <option <?= ( $widget_tax == $tax->name ? 'selected' : '' ); ?> value="<?= $tax->name; ?>"><?= $tax->label; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['tax'] = ( ! empty( $new_instance['tax'] ) ? $new_instance['tax'] : '' );

        return $instance;
    }
    
}

$terms_widget = new terms_widget;