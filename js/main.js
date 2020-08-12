jQuery(document).on('submit','#formlog',function(event){
    event.preventDefault();

    jQuery.ajax({
        url: 'logreq.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){
            $('.botonlg').val('Validando...');

        }
    }).done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            if(respuesta.tipo == '2'){
                location.href = 'home.php';
            }else if(respuesta.tipo == '1'){
                location.href = 'index.php'
            }
        }else{
            $('.error').slideDown('slow');
            setTimeout(function(){
                $('.error').slideUp('slow');
            },3000);
            $('.botonlg').val('Entrar');
        }
    }).fail(function(resp){
        console.log(resp.responseText);
    }).always(function(){
        console.log("complete");
    })
})