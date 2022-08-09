<?php

use Inc\Func;

if (empty($args)) {
    return;
}

if (have_rows('flex_content', $args)):
    while (have_rows('flex_content', $args)):
        the_row(); ?>
        <section class="section block-<?php echo str_replace('_', '-', get_row_layout()); ?>">
            <?php get_template_part('template-parts/blocks/' . get_row_layout()); ?>
        </section>
    <?php
    endwhile;
endif;
