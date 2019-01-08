<?php
	//start the session
	session_start();

	// include db configuration
	include('include/db_connect.php');

	// user's information
	$member_id = $_SESSION['id'];
  $member_name = $_SESSION['name'];
  
  $contact_id = $_GET['id'];

  // $get_contact = "SELECT * FROM `contacts` where contacts_id = '$contact_id'";

	$get_contact = mysqli_query($conn, "SELECT * FROM `contacts` where contacts_id = '$contact_id'");
  
  $row = mysqli_fetch_array($get_contact);
  
  if(isset($_POST['submit'])){
    $contact_id = $_POST['contact_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cphone = $_POST['cphone'];
    $city = $_POST['city'];
    $update = "UPDATE `contacts` SET `first_name`='$fname',`last_name`='$lname',`cellphone_number`='$cphone',`city`='$city' WHERE contacts_id = ". $contact_id;
    if (mysqli_query($conn, $update)) {
      echo "
          <script>
              var msg = confirm('Contact Updated');
              if(msg == true || msg == false){
                  location.href='update_contact.php?id=$contact_id';
              }
          </script>
        ";
    } else {
        echo "Error: " . $update . "<br>" . mysqli_error($conn);
    }
    
  
  
  
  
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
<body style="background-image:url('bootstrap-3.3.7/images/office.jpg'); background-size:cover; background-repeat:no-repeat;">
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
<br><br><br><br><br><br><div class="container-fluid">
			
			<form action="?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
			<div style="text-align:center" class="col-sm-3 col-sm-offset-2">
			</div>
			<div class="col-sm-4">
        <input type="hidden" value="<?php echo $row[0]; ?>" name="contact_id" >
				<div class="form-group">
					<label for="first-name">First Name</label>
					<input type="text" class="form-control text-field" id="fname" value="<?php echo $row[1] ?>" name="fname" placeholder="First Name" autofocus required>
				</div>
				<div class="form-group">
					<label for="last-name">Last Name</label>
					<input type="text" class="form-control text-field" value="<?php echo $row[2] ?>"  name="lname" placeholder="Last Name" required>
				</div>
				<div class="form-group">
					<label for="cell-phone">Cell Phone</label>
					<input type="text" class="form-control text-field" value="<?php echo $row[3] ?>"  name="cphone" placeholder="Cell Phone" required>
				</div>
				<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control text-field" value="<?php echo $row[4] ?>"  name="city" placeholder="City" required>
				</div>
			</div>
      <div class="row">
			<div class="col-sm-7 col-sm-offset-2">
				<div style="margin-top:10px" class="form-group">
					<button type="submit" name="submit" class="btn btn-warning btn-block">Update Contact  </button>
					
				</div>
			</div>
		</div>
		</form></div>


			
			<!-- View Contact -->
			<?php
			if(isset($_GET['view_contact_id']) == 1 ){ ?>
				<?php include('view_contact.php'); ?>
				<script type='text/javascript'>
					$('#view_contact').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#view_contact').fadeOut();
						}
					}
				</script>	
			<?php } 
			?>


			<!-- Delete Contact -->
			<?php
			if(isset($_GET['delete_contact_id']) == 1 ){ ?>
				<?php include('delete_contact.php'); ?>
				<script type='text/javascript'>
					$('#delete_contact_id').fadeIn();
					
					window.onclick = function(event) {
						if (event.target == modal) {
							$('#delete_contact_id').fadeOut();
						}
					}
				</script>	
			<?php } ?> 
			
</body>