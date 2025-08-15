 <?php
    $foto = USER->foto != null?PATH_PERFIL.session('user.id').'/'.USER->foto:PATH_SEM_FOTO;
 ?>
 <div class="modal fade" id="configuracaoUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="configuracaoUsuarioModalTitulo" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header bg-gradient-primary">
                 <h5 class="modal-title text-white" id="configuracaoUsuarioModalTitulo">Salvar Usuário</h5>
                 <span role="button" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark text-white"></i>
                 </span>
             </div>
             <form id="form_current_save">
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-12 text-center">
                            <label for="foto_conf">
                                <img class="avatar avatar-xxl rounded-circle me-2" src="{{asset($foto)}}" id="foto_conf_modal">
                            </label>
                         </div>
                         <div class="col-12 d-none">
                            <input type="file" name="foto" id="foto_conf" onchange="changePhoto('foto_conf_modal', this)" class="form-control input_foto">
                         </div>
                         <div class="col-12">
                             <div class="form-group">
                                 <label for="nome_save_modal">Nome</label>
                                 <input name="nome" id="nome_save_modal" type="text" class="form-control" value="{{USER->nome}}">
                             </div>

                         </div>
                         <div class="col-6">
                             <div class="form-group">
                                 <label for="email_save_modal">E-mail</label>
                                 <input name="email" id="email_save_modal" type="email" class="form-control" value="{{USER->email}}">
                                 <div class="text-danger text-xs" id="email_erro"></div>
                             </div>
                         </div>
                         <div class="col-6">
                             <label for="telefone_save_modal">Telefone</label>
                             <input name="telefone" id="telefone_save_modal" type="text" class="form-control"  value="{{USER->telefone}}" required>
                             <div class="text-danger text-xs" id="telefone_erro"></div>
                         </div>
                         <div class="col-12">
                             <label for="endereco_save_modal">Endereço</label>
                             <input name="endereco" id="endereco_save_modal" type="text" class="form-control" value="{{USER->endereco}}">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" form="form_current_save" class="btn bg-gradient-primary">Salvar</button>
                     <input type="hidden" name="id" value="{{session('user.id')}}">
                     @if (!empty(USER->foto))
                     <input type="hidden" name="old" value="{{USER->foto}}">
                     @endif
                     <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Fechar</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
