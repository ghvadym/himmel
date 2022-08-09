<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}
?>

<div class="container">
    <div class="read-more">
        <?php echo Func::getField($row['title'], 'read-more__title', 'h2'); ?>
        <?php if (!empty($row['links'])): ?>
            <div class="read-more__row">
                <?php foreach ($row['links'] as $link):
                    echo Func::getLink($link['link'], 'read-more__link link-underline');
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
