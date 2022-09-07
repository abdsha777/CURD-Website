<?php 
    $server='localhost';
    $user='root';
    $pass='';
    $userdb='user';
    $notesdb='notes';

    $uconn=mysqli_connect($server,$user,$pass,$userdb);
    $nconn=mysqli_connect($server,$user,$pass,$notesdb);
?>