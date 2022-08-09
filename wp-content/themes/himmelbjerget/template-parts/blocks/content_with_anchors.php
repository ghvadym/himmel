<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}

$titleTag = $row['main_title'] ? 'h1' : 'h2';
?>

<div class="content-anchors">
    <div class="container">
        <?php echo Func::getField($row['title'], 'title', $titleTag); ?>

        <?php if (!empty($row['items'])): ?>
            <div class="content-anchors__head">
                <?php foreach ($row['items'] as $item):
                    if (empty($item)) continue; ?>

                    <a href="<?php echo '#' . Func::strWithDashes($item['title']); ?>"
                       class="link-underline">
                        <?php echo $item['title']; ?>
                    </a>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php echo Func::getField($row['desc'], 'content-anchors__desc'); ?>
    </div>

    <?php if (!empty($row['items'])): ?>
        <div class="content-anchors__items">
            <?php foreach ($row['items'] as $item):
                $size = $item['big_img'] && !$item['single_text'] ? 'medium' : '';
                $alignCenter = $item['text_ver_center'] && !$item['single_text'] ? ' ai-center' : '';
                $alignRight = $item['align_right'] && !$item['single_text'] ? ' content-right' : '';
                ?>

                <div class="anchor__item<?php echo $alignRight; ?>">
                    <div class="anchor__body container <?php echo $alignCenter; ?>"
                         id="<?php echo Func::strWithDashes($item['title']); ?>">

                        <?php echo Func::getField($item['title'], 'anchor__title_mob', 'h2'); ?>

                        <?php if (!$item['single_text']): ?>
                            <div class="anchor__image <?php echo $size; ?>">
                                <?php echo wp_get_attachment_image($item['image'], $size); ?>
                                <small class="anchor__image_caption">
                                    <?php echo wp_get_attachment_caption($item['image']); ?>
                                </small>
                            </div>
                        <?php endif; ?>

                        <div class="anchor__content">
                            <?php echo Func::getField($item['title'], 'anchor__title', 'h2'); ?>
                            <?php echo Func::getField($item['desc'], 'anchor__desc'); ?>
                        </div>
                    </div>

                    <?php if ($item['add_bg'] && !empty($item['img_bg'])): ?>
                        <div class="img-bg"
                             style="background-image: url(<?php echo Func::getImg($item['img_bg'], 'large', 'url'); ?>)">
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>