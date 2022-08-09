<?php

use Inc\Func;

$row = get_row('name');

if (empty($row) || empty($row['slider'])) {
    return;
}
?>

<div class="container">
    <div class="swiper content-slider">
        <div class="swiper-wrapper">
            <?php foreach ($row['slider'] as $slide): ?>
                <div class="swiper-slide">
                    <div class="content-slider__item">
                        <?php echo Func::getImg($slide, 'large'); ?>
                        <small class="content-slider_caption">
                            <?php echo wp_get_attachment_caption($slide); ?>
                        </small>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
    </div>
</div>