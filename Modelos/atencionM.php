<?php 

require_once "ConexionBD.php";

class AtencionesM extends ConexionBD{

	///Crear atencion

	static public function CrearAtencionM($tablaBD, $atencion){

	$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(idpaciente, antecedentes, alergias, persona_responsable, intervenciones_quirurgicas, vacunascompletas, cel, email, estado_civil, ocupacion, fecha) VALUES (:idpaciente,:antecedentes, :alergias, :persona_responsable, :intervenciones_quirurgicas, :vacunascompletas, :cel, :email, :estado_civil, :ocupacion, :fecha)");

	$pdo -> bindParam(":idpaciente", $atencion["idpaciente"], PDO::PARAM_INT);
	$pdo -> bindParam(":antecedentes", $atencion["antecedentes"], PDO::PARAM_STR);
	$pdo -> bindParam(":alergias", $atencion["alergias"], PDO::PARAM_STR);
	$pdo -> bindParam(":persona_responsable", $atencion["persona_responsable"], PDO::PARAM_STR);
	$pdo -> bindParam(":intervenciones_quirurgicas", $atencion["intervenciones_quirurgicas"], PDO::PARAM_STR);
	$pdo -> bindParam(":vacunascompletas", $atencion["vacunascompletas"], PDO::PARAM_STR);
	$pdo -> bindParam(":cel", $atencion["cel"], PDO::PARAM_STR);
	$pdo -> bindParam(":email", $atencion["email"], PDO::PARAM_STR);	
	$pdo -> bindParam(":estado_civil", $atencion["estado_civil"], PDO::PARAM_STR);	
	$pdo -> bindParam(":ocupacion", $atencion["ocupacion"], PDO::PARAM_STR);	
	$pdo -> bindParam(":fecha", $atencion["fecha"], PDO::PARAM_STR);				

	if($pdo -> execute()){

		return true;
	}else{
		return false;
	}

	$pdo -> close();
	$pdo = null;



	}


	//Ver historial
	static public function VerHistorialM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT idpaciente, antecedentes, alergias, persona_responsable, intervenciones_quirurgicas, vacunascompletas, cel, email, estado_civil, ocupacion, fecha, actualizaciones, fechaAct FROM $tablaBD WHERE $id = idpaciente");

		$pdo -> bindParam(":idpaciente", $id, PDO::PARAM_INT);
		$pdo ->execute();

		return $pdo -> fetch();

