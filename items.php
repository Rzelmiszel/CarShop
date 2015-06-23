<?php
	class Items{

		public function showItems(){
			$dbObj = new DB_Class();
			$db = $dbObj->connect();
			$result = $db->query("SELECT * FROM items");
			return $result;
		}
		public function addToBasket(){
			$dbObj = new DB_Class();
			$db = $dbObj->connect();
			$result = $db->query("SELECT item_ids FROM basket");
			$result = $result->fetch(PDO::FETCH_ASSOC);
			$temp = $result['item_ids'];
			if(!strstr($temp, $_GET['iid']) )
				$temp.=$_GET['iid']." ";
			$result2 = $db->query("UPDATE basket SET item_ids = '$temp'");
		}
		public function isInBasket($iid){
			$dbObj = new DB_Class();
			$db = $dbObj->connect();
			$result = $db->query("SELECT item_ids FROM basket");
			$result = $result->fetch(PDO::FETCH_ASSOC);
			if(strstr($result['item_ids'], $iid) )
				return true;
			else
				return false;
		}
		public function removeFromBasket($iid){
			$dbObj = new DB_Class();
			$db = $dbObj->connect();
			$result = $db->query("SELECT item_ids FROM basket");
			$result = $result->fetch(PDO::FETCH_ASSOC);
			$temp = $result['item_ids'];
			$temp = str_replace($_GET['iid'].' ', '', $temp);
			$result2 = $db->query("UPDATE basket SET item_ids = '$temp'");
		}
		public function filterItems(){
			$dbObj = new DB_Class();
			$db = $dbObj->connect();
			$query='SELECT * FROM items WHERE ';

			if(!empty($_POST['priceA']) || $_POST['priceA'] == '0'){
				if(empty($_POST['priceB'])){
					$query.='price > '.$_POST["priceA"].' AND ';
				} else{
					$query.='price BETWEEN '.$_POST["priceA"].' AND '.$_POST["priceB"].' AND ';
				}
			} else{
				if(empty($_POST['priceB']))
					$query.='price > 0 AND ';
				else
					$query.='price < '.$_POST["priceB"].' AND ';
			}

			if(!empty($_POST['yearA']) || $_POST['yearA'] == '0'){
				if(empty($_POST['yearB'])){
					$query.='year > '.$_POST["yearA"].' AND ';
				} else{
					$query.='year BETWEEN '.$_POST["yearA"].' AND '.$_POST["yearB"].' AND ';
				}
			} else{
				if(empty($_POST['yearB']))
					$query.='year > 0 AND ';
				else
					$query.='year < '.$_POST["yearB"].' AND ';
			}

			if(!empty($_POST['horseA']) || $_POST['horseA'] == '0'){
				if(empty($_POST['horseB'])){
					$query.='horsepower > '.$_POST["horseA"].' ';
				} else{
					$query.='horsepower BETWEEN '.$_POST["horseA"].' AND '.$_POST["horseB"].' ';
				}
			} else{
				if(empty($_POST['horseB']))
					$query.='horsepower > 0 ';
				else
					$query.='horsepower < '.$_POST["horseB"].' ';
			}

			$result = $db->query($query);
			return $result;
		}
	}
?>
