<?php
class report {
	private $conn;

	function __construct($conn) {
		$this->conn = $conn;
	}

	function insertItem() {
		// Query
		$todaysDate = date("Y-m-d");
		$s = strtotime("October 5, 2019");
		$s2 = date("Y-m-d", $s);

		$name = "Blue bike";
		$cost = 901.99;
		$depreciation_percentage = 0.12;
		$upc = null;

		$stmt = $this->conn->prepare("INSERT INTO uncategorized_report (name, cost, depreciation_percentage, purchase_date, entry_date, upc)
			VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sddsss", $name, $cost, $depreciation_percentage, $s2, $todaysDate, $upc);
		$stmt->execute();

		echo $stmt->error;
	}
}
?>