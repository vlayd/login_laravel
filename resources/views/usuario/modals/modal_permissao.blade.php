 <div class="modal fade" id="permissaoModal" tabindex="-1" role="dialog" aria-labelledby="permissaoModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-primary">
                 <h5 class="modal-title text-white" id="permissaoModalTitulo">Permissões de <span class="fw-bold" id="nome_usuario_permissao"></span></h5>
                 <span role="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark text-white"></i>
                 </span>
             </div>
             <form action="{{route('usuario.salvarpermissoes')}}" method="post">
                @csrf
                 <div class="modal-body">
                     <div class="row">
                         @foreach ($grupos as $grupo)
                         <div class="col-12 bg-gray-200 py-2 mx-0 text-center fw-bold mb-2">{{$grupo->nome??'Sem Grupo'}}</div>
                         @foreach ($acessos as $acesso)
                         @if ($grupo->id == $acesso->grupo)
                         @include('layouts.inputs.input_checkbox', [
                         'label' => $acesso->nome,
                         'classe' => 'col-6',
                         'campo' => 'permissao',
                         'valor' => $acesso->chave,
                         'colchete' => '[]',
                         ])
                         @endif
                         @endforeach
                         <div class="col-12 mb-2"></div>
                         @endforeach
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn bg-gradient-primary">Salvar</button>
                     <input type="hidden" name="id" value="">
                     <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Fechar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
