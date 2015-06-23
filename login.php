<?php
session_start();
include_once 'functions.php';
$user = new User();
if ($user->get_session())
{
	header("location:index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
	$login = $user->check_login($_POST['emailusername'], $_POST['password']);
	if ($login) 
	{
		// Login Success
		header("location:login.php");
	} 
	else 
	{
		// Login Failed
		$msg= 'Username / password wrong';
	}
}
?>

<?php include "header.php"; ?>
 	<div class="section-header">
 		<h1> Sign In </h1>
 	</div>
  	<form id="Form1" method="POST" action="" name="login">
		<div class="form-group">
			<span>Login</span>
			<input type="text" name="emailusername"/>
		</div>
		<div class="form-group">
			<span>Password</span>
			<input type="password" name="password"/>
		</div>
		<div class="form-group">
			<input type="submit" class="btn" value="Login"/>
		</div>
	</form>
<?php include "footer.php"; ?>
