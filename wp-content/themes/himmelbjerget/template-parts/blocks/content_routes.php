<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}
?>

<div class="container">
    <div class="content-routes">
        <?php if (!empty($row['routes'])): ?>
            <div class="content-routes__body">
                <?php foreach ($row['routes'] as $route): ?>
                    <div class="route__col">
                        <?php if (!empty($route['list'])):
                            echo Func::getField($route['title'], 'route__title', 'h2');

                            foreach ($route['list'] as $item): ?>
                                <div class="route__item">

                                    <div class="route__name">
                                        <?php echo Func::getField($item['title'], 'route__item_title'); ?>
                                        <?php echo Func::getField($item['subtitle'], 'route__item_subtitle'); ?>
                                    </div>

                                    <?php if (!empty($item['link'])):
                                        $title = !empty($row['link_title']) ? $row['link_title'] : __('Get the card', 'himmel');
                                        $filename = !empty($item['title']) ? trim($item['title']) : __('Himmelbjerget', 'himmel'); ?>

                                        <a href="<?php echo $item['link']; ?>"
                                           class="route__item_link link-underline" download="<?php echo __('Route ') . $filename; ?>">
                                            <?php echo $title; ?>
                                        </a>

                                    <?php endif; ?>

                                </div>
                            <?php endforeach;

                        endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>