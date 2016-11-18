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

<div class="row">
  <div class="cargadorComentarios">

  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <form class="form-inline ajaxForm" href="api/comentario/{$paquete['id_paquete']}" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="ejemplo@exa.com">
      </div>
      <div class="form-group">
        <label for="comentario">Comentar</label>
        <input type="text" name="comentario" class="form-control" placeholder="Escriba aquí">
      </div>
      <button type="submit" class="btn btn-default">Comentar</button>
    </form>
  </div>
</div>
