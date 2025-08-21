 <div class="modal fade" id="permissaoModal" tabindex="-1" role="dialog" aria-labelledby="permissaoModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-primary">
                 <h5 class="modal-title text-white" id="permissaoModalTitulo">Permissões de <span class="fw-bold" id="nome_usuario_permissao"></span></h5>
                 <span role="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark text-white"></i>
                 </span>
             </div>
             <div class="modal-body">
                 <div class="row">
                    @foreach ($acessos as $acesso)
                    @include('layouts.inputs.input_checkbox', ['label' => $acesso->nome, 'classe' => 'col-6'])
                    @endforeach
                 </div>
             </div>
             <div class="modal-footer">
                     <button type="submit" form="form_save" class="btn bg-gradient-primary">Salvar</button>
                     <input type="hidden" name="id" value="">
                     <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Fechar</button>
                 </div>
         </div>
     </div>
 </div>
