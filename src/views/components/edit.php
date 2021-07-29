<?php

use Models\Project;
use Models\Employee;
ob_start();
include_once "bootstrap.php";

?>
<style>
    <?php include 'assets/styles/edit.css';
     ?>
</style>

<?php
if (isset($_GET['edit'])) {
    require_once 'header.php';
    require_once 'create.php';
    require_once 'table.php';

    $request = explode('=', $_SERVER['REQUEST_URI']);
    $table = str_contains($request[0], 'project') ? 'Project':'Employee';
    $placeholder = $entityManager->getRepository('Models\\'.$table.'')->find($_GET['edit']);

    if(isset($_POST['update']) and !empty($_POST['update'])){
        $nameToUpdate = $entityManager->find('Models\\'.$table.'', $_GET['edit']);
        $nameToUpdate->setName($_POST['update']);
        $entityManager->flush();
        redirect_to_root();
    }

    if(isset($_POST['assign'])){
        $employee = $entityManager->find('Models\Employee', $_GET['edit']);
        $project = $entityManager->getRepository('Models\Project')->findBy(array('name' => $_POST['assign']));
        $employee->setProject($project[0]);
        $entityManager->flush();
        redirect_to_root();
    }
    print('
            <div style=" margin:30px 30px 30px 200px; display:flex;">
                <form action="" method="POST">
                    <label style="font-size: 30px;" for="name" >Change '.strtolower($table).' name</label> </br>
                    <input style="width:300px; height:50px; font-size: 25px" type="text" type="text" placeholder="'.$placeholder->getName().'" name="update">
                    <button class="btn" type="submit">Submit</button>
                </form>
        ');
        if($request[0] == '/employees?edit' or $request[0] == '/?edit'){
            $projects = $entityManager->getRepository('Models\Project')->findAll();
            echo '<form style = "margin-left:100px"action="" method = "post">
                <label style="font-size: 30px;" for="assign">Choose project to assign employee</label></br>
                    <select style="width:300px; height:50px; font-size: 25px" name="assign">';
            foreach($projects as $project){echo '<option style="width:300px; height:50px; font-size: 25px">'.$project->getName().'</option>';}   
                echo '</select>
                    <button class="btn" type="submit">Assign</button>
                </form>
            </div>';
    }
}
?>


    
