$(document).ready(function(){
  getInfo("home.html");

  $(document).on("click", '#home' , getLinkHome);

  function getLinkHome(event) {
    event.preventDefault();
    var link = "home.html";
    getInfo(link);
  }

  $(document).on("click",'#servicios', getLinkPaquetesServicio);

  function getLinkPaquetesServicio(event){
    event.preventDefault();
    var link = "index.php?action=mostrar_paquetes";
    getInfo(link);
  }

  $(document).on("click", '#presupuesto' , getLinkPresupuesto);

  function getLinkPresupuesto(event) {
    event.preventDefault();
    var link = "index.php?action=mostrar_presupuesto";

    getInfo(link);
  }

  $(document).on("click", '#somos' , getLinkSomos);

  function getLinkSomos(event) {
    event.preventDefault();
    var link = "quienessomos.html";

    getInfo(link);
  }

  $(document).on("click", '#contacto' , getLinkContacto);

  function getLinkContacto(event) {
    event.preventDefault();
    var link = "index.php?action=mostrar_contacto";

    getInfo(link);
  }

  $(document).on("click",'#admin', getLinkAdmin);

  function getLinkAdmin(event){
    event.preventDefault();
    var link = "index.php?action=mostrar_admin";
    getInfo(link);
  }

  $(document).on("click",'.eliminarTurnos', function(){
    event.preventDefault();
    $.get( "index.php?action=eliminar_turno",{ id_turno: $(this).attr("data-idturno") }, function(data) {
      $('#contenedorTurnos').html(data);
    });
  });

  $(document).on("click",'.turnoFinalizado', function(){
    event.preventDefault();
    $.get( "index.php?action=finalizar_turno&id_turno="+$(this).attr("data-idturno"), function(data) {
      $('#contenedorTurnos').html(data);
    });
  });

  $(document).on("click",'#listarTodo', function(){
    event.preventDefault();
    $.get( "index.php?action=listar_todos_turnos", function(data) {
      $('#contenedorTurnos').html(data);
    });
  });

$(document).on('submit','#solicitarTurno',function () {
  event.preventDefault();
  formData = new FormData(this);
  $.ajax({
    method: "POST",
    url: "index.php?action=guardar_turno",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      $("#cargadorAjax").html(data);

    }
  });
});

$(document).on('submit','#listarTurnos',function () {
  event.preventDefault();
  formData = new FormData(this);
  $.ajax({
    method: "POST",
    url: "index.php?action=listar_turnos",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      $("#contenedorTurnos").html(data);

    }
  });
});

$(document).on('submit','#eliminarPaquete',function () {
  event.preventDefault();
  formData = new FormData(this);
  $.ajax({
    method: "POST",
    url: "index.php?action=eliminar_paquete",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      $("#cargadorAjax").html(data);
    }
  });
});

$(document).on('submit','#agregarPaquete',function () {
  event.preventDefault();
  formData = new FormData(this);
  $.ajax({
    method: "POST",
    url: "index.php?action=agregar_paquete",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      $("#cargadorAjax").html(data);

    }
  });
});

  function getInfo(link) {
    $.ajax({
      url: link,
      method:"GET",
      dataType: "html",
      success: function(resultData){
        switch (link) {
          case "quienessomos.html":
            $("#cargadorAjax").removeClass("fondo");
            $('footer').show();
            break;
            case "index.php?action=mostrar_admin":
            $("#cargadorAjax").removeClass("fondo");
            $('footer').hide();
            break;
          default:
          $('footer').show();
          $("#cargadorAjax").addClass("fondo");
        }
        $("#cargadorAjax").html(resultData);
      },
      error:function(jqxml, status, errorThrown){
        alert('Error');
      }
    });
    $("#cargadorAjax").html("<h3>Cargando...</h3>");
    event.preventDefault();
  }
});
