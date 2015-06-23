<?php
session_start();
include_once 'functions.php';
include_once 'items.php';
$user = new User();
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

$items = new Items();
$allItems = $items->showItems();
if(isset($_GET['iid']))
{
	$items->addToBasket();
}
if(isset($_POST['submit']))
{
	if($temp = $items->filterItems())
	{
		$allItems = $temp;
	}
}
?>

<?php include "header.php"; ?>
 	<div class="section-header">
 		<h1> Car offers </h1>
 	</div>
 	<div class="filter">
 		<form id="Form2" method="POST" action="" name="login">
			<div class="form-group">
				Prize from
				<input type="text" name="priceA" />
				to
				<input type="text" name="priceB" />
			</div>
			<div class="form-group">
				Year from
				<input type="text" name="yearA" />
				to
				<input type="text" name="yearB" />
			</div>
			<div class="form-group">
				Horsepower from
				<input type="text" name="horseA" />
				to
				<input type="text" name="horseB" />
			</div>
			<div class="form-group">
				<input type="submit" name="submit" class="btn" value="Filter"/>
			</div>
		</form>
 	</div>
  	<?php foreach($allItems as $k) {?>
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
			<?php if($items->isInBasket($k['id'])) { ?>
			<p class="addToBuy"> Added to Cart</p>
			<?php } else {?>
			<a href="?q=addToBuy&iid=<?=$k['id'];?>" class="addToBuy"> >Add to Cart<</a>
			<?php } ?>
		</div>
  	</div>
  	<?php } ?>
<?php include "footer.php"; ?>
