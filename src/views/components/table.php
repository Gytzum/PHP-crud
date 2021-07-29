<?php


include_once "bootstrap.php";
?>

<style>
    <?php include 'assets/styles/table.css' ?>
</style>

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
    $request = explode('=', $_SERVER['REQUEST_URI']);
    
    //EMPLOYEES TABLE
    $count = 1;

    //PROJECTS TABLE
    if ($request[0]  == '/projects' or $request[0] == '/projects?edit') {
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
                        <a class = \"btn-del\" href=\"?delete={$projectId}\">DELETE</a>
                        <a class = \"btn-edit\" href=\"?edit={$projectId}\">EDIT</a></td>"
                . "</tr>");
        }
    }

        //Employee TABLE
        if ($request[0] == '/employees' or $request[0] == '/employees?edit' or $request[0] == '/?edit' or $request[0]=='/' ) {
            $employees = $entityManager->getRepository('Models\Employee')->findAll();
    
            foreach ($employees as $employee) {   
                $employeeId= $employee->getId();
                     print("<tr>"
                        . "<td>" . $count++ . "</td>"
                        . "<td>" . $employee->getName() . "</td>"
                        . "<td></td>"
                        . "<td>
                            <a class = \"btn-del\" href=\"?delete={$employeeId}\">DELETE</a>
                            <a class = \"btn-edit\" href=\"?edit={$employeeId}\">EDIT</a></td>"
                    . "</tr>");        
                }
                
            }
        
    ?>
    </tbody>
</table>
