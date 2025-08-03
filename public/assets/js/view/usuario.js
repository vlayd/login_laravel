// ========VARIÁVEIS BASE=============
var url = window.location.href;
var baseUrl = $('#base_url').html();
var currentBaseUrl = baseUrl + 'usuario/';

// ========INICIALIZAÇÃO=============
$(document).ready(function() {
});

$('.botao').on("click", function(e){
    const idInput = e.currentTarget.id;
    console.log(idInput);
    if(idInput.includes('ver')) ver(idInput);
    else if(idInput.includes('edit')) editar(idInput);
    else if(idInput.includes('delete')) deletar(idInput);
    else if(idInput.includes('block')) bloquear(idInput);
});

function ver(idInput){
    id = idInput.replace('ver', '');
    $('#nome_ver_modal').html($('#nome'+id).html());
    $('#nome_ver_modal').html($('#nome'+id).html());
}
