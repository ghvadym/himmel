<?php

use ThemeOptions\PostType;
use ThemeOptions\EnqueueScripts;
use ThemeOptions\Options;
use ThemeOptions\AcfBlocksEnable;
use ThemeOptions\RegisterMenus;
use ThemeOptions\PostTaxonomy;


class Theme
{
    static function init()
    {
        self::autoload();
        self::registerThemeSettings();
        self::initThemeMethods();
    }

    static function autoload()
    {
        require_once(realpath(get_template_directory()) . '/Inc/loader.php');
    }

    static function registerThemeSettings()
    {
        new EnqueueScripts(self::themeStyles(), self::themeScripts());
        new Options();
    }

    static function initThemeMethods()
    {
        self::addCustomPostType();
        self::addCustomTaxonomy();
        self::registerMenu();
        self::addImageSizes();
        self::imageSettings();
        self::customThemeHooks();
    }

    static function customThemeHooks()
    {
        self::actions();
        self::filters();
    }

    static function actions()
    {
        add_action('admin_menu', [self::class, 'adminMenuSettings']);
        add_action('after_setup_theme', [self::class, 'setupThemeSettings']);
        add_action('init', [self::class, 'initSettings']);
    }

    static function filters()
    {
        add_filter('acf/format_value/type=text', 'do_shortcode');
        add_filter('show_admin_bar', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');
    }

    static function themeStyles(): array
    {
        return [
            'app-style'     => get_template_directory_uri() . '/dest/css/app.css',
            'swiper-bundle' => get_template_directory_uri() . '/dest/css/swiper-bundle.min.css',
        ];
    }

    static function themeScripts(): array
    {
        return [
            'app-script'           =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/app.js',
                    'connection' => ['jquery'],
                ],
            'app-script-slider'    =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/swiper-bundle.min.js',
                    'connection' => ['jquery'],
                ],
            'slider-class'         =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/inc/Slider.js',
                    'connection' => ['app-script-slider'],
                ],
            'animation-class'      =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/inc/Animation.js',
                    'connection' => ['gsap', 'gsap-scroll-trigger'],
                ],
            'gsap'                 =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/gsap.min.js',
                    'connection' => ['jquery'],
                ],
            'gsap-scroll-trigger'  =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/libraries/ScrollTrigger.min.js',
                    'connection' => ['jquery'],
                ],
            'app-jquery-script'    =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/app_jquery.js',
                    'connection' => ['jquery', 'slider-class'],
                ],
            'app-animation-script' =>
                [
                    'url'        => get_template_directory_uri() . '/assets/js/app_animation.js',
                    'connection' => ['animation-class'],
                ],
        ];
    }

    static function initSettings()
    {
        unregister_taxonomy_for_object_type('post_tag', 'post');
        remove_post_type_support('page', 'editor');
        remove_post_type_support('post', 'editor');
    }

    static function setupThemeSettings()
    {
        add_theme_support('custom-logo', [
            'unlink-homepage-logo' => true,
        ]);
    }

    static function adminMenuSettings()
    {
        remove_menu_page('edit-comments.php');
    }

    static function addCustomPostType()
    {

    }

    static function addCustomTaxonomy()
    {
        new PostTaxonomy('Taxonomy name', 'post-type-name', basename(__DIR__));
    }


    static function registerMenu()
    {
        $menuArray = ['Main Header', 'Main Footer'];
        $registerAllMenuItems = new RegisterMenus('', basename(__DIR__), $menuArray);
        $registerAllMenuItems->addAction();
    }

    static function addImageSizes()
    {
        add_image_size('hero-mobile', 400, 800, true);
    }

    static function imageSettings()
    {
        $sizes = [
            'medium_crop',
            'large_crop',
        ];

        foreach ($sizes as $size) {
            $option = get_option($size);

            if (!$option) {
                add_option($size, '1');
                continue;
            }

            if ($option !== '1') {
                update_option($size, '1');
            }
        }
    }
}


Theme::init();


