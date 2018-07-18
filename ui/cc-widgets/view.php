<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    <form action="options.php" method="post">
        <?php 
            settings_fields( 'cc-widgets' );
            do_settings_sections( 'cc-widgets' );
            submit_button( __( 'Save Settings', 'codein-core' ) ); 
        ?>
    </form>
</div>