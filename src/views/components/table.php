<?php

use Models\Project;
use Models\Employee;

include_once "bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    <?php include 'assets/styles/table.css' ?>
</style>
<?php 
    // Functions
    // function redirect_to_root(){
    //     header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    // }
    // Delete Functionality
if(isset($_GET['delete'])){
    if ($_SERVER["REQUEST_URI"] == '/projects'){
        $table = 'Models\Project';
    }
    $record = $entityManager->find($table, $_GET['delete']);
    $entityManager->remove($record);
    $entityManager->flush();
    redirect_to_root();
}
?>
<table>
    <thead>
        <tr>
            <td>#</td>
            <td>Employees</td>
            <td>Projects</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>

        <?php

        //EMPLOYEES TABLE
        $count = 1;
        if ($_SERVER["REQUEST_URI"] == '/employees' or $_SERVER["REQUEST_URI"] == '/' or $_SERVER["REQUEST_URI"] == '') {
            $employees = $entityManager->getRepository('Models\Employee')->findAll();
            foreach ($employees as $employee)
                print("<tr>"
                        . "<td>" . $count++  . "</td>"
                        . "<td>" . $employee->getName() . "</td>"
                        . "<td></td>"
                        . "<td>
                            <a href=\"?delete={$employee->getId()}\">DELETE</a>
                            <a href=\"?edit={$employee->getId()}\">EDIT</a></td>"
                    . "</tr>");
        }


        //PROJECTS TABLE
        if ($_SERVER["REQUEST_URI"] == '/projects') {
            $projects = $entityManager->getRepository('Models\Project')->findAll();

            foreach ($projects as $project) {
                $projectId = $project->getId();
                $projectName = $project->getName();
                
                $name = '';
                $employees = $entityManager->getRepository('Models\Project')->find($projectId)->getEmployee();
                foreach ($employees as $employee) {
                    $name .= $employee->getName() . ", ";
                }
                print("<tr>"
                        . "<td>" . $count++ . "</td>"
                        . "<td>" . rtrim($name, ', ') . "</td>"
                        . "<td>" . $projectName . "</td>"
                        . "<td>
                            <a href=\"?delete={$projectId}\">DELETE</a>
                            <a href=\"?edit={$projectId}\">EDIT</a></td>"
                    . "</tr>");
            }
      
        }
        ?>
    </tbody>
</table>

</html>