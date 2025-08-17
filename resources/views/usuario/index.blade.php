@php
$activeListaUsuarios = 'active';
$activeUsuarios = 'active';
$showUsuarios = 'show';
$page = 'usuario';
$titulo = 'Lista de Usuários';
@endphp
@extends('layouts.main_layout')
@section('breadcrumb')
<?= $breadcrumb ?? '' ?>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-lg">
            <!-- Card header -->
            <div class="card-header pb-0">
                <div class="d-flex">
                    <div>
                        <h5 class="mb-0">Lista de Usuários</h5>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a data-bs-toggle="modal" data-bs-target="#saveModal" class="btn bg-gradient-primary btn-sm mb-0 btn_prepare_save" data-id="0">+&nbsp; Novo Usuario</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body ps-3 pb-0" id="tabela">
            </div>
        </div>
    </div>
</div>

@include('usuario.modals.modal_save')
@include('usuario.modals.modal_ver')
@include('usuario.modals.modal_deletar')
@endsection

@section('js')
@endsection
