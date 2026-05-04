
<?php
include_once('../model.php');  // 1 model page load

class control extends model{  // 2 model class extends
	
	function __construct(){
		
		model::__construct();  // 3 call model __construct for connectivity
		$url=$_SERVER['PATH_INFO'];
		
		switch($url){
			
			case '/':
			include_once('index.php');
			break;
			
			case '/add_vendors':
			include_once('add_vendors.php');
			break;
			
			case '/view_vendors':
			$vendors_arr=$this->select('vendors');
			include_once('view_vendors.php');
			break;
			
			case '/view_categories':
			$categories_arr=$this->select('categories');
			include_once('view_categories.php');
			break;
			
			default:
			echo "<h1>Page Not Found</h1>";
			break;
			
		}
		
		
	}
	
}
$obj=new control;
?>