<?php 
include("ConexionBD.php");

if(isset($_POST["idcita"]))
{
    $idcita = $_POST['idcita'];
    $sql = "DELETE FROM citas WHERE idcita = $idcita"; 
    $conn->query($sql);
}   
?>