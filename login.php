<?php

 include('include/db_connect.php');
 session_start();
 $err='';
if(isset($_POST['submit'])){
		$email = $_POST['email'];
        $password = $_POST['password'];

        $query = "select * from member where Email = '$email'  AND password = PASSWORD('$password')";
		$result=mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        if($count ==1 ){
            $_SESSION['name'] =  $row['name'];
            $_SESSION['id'] = $row['member_id'];
            header('location: index.php');
        }else{
            $err = 'Invalid Username/Password';
        }
    }

    mysqli_close($conn);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Phonebook | Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
		<link href="bootstrap-3.3.7/css/mystyle.css"  type="text/css" rel="stylesheet">
		<link href="bootstrap-3.3.7/images/logo.png"rel=icon>
		<script src="bootstrap-3.3.7/js/jquery.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
		<script src='js/phonebook.js'></script>
</head>
<body style="background-image:url('bootstrap-3.3.7/images/minimal.png'); background-size:cover; background-repeat:no-repeat;">  
	<div class="container-fluid bg">
    <div class="login-box">
    <img src="bootstrap-3.3.7/images/logo.png" class="avatar">
        <h1>Login Here</h1>
            <form action="" method="post">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login">
            <a href="signup.php">Create an account</a>    
            </form>
        
        
     </div>
	 </div>
	       <?php
         if(isset($_GET['login_err']) == 1){
            
      ?>
      
         <script type='text/javascript'>

            var modal = document.getElementById('LoginError');
            $('#LoginError').fadeIn();

            
            window.onclick = function(event) {
               if (event.target == modal) {
                  $('#LoginError').fadeOut();
               }
            }
         </script>
      <?php }?>
</body>
</html>