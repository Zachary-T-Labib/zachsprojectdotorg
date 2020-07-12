<?php

require(__DIR__ . '/../config.php');

define('WEB_DIR', PROJ_ROOT . DIRSEP . 'web');

$path4 = WEB_DIR . DIRSEP . 'functions.php';
require $path4;

$first_word = "home";
$second_word = "three_word_string";

echo "The pascal case of {$first_word} is " . convert_snake_case_to_pascal_case($first_word) . "<br><br>";
echo "The pascal case of {$second_word} is " . convert_snake_case_to_pascal_case($second_word) . "<br><br>";