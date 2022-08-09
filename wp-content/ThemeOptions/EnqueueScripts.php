<?php
/**
 * Created by PhpStorm.
 * User: bvn-564
 * Date: 6/18/21
 * Time: 4:00 PM
 */

namespace ThemeOptions;


class EnqueueScripts
{
    public $arrStyles;
    public $arrScripts;

    public function __construct($arrStyles, $arrScripts)
    {
        $this->arrScripts = $arrScripts;
        $this->arrStyles = $arrStyles;
        add_action('admin_enqueue_scripts', [$this, 'my_admin_style']);
        add_action('wp_enqueue_scripts', [$this, 'custom_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'custom_styles']);
        add_action('wp_enqueue_scripts', [$this, 'ajaxUrl']);
    }

    public function custom_styles()
    {
        if (!$this->arrStyles) {
            return;
        }

        foreach ($this->arrStyles as $key => $value) {
            wp_enqueue_style($key, $value, '', time());
        }
    }


    public function custom_scripts()
    {
        wp_enqueue_script("jquery");

        if (!$this->arrScripts) {
            return;
        }

        foreach ($this->arrScripts as $key => $value) {

            wp_enqueue_script($key, $value['url'], $value['connection'], time(), true);

        }
    }

    public function ajaxUrl()
    {
        wp_localize_script('app-script', 'filters_ajax',
            [
                'url'       => admin_url('admin-ajax.php'),
                'theme_uri' => get_template_directory_uri(),
            ]
        );
    }

    public function my_admin_style()
    {
        wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dest/style-admin.css');
    }

}
