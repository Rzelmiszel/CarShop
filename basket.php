<?php
@include_once('functions.php');

class Basket{
	public function showBasket(){
		$dbObj = new DB_Class();
		$db = $dbObj->connect();
		$uid = $_SESSION['uid'];
		$result = $db->query('SELECT item_ids FROM basket WHERE user_id='.$uid.' ');
		$result = $result->fetch(PDO::FETCH_ASSOC);
		$items = explode(' ', $result['item_ids']);
		$result2 = $db->query('SELECT * FROM items');
		$result3 = array();
		$i =0;
		foreach ($result2 as $key) {
			if(strstr($result['item_ids'], $key['id'])){
				$result3[$i++] = $key;
			}
		}
		return $result3;
	}

}

?>
