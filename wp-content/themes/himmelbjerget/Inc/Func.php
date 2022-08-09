<?php

namespace Inc;

class Func
{
    static function getField($field, string $class = '', string $tag = 'div'): string
    {
        if (empty($field)) {
            return '';
        }

        if ($class) {
            $class = sprintf(' class="%s"', $class);
        }

        return sprintf('<%1$s%2$s>%3$s</%1$s>', $tag, $class, $field);
    }

    static function getLink($field, string $class = 'link-underline'): string
    {
        if (empty($field)) {
            return '';
        }

        if (empty($title = $field['title'])) {
            return '';
        }

        $url = !empty($field['url']) ? $field['url'] : '/';
        $target = !empty($field['target']) ? 'target="' . $field['target'] . '"' : '';
        $class = !empty($class) ? 'class="' . $class . '"' : '';

        return '<a href="' . $url . '" ' . $class . $target . '>' . $title . '</a>';
    }

    static function getImg($id, string $size = 'thumbnail', string $format = '', string $class = ''): string
    {
        if (empty($id)) {
            return '';
        }

        $image = wp_get_attachment_image($id, $size, '', ['class' => $class]);

        if (!$image) {
            $defaultImageId = get_field('default_image', 'options');
            return wp_get_attachment_image($defaultImageId, $size) ?: '';
        }

        if ($format === 'url') {
            return wp_get_attachment_image_url($id, $size);
        }

        return $image;
    }

    static function getPosts(array $args = []): array
    {
        $args =  array_merge([
            'post_type'   => 'post',
            'numberposts' => 3,
            'orderby'     => 'date',
            'order'       => 'desc',
        ], $args);

        return get_posts($args);
    }

    static function cutStr(string $text, int $limit = 100): string
    {
        $plainText = trim(strip_tags($text));
        $clearText = str_replace('&nbsp;', '', $plainText);
        return strlen($clearText) > $limit ? mb_substr($clearText, 0, $limit, 'utf-8') . '...' : $clearText;
    }

    static function schedule()
    {
        $holiday = get_field('sch_holiday', 'options');
        if ($holiday) {
            return $holiday;
        }

        date_default_timezone_set('Europe/Stockholm');
        $date = strtolower(date('l'));

        $dateField = get_field('sch_' . $date, 'options');

        return !empty($dateField) ? $dateField : __('The tower is open today', 'himmel');
    }

    static function thumb(int $pageId = null, string $size = 'thumbnail', string $format = 'array'): string
    {
        if (!has_post_thumbnail($pageId)) {
            $defaultImageId = get_field('default_image', 'options');

            if ($format === 'url') {
                return wp_get_attachment_image_url($defaultImageId, $size) ?: '';
            }

            return wp_get_attachment_image($defaultImageId, $size) ?: '';
        }

        if ($format === 'url') {
            return get_the_post_thumbnail_url($pageId, $size);
        }

        return get_the_post_thumbnail($pageId, $size);
    }

    static function strWithDashes(string $str = ''): string
    {
        if (!$str) {
            return '';
        }

        $stringLat = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        return sanitize_title_with_dashes($stringLat);
    }
}