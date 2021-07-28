<?php
// $request = $_SERVER['REQUEST_URI'];
$request = explode('=', $_SERVER['REQUEST_URI']);


switch ($request[0]) {
    case '/' :
        require __DIR__ . '/src/views/employees.php';
        break;
    case '' :
        require __DIR__ . '/src/views/employees.php';
        break;
    case '/employees' :
        require __DIR__ . '/src/views/employees.php';
        break;
    case '/projects' :
        require __DIR__ . '/src/views/projects.php';
        break;
        case '/employees?delete' or  '/projects?delete':
            require __DIR__ . '/src/views/components/delete.php';
            break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
