<?php

use Inc\Func;

$row = get_row('name');

if (empty($row)) {
    return;
}

$maxWidth = $row['full_width'] ? '' : ' max-width';
$separator = $row['add_separator'] ? ' separator' : '';
$alignCenter = $row['align_center'] ? ' align-center' : '';
?>

<div class="container">
    <div class="content-editor<?php echo $maxWidth . $separator . $alignCenter; ?>">
        <?php echo Func::getField($row['text'], 'editor-text'); ?>
    </div>
</div>
