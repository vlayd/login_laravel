@php
    $page = ['home'];
    $js = 'home';
@endphp
@extends('layouts.main_layout')

@section('breadcrumb')
    <?=$breadcrumb??''?>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card shadow-lg">
        <!-- Card header -->
        <div class="card-header pb-0">

        </div>
        <!-- Card body -->
        <div class="card-body">
        </div>
      </div>
    </div>
  </div>
@endsection
