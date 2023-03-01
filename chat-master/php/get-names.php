<?php
include_once "config.php";

$users = json_decode($_POST['users']);
var_dump($users);

$nombre=[];

foreach($users as $value){
    $sql = "SELECT * FROM users WHERE unique_id= '{$value}'";
    $datos = mysqli_query($conn, $sql);
    
    //array_push($nombre,$datos[''])
}

foreach($datos as $value){

    array_push($nombre,$value['lname']);

}



$nams = implode(",", $nombre);
echo $nams;
?>