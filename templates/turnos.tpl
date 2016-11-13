<ul>
  {foreach from=$turnos key=index item=turno}
  <ul>
    <li>{$turno['cliente']}</li>
    <li>{$turno['turno']}</li>
    </ul>
  {/foreach}
</ul>
