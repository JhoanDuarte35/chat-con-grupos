<?php
    session_start();
    include_once "config.php";

    if(!isset($_POST['x'])){

    $idgrupo = mysqli_real_escape_string($conn, $_POST['id_grupo']);
  

    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM grupo_integrante WHERE id_grupo = {$idgrupo} ORDER BY id_integrante_grupo DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)) {
            $id_user=$row['id_usuario'];
            $rolgrupo=$row['tipo_u'];

            if($rolgrupo=="admin"){
                $clase="danger";
                $onclick="admin(this.id)";
            }else{
                $clase="warning";
                $onclick="admin(this.id)";
            }

            $sql3 = "SELECT * FROM users WHERE unique_id = {$id_user}";
            $query3 = mysqli_query($conn, $sql3);
            while ($row2 = mysqli_fetch_assoc($query3)) {
                if($row['id_usuario']!=$outgoing_id){
                    $output .= '
                    <div class="users-list">
                        <a id="'.$row['id_usuario'].'">
                        <div class="content">
                        <img src="php/images/grupo/' . $row2['img'] . '" alt="">
                        <div class="details">
                            <span>' . $row2['fname'] . " " . $row2['lname'] . '</span>
                        </div>
                        </div>
                        <div> 
                        <button class="btn btn-outline-'.$clase.'" title="Asignar rol admin" id="'.$row['id_usuario'].'" onclick="'.$onclick.'"><i class="fa-solid fa-crown"></i></button>
                        <button class="btn btn-outline-danger" id="'.$row['id_usuario'].'" onclick="borraruser(this.id)"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        </a>
                    </div>';
                }
                 
            }}}
    echo $output;
        }else{
            $data=json_decode($_POST['x']);
            $idgrupo=$data->idgrupo;

            $outgoing_id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM grupo_integrante WHERE id_grupo = {$idgrupo} ORDER BY id_integrante_grupo DESC";
            $query = mysqli_query($conn, $sql);
            $output = "";
            if(mysqli_num_rows($query) == 0){
                $output .= "No users are available to chat";
            }elseif(mysqli_num_rows($query) > 0){
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_user=$row['id_usuario'];
                    $rolgrupo=$row['tipo_u'];

                    if($rolgrupo=="admin"){
                        $clase="danger";
                        $onclick="admin(this.id)";
                    }else{
                        $clase="warning";
                        $onclick="admin(this.id)";
                    }

                    $sql3 = "SELECT * FROM users WHERE unique_id = {$id_user}";
                    $query3 = mysqli_query($conn, $sql3);
                    while ($row2 = mysqli_fetch_assoc($query3)) {
                        if($row['id_usuario']!=$outgoing_id){
                            $output .= '
                            <div class="users-list">
                                <a id="'.$row['id_usuario'].'">
                                <div class="content">
                                <img src="php/images/grupo/' . $row2['img'] . '" alt="">
                                <div class="details">
                                    <span>' . $row2['fname'] . " " . $row2['lname'] . '</span>
                                </div>
                                </div>
                                <div> 
                                <button class="btn btn-outline-'.$clase.'" title="Asignar rol admin" id="'.$row['id_usuario'].'" onclick="'.$onclick.'"><i class="fa-solid fa-crown"></i></button>
                                <button class="btn btn-outline-danger" id="'.$row['id_usuario'].'" onclick="borraruser(this.id)"><i class="fa-solid fa-minus"></i></button>
                                </div>
                                </a>
                            </div>';
                        }
                        
                    }}}
            echo $output;
    
        }

?>
    

    