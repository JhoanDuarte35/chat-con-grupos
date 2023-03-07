<?php
include_once "config.php";



if(isset($_POST['tipo'])){
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
}else{
        $data = json_decode($_POST['x']);
        $output="";
        if($data[0]->tipo==1){

            $id_area=$data[0]->id_area;
            $sql="SELECT * FROM etiquetas WHERE id_area= {$id_area}";
            $etiquetas_area = mysqli_query($conn, $sql);
            foreach($etiquetas_area as $value){
                $output .='
                    <option value="'.$value['id_etiqueta'].'">'.$value['descrip_etiq'].'</option>
                ';
            }
            echo $output;
        }
}


?>