<?php
	//start the session
	session_start();

	// include db configuration
	include('include/db_connect.php');

	// user's information
	$member_id = $_SESSION['id'];
  $member_name = $_SESSION['name'];
  

  //get contact id
  $contact_id = $_GET['id'];
	
  if(isset($_POST['delete'])){
    $delete_contact = mysqli_query($conn, "delete from contacts where contacts_id = '$contact_id'");
    echo"<script>
    
    var a = confirm('Deleted!!!');
    if(a == true || a == false){
      location.href='index.php';
    }
    </script>";

  }

  if(isset($_POST['no'])){
    header('location:index.php');

  }

    
?>












<!DOCTYPE html>
<html>
<head="en">

	<title>Phonebook | Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
        <link href="bootstrap-3.3.7/css/mystyle.css"  type="text/css" rel="stylesheet">
		<link rel = "stylesheet" href = "font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
		<script src="bootstrap-3.3.7/js/jquery.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <link href="bootstrap-3.3.7/images/mylogo.png"rel=icon> 
</head>
<body style="background-image:url('bootstrap-3.3.7/images/whitebackground.jpg'); background-size:cover; background-repeat:no-repeat;">
	<div class="background">
    <nav class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
                <img style="float:left;" alt="My Phonebook Brand " src="bootstrap-3.3.7/images/logo.png" width="100" height="90">
                
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <br><li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li class=""><a href="insert_contact.php">Add Contact <span class="sr-only">&gt;</span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $member_name; ?> <span <!--span class="caret"--></span></a>
                <ul class="dropdown-menu">
                <li id="logout"><a href="login.php"> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse --><!-- /.container-fluid -->
</nav>	
</div>
				<br><br><br><br><br><br>
        <div class="container">
          <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <form action="" method="post">
              <h1>Do you want to delete this Data?</h1>
              <button name="no" class="btn btn-primary">No</button>
              <button type="submit" class="btn btn-danger" name="delete">Delete</button>
              </form>
             
              
            </div>
          </div>
        </div>
        
			
</body>