<?php
include 'databaseConnection.php';
include '../Models/report.php';

$resultArray = array();
$invalidInput = false;

// Checks if variables are set
if (!empty($_POST["itemName"])) {
	$itemname = $_POST["itemName"];
}
else {
	echo "Empty field 1";
	$invalidInput = true;
}

if (!empty($_POST["category"])) {
	$category = $_POST["category"];
}
else {
	echo "Empty field 2";
	$invalidInput = true;
}

if (!empty($_POST["cost"])) {
	$cost = $_POST["cost"];
}
else {
	echo "Empty field 3";
	$invalidInput = true;
}

if (!empty($_POST["depreciationPercentage"])) {
	$dep_percentage = $_POST["depreciationPercentage"];
}
else {
	echo "Empty field 4";
	$invalidInput = true;
}

if (!empty($_POST["purchaseDate"])) {
	$purchase_date = $_POST["purchaseDate"];
}
else {
	echo "Empty field 5";
	$invalidInput = true;
}

if (!empty($_POST["upc"])) {
	$upc = $_POST["upc"];
}
else {
	echo "Empty field 6";
	$invalidInput = true;
}

if (!$invalidInput) {
	insertItem();
}

function insertItem() {
	$dbConnectionObj = new databaseConnection();
	$conn = $dbConnectionObj->getDatabaseConn();

	if ($conn != "E") {
		insertIntoReport($conn);
	}
}

function insertIntoReport($conn) {
	$r = new report($conn);
	$r->insertItem(/*$_POST["itemName"], $_POST["category"], $_POST["cost"], 
		$_POST["depreciationPercentage"], $_POST["purchaseDate"], $_POST["upc"]*/);

	// Success point
	echo "Success point!";
	header("Location: ../Views/Item Entry/item_entry.html?result=added");
}
?>