<?php
session_start();
include_once 'functions.php';
include_once 'items.php';
include_once 'basket.php';
$user = new User();
$basket = new Basket();
$items = new Items();
$uid = $_SESSION['uid'];
if (!$user->get_session())
{
	header("location:login.php");
}
if (isset($_GET['q']) && ($_GET['q'] == 'logout')) 
{
	$user->user_logout();
	header("location:login.php");
}
if (isset($_GET['q']) && ($_GET['q'] == 'deleteItem') && isset($_GET['iid']))
{
	$items->removeFromBasket($_GET['iid']);
}


$allItems = $basket->showBasket();

?>

<?php include "header.php"; ?>
 	<div class="section-back">
 	<a href="index.php"> < Home </a>
 	</div>
 	<div class="section-header">
 		<h1> Koszyk </h1>
 	</div>
  	<?php if($allItems) 
  		foreach($allItems as $k) {?>
  	<div class="item-box">
		<div class="item-image">
			<img src="<?=$k['img_src'];?>">
		</div>
		<div class="item-desc">
			<ul>
				<li> <span> name: </span> <?=$k['name'];?> </li>
				<li> <span> year: </span> <?=$k['year'];?> </li>
				<li> <span> horsepower[KM]: </span> <?=$k['horsepower'];?> </li>
				<li> <span> price[PLN]: </span> <?=$k['price'];?> </li>
			</ul>
			<a href="?q=deleteItem&iid=<?=$k['id'];?>" class="addToBuy"> >Remove from Cart<</a>

		</div>
  	</div>
  	<?php } else{
  		echo "Koszyk pusty";
  		} ?>
<?php include "footer.php"; ?>
