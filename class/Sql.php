<?php

class Sql extends PDO {

	private $conn;

	// conectar automaticamente com o BD
	public function __construct() {

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");
	}

	// preparando a QUERY para receber vários paramentros
	private function setParams($statment, $parameters = array()) {

		foreach ($parameters as $key => $value) {
			
			$this->setParam($statment, $key, $value);

		}
	}
	
	// preparando a QUERY para receber um único paramentros
	private function setParam($statment, $key, $value) {

		$statment->bindParam($key, $value);
	}
	
	// execultando a query
	public function query($rawQuery, $params = array()) {

		 $stmt = $this->conn->prepare($rawQuery);

		 $this->setParams($stmt, $params);

		 $stmt->execute();

		 return $stmt;
	}

	// Função Select
	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>