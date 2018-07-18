<?php
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