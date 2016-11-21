<table class="table table-hover">
  <thead>
    <td>#</td>
    <td>Cliente</td>
    <td>Turno</td>
    <td>Paquete</td>
    <td>Imagenes</td>
    <td></td>
  </thead>
  <tbody>
    {foreach from=$turnos key=index item=turno}
    <tr>
      <td>{$index}</td>
      <td>{$turno['cliente']}</td>
      <td>{$turno['turno']}</td>
      <td>{$turno['paqueteturno']['paquete']}</td>
      <td>
        <div class="row">
          {foreach from=$turno['imagenesturno'] key=index item=imagen}
          <div class="col-xs-6 col-md-3">
            <a href="{$imagen['path']}" class="thumbnail">
              <img data-u="image" src="{$imagen['path']}" alt="TurnoImagen_{$turno['cliente']}_{$imagen['fk_id_turno']}"  class="thumbnail img-rounded" >
            </a>
            <button class="btn btn-danger btn-xs eliminarImagen" type="button" data-imgpath="{$imagen['path']}">Eliminar</button>
          </div>
          {/foreach}
        </div>
      </td>
      <td>
        {if $turno['finalizado']==0}
        <button class="btn btn-success turnoFinalizado" type="button" data-idturno="{$turno['id_turno']}">Finalizar Turno</button>
        {else}
        <button class="btn btn-danger eliminarTurno" type="button" data-idturno="{$turno['id_turno']}">Eliminar Turno</button>
        {/if}
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>
