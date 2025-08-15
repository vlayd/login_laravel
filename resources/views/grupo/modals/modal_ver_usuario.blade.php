 <div class="modal fade" id="verUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="deletarUsuarioModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-primary">
                 <h5 class="modal-title text-white" id="deletarUsuarioModalTitulo">Detalhes do Usuário</h5>
                 <span role="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark text-white"></i>
                 </span>
             </div>
             <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-2 text-center">
                        <img class="avatar avatar-xxl rounded-circle me-2" src="<?=PATH_SEM_FOTO?>" id="foto_ver_modal">
                    </div>
                    <div class="col-12 mb-4 text-center">
                        <h4 class="font-weight-bold" id="nome_ver_modal"></h4>
                        <div class="text-danger font-weight-bold text-sm mt-n2">Usuário</div>
                    </div>
                    <div class="col mb-2">
                        <span class="text-xs">E-mail: </span><span class="font-weight-bold text-sm"  id="email_ver_modal"></span>
                    </div>
                    <div class="col mb-2">
                        <span class="text-xs">Telefone: </span><span class="font-weight-bold text-sm" id="telefone_ver_modal"></span>
                    </div>
                    <div class="col-12 mb-2">
                        <span class="text-xs">Endereço: </span><span class="font-weight-bold text-sm" id="endereco_ver_modal"></span>
                    </div>
                </div>
             </div>
         </div>
     </div>
 </div>
