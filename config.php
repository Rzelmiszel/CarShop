<?php
class DB_Class 
{
	public function connect() 
	{
		try
		{
		    return $db = new PDO('mysql:host=localhost;dbname=samochody', 'root', '');
		}
		catch (PDOException $e)
		{
		    print "Błąd połączenia z bazą!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
}
?>
