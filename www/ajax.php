<?php declare(strict_types=1);

session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $lang = trim(filter_input(INPUT_POST, 'value'));
    $lang = $lang ?? 'pt';
    $messages = file_get_contents(__DIR__ . "/../messages/$lang.json");

    header('Content-type: application/json');
    echo $messages;
}