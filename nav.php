<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">YourNotes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php 
                    if(!isset($_SESSION['username']) || $_SESSION['loggedin']!=true){
                        echo'<li class="nav-item">
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>';
                    }
                    else{
                        
                    echo '<li class="nav-item">
                        <a class="nav-link" href="index.php">Notes</a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>';
                    }
                ?>
            
                <!-- <li class="nav-item">
                    <a class="nav-link" href="index.php">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li> -->

        </div>
    </div>
</nav>