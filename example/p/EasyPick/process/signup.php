<?php

    $type = $_GET['type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    
if ($name == trim($name) && strpos($name, ' ') !== false){
    echo"<script> alert('user name is content space'); window.location.href='../index/signup.php?email=$email';</script>";
    }else{
      echo"false";
    
    require_once '../function/function.php';

    $conn = conn();

    if($type == 'saller'){

        $q = "INSERT INTO `saller` (`id` , `name` , `email` , `password`) VALUES (NULL , '$name' , '$email' , '$pass')";

        $r = mysqli_query($conn , $q);

        echo "<script> alert('DONE Saller'); window.location.href='../index/login.php';</script>";

    }else if($type == 'customer'){

        
        $q = "INSERT INTO `customer` (`id` , `name` , `email` , `password`) VALUES (NULL , '$name' , '$email' , '$pass')";

        $r = mysqli_query($conn , $q);

        echo "<script> alert('DONE customer'); window.location.href='../index/signup2.php?email=$email';</script>";

    }
}
?>



