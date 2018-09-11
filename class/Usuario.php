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

	/********************/

	public function setData($data) {

		// Passando o resultado para dentro dos SETers
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		//formatando a data do banco de dados para nosso pais
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

	/********************/

	// Atribuindo valor vazio para as variaveis construtoras para evitar erro ao chamar a classe Usuario()
	// com argumento vazio, evitando afetar o resto do código
	public function __construct($login = "", $password = "") {

		$this->setDeslogin($login);
		$this->setDessenha($password);
	}

	/********************/	

	// Método carrega usuário pelo id
	public function loadByid($id) {

		$sql = new Sql();

		$resultado = $sql->select("SELECT * FROM tb_usuarios where idusuario=:ID", array(
			":ID"=>$id)
		);

		// Testa se há retorno de valor
		//if (isset($resultado[0] > 0)){ #...... }
		if (count($resultado) > 0) {

			$this->setData($resultado[0]); 
		}

	}

	// Método lista todos usuários
	public static function getList() {

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	public static function search($login) {

		$sql = new SQL();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%")
		);
		
	}

	// Método para comparar se usuário e senha são TRUE, carrega todas informações
	public function valid($login, $password) {

		$sql = new Sql();

		$resultado = $sql->select("SELECT * FROM tb_usuarios where deslogin=:LOGIN AND dessenha=:PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password)
		);

		// Testa se há retorno de valor
		//if (isset($resultado[0] > 0)){ #...... }
		if (count($resultado) > 0) {

			$this->setData($resultado[0]);

		} else {

			throw new Exception ("Login e/ou senha inválidos");
		} 
	}

	// Método inserir novos usuários
	public function insert() {

		$sql = new Sql();

		$resultado = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha())
		);

		if (count($resultado) > 0) {

			$this->setData($resultado[0]);
		}
	}

	// Método atualizar dados
	public function update($login,	$password) {

		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql();

		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario(),
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha())
		);
	}

	/********************/

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