<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body id="login-form">

  <div class="wrapper">
    <section class="form login">
      <header>Intranet Puntualmente</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Usuario</label>
          <input type="text" name="username" placeholder="Ingresa tu Usuario" required>
        </div>
        <div class="field input">
          <label>Contraseña</label>
          <input type="password" name="password" placeholder="Ingresa tu Contraseña" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input class="btn-borde" type="submit" name="submit" value="Ingresar">
        </div>
      </form>
      <!-- <div class="link">Aún no te has registrado? <a href="index.php">Regístrate acá</a></div> -->
    </section>
  </div>
  

<!-- Prueba modal -->

  <!-- <button onclick="window.modal.showModal();">Abrir ventana modal</button>

    <dialog id="modal" style="dialog::backdrop {
  background: rgba(234, 206, 227, 0.9);
}">
      <h2>Este es el título de mi ventana modal</h2>
      <p>Este es un texto de ejemplo dentro de una ventana modal</p>
      <button onclick="window.modal.close();">Cerrar</button>
    </dialog> -->

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>

</html>