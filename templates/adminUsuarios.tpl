<table class="table table-hover">
  <thead>
    <td>#</td>
    <td>Usuario</td>
    <td>Email</td>
    <td>Rol</td>
    <td>Eliminar</td>
  </thead>
  <tbody>
    {foreach from=$usuarios key=index item=usuario}
    <tr>
      <td>{$index}</td>
      <td>{$usuario['nombre']}</td>
      <td>{$usuario['email']}</td>
      <td>
        {if {$adminActivo['id_usuario']} != {$usuario['id_usuario']}}
        {if {$usuario['fk_rol']}==1}
        <button class="btn btn-danger cambioRol" data-idusuario="{$usuario['id_usuario']}" type="button">Administrador</button>
        {else}
        <button class="btn btn-success cambioRol" data-idusuario="{$usuario['id_usuario']}" type="button">Usuario</button>
        {/if}
        {/if}
      </td>
      <td>
        {if {$adminActivo['id_usuario']} != {$usuario['id_usuario']}}
        <button class="btn btn-danger eliminarUsuario" data-idusuario="{$usuario['id_usuario']}" type="button">Eliminar</button>
        {/if}
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>
