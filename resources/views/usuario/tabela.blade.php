<div class="table-responsive">
    <table class="table table-flush" id="data-list-1">
        <thead class="thead-light">
            <tr>
                <th class="text-center">Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Nivel</th>
                <th>Ações</th>
                <th class="d-none"></th>
                <th class="d-none"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @php
            $foto = $usuario->foto==null?PATH_SEM_FOTO:PATH_PERFIL.$usuario->id.'/'.$usuario->foto;
            $corAtivo = 'success';
            $iconeAtivo = '';
            $opacity = '';
            $ativo = '0';
            if($usuario->ativo == 0){
                $corAtivo = 'danger';
                $iconeAtivo = '-slash';
                $opacity = 'opacity-3';
                $ativo = '1';
            }
            @endphp
            <tr class="{{$opacity}}">
                <td class="text-sm">
                    <div class="d-flex px-2">
                        <div>
                            <img src="{{asset($foto)}}" alt="Foto de {{$usuario->nome}}" class="avatar avatar-sm rounded-circle me-2" id="foto{{$usuario->id}}">
                        </div>
                        <div class="my-auto" id="nome{{$usuario->id}}">{{$usuario->nome}}</div>
                    </div>
                </td>
                <td class="text-sm" id="telefone{{$usuario->id}}">{{$usuario->telefone}}</td>
                <td class="text-sm" id="email{{$usuario->id}}">{{$usuario->email}}</td>
                <td class="text-sm">{{$usuario->nivel}}</td>
                <td class="text-sm pb-0">
                    <a data-bs-toggle="modal" data-bs-target="#verModal" class="me-1 btn btn-primary py-1 px-2 btn_show" data-id="{{$usuario->id}}" title="Ver usuário">
                        <i class="fas fa-eye text-white fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#saveModal" class="me-1 btn btn-warning py-1 px-2 btn_prepare_save" data-id="{{$usuario->id}}" title="Salvar usuário">
                        <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#deletarModal" class="me-1 btn btn-danger py-1 px-2 btn_prepare_delete" data-id="{{$usuario->id}}" title="Deletar usuário">
                        <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                    </a>
                    <a class="me-1 btn btn-{{$corAtivo}} py-1 px-2 btn_block" title="Bloquear usuário" data-id="{{$usuario->id}}" data-ativo="{{$ativo}}">
                        <i class="fas fa-user{{$iconeAtivo}} text-white fa-fw fa-sm"></i>
                    </a>
                    <div class="d-none" id="nivel{{$usuario->id}}">{{$usuario->idNivel}}</div>
                    @if ($usuario->idNivel != 1)
                    <a data-bs-toggle="modal" data-bs-target="#permissaoModal"  class="me-1 btn btn-info py-1 px-2 btn_prepare_permissao" title="Permissões do usuário" data-id="{{$usuario->id}}">
                        <i class="fas fa-user-lock text-white fa-fw fa-sm"></i>
                    </a>
                    @else
                    <div class="me-1 btn btn-secondary py-1 px-2 btn_block" title="Acesso dos usuário">
                        <i class="fas fa-user-lock text-white fa-fw fa-sm"></i>
                    </div>
                    @endif
                </td>
                <td class="d-none" id="endereco{{$usuario->id}}">{{$usuario->endereco}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<?=CDN_JS_DATATABLES?>
