<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}elseif( $_SESSION['rol']==1){
  header("location: users.php");
}else{


?>
<?php include_once "header.php"; ?>

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
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Cerrar Sesión</a>
      </header>
        <div>Miembros del Grupo</div>
      <div class="users-list-group">
        

  
      

      </div>
  
      <div class="search">
        <span class="text">Agrega Usuarios a tu grupo</span>
        <input type="text" placeholder="Busca usuarios">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      <?php
        include_once "php/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
        $query = mysqli_query($conn, $sql);
       // $row = mysqli_fetch_assoc($query);
        ?>
        <?php
            foreach($query as $value){  ?>
                    <div class="users-list">
     
                        <a id="<?php echo $value['unique_id']?>">
                            <div class="content">
                            <img src="php/images/<?php echo $value['img']?>" alt="">
                            <div class="details">
                                <span><?php echo $value['fname'] . $value['lname']?></span>
                            </div>
                            </div>
                            <div> 
                            <button class="btn btn-outline-success" id="<?php echo $value['unique_id']?>" onclick="myfuncion(this.id)"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </a>
                        </div>
                        <?php 
        }
        ?>

      </div>
  
    </section>
    
    <?php
    include_once "php/config.php";
    $idgrupo = mysqli_real_escape_string($conn, $_GET['idg']);
    $sql2 = "SELECT * FROM grupos where id_grupo = {$idgrupo}";
    $query2 = mysqli_query($conn, $sql2);
    $row3 = mysqli_fetch_assoc($query2);
    ?>


    <div id="form-crear">
      <div id="form-crear2">
        <form id="crear">
          
            <input type="text" placeholder="Nombre del grupo" id="nombre" value="<?php echo $row3['ngrupo']?>" require>
          
          
            <input type="submit" class="btn-borde" id="boton" value="Guardar">
          
          <div align="center" class="alert" id="mensaje"></div>
        </form>
      </div>
    </div>
    
  </div>
  
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="javascript/admingrupos.js"></script>

</body>

</html>
    <?php }?>  