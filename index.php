<?php

require_once "config.php";

/*
$sql = new Sql();

$user = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($user);
*/

////////////////////////////////////////

/* Chama um usuário
$user = new Usuario();

$user->loadByid(1);

echo $user;
*/

////////////////////////////////////////

// Chama todos usuários em lista
//$lista = Usuario::getList();

//echo json_encode($lista);

////////////////////////////////////////

// Pesquisa todos usuários por palavras chaves
//$pesq = Usuario::search("us");

//echo json_encode($pesq);

////////////////////////////////////////

// Valida login e senha
//$login = new Usuario();

//$login->valid("Selma","@#$!");

//echo $login;

////////////////////////////////////////

// Valida login e senha
//$login = new Usuario();

//$login->valid("Selma","@#$!");

//echo $login;


////////////////////////////////////////
// Cadastra novo usuário
//$aluno = new Usuario("Aluno", "@lun0");

//$aluno->insert();

//echo $aluno;

////////////////////////////////////////
// Atualiza novo usuário
//$usuario = new Usuario();

//$usuario->loadByid(3);

//$usuario->update("Elder Leite", "7654321");

//echo $usuario;

////////////////////////////////////////
// Atualiza novo usuário
$usuario = new Usuario();

$usuario->loadByid(5);

$usuario->delete();

echo $usuario;

?>