<div class="table-responsive">
    <table class="table table-flush" id="data-list-1">
        <thead class="thead-light">
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Acessos</th>
                <th>Ações</th>
            </tr>
        </thead>
        @foreach ($niveis as $nivel)
        <tr>
            <td>
                <p class="text-sm text-secondary mb-0" id="nome{{$nivel->id}}">{{$nivel->nome}}</p>
            </td>
            <td>
                <p class="text-sm text-secondary mb-0 text-center" id="nome{{$nivel->id}}"><span class="badge badge-lg badge-primary">Acessos</span></p>
            </td>
            <td class="text-sm pb-0">
                <a data-bs-toggle="modal" data-bs-target="#saveModal" class="me-1 btn btn-warning py-1 px-2 btn_prepare_save" data-id="{{$nivel->id}}" title="Salvar Nível">
                    <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                </a>
                <a data-bs-toggle="modal" data-bs-target="" class="me-1 btn btn-danger py-1 px-2 position-relative btn_prepare_delete" data-id="{{$nivel->id}}" title="Deletar nível">
                    <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                </a>
                <a data-bs-toggle="modal" data-bs-target="#permissaoModal" class="me-1 btn btn-success py-1 px-2 btn_prepare_permissao" data-id="{{$nivel->id}}" title="Incluir acesso">
                    <i class="fa-solid fa-lock-open text-white fa-fw fa-sm"></i>
                </a>
                <div class="d-none" id="permissoes{{$nivel->id}}">{{$nivel->acessos}}</div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
<?= CDN_JS_DATATABLES ?>