		$pdo-> close();
		$pdo = null;



	}

	///Actualizar historial

	static public function ActualizarAtencionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET antecedentes = :antecedentes, alergias = :alergias, persona_responsable = :persona_responsable, intervenciones_quirurgicas = :intervenciones_quirurgicas, vacunascompletas = :vacunascompletas, cel = :cel, email = :email, estado_civil = :estado_civil, ocupacion = :ocupacion, fecha = :fecha, actualizaciones = :actualizaciones, fechaAct = :fechaAct WHERE idpaciente = :idpaciente");

		$pdo -> bindParam(":idpaciente", $datosC["idpaciente"], PDO::PARAM_INT);
		$pdo -> bindParam(":antecedentes", $datosC["antecedentes"], PDO::PARAM_STR);
		$pdo -> bindParam(":alergias", $datosC["alergias"], PDO::PARAM_STR);
		$pdo -> bindParam(":persona_responsable", $datosC["persona_responsable"], PDO::PARAM_STR);
		$pdo -> bindParam(":intervenciones_quirurgicas", $datosC["intervenciones_quirurgicas"], PDO::PARAM_STR);
		$pdo -> bindParam(":vacunascompletas", $datosC["vacunascompletas"], PDO::PARAM_STR);
		$pdo -> bindParam(":cel", $datosC["cel"], PDO::PARAM_STR);
		$pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado_civil", $datosC["estado_civil"], PDO::PARAM_STR);
		$pdo -> bindParam(":ocupacion", $datosC["ocupacion"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":actualizaciones", $datosC["actualizaciones"], PDO::PARAM_STR);
		$pdo -> bindParam(":fechaAct", $datosC["fechaAct"], PDO::PARAM_STR);



		if($pdo -> execute()){

		return true;
	}else{
		return false;
	}

	$pdo -> close();
	$pdo = null;


	}

		static public function ActualizarRecetaM($tablaBD, $datosC){

	$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET idreceta = :idreceta, idservicio = :idservicio, motivo = :motivo, medicamento = :medicamento, dosis = :dosis, duracion = :duracion, pago = :pago, plan = :plan, fecha = :fecha WHERE idreceta = :idreceta");

		$pdo -> bindParam(":idreceta", $datosC["idreceta"], PDO::PARAM_INT);
		$pdo -> bindParam(":idservicio", $datosC["idservicio"], PDO::PARAM_INT);
		$pdo -> bindParam(":motivo", $datosC["motivo"], PDO::PARAM_STR);
		$pdo -> bindParam(":medicamento", $datosC["medicamento"], PDO::PARAM_STR);
		$pdo -> bindParam(":dosis", $datosC["dosis"], PDO::PARAM_STR);
		$pdo -> bindParam(":duracion", $datosC["duracion"], PDO::PARAM_STR);
		$pdo -> bindParam(":pago", $datosC["pago"], PDO::PARAM_STR);
		$pdo -> bindParam(":plan", $datosC["plan"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);

		if($pdo -> execute()){

		return true;
	}else{
		return false;
	}

	$pdo -> close();
	$pdo = null;


	}

	static public function CrearRecetaM($tablaBD, $crear){

$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_doctor, idconsultorio, idpaciente, idservicio, motivo, medicamento, dosis, duracion, pago, plan, fecha) VALUES (:id_doctor, :idconsultorio,:idpaciente, :idservicio, :motivo, :medicamento, :dosis, :duracion, :pago, :plan, :fecha)");

	$pdo -> bindParam(":id_doctor", $crear["id_doctor"], PDO::PARAM_INT);
	$pdo -> bindParam(":idconsultorio", $crear["idconsultorio"], PDO::PARAM_INT);
	$pdo -> bindParam(":idpaciente", $crear["idpaciente"], PDO::PARAM_INT);
	$pdo -> bindParam(":idservicio", $crear["idservicio"], PDO::PARAM_INT);
	$pdo -> bindParam(":motivo", $crear["motivo"], PDO::PARAM_STR);
	$pdo -> bindParam(":medicamento", $crear["medicamento"], PDO::PARAM_STR);
	$pdo -> bindParam(":dosis", $crear["dosis"], PDO::PARAM_STR);
	$pdo -> bindParam(":duracion", $crear["duracion"], PDO::PARAM_STR);
	$pdo -> bindParam(":pago", $crear["pago"], PDO::PARAM_STR);
	$pdo -> bindParam(":plan", $crear["plan"], PDO::PARAM_STR);	
	$pdo -> bindParam(":fecha", $crear["fecha"], PDO::PARAM_STR);			

	if($pdo -> execute()){

		return true;
	}else{
		return false;
	}

	$pdo -> close();
	$pdo = null;



	}


	///Ver recetas

	static public function VerRecetasM($tablaBD, $columna, $valor){

		$id = substr($_GET["url"], 8);
		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE idpaciente = $id");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE idpaciente = $id");

			$pdo ->bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetch(); 

		}

			$pdo -> close();
			$pdo = null;


	}	


	static public function VerRecM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT id_doctor, idpaciente, idreceta, idservicio, motivo, medicamento, dosis, duracion, pago, plan, fecha FROM $tablaBD WHERE $id = idreceta");

		$pdo -> bindParam(":idreceta", $id, PDO::PARAM_INT);
		$pdo ->execute();

		return $pdo -> fetch();

		$pdo-> close();
		$pdo = null;



	}
		static public function VerRecNM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("SELECT id_doctor, idpaciente, idreceta, idservicio, motivo, medicamento, dosis, duracion, pago, plan, fecha FROM $tablaBD WHERE $id = idreceta");

		$pdo -> bindParam(":idreceta", $id, PDO::PARAM_INT);
		$pdo ->execute();

		return $pdo -> fetch();

		$pdo-> close();
		$pdo = null;



	}




}


