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
        <button><i class="fab fa-telegram-plane"></i></button>
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
      <form action="#">
                <span for="nombre">Nombre</span>
                <input id="nombre" name="nombre" type="text">
                <div>
                <span for="start">Fecha Inicio</span>
                <input type="date" id="start" name="trip-start"
                  value="2023-02-28"
                  min="2023-02-28" max="2999-02-28">
                  <span for="start">Fecha Fin</span>
                <input type="date" id="end" name="trip-end"
                  value="2018-07-22"
                  min="2018-01-01" max="2018-12-31">
                </div>
                <span for="participantes">Participantes:</span>
                <select name="participantes" id="participantes">
                  <option value="0" disabled selected>Seleccionar Usuarios</option>
                  <option value="s">Pepito Perez</option>
                </select>
                <input type="textarea" value="Hola" disabled>
                <button>Agregar</button>
      </form>
            </div>
            <div class="modal_botones">
                <a href="" class="boton">Crear Tarea</a>
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