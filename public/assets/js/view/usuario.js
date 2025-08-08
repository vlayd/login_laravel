// ========VARIÁVEIS BASE=============
var url = window.location.href;
var baseUrl = $('#base_url').html();
var currentBaseUrl = baseUrl + 'usuario/';

// ========INICIALIZAÇÃO=============
$(document).ready(function() {
    listar();
});

$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('body').on("click", '.btn_show_usuario', function(){ ver($(this).data('id')); });
$('body').on("click", '.btn_save_usuario', function(){ prepereSalvar($(this).data('id')); });
$('body').on("click", '.btn_delete_usuario', function(){ prepereDeletar($(this).data('id')); });
$('body').on("click", '.btn_block_usuario', function(){ bloquear($(this).data('id'), $(this).data('ativo')); });

function ver(id){
    $('#nome_ver_modal').html($('#nome'+id).html());
    $('#email_ver_modal').html($('#email'+id).html());
    $('#telefone_ver_modal').html($('#telefone'+id).html());
    $('#endereco_ver_modal').html($('#endereco'+id).html());
    $('#foto_ver_modal').attr('src', $('#foto'+id).attr('src'));
}

function prepereSalvar(id){
    if(id == '0') return resetInput();
    $('[name="nome"]').val($('#nome'+id).html());
    $('[name="email"]').val($('#email'+id).html());
    $('[name="telefone"]').val($('#telefone'+id).html());
    $('[name="endereco"]').val($('#endereco'+id).html());
}

function prepereDeletar(id){
    $('#deletar_nome').html($('#nome'+id).html());
}

function listar(){
    $.ajax({
        url: url+'/listar',
        method: 'GET',
        success: function (result) {
            $('#tabela').html(result);
        }
    });
}

function bloquear(id, ativo){
    $.ajax({
        url: url+'/block',
        method: 'POST',
        data: {id: id, ativo: ativo},
        success: function (result) {
            if(result == 'success') listar();
        }
    });
}

function resetInput(){
    $('[name="nome"]').val('');
    $('[name="email"]').val('');
    $('[name="telefone"]').val('');
    $('[name="endereco"]').val('');
}
