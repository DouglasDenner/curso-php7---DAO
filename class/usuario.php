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
		$results = $sql->select("SELECT * FROM bd_usuario WHERE idusuario = :ID", array(
            ":ID"=>$id
		));
		if(count($results)>0){
			
             $this ->setdata($results[0]);

		}
	}
	public static function getList(){
		$sql = new sql();
		return $sql->select("SELECT * FROM bd_usuario ORDER BY deslogin;");
	}
	public static function search($login){
		$sql = new sql();
		return $sql->select("SELECT * FROM bd_usuario WHERE deslogin LIKE :search ORDER BY deslogin", array(
			':search'=>"%".$login."%"
		));
	}
	public function login($login, $password){
		$sql = new sql();
		$results = $sql->select("SELECT * FROM bd_usuario WHERE deslogin = :login AND dessenha = :password", array(
            ":login"=>$login,
            ":password"=>$password
		));
		if(count($results)>0){
			
         $this ->setdata($results[0]);
           
	} else {
		throw new exception("login e/ou senha invalido");
	}
}
	public function setdata($data){
	    $this->setIdusuario($data['idusuario']);
		$this->setdeslogin($data['deslogin']);
		$this->setdessenha($data['dessenha']);
		$this->setdtcadastro(new datetime($data['dtcadastro']));
	}

	public function insert(){
		$sql = new sql();
		$results= $sql->select("CALL sp_usuario_insert(:login, :password)", array(
         ':login'=>$this->getdeslogin(),
         'password'=>$this->getdessenha()
		));
		if (count($results)>0){
            $this ->setdata($results[0]);
		}
	}
	public function __construct($login = "", $password = ""){
		$this->setdeslogin($login);
		$this->setdessenha($password);
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