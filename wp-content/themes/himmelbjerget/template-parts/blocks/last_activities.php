<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}

$activities = Func::getPosts([
    'numberposts'      => -1,
    'suppress_filters' => false
]);

$activitiesList = $row['activities_list'] ?: $activities;
?>

<div class="container">
    <div class="last-posts">
        <?php if ($row['add_head']): ?>
            <div class="last-posts__head">
                <?php echo Func::getField($row['title'], 'last-posts__title', 'h2'); ?>
                <?php echo Func::getLink($row['link']); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($activitiesList)): ?>
            <div class="last-posts__row">
                <?php foreach ($activitiesList as $activity): ?>
                    <div class="last-posts__item">
                        <?php get_template_part('template-parts/cards/card', 'post', $activity); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
