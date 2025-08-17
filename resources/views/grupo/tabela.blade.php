<div class="table-responsive">
    <table class="table table-flush" id="data-list-1">
        <thead class="thead-light">
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
            @foreach ($grupos as $grupo)
            <tr>
                <td>
                    <p class="text-sm text-secondary mb-0" id="nome{{$grupo->id}}">{{$grupo->nome}}</p>
                </td>
                <td class="text-sm pb-0">
                    <a data-bs-toggle="modal" data-bs-target="#saveModal" class="me-1 btn btn-warning py-1 px-2 btn_prepare_save" data-id="{{$grupo->id}}" title="Salvar grupo">
                        <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#deletarModal" class="me-1 btn btn-danger py-1 px-2 btn_prepare_delete" data-id="{{$grupo->id}}" title="Deletar grupo">
                        <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<?=CDN_JS_DATATABLES?>
