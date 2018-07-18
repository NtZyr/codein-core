<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    <form action="options.php" method="post">
        <?php 
            settings_fields( 'cc-shortcodes' );
            do_settings_sections( 'cc-shortcodes' );
            submit_button( __( 'Save Settings', 'codein-core' ) ); 
        ?>
    </form>
</div>