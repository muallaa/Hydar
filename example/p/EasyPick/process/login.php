<?php

    require_once '../function/function.php';

    $conn = conn();

    $name = $_POST['username'];
    $password = $_POST['password'];

    $q = "SELECT * FROM `saller` WHERE `name`='$name' AND `password`='$password'";

    $r = mysqli_query($conn , $q);

    if(mysqli_num_rows($r) > 0){

        $s = mysqli_fetch_assoc($r);
        session_start();

        $_SESSION['saller'] = $s['id'];
        echo"<script> alert('Hello'); window.location.href='../index/Home.php';</script>";
    
    }else{

        $q = "SELECT * FROM `customer` WHERE `name`='$name' AND `password`='$password'";

        $r = mysqli_query($conn , $q);
    
      
        if(mysqli_num_rows($r) > 0){

            $s = mysqli_fetch_assoc($r);
            session_start();
    
            $_SESSION['customer'] = $s['id'];
    
            echo"<script> alert('Hello'); window.location.href='../index/Home.html';</script>";
        }else{
            echo"<script> alert('not exist ');  window.location.href='../index/login.html';</script>";
        }
    }


?>