<?php

    $email = $_GET['email'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $n_child = $_POST['n_child'];
    $m_status = $_POST['m_status'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    require_once '../function/function.php';

    $conn = conn();

    $q = "UPDATE `customer` SET `price_rang`='$price' , `date`='$date' , `n_child`='$n_child' , `marrige_statue`='$m_status' , `phone`='$phone' , `gender`='$gender' WHERE `email`='$email'";

    $r = mysqli_query($conn , $q);

    echo"<script> alert('Done singup2 Customer'); window.location.href='../index/login.php';</script>";


?>