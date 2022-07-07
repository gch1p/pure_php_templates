<?php

set_include_path(
    get_include_path().PATH_SEPARATOR.realpath(__DIR__.'/..'));

error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($class) {
    $path = __DIR__.'/../lib/'.$class.'.php';
    if (is_file($path))
        require_once $path;
});

SkinContext::setRootDirectory(realpath(__DIR__.'/../skin'));

$skin = new Skin();
$skin->title = 'hello world!';

$cities = [
    'Moscow',
    'St. Petersburg',
    '<b>New York</b>' // potential xss
];
echo $skin->renderPage('main/index',
    name: "John",
    show_cities: true,
    cities: $cities);
