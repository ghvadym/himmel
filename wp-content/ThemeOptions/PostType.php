<?php

namespace ThemeOptions;

class PostType
{
    private $name;
    private $domain;
    private $settings;


    public function __construct($postTypeName, $domain, $settings = [])
    {
        $this->name = $postTypeName;
        $this->domain = $domain;
        $this->settings = $settings;
        add_action('init', [$this, 'registerPostType']);
    }

    protected function setLabels(): array
    {
        return [
            'labels' => [
                'name'               => __($this->name, $this->domain),
                'singular_name'      => __($this->name, $this->domain),
                'add_new'            => __('Add Item', $this->domain),
                'add_new_item'       => __('Add Item', $this->domain),
                'edit_item'          => __('Edit Item', $this->domain),
                'new_item'           => __('New Item', $this->domain),
                'view_item'          => __('View Item', $this->domain),
                'search_items'       => __('Search Item', $this->domain),
                'not_found'          => 'Not found',
                'not_found_in_trash' => 'Not found in trash',
                'parent_item_colon'  => '',
                'menu_name'          => __($this->name, $this->domain),
            ],
        ];
    }

    protected function setArgs(): array
    {
        $settings = [
            'public'        => true,
            'menu_position' => 20,
            'menu_icon'     => 'dashicons-hammer',
            'hierarchical'  => false,
            'show_in_rest'  => true,
            'supports'      => ['title', 'thumbnail', 'editor', 'author'],
            'has_archive'   => false,
        ];
	    return array_merge($settings, $this->settings);
    }

    public function registerPostType()
    {
        $args = array_merge($this->setLabels(), $this->setArgs());
        register_post_type(sanitize_title($this->name), $args);
    }
}
