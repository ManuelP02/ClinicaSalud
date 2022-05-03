<?php

require_once "ConexionBD.php";

class ConsultoriosM extends ConexionBD{

	///Crear consultorios
	static public function CrearConsultorioM($tablaBD, $consultorio){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombreconsultorio) VALUES (:nombreconsultorio)");

		$pdo -> bindParam(":nombreconsultorio", $consultorio["nombreconsultorio"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true; 
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;

	}

	///Ver consultorios 

	static public function VerConsultoriosM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();


		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch();


		}


	}

	

	


	///Eliminar consultorio

	static public function BorrarConsultorioM($tablaBD, $idconsultorio){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE idconsultorio = :idconsultorio");

		$pdo -> bindParam(":idconsultorio", $idconsultorio, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true; 
		}else{
			return false;
		}

		$pdo -> close();
		$pdo = null;	


	}


	///Editar consultorios

	static public function EditarConsultoriosM($tablaBD, $idconsultorio){

		$pdo = ConexionBD::cBD()->prepare("SELECT idconsultorio, nombreconsultorio FROM $tablaBD WHERE idconsultorio = :idconsultorio");
		$pdo -> bindParam(":idconsultorio", $idconsultorio, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;



	}


	///Actualizar consultorio

	static public function ActualizarConsultoriosM($tablaBD, $datosC){


		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombreconsultorio = :nombreconsultorio WHERE idconsultorio = :idconsultorio");

		$pdo ->bindParam(":idconsultorio", $datosC["idconsultorio"], PDO::PARAM_INT);
		$pdo ->bindParam(":nombreconsultorio", $datosC["nombreconsultorio"], PDO::PARAM_STR);

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