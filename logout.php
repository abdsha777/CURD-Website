<?php
session_start(); 
if(isset($_POST['logout'])){
    session_destroy();
    header("location: login.php");
    }
?>  

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Logout</title>
</head>

<body>
    <?php
    include 'nav.php';
    ?>

    <form class="d-grid gap-2 col-6 mx-auto flx" action="" method="POST">
        <h1 class="text-center mt-4 display-2">Do You Want to Log Out</h1>
        <button type="submit" name="logout" class="btn btn-outline-danger mt-4 btn-lg">Log In</button>


    </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>