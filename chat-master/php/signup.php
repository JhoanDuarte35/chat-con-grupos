<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$rol = mysqli_real_escape_string($conn, $_POST['rol']);
$empresa = mysqli_real_escape_string($conn, $_POST['empresa']);
$area = mysqli_real_escape_string($conn, $_POST['area']);
$grupo = mysqli_real_escape_string($conn, $_POST['grupo']);



if (!empty($fname) && !empty($lname) && !empty($username) && !empty($password) && !empty($rol) && !empty($empresa)&& $area!=0 && $grupo!=0) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$username - ¡Este username ya existe!";
        } else {
                    $img_name="";
                    if($empresa==1){
                        $img_name="puntual.png";
                    }else{
                        $img_name="clab.jpeg";
                    }
                            $ran_id = rand(time(), 100000000);
                            $status = "Desconectado";
                            $encrypt_pass = md5($password);
                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, username, password, img, status, rol, id_empresa, id_area, id_grupo)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$username}', '{$encrypt_pass}', '{$img_name}', '{$status}', '{$rol}', '{$empresa}', '{$area}', '{$grupo}')");
                            if ($insert_query) {
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE username = '{$username}'");
                                if (mysqli_num_rows($select_sql2) > 0) {
                                    $result = mysqli_fetch_assoc($select_sql2);
                                 
                                    echo "Proceso Exitoso";
                                } else {
                                    echo "¡Este Usuario no existe!";
                                }
                            } else {
                                echo "Algo salió mal. ¡Inténtalo de nuevo!";
                            }
                        
            
        }
} else {
    echo "¡Todos los campos de entrada son obligatorios!";
}
