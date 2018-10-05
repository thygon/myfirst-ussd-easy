<?php 
header("content-type:text/plain");

require 'database/connect.php';
require 'model/User.php';
$db = new Connect();
$user = new User();



$msg = $_GET['message'];
$phone = '0724765149';
$level = 0;

if(isset($msg)){

	$mgs_ex = explode("*", $msg);
    $level = count($mgs_ex);

	if($level == 0 or $level == 1 ){

		if($level < 1){
			mainMenu();
		}else{
			switch ($mgs_ex[0]) {
				case '1':
					login();
					break;
				case '2':
					register();
					break;
				case '3':
					about();
					break;
				
				default:
					mainMenu();
					break;
			}
		}
		
	}
	
	
}


function continueUssd($text){
   echo "CON ".$text;
}

function endUssd($text){
	echo "END ".$text;
}

function mainMenu(){
	$menu = "1. Login \n 
	         2. Register \n
	         3. About Us \n";
   continueUssd($menu);
}

function login(){
	continueUssd('login');
}

function register(){
	continueUssd('Register');
}

function about(){
	continueUssd('About USSD');
}