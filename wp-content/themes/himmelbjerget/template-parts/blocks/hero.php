<?php

use Inc\Func;

$id = get_the_ID();
$fields = get_fields($id);
$imgLarge = Func::thumb($id, 'large', 'url');
$imgMedium = Func::thumb($id, 'medium', 'url');
$imgMobId = get_field('hero_mob_img', $id) ?: 0;
$imgMob = !empty($imgMobId) ? Func::getImg($imgMobId, 'hero-mobile', 'url') : $imgMedium;

$notFoundImgId = get_field('404_image', 'options') ?: 0;
$notFoundImgMobId = get_field('404_image_mob', 'options') ?: 0;
$notFoundImgLarge = Func::getImg($notFoundImgId, 'large', 'url');
$notFoundImgMedium = Func::getImg($notFoundImgId, 'medium', 'url');
$notFoundImgMob = Func::getImg($notFoundImgMobId, 'hero-mobile', 'url');

$videoAdded = ((isset($fields['add_video']) && $fields['add_video']) && $fields['hero_video']) ? ' video-added' : '';
?>

<section class="block-hero<?php echo $videoAdded; ?>">
    <div class="block-hero__body">
        <?php if (isset($fields['add_bg_color']) && $fields['add_bg_color']):
            $bgColor = $fields['hero_bg_color'] ?: 'rgba(0,0,0,1)'; ?>
            <div class="hero-bg"
                 style="background: linear-gradient(180deg, <?php echo $bgColor; ?> 0%, rgba(0,0,0,0) 100%);">
            </div>
        <?php endif; ?>

        <?php if (is_404()): ?>

            <picture>
                <source media="(min-width:1024px)" srcset="<?php echo $notFoundImgLarge; ?>">
                <source media="(min-width:768px)" srcset="<?php echo $notFoundImgMedium; ?>">
                <img src="<?php echo $notFoundImgMob; ?>" alt="Hero Image">
            </picture>

        <?php elseif ((isset($fields['add_video']) && $fields['add_video']) && $fields['hero_video']): ?>

            <div class="block-hero__video">
                <video class="video-item" playsinline autoplay loop muted width="100%" height="100%">
                    <source src="<?php echo $fields['hero_video']; ?>">
                </video>
            </div>

        <?php else: ?>

            <picture>
                <source media="(min-width:1024px)" srcset="<?php echo $imgLarge; ?>">
                <source media="(min-width:768px)" srcset="<?php echo $imgMedium; ?>">
                <img src="<?php echo $imgMob; ?>" alt="Hero Image">
            </picture>

        <?php endif; ?>
    </div>
    <div class="block-hero__degrees">
        <span id="hero-degrees">6,4</span><span>º</span>
    </div>
</section>