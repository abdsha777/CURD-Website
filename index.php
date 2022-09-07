<!-- INSERT INTO `notes` (`sno`, `title`, `description`, `timestamp`) VALUES (NULL, 'note2', 'notessss', current_timestamp()); -->
<!-- 000webhost pass -->
<!-- Um+1npM2Q?l=VWAo -->
<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['username']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
}
$i = false;
$j = false;
$k = false;
$table="t_".$_SESSION['username'];

//----NOT NEEDED---
// if($_SERVER['REQUEST_METHOD'] === 'GET'){
//     if(isset($_GET['delete'])){
//         $sno = $_GET['delete'];
//         $delete = "DELETE FROM `notes` WHERE `sno` = " . $sno;
//         $result = (mysqli_query($conn,$delete));
//         if($result){
//             $k = true;
//         }
//     }
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['snoEdit'])){
        $title = $_POST['titleEdit'];
        $desc = $_POST['descEdit'];
        $sno = $_POST['snoEdit'];
        $update = "UPDATE `$table` SET `title` = '".$title."', `description` = '".$desc."' WHERE `notes`.`sno` = ".$sno." ;";
        $result = mysqli_query($nconn, $update);
        if ($result) {
            $j = true;
        }
    }
    elseif(isset($_POST['snod'])){
        $sno = $_POST['snod'];
        $delete = "DELETE FROM `$table` WHERE `sno` = " . $sno;
        $result = (mysqli_query($nconn,$delete));
        if($result){
            $k = true;
        }
    }
    else{
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $insert = "INSERT INTO `$table` (`title`, `description` ) VALUES ('" . $title . " ', '" . $desc . "')";
        $result = mysqli_query($nconn, $insert);
        if ($result) {
            $i = true;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  </head>

<body>

    <!-- Edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditModal">
        Edit modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditModalLabel">Edit Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/curd/index.php" method="post">
                        <h2>Add a note</h2>
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" >
            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Note Discription</label>
                            <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dModal" tabindex="-1" role="dialog" aria-labelledby="dModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dModalLabel">Edit Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/curd/index.php" method="post">
                        <h2>delete</h2>
                        <input type="hidden" name="snod" id="snod">
                        <button type="submit" id="deletebtn" class="btn btn-primary">delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

   <?php 
    include 'nav.php';
   ?>

    <?php
    if ($i == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Notes recorded successfully!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
          $i = false;
    }
    elseif($j == true){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Notes Updated successfully!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
          $j = false;
    }
    elseif($k == true){
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Notes deleted successfully!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
          $k = false;
    }
    ?>

    <div class="container my-4">
        <h3 class="display-4 text-center">Welcome <?php echo $_SESSION['username'];?></h3>
        <form action="/curd/index.php" method="post">
            <h2>Add a note</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    placeholder="Title goes here">

            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Note Discription</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * from `$table`";
                $sno = 1;
                $result = mysqli_query($nconn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <th scope='row'>" . $sno . "</th>
                    <td>" . $row['title'] . "</td><td>" . $row['description'] . " </td><td> <button class='btn btn-sm btn-primary edits' id=".$row['sno'] .">Edit</button> <button class='btn btn-sm btn-primary delete' id=d".$row['sno'] .">delete</button> </td></tr>";
                    $sno++;
                }
                ?>
            </tbody>
        </table>

    </div>
    <hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" -->
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
<script>
    edits = document.getElementsByClassName('edits');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            // console.log("edits", );
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName('td')[0].innerText;
            discription = tr.getElementsByTagName('td')[1].innerText;
            // console.log(title,discription);
            descEdit.innerText= discription;
            document.getElementById('titleEdit').value=title;
            console.log( document.getElementById('titleEdit').innerText);
            titleEdit.innerText= title;
            snoEdit.value =e.target.id;
            // console.log(e.target.id,title,discription);
            $('#editModal').modal('toggle');
        })
    })
    del = document.getElementsByClassName('delete');
    Array.from(del).forEach((element) => {
        element.addEventListener("click", (e) => {
            snod.value =e.target.id.substr(1,);
            // console.log(e.target.id,title,discription);
            // $('#editModal').modal('toggle');
            document.getElementById('deletebtn').click();
        })
    })

    // deletes = document.getElementsByClassName('delete');
    // Array.from(deletes).forEach((element) => {
    //     element.addEventListener("click", (e) => {
    //         sno = e.target.id.substr(1,);

    //         if(confirm("Do you want to delete this note!")){
    //             console.log("yes");
    //             window.location = `/curd/index.php?delete=${sno}`;
    //         }
    //         else{
    //             console.log("n");
    //         }
    //     })
    // })


</script>

</html>