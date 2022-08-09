<?php

use Inc\Func;

$fields = get_fields('options');

if (empty($fields['widget_text'])) {
    return;
}
?>

<div class="footer__col">
    <div class="widget__contact">
        <?php
        echo Func::getField($fields['widget_title'], 'widget__title');
        echo Func::getField($fields['widget_text'], 'widget__text');

        if (!empty($fields['widget_social'])): ?>
            <div class="widget__social">
                <?php foreach ($fields['widget_social'] as $item): ?>
                    <a href="<?php echo $item['link'] ?: '/'; ?>" class="social_item" target="_blank">
                        <?php echo Func::getImg($item['img']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>