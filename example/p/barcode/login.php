<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>
<body>
    
<div class="container">
    <div class="row  align-content-center" style="height:90vh;" >
        <div class="d-flex justify-content-center">
            <form action="./login.php" method="POST" class="col-6" >
                <h5 class=" text-center" >هاني لجواز السفر السريع</h5>
                <div class="form-floating my-4">
                    <input type="text" name="password" placeholder="" class="form-control">
                    <label for="">Enter Passowrd</label>
                </div>
                <div class=" d-flex justify-content-center" >
                    <button class="btn btn-primary" >ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php

    
    if(isset($_POST['password'])){
        
        $pass = $_POST['password'];

        if($pass == 'habibhani2003'){
            echo"<script> window.location.href='./html/test.php';</script>";
        }else{
            echo"<script> alert('كلمة السر غير صحيحة');</script>";
     
        }
    }
?>