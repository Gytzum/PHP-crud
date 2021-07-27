<?php 
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
<?php 
    function redirect_to_root(){
        header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    }

    // Add new Project
    if(isset($_GET['create'])){
    $project = new Project;
    $project->setProjectName($_GET['create']);
    $em->persist($project);
    $em->flush();

    echo "Project created " . $project->getProjectName;
        redirect_to_root();
    }

    
?>
    
    <div style=" margin: 30px;">
        <form action="" method="GET">
            <label for="name" style="font-size: 30px;">Create new project</label> </br>
            <input type="text" type="text" style="width:300px; height:50px; font-size: 25px" placeholder="Enter name" name="create">
            <button class="btn" style="cursor: pointer; width:200px; height:50px;" type="submit">Submit</button>
        </form>
    </div>

</html>