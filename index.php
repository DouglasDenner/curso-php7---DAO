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
$aluno = new Usuario();

$aluno->setdeslogin("aluno");
$aluno->setdessenha("555444");
$aluno->insert();
echo $aluno;

?>