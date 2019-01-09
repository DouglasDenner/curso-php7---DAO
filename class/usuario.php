<?php

class Usuario  {
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;


	public function getIdusuario(){
		 return $this ->idusuario;

	}

	public function setIdusuario($value){
		$this->idusuario=$value;
	}
	public function getdeslogin(){
		 return $this ->deslogin;
	}

	public function setdeslogin($value){
		$this->deslogin=$value;
	}

	public function getdessenha(){
		 return $this ->dessenha; 
	}

	public function setdessenha($value){
		$this->dessenha=$value;
	}
	public function getdtcadastro(){
		 return $this ->dtcadastro;
	}

	public function setdtcadastro($value){
		$this->dtcadastro=$value;
	}
	public function loadById($id){
		$sql = new sql();
		$results = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(
            ":ID"=>$id
		));
		if(count($results)>0){
			$row = $results[0];


			$this->setIdusuario($row['idusuario']);
			$this->setdeslogin($row['deslogin']);
			$this->setdessenha($row['dessenha']);
			$this->setdtcadastro(new datetime($row['dtcadastro']));
		}
	}
	public function __toString(){
		return json_encode(array(
   			"idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getdeslogin(),
            "dessenha"=>$this->getdessenha(),
            "dtcadastro"=>$this->getdtcadastro()
     
		));
	}
}

?>