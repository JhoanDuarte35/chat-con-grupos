<?php
include_once "config.php";

$users = json_decode($_POST['users']);
$nombre=[];

foreach($users as $value){
    $sql = "SELECT * FROM users WHERE unique_id= '{$value}'";
    $datos = mysqli_query($conn, $sql);
    foreach($datos as $value){

        array_push($nombre,$value['fname'] . " " . $value['lname']);
    
    }
}

$nams = implode(", ", $nombre);
echo $nams;

?>