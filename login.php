<?php
session_start();
include 'connect.php';
?>
<?php
$dexist = false;
$passwrong = false;
$succ = false;
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($uconn, $sql);
    $n = mysqli_num_rows($result);
    if ($n == 0) {
        $dexist = true;
    } else {
        $arr = mysqli_fetch_assoc($result);
        if (password_verify($pass, $arr['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
            header("location: index.php");
        } else {
            $passwrong = true;
        }
    }


    unset($_POST);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <?php
    if ($dexist) {
        $er1 = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Wrong Username!</strong> Please enter a correct Username or <a href="signup.php">Sign up</a> first.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        echo $er1;
    }
    if ($passwrong) {
        $er1 = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Wrong Password!</strong> Please enter correct password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        echo $er1;
    }
    ?>
    <div class="container">



        <h1 class="text-center mt-4 display-1 ">Log In</h1>

        <form class="d-grid gap-2 col-6 mx-auto flx" action="" method="POST">
            <div class="mb-3 mt-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <button type="submit" class="btn btn-outline-success mt-3">Log In</button>


        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>