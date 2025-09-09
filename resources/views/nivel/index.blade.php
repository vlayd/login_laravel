@php
$page = ['cadastro', 'listaNiveis'];
$titulo = 'Lista de Níveis';
$js = 'nivel';
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
                        <h5 class="mb-0">{{$titulo}}</h5>
                    </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <a data-bs-toggle="modal" data-bs-target="#saveModal" class="btn bg-gradient-primary btn-sm mb-0 btn_prepare_save" data-id="0">+&nbsp; Novo Nível</a>
                    </div>
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body ps-3 pb-0 px-0" id="tabela">
            </div>
        </div>
    </div>
</div>

@include('nivel.modals.modal_save')
@include('nivel.modals.modal_deletar')
@include('nivel.modals.modal_permissao')

@endsection

@section('js')
@endsection
