<?php
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
    case '/employees?delete':
        require __DIR__ . '/src/views/components/delete.php';
        break;
        case '/?delete':
            require __DIR__ . '/src/views/components/delete.php';
            break;
    case '/projects?delete':
        require __DIR__ . '/src/views/components/delete.php';
        break;
    case '/employees?edit':
        require __DIR__ . '/src/views/components/edit.php';
        break;
    case '/?edit':
        require __DIR__ . '/src/views/components/edit.php';
        break;
    case '/projects?edit':
        require __DIR__ . '/src/views/components/edit.php';
        break;               
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}
