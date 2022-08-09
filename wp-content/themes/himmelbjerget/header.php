<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="header">
            <?php if (function_exists('the_custom_logo') && has_custom_logo()) the_custom_logo(); ?>

            <div id="main-menu" class="header__nav">
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-header',
                    'menu_class'     => 'nav__list',
                ]);
                ?>

                <?php get_template_part('template-parts/widgets/widget', 'contact'); ?>

                <div id="menu-close" class="header__close">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="menu-burger" class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
<main class="main-content">
    <?php get_template_part('template-parts/blocks/hero'); ?>