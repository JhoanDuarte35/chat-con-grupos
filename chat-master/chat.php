<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        $grupo_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$grupo_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
          ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
          <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        <?php 
        } else {
          $sql2 = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo = {$grupo_id}");
          $row = mysqli_fetch_assoc($sql2); ?>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/grupo/puntual.png" alt="">
          <div class="details">
          <span><?php echo $row['ngrupo']?></span>

          <?php 
          $sql3 = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo = {$grupo_id}");
          $row3 = mysqli_fetch_assoc($sql3);
          if($row3['propietario']==$_SESSION['unique_id']){
          ?>
          <div>
          <a  href="admingrupo.php?idg=<?php echo $row['id_grupo']; ?>"><i class="fa-solid fa-gear"></i></a>
          </div>
          
          <?php
          }
          ?>

        <?php }
        ?>
        
        </div>
      </header>
      <div class="chat-box">

      </div>
      <div id="add_labels"></div>
      
      <form action="#" class="typing-area">
        <div id="tarea"><i class="fa-solid fa-list"></i></div>
        <div id="inputima"><a><i class="fa-solid fa-image"></i></a></div>
        <input id="file-input" style="display:none" type="file" name="image" accept="image/png,image/jpeg">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $grupo_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
        <button class="button"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

<!-- modal -->

    <div class="fondo_transparente">
        <div class="modal">
            <div class="modal_cerrar">
                <span>x</span>
            </div>
            <div class="modal_titulo">Crear tarea</div>
            <div class="modal_mensaje">
      <form>
                <div class="ntarea">
                  <span for="nombre">Nombre/Titulo:</span>
                  <input id="nombre" name="nombre" type="text">
                </div>
                
                <div class="fechas">
                <span for="start">Fecha Inicio:</span>
                <input type="date" id="start" name="trip-start"
                  value="2023-02-28"
                  min="2023-02-28" max="2999-02-28">
                  <span for="start">Fecha Fin:</span>
                <input type="date" id="end" name="trip-end"
                  value="2023-02-28"
                  min="2023-02-28" max="2999-02-28">
                </div>

                <div>
                  <label>Selecciona a quien le asignaras la tarea</label>
                  <br>
                  <input type="radio" name="tipo" value="usuario" id="usuario" onclick="selectuser()"> <label for="usuario">Usuario</label> 
                  <input type="radio" name="tipo" value="area" id="area" onclick="selectarea()"> <label for="area">Area</label> 
                  <br>
                </div>

                <?php 
                $sql="SELECT * FROM users WHERE NOT unique_id = {$_SESSION['unique_id']}";
                $usuarios = mysqli_query($conn, $sql);
                ?>
                <div class="participantes" id="partici">
                  <span for="participantes">Participantes:</span>
                  <select name="participantes" id="participantes">
                    <option value="0" disabled selected>Seleccionar Usuarios</option>
                    <?php
                      while($row=mysqli_fetch_assoc($usuarios)){
                    ?>
                    <option class="hola" id="5" value="<?php echo $row['unique_id']?>"><?php echo $row['fname'] . " " . $row['lname']?></option>
                    <?php
                      }
                    ?>
                  </select>
                <button type="button" onclick="adduser()">Agregar</button>
                </div>

                <div id="hi">

                </div>
                
                <textarea class="modaltextarea" name="descriparea" id="user-list" cols="35" rows="2" placeholder="Aquí saldran los participantes que agregues" disabled></textarea>
                <span for="descarptarea">Descripción</span>
                <textarea class="modaltextarea" name="descriparea" id="descriparea" cols="35" rows="2"></textarea>
                <span for="etiqueta">Etiqueta: </span>
                <select name="tiqueta" id="etiqueta">
                  <option value="0">Cambio aparato</option>
                  <option value="1">Otro cambio</option>
                </select>
                <div id="mensaje"></div>
                <div class="modal_botones">
                <button type="submit" class="boton">Crear tarea</button>
                </div>
      </form>
            </div>
            
        </div>
    </div>   

    <script type="text/javascript">
      document.getElementById("tarea").addEventListener("click",function(){
      document.getElementsByClassName("fondo_transparente")[0].style.display="block"
      return false;
      });

      document.getElementsByClassName("modal_cerrar")[0].addEventListener("click", function(){
      document.getElementsByClassName("fondo_transparente")[0].style.display="none";
})
    </script>




  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="javascript/chat.js"></script>

</body>

</html>