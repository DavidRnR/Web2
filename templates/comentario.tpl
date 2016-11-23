<div class="row paquetes">
  <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2">
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
  <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2">
    <form class="form-horizontal ajaxForm"  href="api/comentario" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="hidden" class="form-control" name="id_paquete" value="{$paquete['id_paquete']}">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" name="email" value="{$usuario['email']}">
      </div>
      <div class="form-group">
        <textarea class="form-control" rows="3" name="comentario" placeholder="Escriba aquí su Comentario..." required></textarea>
      </div>
      <div class="form-group">
        {include file="rating.tpl"}
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg"><strong>Comentar</strong></button>
      </div>
    </form>
  </div>
</div>
{/if}
<div class="row">
  <div class="cargadorComentarios">
  </div>
</div>
