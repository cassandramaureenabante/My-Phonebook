<?php
    session_start();

    $member_id = $_SESSION['id'];
    
	$member_name = $_SESSION['name'];

    include("include/db_connect.php");

    $first_name = $password = $confirm_password = $name = $email = '';
    $username_err = $password_err = $confirm_password_err = $name_err = $email_err = '';

    if(isset($_POST['submit'])){
     
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $cphone = $_POST['cphone'];
        $city = $_POST['city'];

        $insert = "INSERT INTO `contacts`(`contacts_id`, `first_name`, `last_name`, `cellphone_number`, `city`, `member_id`) VALUES (NULL,'$fname','$lname','$cphone','$city',$member_id)";
        if (mysqli_query($conn, $insert)) {
            echo "
                <script>
                    var msg = confirm('Contact Inserted');
                    if(msg == true || msg == false){
                        location.href='insert_contact.php';
                    }
                </script>
            ";
        } else {
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);   

?>


<!DOCTYPE html>
<html>
<head="en">

	<title>Phonebook</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" href="bootstrap-3.3.7/css/bootstrap.min.css">
        <link href="bootstrap-3.3.7/css/mystyle.css"  type="text/css" rel="stylesheet">
		<script src="bootstrap-3.3.7/js/jquery.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <link href="bootstrap-3.3.7/images/logo.png"rel=icon> 
<<<<<<< HEAD
<body style="background-image:url('bootstrap-3.3.7/images/whitebackground.jpg'); background-size:cover; background-repeat:no-repeat;">
=======
<body style="background-image:url('bootstrap-3.3.7/images/office.jpg'); background-size:cover; background-repeat:no-repeat;">
>>>>>>> e758ba717ace416172f4247962465883fcbaa8a2
	<div class="background">	
<style>
    .bg-primary{
        background-color: #337ab7;  
        
    }
    div.navbar-header a.navbar-brand,
    div.collapse ul.nav li a
    {color:white;}
    div.navbar-header a.navbar-brand:hover,
    div.collapse ul.nav li a:hover{
        color:white;
    }
    div.collapse ul.nav li.dropdown ul.dropdown-menu a{
        color:black;
        color: black;  
    }
</style>
    <nav class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
                <img style="float:left;" alt="My Phonebook Brand " src="bootstrap-3.3.7/images/logo.png" width="100" height="90">
                
             </a>
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
			<li class=""><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li class=""><a >Add Contact <span class="sr-only">/span&gt;</span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $member_name; ?><span <!--span class="caret"--></span></a>
                <ul class="dropdown-menu">
                <li id="logout"><a href="login.php"> Log Out</a></li>    
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

 <div class="modal" id="Logout_msg" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#Logout_msg').fadeOut();">×</button>
                <h4 class="modal-title"><strong>Logout!!!</strong></h4>
            </div>
            <div class="modal-body">
                <p><span class="glyphicon glyphicon-question-sign alert-info"></span>&nbsp;&nbsp;Do you really want to logout ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="location.href='logout.php'" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#Logout_msg').fadeOut();"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
    </div>
</div>


			</div>
		</div>
		
		<br><br><br><br><br><br><div class="container-fluid">
			
			<form action="insert_contact.php" method="post" enctype="multipart/form-data">
			<div style="text-align:center" class="col-sm-3 col-sm-offset-2">
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label for="first-name">First Name</label>
					<input type="text" class="form-control text-field" id="fname" name="fname" placeholder="First Name" autofocus required>
				</div>
				<div class="form-group">
					<label for="last-name">Last Name</label>
					<input type="text" class="form-control text-field" name="lname" placeholder="Last Name" autofocus required>
				</div>
				<div class="form-group">
					<label for="cell-phone">Cell Phone</label>
					<input type="text" class="form-control text-field" name="cphone" placeholder="Cell Phone" autofocus required>
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control text-field" name="city" placeholder="City" autofocus required>
				</div>
			</div>
            <div class="row">
			<div class="col-sm-7 col-sm-offset-2">
				<div style="margin-top:10px" class="form-group">
					<button type="submit" name="submit" class="btn btn-warning btn-block">Insert Contact  </button>
					
				</div>
			</div>
		</div>
		</form></div>
		
</html>		
</body>