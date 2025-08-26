@extends('layouts.main_layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-lg">
            <div class="card-body ps-3 pb-0">
                <div class="text-dark">
                    <div class="d-flex align-items-center justify-content-center min-vh-80 px-2">
                        <div class="text-center">
                            <h1 class="display-1 fw-bold">404</h1>
                            <p class="fs-2 fw-medium mt-4">Oops! Página não encontrada</p>
                            <p class="mt-4 mb-5">Essa página não existe ou você não está autorizado a acessá-la.</p>
                            <a href="{{route('index')}}" class="btn btn-primary fw-semibold rounded-pill px-4 py-2 custom-btn">
                                Ir para a Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
