<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}

$defaultCardImg = get_field('default_person_card_img', 'options') ?: '';
?>

<div class="container">
    <?php echo Func::getField($row['title'], 'person-cards__title', 'h2'); ?>
    <?php if (!empty($row['cards'])): ?>

        <div class="person-cards">
            <?php foreach ($row['cards'] as $card): ?>
                <div class="person-card__item">
                    <div class="person-card__body">
                        <?php
                        if (!empty($card['img'])):
                            echo Func::getImg($card['img'], 'thumbnail', '', 'person-card__img');
                        else:
                            echo Func::getImg($defaultCardImg, 'thumbnail', '', 'person-card__img');
                        endif;

                        echo Func::getField($card['title'], 'person-card__title', 'h3');
                        echo Func::getField($card['subtitle'], 'person-card__subtitle');

                        if (!empty($card['email'])): ?>
                            <a href="mailto:<?php echo $card['email'] ?>" class="link-underline">
                                <?php echo $card['email']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>
