<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}
?>

<div class="container">
    <?php echo Func::getField($row['title'], 'person-cards__title', 'h2'); ?>
    <?php if (!empty($row['cards'])): ?>
        <div class="person-board">
            <?php foreach ($row['cards'] as $card): ?>
                <div class="person-board__item">
                    <div class="person-board__head">
                        <?php if ($card['name']):
                            $count = $card['count'] ? '<span>('.$card['count'].')</span>' : ''; ?>

                            <h3 class="person-board__title">
                                <?php echo $card['name'] . $count; ?>
                            </h3>
                        <?php endif;

                        echo Func::getField($card['job'], 'person-board__subtitle', 'strong'); ?>
                    </div>
                    <?php echo Func::getField($card['text'], 'person-board__body'); ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
