<?php

use Inc\Func;

if (empty($args)) {
    return;
}

?>

<div class="card-page card">
    <div class="card__body">
        <div class="card__header">
            <h3 class="card__title">
                <?php echo Func::schedule(); ?>
            </h3>
        </div>
        <?php echo Func::getLink($args, 'card__link'); ?>
    </div>
</div>
