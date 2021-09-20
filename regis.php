<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SignUp</title>
    <?php include 'links.php' ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h4>Create Account</h4>
  <p id='cent'>Get started with your free account</p>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="Name" placeholder="Full Name" name="name" required>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd1" placeholder="Create password" name="pswd1" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd2" placeholder="Confirm password" name="pswd2" required>
    </div>
    <button type="submit" value="Create Account"class="btn btn-primary" name="submit">Create Account</button>
    <div id="log">Already have an Account .?<a href="login.php">Login</a></div>
  </form>
</div>

</body>
</html>
<?php
 include 'connection.php';
 if(isset($_POST['submit'])){
    //$checkmail=mysqli_real_escape_string($con,$_POST['email']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $pass1=mysqli_real_escape_string($con,$_POST['pswd1']);
    $pass2=mysqli_real_escape_string($con,$_POST['pswd2']);
   $select_query="SELECT * FROM registration where email='$email' ";
   $query=mysqli_query($con,$select_query);
   $ecount=mysqli_num_rows($query);
   if($ecount>0){
     ?>
     <script>
       alert("Email Already Registered");
     </script>
     <?php
   }
   else if($pass1===$pass2){
          $pass_enc1=password_hash($pass1,PASSWORD_BCRYPT);
          $pass_enc2=password_hash($pass2,PASSWORD_BCRYPT);
          $token=bin2hex(random_bytes(15));
          $insert_query="INSERT INTO registration(username, email, mobile, password,cpassword,token,status) VALUES ('$name','$email','$phone','$pass_enc1','$pass_enc2','$token','Inactive')";
          $res=mysqli_query($con,$insert_query);
          if($res){
            $subject = "Activate our account";
            $body = "Hi,$name. Click here to Activate your Account 
            http://localhost/signup/activate.php?token=$token";
            $sender = "From: your_email@gmail.com";
            
            if (mail($email, $subject, $body, $sender)) {
                $_SESSION['msg']="check your mail $email to activate your account";
                header('location:login.php');
            } else {
                echo "Email sending failed...";
            }
          }else{
            ?>
            <script>
                  alert("failed to insert data");
              </script>
           <?php
      }
    }
    else{
      ?>
      <script>
          alert("password did not match");
      </script>
      <?php
    }
}
  ?>
