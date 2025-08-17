 <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-gradient-primary">
                 <h5 class="modal-title text-white" id="saveModalTitulo">Salvar Grupo</h5>
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
                                <div class="text-danger text-xs nome_erro"></div>
                            </div>
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
