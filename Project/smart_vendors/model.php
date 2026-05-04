
<?php

//mvc

class model{
	
	public $conn="";
	function __construct(){
		$this->conn=new mysqli('localhost','root','','smart_vendor');
	}
	
	public function select($tbl){
		
		$sel="select * from $tbl";
		$run=$this->conn->query($sel);
		while($fetch=$run->fetch_object())
		{
			$arr[]=$fetch;
		}
		return $arr;
	}
}

$obj=new model;

?>
