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
          <img src="php/images/grupo/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
      </header>

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
            <a href="seechats.php?user_id= <?php echo $value['id_grupo'] ?>">
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
        <span class="text">Elige 2 usuarios para ver su chat</span>
        <?php
        $consulta = "SELECT * FROM users";
        $chatsuser = mysqli_query($conn, $consulta);
        $row5 = mysqli_fetch_assoc($chatsuser);
        ?>
        <div class="users-list">
            <form action="seechats.php" method="post" name="formulario">
        <a>
            <div class="content">
                
                    <div>
                        <table >
                        <tr> <td> <select name="user1" id="user1" required>
                            <option value="0" selected disabled>Elige un usuario</option>
                                <?php 
                                $chatsuser2 = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}'");
                                foreach($chatsuser2 as $value){?>
                                <option value="<?php echo $value['unique_id']?>"><?php echo $value['fname'] . " " . $value['lname'] ?></option>
                                <?php }?>
                        </select></td> 
                        
                        <td><select id="user2" name="user2" required> 
                            <option value="0" selected disabled>Elige un usuario</option>
                            <?php 
                            $chatsuser3 = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = '{$_SESSION['unique_id']}'");
                            foreach($chatsuser3 as $value){?>
                            <option value="<?php echo $value['unique_id']?>"><?php echo $value['fname'] . " " . $value['lname'] ?></option>
                            <?php }?></td> <td><input type="submit" class="btn-borde" value="Ver"></select></td>
                        </tr>
                        </table>
                        <span class="error" name="error" id="error"></span>
                    </div>
                    <div>
                           
                    </div>
                    <div>
                        
                    </div>
                    
                  
           
            </div>
            </div>
        </a>
        </form>
    </div>

      </div>
    </section>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
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
  </script>

</body>

</html>