<!DOCTYPE html>
<HTML>
<?php 
 //Start the Session
session_start();
 require('../connection.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = mysqli_real_escape_string($mysqli,$_POST['username']);
$password = mysqli_real_escape_string($mysqli,$_POST['password']);

//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `users_13100` WHERE uid='$username'";
 
$result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
$row = mysqli_fetch_assoc($result);

$count = mysqli_num_rows($result);


if ($count == 1){
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
	if (password_verify($password, $row['password']))
		$_SESSION['username'] = $username;

  else 
    echo "<script>alert('Wrong password');</script>";
}

//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
else{
	echo "<script>alert('No such user name found');</script>";
	//$fmsg = "Invalid Login Credentials.";
	
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
	header("Location: AdminPanel.html");
    exit;

 
	}
else{
	?>

<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>
<body class="text-light">
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Ninja Retailors(NinRe)</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link disabled" href="#">
              <i class="fa d-inline fa-lg fa-bookmark-o"></i> Admin panel</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link disabled" href="#" id=navbarDropdown role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Go to</a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../customers/index.php">Customers</a>
            <a class="dropdown-item" href="../Salesperson/index.php">Salesperson</a>
            <a class="dropdown-item" href="../Product/index.php">Product</a>
            <a class="dropdown-item" href="../Users/index.php">Users</a>
          </div>
          </li>
        </ul>
        <a class="btn navbar-btn btn-primary ml-2 text-white" href="LoginPage.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign in</a>
      </div>
    </div>
  </nav>

     <!--  <form class="form-signin" method="POST">
        
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">Username</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
	<div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Password</span>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a> -->
      
      </form>
    <div class="py-3">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-12">
          			<h1 class="display-5 text-center text-light">Login</h1>
        		</div>
      		</div>
    	</div>
      <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form-signin" method="POST">
            <div class="form-group" >
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required> </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</HTML>
<?php } ?>