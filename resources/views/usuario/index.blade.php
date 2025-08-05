@php
$activeListaUsuarios = 'active';
$activeUsuarios = 'active';
$showUsuarios = 'show';
$page = 'usuario';
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
                            <a data-bs-toggle="modal" data-bs-target="#saveUsuarioModal" class="btn bg-gradient-primary btn-sm mb-0 btn_save_usuario" data-id="0">+&nbsp; Novo Usuario</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body ps-3 pb-0" id="tabela">
                @include('usuario.tabela')
            </div>
        </div>
    </div>
</div>

@include('usuario.modals.modal_save_usuario')
@include('usuario.modals.modal_ver_usuario')
@include('usuario.modals.modal_deletar_usuario')
@endsection

@section('js')
<?=CDN_JS_DATATABLES?>
@endsection
