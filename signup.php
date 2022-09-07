<!-- CREATE TABLE `notes`.`notes1` ( `sno` INT(11) NOT NULL AUTO_INCREMENT , `title` VARCHAR(30) NOT NULL , `description` TEXT NOT NULL , `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB; -->

<?php
session_start();
include 'connect.php';
$passerror=false;
$usererr=false;
$succ=false;
if(isset($_POST['username'])){
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    if($cpass==$pass){
        $sql="SELECT * FROM user WHERE username='$username'";
        $result=mysqli_query($uconn,$sql);
        $n=mysqli_num_rows($result);
        if($n==0){
            $hash=password_hash($pass,PASSWORD_DEFAULT);
            $insert="INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$hash');";
            
            $create="CREATE TABLE `t_$username` ( `sno` INT(11) NOT NULL AUTO_INCREMENT , `title` VARCHAR(30) NOT NULL , `description` TEXT  , `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB;";
            $result = mysqli_query($uconn,$insert);
            $r2=mysqli_query($nconn,$create);
            if($result && $r2){
                $succ=true;
            }
        }
        else{
            $usererr=true;
        }
    }
    else{
        $passerror=true;
    }

unset($_POST);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
    
    

<body>
    <?php
    include 'nav.php';
    ?>
    <?php 
            if($passerror){
                $er1='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Password Not same!</strong> Please enter same password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              echo $er1;
            }
            if($usererr){
                $er1='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Username already used!</strong> Please choose a different username.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              echo $er1;
            }
            if($succ){
                $er1='<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Account Created Successfully!</strong> Visit Login page to login.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              echo $er1;
            }
        ?>
    <div class="container">

          

        <h1 class="text-center mt-4 display-1">Sign Up Now!</h1>

        <form class="d-grid gap-2 col-6 mx-auto flx" action="signup.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control"  aria-describedby="emailHelp" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control"  name="pass">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control"  name="cpass">
            </div>
            <button type="submit" class="btn btn-outline-success mt-3">Sign In</button>
            <?php 
                if($succ){

                    echo '<a class="btn btn-primary mt-4" href="login.php" role="button">Login Here</a>';
                }
            ?>
            
        </form>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>