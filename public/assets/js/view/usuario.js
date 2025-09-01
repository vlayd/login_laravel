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


$('body').on("click", '.btn_show', function () { ver($(this).data('id')); });
$('body').on("click", '.btn_prepare_save', function () { prepereSalvar($(this).data('id')); });
$('body').on("click", '.btn_prepare_delete', function () { prepereDeletar($(this).data('id')); });
$('body').on("click", '.btn_prepare_permissao', function () { preperePermissao($(this).data('id')); });
$('body').on("click", '.btn_delete', function () { deletar($(this).data('id')); });
$('body').on("click", '.btn_block', function () { bloquear($(this).data('id'), $(this).data('ativo')); });
$('#form_save').on("submit", function (e) { salvar(e, this); });

function ver(id) {
    $('#nome_ver_modal').html($('#nome' + id).html());
    $('#email_ver_modal').html($('#email' + id).html());
    $('#telefone_ver_modal').html($('#telefone' + id).html());
    $('#endereco_ver_modal').html($('#endereco' + id).html());
    $('#foto_ver_modal').attr('src', $('#foto' + id).attr('src'));
}

function prepereSalvar(id) {
    if (id == '0') return resetInput();
    $('[name="nome"]').val($('#nome' + id).html());
    $('[name="email"]').val($('#email' + id).html());
    $('[name="telefone"]').val($('#telefone' + id).html());
    $('[name="endereco"]').val($('#endereco' + id).html());
    $('[name="id"]').val(id);
}

function salvar(event, formdata){
    event.preventDefault();
    $.ajax({
        url: urlUsuario + 'salvar',
        method: 'POST',
        data: new FormData(formdata),
        contentType: false,
        cache: false,
        processData: false,
        success: function (result) {
            resetErros();
            if(result == 'success' || result == 'erro'){
                toast('success', 'Salvo com sucesso!');
                modalSave.hide();
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

function prepereDeletar(id) {
    $('#deletar_nome').html($('#nome' + id).html());
    $('.btn_delete').attr('data-id', id);
}

function preperePermissao(id) {
    $('#nome_usuario_permissao').html($('#nome' + id).html());
    $('[name="id"]').val(id);
    const permissoesJson = $('#permissoes' + id).html();
    $('.form-check-input').prop('checked', false);
    if(permissoesJson != ''){
        const permissoes = JSON.parse(permissoesJson);
        //Desmarca todos o checkbox antes de fazer as verificações
        $.each(permissoes, function(key, value){
            $('#permissao' + value).prop('checked', true);
        });
    }

}

function deletar(id) {
    $.ajax({
        url: urlUsuario + 'deletar',
        method: 'POST',
        data: {id: id},
        success: function (result) {
            if(result == 'success') listar();
            else toast('error', 'Erro ao deletar usuário!');
        },
        error: function (result) {
            toast('error', 'Erro desconhecido!');
        }
    });
}

function listar() {
    $.ajax({
        url: urlUsuario + 'listar',
        method: 'GET',
        success: function (result) {
            $('#tabela').html(result);
        }
    });
}

function bloquear(id, ativo) {
    $.ajax({
        url: urlUsuario + 'block',
        method: 'POST',
        data: { id: id, ativo: ativo },
        success: function (result) {
            if (result == 'success') listar();
        }
    });
}

function resetInput() {
    $('[name="nome"]').val('');
    $('[name="email"]').val('');
    $('[name="telefone"]').val('');
    $('[name="endereco"]').val('');
    $('[name="id"]').val('');
    resetErros();
}

function resetErros(){
    $.each(['email', 'telefone'], function(key, value){
        $('#'+value+'_erro').html('');
        $('[name="'+value+'"]').removeClass('is-invalid');
    });
}
