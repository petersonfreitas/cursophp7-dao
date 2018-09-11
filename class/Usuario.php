<?php

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro; 

	public function getIdusuario() {

		return $this->idusuario;
	}

	public function setIdusuario($value) {

		$this->idusuario = $value;
	}

	public function getDeslogin() {

		return $this->deslogin;
	}

	public function setDeslogin($value) {

		$this->deslogin = $value;
	}

	public function getDessenha() {

		return $this->dessenha;
	}

	public function setDessenha($value) {

		$this->dessenha = $value;
	}

	public function getDtcadastro() {

		return $this->dtcadastro;
	}

	public function setDtcadastro($value) {

		$this->dtcadastro = $value;
	}

	public function loadByid($id) {

		$sql = new Sql();

		$resultado = $sql->select("SELECT * FROM tb_usuarios where idusuario=:ID", array(
			":ID"=>$id)
		);

		// Testa se há retorno de valor
		//if (isset($resultado[0] > 0)){ #...... }
		if (count($resultado) > 0) {

			// Se verdadeiro há um registro na posição 0
			$row = $resultado[0];

			// Passando o resultado para dentro dos SETers
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			//formatando a data do banco de dados para nosso pais
			$this->setDtcadastro(new DateTime($row['dtcadastro'])); 
		}

	}

	public function __toString() {

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			)
		);
	}
}

?>