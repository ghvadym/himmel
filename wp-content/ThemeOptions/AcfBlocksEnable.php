<?php

namespace ThemeOptions;


class AcfBlocksEnable
{
    public $blocks;

    public function __construct($blocks)
    {
        $this->blocks = $blocks;
        add_action('acf/init', [$this, 'register_acf_blocks']);
    }

    public function theme_acf_blocks_render_callback($block)
    {

        $slug = str_replace('acf/', '', $block['name']);
        $slug = str_replace('acf-block-', '', $slug);

        if (is_admin()) {
            Helpers::importImageForGutenbergBlock($block['example']['attributes']['data']['image']);
            return;
        }

        if (file_exists(get_theme_file_path("/templates/acf-blocks/acf-block-$slug.php"))) {
            include(get_theme_file_path("/templates/acf-blocks/acf-block-$slug.php"));
        }

    }

    public function register_acf_blocks()
    {
        if (!$this->blocks || !is_array($this->blocks)) {
            return;
        }
        foreach ($this->blocks as $key => $value) {
            acf_register_block_type(
                [
                    'name'            => $key,
                    'title'           => __($value['title']),
                    'description'     => __(''),
                    'render_callback' => [$this, 'theme_acf_blocks_render_callback'],
                    'category'        => 'acf_fx_blocks',
                    'icon'            => 'slides',
                    'keywords'        => ['image', 'title', 'text'],
                    'mode'            => 'edit',
                    'example'         => [
                        'attributes' => [
                            'mode' => 'preview',
                            'data' => [
                                'image' => $value['preview'],
                            ],
                        ],
                    ],
                ]
            );
        }
    }
}
