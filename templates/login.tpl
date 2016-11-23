<div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4 loginForm">
  <form class="form-signin ajaxForm" href="login" method="post" enctype="multipart/form-data">
    <h2 class="form-signin-heading">Ingresar</h2>
    <div class="form-group">
      <label for="inputEmail" class="sr-only">Correo electrónico</label>
      <input type="email" name="usuario" class="form-control" placeholder="Correo electrónico" required="" autofocus="">
    </div>
    <div class="form-group">
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" name="password" class="form-control" placeholder="Contraseña" required="">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  </form>
  <strong>No tienes una cuenta?</strong><button type="button" name="button" id="registro">Registrarse</button>
</div>
<div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4" id="loginError">
  <div class="alert alert-danger" role="alert">Usuario y/o contraseña incorrectas</div>
</div>
