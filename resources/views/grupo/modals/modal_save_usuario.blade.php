 <div class="modal fade" id="saveUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="saveUsuarioModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-gradient-primary">
                 <h5 class="modal-title text-white" id="saveUsuarioModalTitulo">Salvar Usuário</h5>
                 <span role="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark text-white"></i>
                 </span>
             </div>
             <form id="form_save">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12 mb-2">
                            <div class="form-group">
                                <label for="nome_save_modal">Nome</label>
                                <input name="nome" id="nome_save_modal" type="text" class="form-control">
                            </div>

                         </div>
                         <div class="col-6 mb-2">
                            <div class="form-group">
                                <label for="email_save_modal">E-mail</label>
                                <input name="email" id="email_save_modal" type="email" class="form-control">
                                <div class="text-danger text-xs email_erro"></div>
                            </div>
                         </div>
                         <div class="col-6 mb-2">
                             <label for="telefone_save_modal">Telefone</label>
                             <input name="telefone" id="telefone_save_modal" type="text" class="form-control" required>
                             <div class="text-danger text-xs telefone_erro"></div>
                         </div>
                         <div class="col-12 mb-2">
                             <label for="endereco_save_modal">Endereço</label>
                             <input name="endereco" id="endereco_save_modal" type="text" class="form-control">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" form="form_save" class="btn bg-gradient-primary">Salvar</button>
                     <input type="hidden" name="id" value="">
                     <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Fechar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
