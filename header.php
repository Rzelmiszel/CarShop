<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>NiemiecPłakałJakSprzedawał.pl</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
    <div class="header">
	    <div class="logo">
	    <img src="images/logo.jpg"><h1> <a href="index.php">NiemiecPłakałJakSprzedawał.pl</a> </h1>
	    </div> 
	</div>
    <div class="container">
       <div class="menu">
        <?php if(isset($_SESSION['uid'])) { ?>
        <div class="user-text">
        Hi <span><?php $user->get_fullname($_SESSION['uid']); ?>!</span>  [ <a href="?q=logout">Logout</a> ] 
        </div>
        <div class="user-menu">
        	<ul>
        	<li><a href="basket_view.php">Your Cart</a></li>
        	</ul>
        </div>
        <?php } ?>
      </div> 
      <div class="content">
