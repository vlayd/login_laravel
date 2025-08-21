 <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalTitulo">
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
                         @include('layouts.inputs.input_text', ['label'=> 'Nome', 'campo' => 'nome'])
                         @include('layouts.inputs.input_text', ['label'=> 'Chave', 'campo' => 'chave', 'classe' => 'col-6'])
                         @include('layouts.select.select_input', ['campo' => 'grupo', 'classe' => 'col-6', 'items' => $grupos, 'label' => 'Grupo'])
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
