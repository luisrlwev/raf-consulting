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
           'Sorry',
           'The email account is not valid, check it again.',
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
                     'Thank you',
                     'We have received your message.',
                     'success'
                  )
                  }
               }
            });
         }else{
            Swal.fire(
               'Sorry',
               'You have to check the reCAPTCHA',
               'warning'
            )
         }
      }
      else{
         Swal.fire(
            'Sorry',
            'Please fill in all the required fields.',
            'warning'
         )
      }
   }
 });
