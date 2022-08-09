<?php

use Inc\Func;

$row = get_row('name');

if (empty($row) || !$row['page']) {
    return;
}

$page = get_post($row['page']);

$alignRight = $row['align_right'] ? ' align-right' : '';
$addBg = $row['add_bg'] ? ' bg-grey' : '';
$addImg = $row['add_img'] || '';
?>

<div class="container">
    <div class="big-card<?php echo $addBg; ?>">
        <div class="big-card__body<?php echo $alignRight; ?>">
            <div class="big-card__img">
                <?php echo Func::thumb($page->ID); ?>
            </div>
            <div class="big-card__content">
                <h2 class="big-card__title">
                    <?php echo $row['title'] ?: $page->post_title; ?>
                </h2>
                <div class="big-card__desc">
                    <?php echo $row['desc'] ?: Func::cutStr($page->post_content, 200); ?>
                </div>
                <a href="<?php echo get_the_permalink($page->ID) ?>" class="big-card__link link-underline">
                    <?php echo $row['link_text'] ?: __('See more', 'himmel'); ?>
                </a>
            </div>
        </div>
        <?php if ($addImg) {
            if (!empty($row['img_bg'])):
                echo Func::getImg($row['img_bg'], 'large');
            else:
                echo Func::getImg(get_field('default_big_card_bg', 'options'), 'large');
            endif;
        } ?>
    </div>
</div>
