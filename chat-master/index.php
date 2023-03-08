<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}elseif( $_SESSION['rol']==1){
  header("location: users.php");
}else{

?>

<?php include_once "header.php";
      include_once "php/config.php"; 
      $sql=mysqli_query($conn, "SELECT * FROM config_generales where id_config = 1");
      ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Puntualmente Chat, Registro</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Tu nombre</label>
            <input type="text" name="fname" placeholder="Nombre" required>
          </div>
          <div class="field input">
            <label>Tu apellido</label>
            <input type="text" name="lname" placeholder="Apellido" required>
          </div>
        </div>
        <div class="field input">
          <label>Usuario</label>
          <input type="text" name="username" placeholder="Usuario" required>
        </div>
        <div class="field input">
          <label>Contraseña</label>
          <input type="password" name="password" placeholder="Ingresa tu contraseña" required>
          <i class="fas fa-eye"></i>
        </div>
        <div>
          <span for="empresa">Empresa: </span>
          <select class="form-select" name="empresa" id="empresa">
            <?php 
            $consulta=mysqli_query($conn, 'SELECT * FROM empresas');
            foreach($consulta as $empresa){
            ?>
            <option value="<?php echo $empresa['id_empresa']?>"><?php echo $empresa['n_empresa']?></option>
            <?php }?>
          </select>
        </div>
        <div>
          <label for="selrol">Selecciona un rol: </label>
          <select class="form-select" name="rol" id="selrol">
            <option value="1">Usuario</option>
            <option value="2">Admin</option>
          </select>
        </div>
  
        <label for="area">Area:</label>
        <select class="form-select" name="area" id="area">
          <option value="0" selected >Selecciona un area</option>

        <?php $areas=mysqli_query($conn, "SELECT * FROM areas");
        foreach($areas as $valor){
        ?>
          <option value="<?php echo $valor['id_area']?>"><?php echo $valor['n_area']?></option>
          <?php } ?>
        </select>
   
        <label for="area">Grupo:</label>
        <select  class="form-select" name="grupo" id="grupo">
          <option value="0" selected >Selecciona un grupo</option>
          <?php $areas=mysqli_query($conn, "SELECT * FROM empresa_grupos");
        foreach($areas as $valor){
        ?>
          <option value="<?php echo $valor['id_grupo']?>"><?php echo $valor['n_grupo']?></option>
          <?php } ?>
        </select>


        <div class="field button">
          <input type="submit" name="submit" value="Registrar">
        </div>
      </form>
      <div>
      <div class="link"><a href="users.php">Volver</a></div>
      </div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>

</html>
<?php }?>