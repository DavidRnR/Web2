<div class="row paquetes">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>{$paquete['paquete']}</h3>
      </div>
      <div class="panel-footer">
        <p>{$paquete['detalle_pack']}</p>
      </div>
    </div>
  </div>
</div>
{foreach from=$comentarios key=index item=$comentario}
<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-primary">

    <h6>{$comentario['usuario']}</h6>
    <div class="panel-body">
      <p>
        {$comentario['mensaje']}
      </p>
    </div>
  </div>
</div>
{/foreach}
