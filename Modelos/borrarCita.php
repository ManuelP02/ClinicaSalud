<?php 
require_once "ConexionBD.php";

if(isset($_POST["idcita"]))
{
        $idcita = $_POST['idcita'];
        $pdo = ConexionBD::cBD()->prepare("DELETE FROM citas WHERE idcita = :idcita");
        $pdo -> bindParam(":idcita", $idcita, PDO::PARAM_INT);
        if($pdo -> execute()){
            return true;

        }else{
            return false;
        }

        $pdo -> close();
        $pdo = null;
}   
?>