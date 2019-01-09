<?php
class sql extends PDO {
    private $conn;

    public function __construct(){
  	     $this->conn = new PDO("mysql:host=localhost;dbname=bdphp7","root","");

  }
    private function setparams ($statments, $parameters = array ()){

   	  foreach ($parameters as $key =>$values){
	  	$this->setparam($statments, $key, $values);
	  }
   }

   private function setparam ($statments, $key, $values){
   	    $statments->bindparam ( $key, $values);
   }
   public function query ($rawquery, $params = array()){
	    $stmt = $this ->conn->prepare($rawquery);
	 
   $this ->setparams($stmt, $params);

        $stmt->execute();
        return $stmt;

}

  public function select ($rawquery,$params=array()){

  	  $stmt = $this ->query($rawquery, $params);
  	  return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }
}
?>