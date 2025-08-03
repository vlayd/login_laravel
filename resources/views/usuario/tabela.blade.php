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
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            @php
            $foto = $usuario->foto==null?PATH_SEM_FOTO:PATH_PERFIL.$usuario->idUsuario.'/'.usuario->foto;
            @endphp
            <tr>
                <td class="text-sm">
                    <div class="d-flex px-2">
                        <div>
                            <img src="{{asset($foto)}}" alt="Foto de {{$usuario->nome}}" class="avatar avatar-sm rounded-circle me-2">
                        </div>
                        <div class="my-auto" id="nome{{$usuario->id}}">
                            {{$usuario->nome}}
                        </div>
                    </div>
                </td>
                <td class="text-sm">{{$usuario->telefone}}</td>
                <td class="text-sm">{{$usuario->email}}</td>
                <td class="text-sm">{{$usuario->nivel}}</td>
                <td class="text-sm pb-0">
                    <a data-bs-toggle="modal" data-bs-target="#verUsuarioModal" class="me-1 btn btn-primary py-1 px-2 botao" id="ver{{$usuario->id}}" title="Ver usuário">
                        <i class="fas fa-eye text-white fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#addUsuarioModal" class="me-1 btn btn-warning py-1 px-2 botao" id="edit{{$usuario->id}}" title="Ver usuário">
                        <i class="fas fa-pen text-white fa-fw fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#deletarUsuarioModal" class="me-1 btn btn-danger py-1 px-2 botao" id="delete{{$usuario->id}}" title="Ver usuário">
                        <i class="fas fa-trash text-white fa-fw fa-sm"></i>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#addUsuarioModal" class="me-1 btn btn-success py-1 px-2 botao" id="block{{$usuario->id}}" title="Ver usuário">
                        <i class="fas fa-user text-white fa-fw fa-sm"></i>
                    </a>
                </td>
                <td class="d-none">{{$usuario->endereco}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
