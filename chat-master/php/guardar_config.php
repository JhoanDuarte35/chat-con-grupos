<?php
include_once "config.php";

if(isset($_POST['x'])){
    $data = json_decode($_POST['x']);
    $estado= $data[0]->estado;

    if($estado==0){
        $borrar=$data[0]->borrar;
        if($borrar==false){
            $narea = $data[0]->nombre;

            $sql="INSERT INTO areas (n_area) VALUES ('{$narea}')";
            $status = mysqli_query($conn, $sql);
            $areas = mysqli_query($conn, "SELECT * FROM areas");
            $output=mostrartabla($areas);
            echo $output;
        }else{
            $id = $data[0]->id;

            $sql="DELETE FROM areas WHERE id_area = '{$id}'";
            $status = mysqli_query($conn, $sql);
            if($status!=0){
                $areas = mysqli_query($conn, "SELECT * FROM areas");
                $output=mostrartabla($areas);
                echo $output;
            }else{
                echo "no se pudo eliminar el dato";
            } 
        }
        
    }elseif($estado==1){
        $borrar=$data[0]->borrar;

        if($borrar==false){
            
            $ngrupo = $data[0]->nombre;


                $sql="INSERT INTO empresa_grupos (n_grupo) VALUES ('{$ngrupo}')";
                $status = mysqli_query($conn, $sql);
                $grupos = mysqli_query($conn, "SELECT * FROM empresa_grupos");
                $output=mostrartablagrupos($grupos);
                echo $output;

        }else{
            $id = $data[0]->id_grupo;

                $sql="DELETE FROM empresa_grupos WHERE id_grupo = '{$id}'";
                $status = mysqli_query($conn, $sql);
                if($status!=0){
                    $grupos = mysqli_query($conn, "SELECT * FROM empresa_grupos");
                    $output=mostrartablagrupos($grupos);
                    echo $output;
                }else{
                    echo "no se pudo eliminar el dato";
                }
            }
}elseif($estado==2){
    $t_img = $data[0]->t_img;
    $sql="UPDATE config_generales SET t_imgs = {$t_img} WHERE id_config = 1";
        $status = mysqli_query($conn, $sql);
        if($status>0){
            $t_img2=$t_img/1000;
           echo "El tamaño de los documentos actualmente es de: $t_img bytes o $t_img2 Kb";
        }else{
            echo "no se pudo actualizar el tamaño";
        }
}
}else{
    echo "no hay datos de envio";
}

function mostrartabla($areas){

    $output="";
    
    foreach($areas as $value){
    $output .='
            <tr>
            <td>
            <span>' . $value['n_area'] . '</span>
            </td>
            <td>
            <button type="button" id="' . $value['id_area'] . '" onclick="borrararea(this.id)" class="btn-borde"><i class="fa-solid fa-xmark"></i></button>
            </td>
            </tr> ';
                
    }  

    return $output;
}

function mostrartablagrupos($grupos){
    $output="";
    
    foreach($grupos as $value){
    $output .='
            <tr>
            <td>
            <span>' . $value['n_grupo'] . '</span>
            </td>
            <td>
            <button type="button" id="' . $value['id_grupo'] . '" onclick="borrargrupos(this.id)" class="btn-borde"><i class="fa-solid fa-xmark"></i></button>
            </td>
            </tr> ';
                
    }  

    return $output;
}
?>