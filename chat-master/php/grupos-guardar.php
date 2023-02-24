<?php
session_start();
include_once "config.php";
$ngrupo=$_POST['nombre'];
$outgoing_id = $_SESSION['unique_id'];

$usuariosgrupo=[];

if(isset($_POST['actualizar'])){
    $id_grupo=$_POST['idgrupo'];
    $sql3 = "SELECT * FROM grupo_integrante WHERE id_grupo = {$id_grupo}";
    $query3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($query3);
    foreach($query3 as $value){
        array_push($usuariosgrupo, $value['id_usuario']);
    }
    $borrar = json_decode($_POST['borrar']);
    $agregar = json_decode($_POST['agregar']);
    echo "agregar";
    var_dump($agregar);
    echo "borrar";
    var_dump($borrar);
    echo "usuarios grupo";
    var_dump($usuariosgrupo);

    //Borrar
    foreach($borrar as $value){ 
        $clave = array_search($value, $usuariosgrupo);
        if($value==$usuariosgrupo[$clave]){
            $del_query = mysqli_query($conn, "DELETE FROM grupo_integrante WHERE id_usuario = '{$value}' AND id_grupo = '{$id_grupo}'");
            echo 'Borrado';
        }  
    }

    //Agregar
    foreach($agregar as $value){ 
        $clave = array_search($value, $usuariosgrupo);
        if($value!=$usuariosgrupo[$clave]){
            $add_query = mysqli_query($conn, "INSERT INTO grupo_integrante (id_grupo, id_usuario) VALUES ('{$id_grupo}', '{$value}')");
            echo "agregados";
        }  
    }

    //Actualizar Nombre
    $up_name = mysqli_query($conn, "UPDATE grupos SET ngrupo ='{$ngrupo}' WHERE id_grupo = '{$id_grupo}'");
            echo "Nombre Actualizado";




}else{
    $insert_query = mysqli_query($conn, "INSERT INTO grupos (ngrupo, propietario) VALUES ('{$ngrupo}','{$outgoing_id}')");
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
}



?>