<?php

//Class to handle packages
class Package{
	public $packageID;
	public $orderID;
	public $packageWeight;
	public $packageDescription;
	
	/**
	* Constructor
	* Precondition: Argument must be array containing the order information.
	*/
	function __construct()
	{
		$args = func_get_args();
		
		$this->orderID = $args[0];
		$this->packageWeight = $args[1];
		$this->packageDescription = $args[2];
	}
	
	//Save the order to the database
	function saveToDB() {
		require 'pdo.inc';
		
		try
		{
			// Prepare Query
			$stmt = $pdo->prepare(
				"INSERT INTO packages (orderID, packageWeight, packageDescription) 
				VALUES (:orderID, :packageWeight, :packageDescription)"
			);

			//Bind query parameter with it's given variable
			$stmt->bindParam(':orderID', $this->orderID);
			$stmt->bindParam(':packageWeight', $this->packageWeight);
			$stmt->bindParam(':packageDescription', $this->packageDescription);

			//Run query
			$stmt->execute();

			//Close connection
			$stmt = null;
			//Destroy PDO Object
			$pdo = null;

		}catch(PDOException $e){
			//Output Error
			echo $e->getMessage();
			echo '<p>'.$e.'</p>';
		}
	}
}

?>