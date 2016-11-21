<div class="col-md-4 col-md-offset-4">
  <form class="form-signin ajaxForm" href="mostrar_login" method="post" enctype="multipart/form-data">
    <h2 class="form-signin-heading">Ingresar</h2>
    <label for="inputEmail" class="sr-only">Correo electrónico</label>
    <input type="email" name="usuario" class="form-control" placeholder="Correo electrónico" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" name="password" class="form-control" placeholder="Contraseña" required="">
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Recordarme
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  </form>
  <strong>No tienes una cuenta?</strong><button type="button" name="button" id="registro">Registrarse</button>
</div>
