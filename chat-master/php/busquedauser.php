<?php
    session_start();
    include_once "config.php";
  
    
    if(!isset($_POST['x'])){
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data-user-group.php";
    }else{
        $output .= 'No se encontraron usuarios';
    }
    echo $output;

    }else{
        $data = json_decode($_POST['x']);
        $id_user_group = $data[0]->id_user_group;
        $estado= $data[0]->estado;

        $sql3 = "SELECT * FROM users WHERE unique_id = {$id_user_group}";
        $output = "";
        $query3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($query3) > 0){
            include_once "data-user-group.php";
        }else{
            $output .= 'No se encontraron usuarios';
        }
        echo $output;
    }
  

?>