<?php
/**
 * Created by PhpStorm.
 * User: bvn-564
 * Date: 6/18/21
 * Time: 4:50 PM
 */

namespace ThemeOptions;


class Helpers
{
    static function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        die;
    }

    static function get_template_part_var($template, $data = [])
    {
        extract($data);
        require locate_template($template . '.php');
    }

    static function get($value, $keysDot, $default = null)
    {
        $keys = explode('.', $keysDot);

        foreach ($keys as $key) {
            $value = is_array($value) && array_key_exists($key, $value) ? $value[$key] : $default;
            if ($value === $default) break;
        }

        return $value;
    }

    static function importImageForGutenbergBlock($src)
    {
        echo '<img src="' . $src . '">';
    }


}
