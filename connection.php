<?php 
    $server="localhost:3307";
    $username='root';
    $pass='';
    $db="gen";
    $con=mysqli_connect($server,$username,$pass,$db);
    /*$con=mysqli_connect($server,$username,$pass);
    $dbcon=mysqli_select_db($con,$db);*/
    /*if($con){
        ?>
        <script>
        alert("Connection Successfull");
        </script>
        <?php
    }
    else{
        ?>
        <script>
        alert("Connection Failed");
        </script>
        <?php
        //die("connection failed".mysqli_connect_error());
    }*/
?>