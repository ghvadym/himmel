<?php
/**
 * Created by PhpStorm.
 * User: bvn-564
 * Date: 6/18/21
 * Time: 4:46 PM
 */

namespace ThemeOptions;


class Options
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'theme_setup']);
        add_filter('block_categories_all', [$this, 'addCustomCategoryToBlocksCategories'], 10, 2);
        add_filter('upload_mimes', [$this, 'upload_allow_types']);
        $this->addOptionPage();
    }

    public function theme_setup()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('html5');
    }

    function upload_allow_types($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['webp'] = 'image/webp';

        return $mimes;
    }

    public function addOptionPage()
    {
        if (function_exists('acf_add_options_page')) {

            acf_add_options_page([
                'page_title' => 'Theme General Settings',
                'menu_title' => 'Theme Settings',
                'menu_slug'  => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect'   => false,
            ]);

        }
    }


    public function addCustomCategoryToBlocksCategories($categories): array
    {
        return array_merge(
            [
                [
                    'slug'  => 'acf_fx_blocks',
                    'title' => __('Acf FX Blocks', 'acf'),
                    'icon'  => null,
                ],
            ],
            $categories
        );
    }

}
