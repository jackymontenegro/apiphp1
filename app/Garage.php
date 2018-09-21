<?php
error_reporting(E_ALL);//Coloca el error
ini_set('display_errors','1');
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../vendor/autoload.php';


date_default_timezone_set('America/Guatemala');
$cliente=new MongoDB\Client('mongodb+srv://Yaiza:1234@proyecto-xjnqy.gcp.mongodb.net/test?retryWrites=true');
$db= $cliente->dbCasa;
$collection = $db->garage;
$collectionC =$db->Contraseña;

	
	$date= date('l jS \of F Y ');
	$time = date('h:i:s A');
	$contrasenaIngresada = htmlspecialchars($_GET['contrasena'],ENT_QUOTES);
	$correcta = $collectionC->findOne();
	
	//Aqui iria la comparacion pero aun no sé en donde está almacenada la contraseña correcta
	if($correcta['password']==$contrasenaIngresada)
	{
		echo "1";
					$insert = array(
						"Fecha"=>$date,
						"Hora"=>$time,
						"Intento"=>"correcto"
					);
					
					
					if($collection->insertOne($insert)){
					}else{
					
					}
	}else
	{
		echo "0";
		
		$insert = array(
			"Fecha"=>$date,
			"Hora"=>$time,
			"Intento"=>"Incorrecto"
		);
		
		
		if($collection->insertOne($insert)){
		
		}else{
		
		}
	}
   

?>