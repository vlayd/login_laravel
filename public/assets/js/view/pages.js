// ========VARIÁVEIS BASE=============
var baseUrl = $('#base_url').html();
var urlUsuario = baseUrl+'usuario/';

// ========INICIALIZAÇÃO=============
$(document).ready(function () {

});

$('#form_current_save').on("submit", function (e) { salvarCurrent(e, this); });

function salvar(event, formdata){
    event.preventDefault();
    $.ajax({
        url: urlUsuario + '/salvar',
        method: 'POST',
        data: new FormData(formdata),
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            resetErros();
            if(result == 'success' || result == 'erro'){
                toast('success', 'Salvo com sucesso!');
                modalUsuario.hide();
                listar();
            } else {
                var erros = JSON.parse(result);
                $.each(erros, function(key, value){
                    $('.'+key+'_erro').html(value);
                    $('[name="'+key+'"]').addClass('is-invalid');
                });
            }
        },
        error: function (result) {
            toast('error', 'Erro ao enviar mensagem!');
        }
    });
}

function toast(tipo, msg) {
    var head = '';
    if(tipo == 'success') head = 'Sucesso!';
    else if(tipo == 'error') head = 'Erro!';
    $.toast({
        text: msg, // Text that is to be shown in the toast
        heading: head, // Optional heading to be shown on the toast
        icon: tipo, // Type of toast icon
        showHideTransition: 'fade', // fade, slide or plain
        allowToastClose: true, // Boolean value true or false
        hideAfter: 1500, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
        position: 'bottom-center', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
    });
}

function changePhoto(idFoto, file) {
    let ext = file.files[0].type;
    if($.inArray(ext, ['image/webp','image/gif','image/png','image/jpg','image/jpeg']) == -1) {
        toast('erro', "Formato não aceito!");
    } else {
        document.getElementById(idFoto).src = window.URL.createObjectURL(file.files[0]);
    }
}
