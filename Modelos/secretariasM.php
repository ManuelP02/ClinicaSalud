<?php 
require_once "ConexionBD.php";

class SecretariasM extends ConexionBD{
	///Ingreso secretarias
	static public function IngresarSecretariaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

		
	}


	///Ver perfil secretarias

	static public function VerPerfilSecretariaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;



	}


	///Actualizar perfil secretaria 


	static public function ActualizarPerfilSecretariaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET usuario = :usuario, clave = :clave, nombre = :nombre, apellido = :apellido, foto = :foto WHERE id = :id");

		$pdo ->bindParam(":id",$datosC["id"], PDO::PARAM_INT);
		$pdo ->bindParam(":usuario",$datosC["usuario"], PDO::PARAM_STR);
		$pdo ->bindParam(":clave",$datosC["clave"], PDO::PARAM_STR);
		$pdo ->bindParam(":nombre",$datosC["nombre"], PDO::PARAM_STR);
		$pdo ->bindParam(":apellido",$datosC["apellido"], PDO::PARAM_STR);
		$pdo ->bindParam(":foto",$datosC["foto"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;


		}

		$pdo -> close();
		$pdo = null;


	}


	///Mostrar secretarias

	// static public function VerSecretariasM($tablaBD){

	// 	$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

	// 	$pdo -> execute();

	// 	return $pdo -> fetchAll();

	// 	$pdo -> close();
	// 	$pdo = null;


	// }

		static public function VerSecM($tablaBD, $columna, $valor){

		if($columna == null) {

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY apellido ASC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido ASC");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetchAll();

		}




	}	

	//Editar secretaria

		static public function SecretariaM($tablaBD, $columna, $valor){

		if($columna != null) {

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}


	//Actualizar secretaria

	static public function ActualizarSecretariaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, usuario = :usuario, clave = :clave WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;
		}

		$pdo -> close();
		$pdo = null;

	}






	///Crear secretarias

	static public function CrearSecretariaM($tablaBD, $datosC){


		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, apellido, usuario, clave, rol) VALUES (:nombre, :apellido, :usuario, :clave, :rol)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
		$pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
		$pdo -> bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

		if($pdo -> execute()){

			return true;

		}else{

			return false;


		}

		$pdo -> close();
		$pdo = null;


	}


	///Eliminar secretarias
	static public function BorrarSecretariaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

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