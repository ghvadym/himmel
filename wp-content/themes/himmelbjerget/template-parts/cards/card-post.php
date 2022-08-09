<?php

use Inc\Func;

if (empty($args)) {
    return;
}

$category = get_the_category($args->ID)[0] ?? [];
$link = get_the_permalink($args->ID);
?>

<div class="card-post card">
    <div class="card__body">
        <div class="card__header">
            <?php if (!empty($category)): ?>
                <a href="<?php echo '/' . $category->slug . '/'; ?>" class="card__cat">
                    <?php echo $category->name; ?>
                </a>
            <?php endif; ?>
            <?php echo Func::getField(Func::cutStr($args->post_title, 80), 'card__title', 'h3'); ?>
        </div>
        <a href="<?php echo $link; ?>" class="card__link">
            <?php _e('Read more', 'himmel') ?>
        </a>
    </div>
</div>
