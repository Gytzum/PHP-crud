<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/src/views/home.php';
        break;
    case '' :
        require __DIR__ . '/src/views/home.php';
        break;
    case '/about' :
        require __DIR__ . '/src/views/about.php';
        break;
    case '/contacts' :
        require __DIR__ . '/src/views/contacts.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
