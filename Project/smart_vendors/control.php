
<?php
include_once('model.php');  // 1 model page load

class control extends model{  // 2 model class extends
	
	function __construct(){
		
		model::__construct();  // 3 call model __construct for connectivity
		$url=$_SERVER['PATH_INFO'];
		
		switch($url){
			
			case '/':
			include_once('index.php');
			break;
			
			case '/index':
			
			include_once('index.php');
			break;
			
			case '/vendors':
			$vendors_arr=$this->select('vendors');
			include_once('vendors.php');
			break;
			
			case '/contact':
			include_once('contact.php');
			break;
			
			case '/login':
			include_once('login.php');
			break;
			
			case '/register':
			include_once('register.php');
			break;
			
			default:
			echo "<h1>Page Not Found</h1>";
			break;
			
		}
		
		
	}
	
}
$obj=new control;
?>