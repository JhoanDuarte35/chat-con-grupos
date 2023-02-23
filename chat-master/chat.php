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
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
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
          $sql2 = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo = {$user_id}");
          $row = mysqli_fetch_assoc($sql2); ?>
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/grupo/puntual.png" alt="">
          <div class="details">
          <span><?php echo $row['ngrupo']?></span>

          <?php 
          if($_SESSION['rol']==0){
          ?>
          <a href="admingrupo.php?idg=<?php echo $row['id_grupo']; ?>"><i class="fa-solid fa-gear"></i></a>
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
        <div id="inputima"><i class="fa-solid fa-image"></i></div>
     
        <input id="file-input" style="display:none" type="file" name="image" accept="image/png,image/jpeg">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="javascript/chat.js"></script>

</body>

</html>