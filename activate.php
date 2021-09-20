<?php
   session_start();
   include 'connection.php';
   if(isset($_GET['token'])){
       $token=$_GET['token'];
       $updatequery="update registration set status='active' where token='$token'";
       $query=mysqli_query($con,$updatequery);
       if($query){
           if(isset($_SESSION['msg'])){
               $_SESSION['msg']="Account Activated Successfully Please login..!";
               header('location:login.php');
           }else{
               $_SESSION['msg']="You are logout Please login";
               header('location:login.php');
           }
       }else{
            $_SESSION['msg']="Account not updated ";
            header('location:login.php');
       }
   }

    ?>