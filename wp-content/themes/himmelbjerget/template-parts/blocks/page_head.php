<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}
?>

<div class="container">
    <div class="page-head">
        <?php echo Func::getField($row['title'], 'main-title', 'h1'); ?>
        <?php echo Func::getField($row['subtitle'], 'subtitle'); ?>
        <?php echo Func::getField($row['text'], 'editor-text'); ?>
    </div>
</div>


