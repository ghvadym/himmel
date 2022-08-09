<?php

$isThemeOptionFolderExist = is_dir(WP_CONTENT_DIR . '/ThemeOptions/');

spl_autoload_register(function ($classname) use ($isThemeOptionFolderExist) {

    if (in_array($classname, get_declared_classes())) {
        return;
    }

    $wpPath = realpath(get_template_directory()) . DIRECTORY_SEPARATOR . $classname . '.php';

    if (includeClass($wpPath)) {
        return;
    }

    if (!$isThemeOptionFolderExist) {
        return;
    }

    $wpPath = realpath(get_template_directory() . '/../..') . DIRECTORY_SEPARATOR . $classname . '.php';
    includeClass($wpPath);
});

function includeClass(string $path): bool
{
    $wpPath = str_replace('\\', '/', $path);
    if (file_exists($wpPath)) {
        include_once $wpPath;
        return true;
    }
    return false;
}



