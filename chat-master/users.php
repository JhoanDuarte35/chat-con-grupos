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
    <section class="users">
      <header id="hola">
        <div class="content">
            
         
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="php/images/grupo/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
          </div>
          <?php if($_SESSION['rol']==2){ ?>
            <div class="dropdown show dropleft hola">
              <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a href="crearGrupos.php" title="Crear Grupos" class="dropdown-item"><i class="fa-solid fa-user-group"></i> Crear Grupos</a>
              <a href="index.php" title="Agregar Usuarios" class="dropdown-item"><i class="fa-solid fa-plus"></i> Agregar Usuarios</a>
              <a href="allchats.php" title="Ver chats" class="dropdown-item"><i class="fa-solid fa-eye"></i> Ver Chats</a>
              <a href="generaladmin.php" class="dropdown-item"><i class="fa-solid fa-gear"></i> Configuraciones</a>
              <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>

              </div>
            </div>
          <?php }else{?>
            <div class="dropdown show dropleft hola">
              <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-ellipsis-vertical"></i>
                          </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
              </div>
            </div>
          <?php }?>
     
         
      </header>
        <span class="text">Tus grupos</span>
      <div class="lista-grupos">
          

      </div>

      <div class="search">
        <span class="text">Selecciona un usuario para iniciar el chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>