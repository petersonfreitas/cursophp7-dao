<?php

require_once "config.php";

/*
$sql = new Sql();

$user = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($user);
*/

$user = new Usuario();

$user->loadByid(1);

echo $user;

?>