<div class="row">
  <div class="col-6-md">
    <form class="" id="listarTurnos" method="post" enctype="multipart/form-data">
      <label class="labelAdmin">Listar Turnos por Pack</label>
      <select name="paquete">
        {foreach from=$paquetes key=index item=$paquete}
        <option value="{$paquete['id_paquete']}">{$paquete['paquete']}</option>
        {/foreach}
      </select>
      <input type="submit" name="listar" value="Listar">
    </form>
    <button type="button" name="button" id="listarTodo">LISTAR TODO</button>
  </div>

  <div class="col-6-md">
    <form class="" id="eliminarPaquete" method="post" enctype="multipart/form-data">
      <label class="labelAdmin">Eliminar Pack</label>
      <select name="paquete">
        {foreach from=$paquetes key=index item=$paquete}
        <option value="{$paquete['id_paquete']}">{$paquete['paquete']}</option>
        {/foreach}
      </select>
      <input type="submit" name="eliminarPack" value="Eliminar">
    </form>
  </div>
</div>
<div class="col-6-md">
  <form class="" id="agregarPaquete" method="post" enctype="multipart/form-data">
    <label class="labelAdmin">Agregar Pack</label>
    <input type="text" name="nombrePaquete" placeholder="Nombre del Pack" value="">
    <input type="text" name="detallePaquete" placeholder="Detalles del Pack" value="">
    <input type="submit" name="agregarPack" value="Agregar">
  </form>
</div>
</div>
<div class="row">
  <div class="col-5-md" id="contenedorTurnos">

  </div>
  <div class="col-5-md" id="contenedorImagenes">

  </div>

</div>
