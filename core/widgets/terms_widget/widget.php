<?php
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