<?php
session_start();
date_default_timezone_set('America/Bogota');
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
            $unavez=false;
            $unavez2=false;
            $cuando="";
            $dia = date('Y-m-d');
            while ($row = mysqli_fetch_assoc($query3)) {
               
                if($row['fecha']==$dia){
                    $cuando="Hoy";
                    if($unavez==false){
                        $output .='<spam class="dia"> ' . $cuando . '</spam>';
                        $unavez = true;
                    }
                    
                }else{
                    $antes=$row['fecha'];
                        if($antes==$row['fecha']){
                            if($unavez2==false){
                                $output .='<spam class="dia"> ' . $antes . '</spam>';
                                $unavez2 = true;
                                $cuando="";
                            }else{
                                $unavez2=false;
                            }
                        }
                    
                }

                if ($row['outgoing_msg_id'] === $outgoing_id) {
                   
                    if($row['tipo']!=1){
                        $output .= '
                        <div class="chat outgoing">
                        <div class="details">
                            <p>' . $row['msg'] . ' <br> <spam class="horasali"> ' . $row['hora'] . '</spam></p>
                        </div>
                        </div>';
                    }else{
                        $output .= '<div class="chat outgoing">
                        <div class="details">
                            <img id="msimg" src="php/images/chat/' . $row['imagen'] . '" alt="">
                            <br> <spam class="horasali"> ' . $row['hora'] . '</spam>
                        </div>
                        </div>';
                    }
                    
                } else {
                    if($row['tipo']!=1){
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/' . $row['img'] . '" alt="">
                                    <div class="details">
                                    <span> ' . $row['fname'] . " " . $row['lname'] . ' </span>
                                        <p>' . $row['msg'] . ' <br> <spam class="horaentra"> ' . $row['hora'] . '</spam></p>
                                    </div>
                                    </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/' . $row['img'] . '" alt="">
                                    <div class="details">
                                    <div class="img-nombre">
                                    <span> ' . $row['fname'] . " " . $row['lname'] . ' </span>
                                    <img id="msimg" src="php/images/chat/' . $row['imagen'] . '" alt="">
                                    <spam class="horaentra"> ' . $row['hora'] . '</spam>
                                    </div>
                                    </div>
                                    </div>';
                }
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
            $unavez=false;
            $unavez2=false;
            $cuando="";
            $dia = date('Y-m-d');
        while ($row = mysqli_fetch_assoc($query)) {

            
               
                if($row['fecha']==$dia){
                    $cuando="Hoy";
                    if($unavez==false){
                        $output .='<spam class="dia"> ' . $cuando . '</spam>';
                        $unavez = true;
                    }
                    
                }else{
                    $antes=$row['fecha'];
                        if($antes==$row['fecha']){
                            if($unavez2==false){
                                $output .='<spam class="dia"> ' . $antes . '</spam>';
                                $unavez2 = true;
                                $cuando="";
                            }else{
                                $unavez2=false;
                            }
                        }
                    
                }

            




    if ($row['outgoing_msg_id'] === $outgoing_id) {
        if($row['tipo']!=1){
            $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>' . $row['msg'] . ' <spam class="horasali"> ' . $row['hora'] . '</spam></p>
                            </div>
                            </div>';
            }else{
            $output .= '<div class="chat outgoing">
                <div class="details">
                    <img id="msimg" src="php/images/chat/' . $row['imagen'] . '" alt="">
                    <spam class="horasali"> ' . $row['hora'] . '</spam>
                </div>
                </div>'; 
            }
    } else {
        if($row['tipo']!=1){
            $output .= '<div class="chat incoming">
                            <img src="php/images/' . $row['img'] . '" alt="">
                            <div class="details">
                                <p>' . $row['msg'] . ' <spam class="horaentra"> ' . $row['hora'] . '</spam></p>
                            </div>
                            </div>';
        }else{
            $output .= '<div class="chat incoming">
                <img src="php/images/' . $row['img'] . '" alt="">
                <div class="details">
                <img id="msimg" src="php/images/chat/' . $row['imagen'] . '" alt="">
                <spam class="horaentra"> ' . $row['hora'] . '</spam>
                </div>
                </div>';
        }
    }
    }
    } else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }}
        echo $output;
    }else {
        header("location: ../login.php");
    }

    
  
    