<?php

    include("include/db_connect.php");

    $username = $password = $confirm_password = $name = $email = '';
    $username_err = $password_err = $confirm_password_err = $name_err = $email_err = '';

    if(isset($_POST['submit'])){

        //Name
        if(empty($_POST['name'])){
            $name_err = "Please Fill up Name";
        }else{
            $name = $_POST['name'];
        }
       
        
        //Username
        if(empty($_POST['username'])){
            $username_err = "Please Fill up Username";
        }else{
            $username = $_POST['username'];
        }

        //Email must be Unique
        if(empty($_POST['email'])){
            $email_err = "Please enter an Email";
        }else{
            $email = $_POST['email'];

            $query = "select * from member where email = '$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if($count > 0 ){
                $email_err = "Email is already Exist!";
            }else{
                $email = $_POST['email'];
            }
        }
        
        //Password
        if(empty($_POST["password"])){
            $password_err = "Please fill up Password";
        }else if(strlen(trim($_POST['password'])) < 6){
            $password_err = "Password must be minimum of 6 characters";
        }else{
            $password = trim($_POST['password']);
        }
        
        //Confirm Password
        if(empty($_POST["confirm_password"])){
            $confirm_password_err= "Please confirm password";
        }else{
            $confirm_password = trim($_POST['confirm_password']);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password not match";
            }
        }
        
        if(empty($name_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) ){
            //Insert data in Database
            $insert = "INSERT INTO `member` (`member_id`, `name`, `Email`, `username`, `password`) VALUES (NULL, '$name', '$email', '$username', PASSWORD('$confirm_password'))";
            if(mysqli_query($conn, $insert)){
                echo "New Record Saved!!!";
				header("location: login.php?password='$confirm_password'");
            }else{
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
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
		<script src="bootstrap-3.3.7/js/jquery.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <link href="bootstrap-3.3.7/images/logo.png"rel=icon> 
</head>
<body style="background-image:url('bootstrap-3.3.7/images/minimal.png'); background-size:cover; background-repeat:no-repeat;">
     <div class="login-box">
     <img src="bootstrap-3.3.7/images/logo.png" class="avatar">
                    <h1>Register</h1>
					<form action="" method="post">
					<p>Fullname<p>
                    <input id="name" type="text" value="<?php echo $name; ?>" class="form-control" name="name" title="name" placeholder="Enter Name" autofocus required>
						<div class="invalid-feedback">
							<span class="err"><?php echo $name_err; ?></span>
						</div>
					<p>Username</p>
						<input id="username" type="text" value="<?php echo $username; ?>" class="form-control" name="username"  title="username" placeholder="Enter Username" autofocus required>                                        
							<div class="invalid-feedback">
							<span class="err"><?php echo $username_err; ?></span>
							</div>
					<p>Email<p>
						<input id="email" type="text" value="<?php echo $email; ?>" class="form-control" name="email" title="email" placeholder="Enter Email" autofocus required>
							<div class="invalid-feedback">
							<span class="err"><?php echo $email_err; ?></span>
							</div>
					<p>Password</p>
						<input id="password" type="password" value="<?php echo $password; ?>" class="form-control" name="password" title="password" placeholder="Enter Password"autofocus required>
							<div class="invalid-feedback">
							<span class="err"><?php echo $password_err; ?></span>
							</div>
					<p>Re-type Password</p>
						<input id="confirm_password" type="password" value="<?php echo $confirm_password; ?>" class="form-control" name="confirm_password" title="confirm_password" placeholder="Confirm Password"autofocus required>
							<div class="invalid-feedback">
							<span class="err"><?php echo $confirm_password_err; ?></span>
							</div>
					<input type="submit" name="submit" value="Signup">
					<a href="login.php">Already have an account</a>    
					</form>
    </div>

</body>
</html>