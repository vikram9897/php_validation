<?php 
    session_start();
    session_destroy();
    setcookie('email',NULL,time()-21600);
    setcookie('pass',NULL,time()-21600);
    ?>
        <script>
          location.replace("login.php");
          //alert("Login Successful");
        </script>
        <?php
?>