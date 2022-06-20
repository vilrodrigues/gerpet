<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {

    case '':
    case '/gerpet/':
        require __DIR__ . '/src/views/home.php';
        break;

    case '/gerpet/home':
        require __DIR__ . '/src/views/home.php';
        break;

    case '/gerpet/users':
        require __DIR__ . '/src/views/users.php';
        break;

    case '/gerpet/register':
        require __DIR__ . '/src/views/register.php';
        break;
    
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/not-found.php';
        break;
}