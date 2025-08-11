// ========VARIÁVEIS BASE=============
var url = window.location.href;
var baseUrl = $('#base_url').html();
var currentBaseUrl = baseUrl + 'usuario/';
var modalUsuario =  new bootstrap.Modal(document.getElementById('saveUsuarioModal'));

// ========INICIALIZAÇÃO=============
$(document).ready(function () {
    listar();
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('body').on("click", '.btn_show_usuario', function () { ver($(this).data('id')); });
$('body').on("click", '.btn_prepare_save_usuario', function () { prepereSalvar($(this).data('id')); });
$('body').on("click", '.btn_prepare_delete_usuario', function () { prepereDeletar($(this).data('id')); });
$('body').on("click", '#btn_delete_usuario', function () { deletar($(this).data('id')); });
$('body').on("click", '.btn_block_usuario', function () { bloquear($(this).data('id'), $(this).data('ativo')); });
$('#form_save').on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        url: url + '/salvar',
        method: 'POST',
        data: new FormData(this),
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
                    $('#'+key+'_erro').html(value);
                    $('[name="'+key+'"]').addClass('is-invalid');
                });
            }
        },
        error: function (result) {
            toast('error', 'Erro ao enviar mensagem!');
        }
    });
});

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

function prepereDeletar(id) {
    $('#deletar_nome').html($('#nome' + id).html());
    $('#btn_delete_usuario').attr('data-id', id);
}

function deletar(id) {
    $.ajax({
        url: url + '/deletar',
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
        url: url + '/listar',
        method: 'GET',
        success: function (result) {
            $('#tabela').html(result);
        }
    });
}

function bloquear(id, ativo) {
    $.ajax({
        url: url + '/block',
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

function modal(id, acao){
    var modal =  new bootstrap.Modal(document.getElementById(id));
    if(acao == 'hide') modal.hide;
}
