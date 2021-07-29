<?php

use Models\Project;
use Models\Employee;
include_once "bootstrap.php";
?>

<style>
    <?php include 'assets/styles/create.css';
    ?>
</style>

<?php
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}
$request = explode('=', $_SERVER['REQUEST_URI']);
$table = str_contains($request[0], 'project') ? 'Project' : 'Employee';

// Add new Project or employee
if (isset($_POST['create']) and !empty($_POST['create'])) {
    if ($_SERVER['REQUEST_URI'] == '/projects') 
        $name = new Project;
    else 
        $name = new Employee;

    $name->setName($_POST['create']);
    $entityManager->persist($name);
    $entityManager->flush();
    redirect_to_root();
}

//Create form
?>
<div style=" margin:30px 30px 30px 200px;">
    <form action="" method="POST">
        <label for="name" style="font-size: 30px;">Create new<?php echo ' ' . strtolower($table) ?></label> </br>
        <input type="text" type="text" style="width:300px; height:50px; font-size: 25px" placeholder="Enter name" name="create">
        <button class="btn" type="submit">Submit</button>
    </form>
</div>
