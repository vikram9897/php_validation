<?php
  session_start();
  ob_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
    <?php include 'links.php' ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h4>Login</h4>
  <p id='cent'>Get started with your free account</p>
  <div>
    <p class="bg-success text-white px-4"><small>
      <?php
        if(isset($_SESSION['msg']))
            echo $_SESSION['msg'];
          else
            echo $_SESSION['msg']="you are logout please login";
          ?></small></p>
  </div>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pswd" value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass'];} ?>" required>
    </div>
    <div class="form-group">
      <input type="checkbox" name="rememberme"> Remember Me
    </div>
    <button type="submit" value="Create Account"class="btn btn-primary" name="submit">Login</button>
    <div id="log">Don't have an Account .?<a href="regis.php">Create Account</a></div>
  </form>
</div>

</body>
</html>
<?php
 include 'connection.php';
 if(isset($_POST['submit'])){
   $email=$_POST['email'];
   $pass=$_POST['pswd'];
   $select_query="SELECT * FROM registration where email='$email' and status='active' ";
   $query=mysqli_query($con,$select_query);
   $ecount=mysqli_num_rows($query);
   if($ecount>0){
      $data=mysqli_fetch_assoc($query);
      $db_pass=$data['password'];
      $_SESSION['username']=$data['username'];
      $pass_decode=password_verify($pass,$db_pass);
      if($pass_decode){
        if(isset($_POST['rememberme'])){
          setcookie('email',$email,time()+21600);
          setcookie('pass',$pass,time()+21600);
          header('location:home.php');
        }else{
          header('location:home.php');
        }
      }else{
        ?>
        <script>
          alert("Invalid Password");
        </script>
        <?php
      }
   }else{
    ?>
    <script>
      alert("Invalid Email or Account Not active");
    </script>
    <?php
   }
 }

 ?>