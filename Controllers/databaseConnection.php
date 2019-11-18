<?php
class databaseConnection {
	private $servername = "remotemysql.com:3306";
	private $username = "qeVJcurlNh";
	private $password = "0HgkOl7xJj";
	private $dbname = "qeVJcurlNh";

	function getDatabaseConn() {
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if (!$conn) {
			return "E";
		}
		else {
			return $conn;
		}
	}
}
?>