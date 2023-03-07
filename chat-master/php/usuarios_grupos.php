<?php
    if(isset($query)){
        while ($row = mysqli_fetch_assoc($query)) {
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No hay mensajes disponibles";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if (isset($row2['outgoing_msg_id'])) {
                ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tu: " : $you = "";
            } else {
                $you = "";
            }
            ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
            ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
            $output .= '
                        <div class="users-list">    
                            <a id="'.$row['unique_id'].'">
                            <div class="content">
                            <img src="php/images/grupo/' . $row['img'] . '" alt="">
                            <div class="details">
                                <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                            </div>
                            </div>
                            <div> 
                            <button class="btn btn-outline-success" id="'.$row['unique_id'].'" onclick="myfuncion(this.id)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            </a>
                            </div>';
        }
    }else{
            while ($row = mysqli_fetch_assoc($query3)) {

                if(!$estado){
                    $output .= '
                    <div class="users-list">
                        <a id="'.$row['unique_id'].'">
                        <div class="content">
                        <img src="php/images/grupo/' . $row['img'] . '" alt="">
                        <div class="details">
                            <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                        </div>
                        </div>
                        <div> 
                        <button class="btn btn-outline" id="'.$row['unique_id'].'" onclick="borraruser(this.id)"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        </a>
                    </div>';    
                }else{
                    $output .= '
                        <div class="users-list">    
                            <a id="'.$row['unique_id'].'">
                            <div class="content">
                            <img src="php/images/grupo/' . $row['img'] . '" alt="">
                            <div class="details">
                                <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                            </div>
                            </div>
                            <div> 
                            <button class="btn btn-outline-success" id="'.$row['unique_id'].'" onclick="myfuncion(this.id)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            </a>
                            </div>';
                }
                
                            }
        
    }

