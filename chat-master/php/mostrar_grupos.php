<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$output = "";
$sql2 = mysqli_query($conn, "SELECT * FROM grupo_integrante WHERE id_usuario = '{$outgoing_id}'");
$row = mysqli_fetch_assoc($sql2);
if(mysqli_num_rows($sql2) == 0){
    $output .= "No estas en ningún grupo";
}elseif(mysqli_num_rows($sql2) > 0){
    foreach($sql2 as $value){
    $id_grupo=$value['id_grupo'];
    $sql3 = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo = '{$id_grupo}'");
    $row2 = mysqli_fetch_assoc($sql3);
    $output .= 
    '
    <div class="users-list">
    <a href="chat.php?user_id=' . $row2['id_grupo'] . '">
        <div class="content">
        <img src="php/images/grupo/puntual.png">
        <div class="details">
        <span>' . $row2['ngrupo'] .'</span>
        </div>
        </div>
    </a>
</div>';
}
}
echo $output;


    ?>