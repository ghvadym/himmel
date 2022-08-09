<?php
$fields = get_fields('options');
?>

</main>
<footer class="site-footer">
    <div class="footer">
        <div class="footer__menu">
            <?php if (!empty($fields['footer_hours_list'])): ?>
                <div class="footer__col">
                    <div class="footer__hours">
                        <div class="footer-title">
                            <?php echo !empty($fields['footer_hours_title']) ? $fields['footer_hours_title'] : __('Opening hours', 'himmel'); ?>
                        </div>
                        <ul class="hours__list">
                            <?php foreach ($fields['footer_hours_list'] as $item): ?>
                                <li class="hours__item">
                                        <span class="hours__title">
                                            <?php echo $item['title']; ?>
                                        </span>
                                    <span class="hours__text">
                                            <?php echo $item['text']; ?>
                                        </span>
                                    <?php ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('template-parts/widgets/widget', 'contact'); ?>

            <div class="footer__col">
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-footer',
                    'menu_class'     => 'footer__nav',
                ]);
                ?>
            </div>
        </div>
        <?php if (!empty($fields['footer_notice_text'])): ?>
            <div class="footer__note">
                <?php echo $fields['footer_notice_text']; ?>
            </div>
        <?php endif; ?>
        <?php if (function_exists('the_custom_logo') && has_custom_logo()) the_custom_logo(); ?>
    </div>
    <div id="scroll-top" class="scroll-top">
        <?php _e('To the top', 'himmel'); ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
