<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}
?>

<div class="container">
    <div class="content-images">
        <?php echo Func::getField($row['title'], 'content-images__title-mobile', 'h2'); ?>
        <div class="content-images__img">
            <?php echo Func::getImg($row['img_front']); ?>
        </div>
        <div class="content-images__content">
            <?php echo Func::getField($row['title'], 'content-images__title', 'h2'); ?>
            <?php echo Func::getField($row['subtitle'], 'content-images__subtitle'); ?>
            <div class="content-card__link">
                <?php echo Func::getLink($row['link']); ?>
            </div>
        </div>
    </div>
    <?php if (!empty($row['img_bg'])): ?>
        <div class="img-bg"
             style="background-image: url(<?php echo Func::getImg($row['img_bg'], 'large', 'url'); ?>)">
        </div>
    <?php endif; ?>
</div>