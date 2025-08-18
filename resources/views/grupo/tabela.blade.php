<div class="table-responsive">
    <table class="table table-flush" id="data-list-1">
        <thead class="thead-light">
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Acessos</th>
                <th>Ações</th>
            </tr>
        </thead>
        @if ($qtdAcessoSemGrupo > 0)
        <tr>
            <td>
                <p class="text-sm text-secondary mb-0">Sem Grupo</p>
            </td>
            <td>
                <p class="text-sm text-secondary mb-0 text-center"><span class="badge badge-lg badge-primary">{{$qtdAcessoSemGrupo}}</span></p>
            </td>
            <td class="text-sm pb-0">
                <div class="me-1 btn btn-secondary py-1 px-2" title="Salvar grupo">
                    <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                </div>
                <div class="me-1 btn btn-secondary py-1 px-2" title="Deletar grupo">
                    <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                </div>
            </td>
        </tr>
        @endif
        @foreach ($grupos as $grupo)
        @php
            $deleteModal = '#deletarModal';
            $classDelete = 'btn_prepare_delete';
            if ($grupo->qtdAcessos > 0){
                $deleteModal = '';
                $classDelete = 'btn_delete_alert';
            }
        @endphp
        <tr>
            <td>
                <p class="text-sm text-secondary mb-0" id="nome{{$grupo->id}}">{{$grupo->nome}}</p>
            </td>
            <td>
                <p class="text-sm text-secondary mb-0 text-center" id="nome{{$grupo->id}}"><span class="badge badge-lg badge-primary">{{$grupo->qtdAcessos}}</span></p>
            </td>
            <td class="text-sm pb-0">
                <a data-bs-toggle="modal" data-bs-target="#saveModal" class="me-1 btn btn-warning py-1 px-2 btn_prepare_save" data-id="{{$grupo->id}}" title="Salvar grupo">
                    <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                </a>
                <a data-bs-toggle="modal" data-bs-target="{{$deleteModal}}" class="me-1 btn btn-danger py-1 px-2 {{$classDelete}} position-relative" data-id="{{$grupo->id}}" title="Deletar grupo">
                    <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                    @if ($grupo->qtdAcessos > 0)
                    <span class="badge badge-circle badge-floating badge-danger border-white position-absolute top-0 start-50">!</span>
                    @endif
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
<?= CDN_JS_DATATABLES ?>
