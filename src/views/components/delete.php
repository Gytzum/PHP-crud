<?php 

use Models\Project;
use Models\Employee;
include_once "bootstrap.php";

// Delete Functionality
$request = explode('=', $_SERVER['REQUEST_URI']);
if(isset($_GET['delete'])){
    echo $request;
    if ($request[0] == '/projects?delete'){
        $table = 'Models\Project';
    }else $table = 'Models\Employee';
    $record = $entityManager->find($table, $_GET['delete']);
    $entityManager->remove($record);
    $entityManager->flush();
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}