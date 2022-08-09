<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}
?>

<div class="container">
    <div class="instagram-feeds">
        <?php echo Func::getField($row['title'], 'instagram-feeds__title', 'h2'); ?>
        <?php echo Func::getLink($row['link'], 'instagram-feeds__subtitle'); ?>

        <div class="instagram-feeds__gallery">
            <div class="swiper instagram-feeds__slider">
                <div id="insta-feeds" class="instagram-feeds__body swiper-wrapper start-position">

                </div>
            </div>
            <div class="swiper-button swiper-btn-next"></div>
            <div class="swiper-button swiper-btn-prev"></div>
        </div>

        <?php echo Func::getField($row['shortcode'], 'instagram-feeds__source'); ?>
    </div>

    <div class="instagram-lightbox">
        <div id="insta-lbox" class="instagram-lightbox__item">
            <!-- image -->
        </div>
        <span class="instagram-lightbox__close">
            <img src="<?php echo get_template_directory_uri() . '/dest/images/close.svg'; ?>">
        </span>
    </div>
</div>