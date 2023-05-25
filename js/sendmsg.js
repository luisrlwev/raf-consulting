$( "#submitCF" ).click(function() {
   var nombrefc = $("#fname").val();
   var emailfc = $("#email").val();
   var empresafc = $("#empresa").val();
   var puestofc = $("#puesto").val();
   var paisfc = $("#pais").val();
   var infofc = $("#informacion").val();
   var telfc = $("#telfijo").val();
   var celfc = $("#telcel").val();
   var mensajefc = $("#msg").val();

   var recaptcha = $("#g-recaptcha-response").val();

   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if (reg.test(emailfc) == false) {
       Swal.fire(
           'Lo sentimos',
           'La cuenta de correo no es valida, verifiquela nuevamente.',
           'warning'
       )
   }
   else{
      if(nombrefc  != "" && emailfc != "" && empresafc  != "" && paisfc != "" && infofc != ""){
         if(recaptcha != ""){
            $.ajax({
               type:"POST",
               url:"lib/form-moreinfo-contact.php",
               data:$("#cf").serialize(),//only input
               success: function(response){
                  console.log(response);
                  if (response == 1){
                  $('#cf')[0].reset();
                  Swal.fire(
                     'Muchas Gracias',
                     'Hemos recibido su mensaje.',
                     'success'
                  )
                  }
               }
            });
         }else{
            Swal.fire(
               'Lo sentimos',
               'Tiene que comprobar el reCAPTCHA',
               'warning'
            )
         }
      }
      else{
         Swal.fire(
            'Lo sentimos',
            'Por favor llene todos los campos requeridos.',
            'warning'
         )
      }
   }
 });
