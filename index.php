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
$login = new Usuario();

$login->valid("Selma","@#$!");

echo $login;

//echo json_encode($pesq);


?>