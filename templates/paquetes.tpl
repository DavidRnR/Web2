<div class="row backformturnos">
  <h2 class="package" >Solicite el Pack acorde a sus necesidades <span class="label label-default">New</span></h2>
</div>

<div class="row paquetes">
  {foreach from=$paquetes key=index item=$paquete}
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>{$paquete['paquete']}</h3>
      </div>
      <div class="panel-footer">
        <p>{$paquete['detalle_pack']}</p>
      </div>
    </div>
  </div>
  {/foreach}
</div>



<div class="row backformturnos">
  <form class="ajaxForm" href="index.php?action=guardar_turno" method="post" enctype="multipart/form-data">
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
          {foreach from=$paquetes key=index item=$paquete}
          <option value="{$paquete['id_paquete']}">{$paquete['paquete']}</option>
          {/foreach}
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
