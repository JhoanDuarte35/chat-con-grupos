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
      </header>

      <div class="search">
        <span class="text">Listado de todos los chats</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div>
        <span class="text">Grupos</span>
        <?php
        $sql2 = mysqli_query($conn, "SELECT * FROM grupos");
        $row = mysqli_fetch_assoc($sql2);
        if(mysqli_num_rows($sql2) == 0){
            ?> 
            <span class="text">No Hay Grupos</span>
            <?php
        }elseif(mysqli_num_rows($sql2) > 0){
            foreach($sql2 as $value){
            $id_grupo=$value['id_grupo'];
            $sql3 = mysqli_query($conn, "SELECT * FROM grupos");
            $row2 = mysqli_fetch_assoc($sql3);
            ?>
            <div class="users-list">
            <a href="chat.php?user_id= <?php echo $value['id_grupo'] ?>">
                <div class="content">
                <img src="php/images/grupo/puntual.png">
                <div class="details">
                <span> <?php echo $value['ngrupo'] ?></span>
                </div>
                </div>
            </a>
        </div>
        <?php }
        }?>



      </div>
      <div class="users-list">
        <span class="text">Usuarios</span>
        <?php
        $consulta = "SELECT * FROM users";
        $chatsuser = mysqli_query($conn, $consulta);
        $row5 = mysqli_fetch_assoc($chatsuser);
        foreach($chatsuser as $value){
        ?>
        <div class="users-list">
            <form>
        <a>
            <div class="content">
            <input type="text" id="user1" name="user1" value= <?php echo $value['unique_id']?> disabled hidden>
            <img src="php/images/<?php echo $value['img']?>">
            <div class="details">
            <span>
                <?php echo $value['fname'] . " " . $value['lname'] ?>
            </span>
                    <select id="user2" name="user2" required> 
                        <option value="0" selected disabled>Elige un usuario</option>
                        <?php 
                         $chatsuser2 = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$value['unique_id']}'");
                        foreach($chatsuser2 as $value){?>
                        <option value="<?php echo $value['unique_id']?>"><?php echo $value['fname'] . " " . $value['lname'] ?></option>
                         <?php }?>   
                    </select>
                    <input onclick="myfuncion()" type="submit" value="Ver">
                    <!-- <a href="php/allchats.php?u1=<?php //echo $value['unique_id']?>&u2=<?php //echo $value['unique_id']?>">Ver</a> -->
           
            </div>
           
            </div>
        </a>
        </form>
    </div>

    <?php }?>

      </div>
    </section>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="javascript/allchats.js"></script>

</body>

</html>