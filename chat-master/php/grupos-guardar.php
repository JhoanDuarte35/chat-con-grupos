<?php
session_start();
include_once "config.php";
$ngrupo=$_POST['nombre'];
$outgoing_id = $_SESSION['unique_id'];

$insert_query = mysqli_query($conn, "INSERT INTO grupos (ngrupo) VALUES ('{$ngrupo}')");
echo "Grupo Creado con exito";

$sql = mysqli_query($conn, "SELECT * FROM grupos WHERE ngrupo = '{$ngrupo}'");
$row = mysqli_fetch_assoc($sql);
$id_grupo = $row['id_grupo'];
$data = json_decode($_POST['array']);
array_push($data, $outgoing_id);
var_dump($data);

foreach($data as $value){ 

    $insert_query = mysqli_query($conn, "INSERT INTO grupo_integrante (id_grupo, id_usuario) VALUES ('{$id_grupo}', '{$value}')");
}
echo "Integrantes guardados con exito";

?>