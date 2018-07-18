<?php

namespace Codein\Core;

class SettingsPage {
    public $MENU_PARENT;
    public $PAGE_TITLE;
    public $MENU_TITLE;
    public $CAPABILITY;
    public $MENU_SLUG;
    public $POSITION;

    public function __construct( $page_title, $menu_title, $menu_slug, $menu_parent = null, $capability = 'manage_options', $position = 80
    ) {
        $this->MENU_PARENT = $menu_parent;
        $this->PAGE_TITLE = $page_title;
        $this->MENU_TITLE = $menu_title;
        $this->CAPABILITY = $capability;
        $this->MENU_SLUG = $menu_slug;
        $this->POSITION = $position;

        if( $menu_parent != null ) {
            add_action( 'admin_menu', array( $this, 'submenu_page' ) );
        } else {
            add_action( 'admin_menu', array( $this, 'menu_page' ) );
        }

        if( file_exists( plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/settings.php' ) ) {
            add_action( 'admin_init', array( $this, 'settings_sections' ) );
        }

        $parts = plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/parts/';

        if( is_dir( $parts ) && scandir( $parts ) ) {
            $parts = scandir( plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/parts/' );
            $parts = array_diff( $parts, array( '.', '..' ) );
            foreach( $parts as $part ) {
                require plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/parts/' . $part;
            }
        }

        add_action( 'admin_enqueue_scripts', function( $hook ) {
            if( file_exists( plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/assets/assets.php' ) ) {
                if( $hook == $this->MENU_PARENT . '_page_' . $this->MENU_SLUG ) {
                    require plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/assets/assets.php';
                }
            }
        } );
    }

    public function submenu_page() {
        // add_submenu_page( $this->MENU_PARENT, $this->PAGE_TITLE, $this->MENU_TITLE, $this->CAPABILITY, $this->MENU_SLUG, array( $this, 'settings_page' ), plugin_dir_url( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/icon.svg' , $this->POSITION );
        add_submenu_page( $this->MENU_PARENT, $this->PAGE_TITLE, $this->MENU_TITLE, $this->CAPABILITY, $this->MENU_SLUG, array( $this, 'settings_page' ), '' , $this->POSITION );
    }

    public function menu_page() {
        // add_menu_page( $this->PAGE_TITLE, $this->MENU_TITLE, $this->CAPABILITY, $this->MENU_SLUG, array( $this, 'settings_page' ), plugin_dir_url( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/icon.svg' , $this->POSITION );
        add_menu_page( $this->PAGE_TITLE, $this->MENU_TITLE, $this->CAPABILITY, $this->MENU_SLUG, array( $this, 'settings_page' ), '' , $this->POSITION );
    }

    public function settings_sections() {
        require plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/settings.php';
    }

    public function settings_page() {
        if( file_exists( plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/view.php' ) ) {
            require plugin_dir_path( __DIR__ ) . 'ui/' . $this->MENU_SLUG  . '/view.php';
        }
    }
}