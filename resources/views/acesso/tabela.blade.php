<div class="table-responsive">
    <table class="table table-flush" id="data-list-1">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th>Grupo</th>
                <th>Ações</th>
                <th class="d-none"></th>
            </tr>
        </thead>
            @foreach ($acessos as $acesso)
            <tr>
                <td>
                    <p class="text-sm text-secondary mb-0" id="nome{{$acesso->id}}">{{$acesso->nome}}</p>
                </td>
                <td>
                    <p class="text-sm text-secondary mb-0" id="grupo{{$acesso->id}}">{{$acesso->grupo??'Sem grupo'}}</p>
                </td>
                <td class="text-sm pb-0">
                    <a data-bs-toggle="modal" data-bs-target="#saveModal" class="me-1 btn btn-warning py-1 px-2 btn_prepare_save" data-id="{{$acesso->id}}" title="Salvar acesso">
                        <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#deletarModal" class="me-1 btn btn-danger py-1 px-2 btn_prepare_delete" data-id="{{$acesso->id}}" title="Deletar acesso">
                        <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                    </a>
                </td>
                <td class="d-none" id="chave{{$acesso->id}}">{{$acesso->chave}}</td>
                <td class="d-none" id="id_grupo{{$acesso->id}}">{{$acesso->idGrupo??'0'}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<?=CDN_JS_DATATABLES?>
