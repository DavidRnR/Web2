<div class="col-md-4 col-md-offset-4">
  <form class="form-signin registro" href="index.php?action=nuevo_usuario" method="post" enctype="multipart/form-data">
    <h2 class="form-signin-heading">Registrarse</h2>

    <input type="text" name="nombreUsuario" class="form-control" placeholder="Nombre de usuario" required="">
    <input type="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
    <input type="password" name="password" class="form-control" placeholder="Password" required="">
    <input type="password" name="repetidoPassword" class="form-control" placeholder="Repita el password" required="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
  </form>
</div>
