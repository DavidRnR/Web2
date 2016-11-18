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

  $(document).on("click",'#login', getLinkLogin);

  function getLinkLogin(event){
    event.preventDefault();
    var link = "index.php?action=mostrar_login";
    getInfo(link);
  }

  $(document).on("click",'#registro', getLinkRegistro);

  function getLinkRegistro(event){
    event.preventDefault();
    var link = "index.php?action=mostrar_registro";
    getInfo(link);
  }

  $(document).on("click",'#admin', getLinkAdmin);

  function getLinkAdmin(event){
    event.preventDefault();
    var link = "index.php?action=mostrar_admin";
    getInfo(link);
  }

  $(document).on("click",'#logout', getLinkLogout);

  function getLinkLogout(event){
    event.preventDefault();
    var link = "index.php?action=logout_login";
    getInfo(link);
  }

  $(document).on("click",'.eliminarTurno', function(){
    event.preventDefault();
    var dropdown = $('#dropdownPaquete option:selected').val();
    $.get( "index.php?action=eliminar_turno",{id_turno: $(this).attr("data-idturno"), paqueteSel: dropdown}, function(data) {
      $('#contenedorTurnos').html(data);
    });
  });

  $(document).on("click",'.packComentario', function(){
    event.preventDefault();
    var id = $(this).attr("data-idpaquete");
    $.get("index.php?action=paquete_comentario",{id_paquete: id},function(data) {
      $('#cargadorAjax').html(data);
      getComentarios(id);
    });
  });

  function getComentarios (idpaquete) {
    $.get( "api/comentario/"+idpaquete, function(data) {
      crearComentarios(data);
    });
  }

  function crearComentarios (data){
    var rendered = Mustache.render(template,{comentarios: data});
    $('.cargadorComentarios').html(rendered);
  }

  function crearComentario (data){
    var rendered = Mustache.render(template,{comentarios: [data]});
    $('.cargadorComentarios').append(rendered);
  }

  var template;
  $.ajax({ url: 'js/templates/comentario.mst',
  success: function(templateReceived) {
    template = templateReceived;
  }
});

$(document).on("click",'.turnoFinalizado', function(){
  event.preventDefault();
  var dropdown = $('#dropdownPaquete option:selected').val();
  $.get( "finalizar_turno/"+$(this).attr("data-idturno"),{paqueteSel: dropdown}, function(data) {
    $('#contenedorTurnos').html(data);
  });
});

$(document).on("submit",'.registro', function () {
  var password = $("input[name*='password']").val();
  var repePass = $("input[name*='repetidoPassword']").val();
  if (password!=repePass) {
    alert("Contraseñas diferentes");
  }
  else getForm(this);
});

$(document).on('submit','.ajaxForm', function(){
  getForm(this);
});

function getForm (datos) {
  event.preventDefault();
  var dir = $(datos).attr("href");
  formData = new FormData(datos);
  $.ajax({
    method: "POST",
    url: dir,
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      switch (dir) {
        case "index.php?action=listar_turnos":
        $("#contenedorTurnos").html(data);
        break;
        case "index.php?action=nuevo_usuario":
        $("#cargadorAjax").html(data);
        break;
        case "api/comentario":
          crearComentario(data);
        break;
        default:
        $("#cargadorAjax").html(data);
      }
    }
  });
}

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
