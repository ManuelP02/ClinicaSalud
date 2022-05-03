<?php

require_once "ConexionBD.php";

class ServiciosM extends ConexionBD{

	//Crear servicios

	static public function CrearServicioM($tablaBD, $datos){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre, costo, idconsultorio) VALUES (:nombre, :costo, :idconsultorio)");

		$pdo -> bindParam (":nombre", $datos["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam (":costo", $datos["costo"], PDO::PARAM_STR);
		$pdo -> bindParam (":idconsultorio", $datos["idconsultorio"], PDO::PARAM_INT);


		if($pdo -> execute()){

			return true;

		}

		$pdo -> close();
		$pdo = null;



	}


	///Ver servicios 

	static public function VerServiciosM($tablaBD, $columna, $valor){


		if($columna == null){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE idconsultorio = $_SESSION[idconsultorio]");

			$pdo -> execute();

			return $pdo -> fetchAll();


		}


		else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();


			return $pdo -> fetch();


		}




	}
		static public function VerServiciosTM($tablaBD, $columna, $valor){


		if($columna == null){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();


		}


		else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();


			return $pdo -> fetch();


		}

	}

		static public function EditarServiciosM($tablaBD, $idservicio){

		$pdo = ConexionBD::cBD()->prepare("SELECT idservicio, nombre, costo, idconsultorio FROM $tablaBD WHERE idservicio = :idservicio");
		$pdo -> bindParam(":idservicio", $idservicio, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


		static public function ActualizarServiciosM($tablaBD, $datosC){


		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, costo = :costo, idconsultorio = :idconsultorio WHERE idservicio = :idservicio");

		$pdo ->bindParam(":idservicio", $datosC["idservicio"], PDO::PARAM_INT);
		$pdo ->bindParam(":idconsultorio", $datosC["idconsultorio"], PDO::PARAM_INT);
		$pdo ->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo ->bindParam(":costo", $datosC["costo"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true; 
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;




	}


	///Borrar servicio 

	static public function BorrarServicioM($tablaBD, $idservicio){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE idservicio = :idservicio");

		$pdo -> bindParam(":idservicio", $idservicio, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;



	}



}





?>