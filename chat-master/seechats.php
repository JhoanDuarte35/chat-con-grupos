<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
if(!isset($_GET['user_id'])){
    $grupo=false;
  }else{
    $grupo=true;
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        if(!$grupo){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_POST['user1']}");
        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_POST['user2']}");
        if (mysqli_num_rows($sql) > 0 || mysqli_num_rows($sql2) > 0 ) {
          $row = mysqli_fetch_assoc($sql);
          $row2 = mysqli_fetch_assoc($sql2);
          ?>
        <a href="allchats.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="php/images/grupo/puntual.png" alt="">
          <div class="details">
          <span>Chat de <?php echo $row['fname'] . " " . $row['lname'] ?> & <?php echo $row2['fname'] . " " . $row2['lname'] ?></span>
          <p class="red">Vista admin</p>
          
        <?php 
        }
        } else {
            $grupo_id=$_GET['user_id'];
          $sql2 = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo = {$grupo_id}");
          $row = mysqli_fetch_assoc($sql2); ?>
          <a href="allchats.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/grupo/puntual.png" alt="">
          <div class="details">
          <span><?php echo $row['ngrupo']?></span>
          <p class="red">Vista admin</p>

          <?php 
          $sql3 = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo = {$grupo_id}");
          $row3 = mysqli_fetch_assoc($sql3);
        

         }
        ?>
        
        </div>
      </header>
      <div class="chat-box">

      </div>
      <div id="add_labels"></div>
      
      <form action="#" class="typing-area">
        <?php if(!$grupo){?>
      <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $_POST['user1'] ?>" hidden>
      <input type="text" class="outcoming_id" name="outcoming_id" value="<?php echo $_POST['user2'] ?>" hidden>
        <?php }else{?>
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $_GET['user_id'] ?>" hidden>
            <input type="text" class="outcoming_id" name="outcoming_id" value="0" hidden>
        <?php } ?>
      </form>
    </section>
  </div>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="javascript/allchats.js"></script>

</body>

</html>