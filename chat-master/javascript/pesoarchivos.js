$('#myFile').change( function() {
  
    if(this.files[0].size > 512000) { // 512000 bytes = 500 Kb
            $(this).val('');
      $('#errores').html("El archivo supera el límite de peso permitido.");
    } else { //ok
       var formato = (this.files[0].name).split('.').pop();
      //alert(formato);
           if(formato.toLowerCase() == 'jpg' || formato.toLowerCase() == 'png' || formato.toLowerCase() == 'gif') {
              $('#errores').html("IMAGEN VALIDA, Ha pasado la prueba con éxito.");
        } else {
          $(this).val('');
          $('#errores').html("Formato no soportado");
        }
       }
  });