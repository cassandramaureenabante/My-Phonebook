










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
				<br><br><br><br><br><br>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<table class="table table-striped table-inverse table-responsive">
						<thead class="thead-inverse">
							<tr>
							
							<?php

								$sql = "SELECT contacts_id as ID, first_name as 'First Name', last_name as 'Last Name', cellphone_number as 'Phone Number', city as City from contacts";
								if( $fields = mysqli_query($conn,$sql) ){
									while( $fieldinfo = mysqli_fetch_field($fields) ){
										echo "<th>$fieldinfo->name</th>";
									}
									//Free result set
									mysqli_free_result($fields);
								}
							?>	
							</tr>
							<tr>

								<!-- fields here -->
								<th>asdf</th>
								<th>asdf</th>
								<th>asdfasd</th>
							</tr>
							</thead>

							<!-- data here -->
							<tbody>
								<tr>
									<td scope="row"></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td scope="row"></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
					</table>
				</div>
			
			</div>


			
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