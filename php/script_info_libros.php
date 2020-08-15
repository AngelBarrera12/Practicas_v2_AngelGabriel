<?php
	//Variables de conexion a la BD
	//$host="localhost";
	//$bd="bd_web_mensaje";
	//$usuario="root";
	//$passwd="";

	//*** CONECTAR A LA BASE DE DATOS ***////
	try{
		//Establecer conexión con la BD
		$con=new PDO('mysql:host=127.0.0.1;dbname=bd_web_mensaje;charset=utf8','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//*** OBTENER LOS REGISTROS DE LA TABLA tbl_libros ***//
			//Preparar las sentencia SQL (SELECT)
			$stm=$con->prepare("SELECT * FROM tbl_libros");

			//Ejecutar la setencia SQL
			$stm->execute();

			//Obtener los registros de la tabla
			$resgistros=array();
			while ($fila=$stm->fetch(PDO::FETCH_ASSOC)) {
				$registros[]=$fila;
			}

		//Cerrar conexion con la BD
		$stm=null;
		$con=null;

		
		echo json_encode($registros);


	}catch(PDOException $ex){
		echo "Error: ".$ex->getMessage();
	}
?>
