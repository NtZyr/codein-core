<div class="wrap">
    <pre><?php
        var_dump(array(
            'name' => 'test_post_type',
            'args' => array(
                'description' => 'lorem ipsum dolor sit amet',
                'exclude_from_search' => false,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'supports' => array(
                    'title', 'editor', 'author', 'thumbnail', 'excerpts', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats'
                )
            )
        ));
    ?></pre>
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    <form action="options.php" method="post">
    <?php

    ?>
    <div class="posttypes">
        <div 
        style="
            padding: 16px 24px;
            background: #f6f6f6;
            border: 1px solid rgba(0,0,0,0.1);
        " 
        class="posttype_column"
        >
            <header>
                <h2><?= __( 'Post Types', 'codein-core' ) ?></h2>
            </header>
            <div class="posttype_box">
                <?php posttype_form(); ?>
            </div>
        </div>
    </div>
    </form>
</div>