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
    var link = "mostrar_paquetes";
    getInfo(link);
  }

  $(document).on("click", '#presupuesto' , getLinkPresupuesto);

  function getLinkPresupuesto(event) {
    event.preventDefault();
    var link = "mostrar_presupuesto";

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
    var link = "mostrar_contacto";

    getInfo(link);
  }

  $(document).on("click",'#login', getLinkLogin);

  function getLinkLogin(event){
    event.preventDefault();
    var link = "mostrar_login";
    getInfo(link);
  }

  $(document).on("click",'#registro', getLinkRegistro);

  function getLinkRegistro(event){
    event.preventDefault();
    var link = "mostrar_registro";
    getInfo(link);
  }

  $(document).on("click",'#admin', getLinkAdmin);

  function getLinkAdmin(event){
    event.preventDefault();
    var link = "mostrar_admin";
    getInfo(link);
  }

  $(document).on("click",'#logout', getLinkLogout);

  function getLinkLogout(event){
    event.preventDefault();
    var link = "logout_login";
    getInfo(link);
  }

  $(document).on("click",'.eliminarTurno', function(){
    event.preventDefault();
    var dropdown = $('#dropdownPaquete option:selected').val();
    $.get( "eliminar_turno",{id_turno: $(this).attr("data-idturno"), paqueteSel: dropdown}, function(data) {
      $('#contenedorTurnos').html(data);
    });
  });

  $(document).on("click",'.packComentario', function(){
    event.preventDefault();
    var id = $(this).attr("data-idpaquete");
    $.get("paquete_comentario",{id_paquete: id},function(data) {
      $('#cargadorAjax').html(data);
      getComentariosPack(id);
    });
  });

  function getComentariosPack (idpaquete) {
    $.get( "api/comentario/"+idpaquete, function(data) {
      crearComentarios(data);
    });
  }

  function getComentarios () {
    $.get( "api/comentario", function(data) {
      crearComentariosAdmin(data);
    });
  }

  function crearComentariosAdmin (data){
    var rendered = Mustache.render(templateAdminComentario,{comentarios: data});
    $('.cargadorAdmin').html(rendered);
  }

  function crearComentarios (data){
    var rendered = Mustache.render(templateComentario,{comentarios: data});
    $('.cargadorComentarios').html(rendered);
  }

  function crearComentario (data){
    var rendered = Mustache.render(templateComentario,{comentarios: [data]});
    $('.cargadorComentarios').append(rendered);
  }

  var templateComentario;
  $.ajax({ url: 'js/templates/comentario.mst',
  success: function(templateReceived) {
    templateComentario = templateReceived;
  }
});

var templateAdminComentario;
$.ajax({ url: 'js/templates/adminComentarios.mst',
success: function(templateReceived) {
  templateAdminComentario = templateReceived;
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

$(document).on("click",'.btnAdmin', function(){
  event.preventDefault();
  var valor = $(this).attr("value");

  if (valor=="comentarios") {
    getComentarios();
  }
  else{
    $.get( "mostrar_admin",{seccion: valor }, function(data) {
      $('.cargadorAdmin').html(data);
    });
  }
});


$(document).on('click','.eliminarComentario', function () {
    var idComentario = $(this).attr("data-idcomentario");
    deleteComentario(idComentario);
    $(this).parents('tr').remove();
  });

  function deleteComentario (idComentario) {
    $.ajax ({
      url: "api/comentario/"+idComentario,
      method:"DELETE",
      contentType: "application/json; charset=utf-8",
      success:function (){},
      error:function(jqxml, status, errorThrown){
        console.log(errorThrown);
      }
    });
  }

$(document).on("click",'.cambioRol', function(){
  event.preventDefault();
  var idusuario = $(this).attr("data-idusuario");

  $.get( "cambiar_rol",{id_usuario: idusuario}, function(data) {
    $('#cargadorAjax').html(data);
  });
});

function recargar () {
  $.get( 'index.php',function(data) {

});
}

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
        case "mostrar_login":
        $("body").html(data);
        break;        
        case "listar_turnos":
        $("#contenedorTurnos").html(data);
        break;
        case "nuevo_usuario":
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
        case "mostrar_admin":
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
