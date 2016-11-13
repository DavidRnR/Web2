<div class="row paquetes">
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Pack BASICO</h3>
      </div>
      <div class="panel-footer">
        <p>1 Servicio semanal<br>
          Sin insumos<br>
          299 $<br>
          <hr>
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Pack MEDIUM</h3>
      </div>
      <div class="panel-footer">
        <p>2 Servicio semanal<br>
          Sin insumos<br>
          459 $<br>
          <hr>
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Pack FULL</h3>
      </div>
      <div class="panel-footer">
        <p>3 Servicio semanal<br>
          Con insumos<br>
          800 $<br>
          <hr>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row backformturnos">
  <h2 class="package" >Solicite el Pack acorde a sus necesidades <span class="label label-default">New</span></h2>
</div>

<div class="row backformturnos">
  <form class="" id="solicitarTurno" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-2 col-md-offset-1">
        <input type="text" name="cliente" value="" placeholder="Ingrese su nombre" required>
      </div>
      <div class="col-md-2 col-md-offset-1">
        <select name="turno">
          <option value="Mañana" selected="selected">Mañana</option>
          <option value="Tarde">Tarde</option>
          <option value="Noche">Noche</option>
        </select>
      </div>
      <div class="col-md-2">
        <select name="paquete">
          <option value="3" selected="selected">BASICO</option>
          <option value="2">MEDIUM</option>
          <option value="1">FULL</option>
        </select>
      </div>
      <div class="col-md-2">
        <input type="file" name="imagenesturno[]" value="" multiple> </input>
      </div>
      <div class="col-md-1 col-md-offset-1 ">
        <input type="submit" name="enviar" value="ENVIAR">
      </div>
    </div>
  </form>
</div>
