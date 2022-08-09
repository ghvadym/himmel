<?php
get_header();
?>

    <div class="container">
        <section class="section">
            <div class="not-found">
                <h1><?php _e('404 Not Found', 'himmel') ?></h1>
                <p><?php _e('It looks like nothing was found at this location.', 'himmel'); ?></p>
                <p>
                    <a href="<?php echo get_bloginfo('url'); ?>" class="link-underline">
                        <?php _e('Go to Homepage', 'himmel') ?>
                    </a>
                </p>
            </div>
        </section>
    </div>

<?php
get_footer();
