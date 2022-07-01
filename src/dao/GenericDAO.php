<?php

require_once('../Connection.php');

class GenericDAO {
	private $connection;

	public function create($insertSql, $values) {
		$this->connection = Connection::newConnection();
		$stmt = $this->connection->prepare($insertSql);
		$stmt->execute($values);
		$stmt = null; $this->connection = null;
	}

	public function read($selectSql, $values) {
		$this->connection = Connection::newConnection();
		$stmt = $this->connection->prepare($selectSql);
		$stmt->execute($values);
		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = null; $this->connection = null;
		return $arr;
	}

	public function update($updateSql, $values) {
		$this->connection = Connection::newConnection();
		$stmt = $this->connection->prepare($updateSql);
		$stmt->execute($values);
		$stmt = null; $this->connection = null;
	}

	public function delete($deleteSql, $id) {
		$this->connection = Connection::newConnection();
		$stmt = $this->connection->prepare($deleteSql);
		$stmt->execute(Array($id));
		$stmt = null; $this->connection = null;
	}
}


?>