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

<?php 
    function redirect_to_root(){
        header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    }

    // Add new Project or employee
    if(isset($_POST['create']) and !empty($_POST['create'])){

        if($_SERVER['REQUEST_URI'] == '/projects')
            $name = new Project;
        else $name = new Employee;

        $name->setName($_POST['create']);
        $entityManager->persist($name);
        $entityManager->flush();
        redirect_to_root();
    }

    
?>
    
    <div style=" margin: 30px;">
        <form action="" method="POST">
            <label for="name" style="font-size: 30px;">Create new TODO</label> </br>
            <input type="text" type="text" style="width:300px; height:50px; font-size: 25px" placeholder="Enter name" name="create">
            <button class="btn" style="cursor: pointer; width:200px; height:50px;" type="submit">Submit</button>
        </form>
    </div>



</html>