<?php
require_once("config.php");

//$root =new Usuario();
//$root->loadbyId(2);
//echo $root;

//$lista =Usuario::getList();

	//echo json_encode($lista);


//$search=Usuario::search("jo");
//echo json_encode($search);

//$usuario = new Usuario();
//$usuario->login("root","!@#$");
//echo json_encode($usuario);
//$aluno = new Usuario("aluno","4545");
//$aluno->insert();
//echo $aluno;
//);$usuario =new Usuario();
//$usuario ->loadbyId(10
//$usuario ->update("professor","123654");
//echo $usuario;


$usuario =new Usuario();
$usuario ->loadbyId(10);
$usuario ->delete();
echo $usuario;


?>