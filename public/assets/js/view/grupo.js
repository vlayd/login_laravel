// ========VARIÁVEIS BASE=============
var modalSave =  new bootstrap.Modal(document.getElementById('saveModal'));

// ========INICIALIZAÇÃO=============
$(document).ready(function () {
    listar();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('body').on("click", '.btn_prepare_save', function () { prepereSalvar($(this).data('id')); });
$('body').on("click", '.btn_prepare_delete', function () { prepereDeletar($(this).data('id')); });
$('body').on("click", '.btn_delete', function () { deletar($(this).data('id')); });
$('#form_save').on("submit", function (e) { salvar(e, this); });

function prepereSalvar(id) {
    if (id == '0') return resetInput();
    $('[name="nome"]').val($('#nome' + id).html());
    $('[name="id"]').val(id);
}

function salvar(event, formdata){
    event.preventDefault();
    $.ajax({
        url: urlGrupo + 'salvar',
        method: 'POST',
        data: new FormData(formdata),
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            resetErros();
            if(result == 'success'){
                toast('success', 'Salvo com sucesso!');
                modalSave.hide();
                listar();
            } else if(result == 'erro'){
                toast('erro', 'Erro ao salvar!');
            } else {
                var erros = JSON.parse(result);
                $.each(erros, function(key, value){
                    $('.'+key+'_erro').html(value);
                    $('[name="'+key+'"]').addClass('is-invalid');
                });
            }
        },
        error: function (result) {
            toast('error', 'Erro ao salvar!');
        }
    });
}

function prepereDeletar(id) {
    $('#deletar_nome').html($('#nome' + id).html());
    console.log($('#deletar_nome').html());

    $('.btn_delete').attr('data-id', id);
    console.log(id);
}

function deletar(id) {
    $.ajax({
        url: urlGrupo + 'deletar',
        method: 'POST',
        data: {id: id},
        success: function (result) {
            if(result == 'success') listar();
            else toast('error', 'Erro ao deletar grupo!');
        },
        error: function (result) {
            toast('error', 'Erro desconhecido!');
        }
    });
}

function listar() {
    $.ajax({
        url: urlGrupo + 'listar',
        method: 'GET',
        success: function (result) {
            $('#tabela').html(result);
        }
    });
}

function resetInput() {
    $('[name="nome"]').val('');
    $('[name="id"]').val('');
    resetErros();
}

function resetErros(){
    $('.nome_erro').html('');
    $('[name="nome"]').removeClass('is-invalid');
}
