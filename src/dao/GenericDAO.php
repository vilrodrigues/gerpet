<?php

require_once('/var/www/html/src/Connection.php');

class GenericDAO {
	private $connection;

	public function __construct() {
		$this->connection = Connection::newConnection();
	}

	public function create($insetSql, $values) {
		$stmt = $this->connection->prepare($insetSql);
		$stmt->execute($values);
		$stmt = null; $this->connection = null;
	}

	public function read() {

	}

	public function update() {

	}

	public function delete() {

	}
}


?>