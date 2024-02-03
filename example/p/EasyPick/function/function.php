<?php

    function conn(){

        $conn = mysqli_connect('localhost' , 'root' , '' , 'easypick');

        return $conn;

    }

    
?>