$(document).ready(function(){
  $("#nombre").focusout(function(){
    if($("#nombre").val().length < 1) {
      alertify.error("El nombre es obligatorio");
      $("#submit").prop("disabled",true);
    }
    if($(this).val().length > 0 && $(this).val().length <= 3){
      alertify.error('Nombre muy corto');
        $("#submit").prop("disabled",true);
    }else if($(this).val().length > 3 && $(this).val().length <=15){
      alertify.success("Nombre valido");
        $("#submit").prop("disabled",false);
    }
    if($("#nombre").val().length > 15) {
      alertify.error("El nombre es muy largo");
        $("#submit").prop("disabled",true);
    }
  });
  $("#email").focusout(function(){
    if($("#email").val().length < 1) {
      alertify.error("El correo es obligatorio");
        $("#submit").prop("disabled",true);
    }
      var email = $("#email").val();
      var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
     if (caract.test(email) == false){
         alertify.error("Correo no válido");
           $("#submit").prop("disabled",true);
     }else{
        alertify.success("Correo válido");
          $("#submit").prop("disabled",false);
     }
  });
  $("#horario").focusout(function(){
    if($("#horario").val().length < 1) {
      alertify.error("El horario es obligatorio");
        $("#submit").prop("disabled",true);
    }else{
        $("#submit").prop("disabled",false);
    }
  });
  $("#celular").focusout(function(){
    if($("#celular").val().length < 1) {
      alertify.error("El teléfono es obligatorio");
        $("#submit").prop("disabled",true);
    }
    if($("#celular").val().length <= 10) {
      alertify.success("El teléfono es correcto");
        $("#submit").prop("disabled",false);
    }
    if($("#celular").val().length > 10) {
      alertify.error("Número de teléfono incorrecto");
        $("#submit").prop("disabled",true);
    }
    if(isNaN($("#celular").val())) {
       alertify.error("El teléfono solo debe contener números");
         $("#submit").prop("disabled",true);
    }
    if($("#celular").val().length < 10) {
        alertify.error("El teléfono debe tener 9 caracteres. Ej. 666112233");
          $("#submit").prop("disabled",true);
    }
  });
  $(function () {
      $('#submit').click(function (event) {
        event.preventDefault();
         setTimeout(function(){
           var parametros = $("#formulario").serialize();
             $.ajax({
               method: "POST",
               url: "procesar.php",
               data: parametros
          }).done(function( msg ) {
              alertify.success( msg );
           });
      });
  	});
  });
});
