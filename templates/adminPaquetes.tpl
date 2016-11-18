  <div class="col-4-md">
    <label class="labelAdmin"><h6>Listar Turnos por Pack</h6></label>
    <form class="ajaxForm" id="dropdownPaquete" href="index.php?action=listar_turnos" method="post" enctype="multipart/form-data">
      <select name="paquete">
        {foreach from=$paquetes key=index item=$paquete}
        <option value="{$paquete['id_paquete']}">{$paquete['paquete']}</option>
        {/foreach}
        <option value="0">LISTAR TODO</option>
      </select>
      <input class="btn btn-success" type="submit" name="listar" value="Listar">
    </form>
  </div>

  <div class="col-4-md">
    <label class="labelAdmin"><h6>Eliminar Pack</h6></label>
    <form class="ajaxForm" href="index.php?action=eliminar_paquete" method="post" enctype="multipart/form-data">
      <select name="paquete">
        {foreach from=$paquetes key=index item=$paquete}
        <option value="{$paquete['id_paquete']}">{$paquete['paquete']}</option>
        {/foreach}
      </select>
      <input class="btn btn-warning" type="submit" name="eliminarPack" value="Eliminar">
    </form>
  </div>

  <div class="col-4-md">
    <label class="labelAdmin"><h6>Agregar Pack</h6></label>
    <form class="ajaxForm" href="index.php?action=agregar_paquete" method="post" enctype="multipart/form-data">
      <input type="text" name="nombrePaquete" placeholder="Nombre del Pack" value="">
      <input type="text" name="detallePaquete" placeholder="Detalles del Pack" value="">
      <input class="btn btn-success" type="submit" name="agregarPack" value="Agregar">
    </form>
  </div>

<div class="row">
  <div class="col-5-md" id="contenedorTurnos">

  </div>
  <div class="col-5-md" id="contenedorImagenes">

  </div>

</div>
