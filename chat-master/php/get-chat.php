<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $output = "";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $sql2="SELECT * FROM grupos WHERE id_grupo={$incoming_id}";
    $query2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($query2) > 0) {
        $sql3 = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (incoming_msg_id = {$incoming_id}) ORDER BY msg_id";
        $query3 = mysqli_query($conn, $sql3);
        if (mysqli_num_rows($query3) > 0) {
            while ($row = mysqli_fetch_assoc($query3)) {
                if ($row['outgoing_msg_id'] === $outgoing_id) {
                    if($row['tipo']!=1){
                        $output .= '<div class="chat outgoing">
                        <div class="details">
                            <p>' . $row['msg'] . '</p>
                        </div>
                        </div>';
                    }else{
                        $output .= '<div class="chat outgoing">
                        <div class="details">
                            <img id="msimg" src="php/images/chat/' . $row['imagen'] . '" alt="">
                        </div>
                        </div>';
                    }
                    
                } else {
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/' . $row['img'] . '" alt="">
                                    <div class="details">
                                    <span> ' . $row['fname'] . " " . $row['lname'] . ' </span>
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                    </div>';
                }
            }
        }else{
            $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
        }
    }else{
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
    if ($row['outgoing_msg_id'] === $outgoing_id) {
        $output .= '<div class="chat outgoing">
                        <div class="details">
                            <p>' . $row['msg'] . '</p>
                        </div>
                        </div>';
    } else {
        $output .= '<div class="chat incoming">
                        <img src="php/images/' . $row['img'] . '" alt="">
                        <div class="details">
                            <p>' . $row['msg'] . '</p>
                        </div>
                        </div>';
    }
    }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }}
        echo $output;
    }else {
        header("location: ../login.php");
    }

    
  
    