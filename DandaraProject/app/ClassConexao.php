<?php 

namespace App;


require_once __DIR__ . "/../config/config.php";



class ClassConexao {

	
	
	public function conectar() {


		if(!isset($con)) {

			 $con = new \PDO("mysql:host=" . HOST . ";dbname=" . DB . "" , "" . USER . "" , "" . PASS . "");

		}

		return $con;

		echo $con;
	}
}