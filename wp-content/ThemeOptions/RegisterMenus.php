<?php


namespace ThemeOptions;


class RegisterMenus
{
    private $domain;
    private $names;
    private $menu;

    public function __construct($menu, $domain, $names = null)
    {
        $this->names = $names;
        $this->domain = $domain;
        $this->menu = $menu;
    }

    public function addAction()
    {
        add_action('after_setup_theme', [$this, 'registerMenu']);
    }

    public function registerMenu()
    {
        $mainArr = [];
        foreach ($this->names as $name) {
            $mainArr[sanitize_title($name)] = esc_html__($name, $this->domain);
        }
        register_nav_menus($mainArr);
    }

    public function insertMenu()
    {
        wp_nav_menu(
            [
                'theme_location' => sanitize_title($this->menu),
                'menu'           => $this->menu,
                'container'      => 'ul',
                'menu_class'     => 'main-navigation__list__' . sanitize_title($this->menu),
                'menu_id'        => 'main-navigation-wrap__' . sanitize_title($this->menu),
            ]);
    }

}
