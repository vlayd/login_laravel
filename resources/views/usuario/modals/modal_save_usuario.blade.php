 <div class="modal fade" id="saveUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="saveUsuarioModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-gradient-primary">
                 <h5 class="modal-title text-white" id="saveUsuarioModalTitulo">Salvar Usuário</h5>
                 <span role="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark text-white"></i>
                 </span>
             </div>
             <div class="modal-body">
                 <form action="" method="post">
                     <div class="row">
                         <div class="col-12 mb-2">
                             <label for="email_modal">Nome</label>
                             <input name="nome" type="text" class="form-control">
                         </div>
                         <div class="col-6 mb-2">
                             <label for="nome_save_modal">E-mail</label>
                             <input name="email" type="email" class="form-control">
                         </div>
                         <div class="col-6 mb-2">
                             <label for="nome_save_modal">Telefone</label>
                             <input name="telefone" type="text" class="form-control">
                         </div>
                         <div class="col-12 mb-2">
                             <label for="nome_save_modal">Endereço</label>
                             <input name="endereco" type="text" class="form-control">
                         </div>
                     </div>

                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn bg-gradient-primary">Salvar</button>
                 <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Fechar</button>
             </div>
         </div>
     </div>
 </div>
