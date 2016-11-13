<div class="col-3-md col-md-offset-4">
  <ul class="list-group listaadmin">
    {foreach from=$turnos key=index item=turno}
    <li>
      {$turno['cliente']}
      <ul>
        <li>{$turno['turno']}</li>
        <li>{$turno['paqueteturno']['paquete']}</li>
        <li class="listadoImagenes">
          {foreach from=$turno['imagenesturno'] key=index item=imagen}
          <img data-u="image" src="{$imagen['path']}" alt="TurnoImagen_{$turno['cliente']}_{$imagen['fk_id_turno']}"  class="img-responsive img-rounded"width="74" >
          {/foreach}
        </li>
        {if $turno['finalizado']==0}
        <button class="btn btn-success turnoFinalizado" type="button" data-idturno="{$turno['id_turno']}">Finalizar Turno</button>
        {else}
        <button class="btn btn-danger eliminarTurno" type="button" data-idturno="{$turno['id_turno']}">Eliminar Turno</button>
        {/if}
      </ul>
    </li>
    {/foreach}
  </ul>
</div>
