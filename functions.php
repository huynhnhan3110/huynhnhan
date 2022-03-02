<?php
/**
 @ Khai bao hang gia tri
    @ THEME_URL = lay duong dan thu muc theme
    @ CORE = lay duong dan cua thu muc /core
**/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . "/core");

/**
    @ Nhung file /core/init.php
**/
require_once(CORE . "/init.php");
/**
    @ Thiet lap chieu rong noi dung
**/
if( !isset($content_width)) {
    $content_width = 620;
}
/**
    @ Khai bao chuc nang cua theme
**/
if( !function_exists('huynhnhan_theme_setup')) {
    function huynhnhan_theme_setup() {
        // Thiet lap text domain
        $language_folder = THEME_URL . "/languages";
        load_theme_textdomain('huynhnhan', $language_folder);

        //  Tu them RSS len the head
        add_theme_support('automatic-feed-links');

        // Them post thumnail
        add_theme_support('post-thumbnails');

        // Post format
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'link',
            'quote',
        ));

        // Tu dong them title tag
        add_theme_support('title-tag');

        // Custom background
        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support('custom-background', $default_background);

        // Them menu
        register_nav_menu('primary-menu', __('Primary Menu', 'huynhnhan'));

        // Tao sidebar
        $sidebar = array(
            'name' => __('Main Sidebar', 'huynhnhan'),
            'id' => 'main-sidebar',
            'description' => __('Default Sidebar'),
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        );
        register_sidebar($sidebar);
    }
    add_action('init', 'huynhnhan_theme_setup');
}
