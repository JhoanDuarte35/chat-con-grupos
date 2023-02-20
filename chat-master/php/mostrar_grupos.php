<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
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
        <img src="data:image/png;base64,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">
        <div class="details">
        <span>' . $row2['ngrupo'] .'</span>
        </div>
        </div>
    </a>
</div>';
}
echo $output;
}


    ?>