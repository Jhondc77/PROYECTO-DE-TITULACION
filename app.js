jQuery(document).on('submit','#form-login',function(e){
    e.preventDefault();
if($('#login-user').val() != "" || $('#login-password').val() != ""){
    $.ajax({
        type: "POST",
        url: "backend/logout.php",
        dataType: "json",
        data: $(this).serialize(),
        beforeSend: function () {
            $('#botonlg').val('Validando...');
            
        }
    })

    .done(function(respuesta){
        let template = '';
        if(!respuesta.error){
            
            if(respuesta.tipo == '1'){
                location.href ='admin/ilustraciones.php';
            }else if(respuesta.tipo == '2'){
                location.href ='frontend/secretaria/principales.php'
            }
           

        }else{
            $('.error').slideDown('slow');
           /* setTimeout(function(){
                $('.error').slideUp('slow');
                template += `<div class="alert alert-danger">Usuario no registrados</div>`;
                $('#error').html(template);
               
            });*/
            alert('Usuario no registrado');
            
            $('#botonlg').val('Login');
            return;
        }
       
    })
    .fail(function(resp){
        console.log(resp.responseText);
    })
    .always(function(){
      
    });

    //fin del coondiconal de vacios
}else{
    /*let template1 = '';
    template1 += `<div class="alert alert-danger">Agregue campos</div>`
    $('#error').html(template1);*/
    alert('Ingrese sus credenciales');
    return;
    
}
    
});

////registro de usuario



