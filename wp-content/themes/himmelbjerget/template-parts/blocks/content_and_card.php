<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}

$titleTag = $row['main_title'] ? 'h1' : 'h2';
?>

<div class="container">
    <div class="content-card">
        <div class="content-card__text">
            <?php echo Func::getField($row['title'], 'title', $titleTag); ?>
            <?php echo Func::getField($row['subtitle'], 'content-card__subtitle'); ?>
            <?php if ($row['link']): ?>
                <div class="content-card__link">
                    <?php echo Func::getLink($row['link']); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="content-card__card">
            <?php get_template_part('template-parts/cards/card', 'page', $row['card_link']); ?>
        </div>
    </div>
</div>
