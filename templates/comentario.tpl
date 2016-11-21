<div class="row paquetes">
  <div class="col-md-8 col-md-offset-2">
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

{if $usuario['fk_rol']>0}
<div class="row">
  <form class="form-inline ajaxForm"  href="api/comentario" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="Usuario">{$usuario['nombre']}</label>
      <input type="hidden" class="form-control" name="id_paquete" value="{$paquete['id_paquete']}">
    </div>
    <div class="form-group">
      <input type="hidden" class="form-control" name="email" value="{$usuario['email']}">
    </div>
    <div class="form-group">
      <input type="text" name="comentario" class="form-control" placeholder="Escriba aquí su Comentario...">
    </div>
    <div class="form-group">
      {include file="rating.tpl"}
    </div>

    <button type="submit" class="btn btn-default">Comentar</button>
  </form>
</div>
{/if}

<div class="row">
  <div class="cargadorComentarios">

  </div>
</div>
