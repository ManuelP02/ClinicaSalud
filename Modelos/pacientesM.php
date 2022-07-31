<?php
require_once "ConexionBD.php";

class PacientesM extends ConexionBD{

	//Crear pacientes
	static public function CrearPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(Apaterno, Amaterno, nombre, fecha, sexo, documento, usuario, clave, rol) VALUES (:Apaterno, :Amaterno, :nombre, :fecha, :sexo, :documento, :usuario, :clave, :rol)");

		$pdo ->bindParam(":Apaterno", $datosC["Apaterno"], PDO::PARAM_STR);
		$pdo ->bindParam(":Amaterno", $datosC["Amaterno"], PDO::PARAM_STR);
		$pdo ->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo ->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo ->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo ->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
		$pdo ->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo ->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo ->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);


			if($pdo -> execute()){

				return true;

			}

			$pdo -> close();
			$pdo = null;


	}


	///Ver pacientes 

	static public function VerPacientesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY Apaterno ASC");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY Apaterno ASC");

			$pdo ->bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch(); 

		}

			$pdo -> close();
			$pdo = null;


	}
	
		static public function VerPacientesNM($tablaBD, $idpaciente){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE idpaciente = $idpaciente");

		$pdo -> bindParam(":idpaciente", $idpaciente, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;	


	}



	//Borrar pacientes

	static public function BorrarPacienteM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE idpaciente = :idpaciente");

		$pdo -> bindParam(":idpaciente", $id, PDO::PARAM_INT);

		if($pdo -> execute()){

				return true;

			}

			$pdo -> close();
			$pdo = null;



	}



	///Actualizar pacientes

	static public function ActualizarPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET Apaterno = :Apaterno, Amaterno = :Amaterno, nombre = :nombre, fecha = :fecha, sexo = :sexo, documento = :documento, usuario = :usuario, clave = :clave WHERE idpaciente = :idpaciente");

		$pdo -> bindParam("idpaciente", $datosC["idpaciente"], PDO::PARAM_INT);
		$pdo -> bindParam("Apaterno", $datosC["Apaterno"], PDO::PARAM_STR);
		$pdo -> bindParam("Amaterno", $datosC["Amaterno"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam("fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam("sexo", $datosC["sexo"], PDO::PARAM_STR);
		$pdo -> bindParam("documento", $datosC["documento"], PDO::PARAM_STR);
		$pdo -> bindParam("usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam("clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

				return true;

			}

			$pdo -> close();
			$pdo = null;



	}


	///Inicio sesion pacientes

	static public function IngresarPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, Apaterno, Amaterno, nombre, sexo, documento, foto, rol, idpaciente FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;


	}


	///Ver perfil paciente

	static public function VerPerfilPacienteM($tablaBD, $idpaciente){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, Apaterno, Amaterno, nombre, sexo, documento, foto, rol, idpaciente FROM $tablaBD WHERE idpaciente = :idpaciente");

		$pdo -> bindParam(":idpaciente", $idpaciente, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;


	}


	///Actualizar perfil paciente

	static public function ActualizarPerfilPacienteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET Apaterno = :Apaterno, Amaterno = :Amaterno, nombre = :nombre, usuario = :usuario, clave = :clave, foto = :foto WHERE idpaciente = :idpaciente");

		$pdo -> bindParam("idpaciente", $datosC["idpaciente"], PDO::PARAM_INT);
		$pdo -> bindParam("Apaterno", $datosC["Apaterno"], PDO::PARAM_STR);
		$pdo -> bindParam("Amaterno", $datosC["Amaterno"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam("usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam("clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam("foto", $datosC["foto"], PDO::PARAM_STR);


		if($pdo -> execute()){

			return  true;


		}

		$pdo -> close();
		$pdo = null;	


	}


}



?>