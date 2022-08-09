<?php

namespace ThemeOptions;


class PostTaxonomy
{
    private $taxonomy;
    private $domain;
    private $postType;
    private $settings;

    public function __construct($taxonomy, $postType, $domain, $settings = [])
    {
        $this->taxonomy = $taxonomy;
        $this->domain = $domain;
        $this->postType = $postType;
        $this->settings = $settings;
        add_action('init', [$this, 'registerTaxonomy']);
    }

    protected function setLabels(): array
    {
        return [
            'labels' => [
                'name'          => __($this->taxonomy, $this->domain),
                'singular_name' => __($this->taxonomy, $this->domain),
                'search_items'  => 'Search ' . $this->taxonomy,
                'all_items'     => 'All ' . $this->taxonomy,
                'view_item '    => 'View ' . $this->taxonomy,
                'edit_item'     => 'Edit ' . $this->taxonomy,
                'update_item'   => 'Update',
                'add_new_item'  => 'Add ' . $this->taxonomy,
                'new_item_name' => 'Add ' . $this->taxonomy,
                'menu_name'     => __($this->taxonomy, $this->domain),
            ],
        ];
    }

    protected function setArgs(): array
    {
        $settings = [
            'description'  => '',
            'public'       => true,
            'hierarchical' => true,
            'has_archive'  => true,
            'show_in_rest' => true,
        ];
        return array_merge($settings, $this->settings);
    }

    public function registerTaxonomy()
    {
        $args = array_merge($this->setLabels(), $this->setArgs());
        register_taxonomy(sanitize_title($this->taxonomy), $this->postType, $args);
    }

}
