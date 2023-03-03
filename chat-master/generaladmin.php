<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; 

?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
        <div id="back">
             <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p class="red">Configuraciones administrativas</p>
          </div>
      </header>

      <div class="users-list">
        <span class="text">Administrar:</span>
        <select name="opciones" id="opciones">
            <option value="0">Areas</option>
            <option value="1">Grupos</option>
        </select>
        <br>
        <br>
            <input id="nombrearea" type="text" class="name" placeholder="Nombre Area">
            <button type="button" class="btn-borde" onclick="agregar()">Agregar</button>
        <div id="mensaje"></div>

        <div class="users-list">
        <a>
            <div class="content">
                
                    <div>
                        <table >
                            <thead>
                                <td>Nombre Area</td>
                                <td>Eliminar</td>
                            </thead>
                            
                            <tbody id="tablausers">
                           <?php $areas = mysqli_query($conn, "SELECT * FROM areas");
                            foreach($areas as $value){?>
                            <tr>
                                <td>
                                <span><?php echo $value['n_area'] ?></span>
                                </td>
                                <td>
                                <button type="button" id="<?php echo $value['id_area'] ?>" onclick="borrararea(this.id)" class="btn-borde"><i class="fa-solid fa-xmark"></i></button>
                                </td> 
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <span class="error" name="error" id="error"></span>
                    </div>
            </div>
        </a>
        </div>
        <!-- Next div -->
 
            <input id="nombregrupo" type="text" class="namegrupo" placeholder="Nombre Grupo">
            <button type="button" class="btn-borde" onclick="agregargrupos()">Agregar</button>
        <div id="mensaje"></div>

        <div class="users-list">
        <a>
            <div class="content">
                
                    <div>
                        <table >
                            <thead>
                                <td>Nombre Area</td>
                                <td>Eliminar</td>
                            </thead>
                            
                            <tbody id="tablausers2">
                           <?php $areas = mysqli_query($conn, "SELECT * FROM empresa_grupos");
                            foreach($areas as $value){?>
                            <tr>
                                <td>
                                <span><?php echo $value['n_grupo'] ?></span>
                                </td>
                                <td>
                                <button type="button" id="<?php echo $value['id_grupo'] ?>" onclick="borrargrupos(this.id)" class="btn-borde"><i class="fa-solid fa-xmark"></i></button>
                                </td> 
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <span class="error" name="error" id="error"></span>
                    </div>
            </div>
        </a>
        </div>
        

        
    </div>

      </div>
    </section>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="javascript/generaladmin.js"></script>

  <!-- <script type="text/javascript">
        window.addEventListener("load",function(){
          document.formulario.addEventListener("submit",validarFormulario);
        });		

        function validarFormulario(e){
          e = e || window.event;
          if(window.formulario.user1.value==0 || window.formulario.user2.value==0 ){
            e.preventDefault();
            document.getElementById("error").innerHTML= "Selecciona un usuario";
            document.getElementById("error").setAttribute("style","color:red;");
          }else if(window.formulario.user1.value==window.formulario.user2.value){
                e.preventDefault();
                document.getElementById("error").innerHTML= "No puedes elegir al mismo usuario para ver sus chats";
            document.getElementById("error").setAttribute("style","color:red;");
            }
        }
  </script> -->

</body>

</html>