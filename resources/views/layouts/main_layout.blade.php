@php
    $foto = USER->foto==null?PATH_SEM_FOTO:PATH_PERFIL.session('user.id').'/'.USER->foto;
@endphp
<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <title>{{$titulo??'Dashboard'}}</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <?=CDN_CSS_NUCLEO_ICON?>
  @yield('css')
  <!-- Font Awesome Icons -->
  <?=CDN_CSS_NUCLEO_FONTAWESOME?>
  <?=CDN_CSS_TOAST?>
  <!-- CSS Files -->
  <?=CDN_CSS_MAIN?>

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="d-none" id="base_url">{{asset('')}}</div>

  @include('layouts.sidebar_main')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <!-- INÍCIO breadcrumb -->
            @yield('breadcrumb')
        <!-- FIM breadcrumb -->

        <!-- INÍCIO MENU sandwich -->
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link p-0">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </div>
        <!-- FIM MENU sandwich -->

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <!-- Mantem os icons a direita -->
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <div class="nav-link text-white font-weight-bold px-0 text-center">
                <!-- <i class="fa fa-user me-sm-1"></i> -->
                <div class="row">
                    <div class="col-auto p-0">
                        <img src="{{asset($foto)}}" class="avatar avatar-sm rounded-circle">
                    </div>
                    <div class="col-auto">
                        <div class="d-sm-inline d-none">{{USER->nome}}</div>
                        <div class="text-center mt-n1 opacity-3 fw-bold d-sm-block d-none">{{session('user.nome_nivel')}}</div>
                    </div>
                </div>
              </div>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center dropdown">
                <a href="javascript:;" role="button" class="nav-link text-white p-0" data-bs-toggle="dropdown" id="navbarDropdownMenu" aria-expanded="false">
                    <i class="fa fa-cog cursor-pointer"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a data-bs-toggle="modal" data-bs-target="#configuracaoUsuarioModal" class="dropdown-item" href="javascript:;">Configurações</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Sair</a></li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
        @yield('content')
    </div>
  </main>
  @include('usuario.modals.modal_configuracao_usuario')

  <?=CDN_JS_CORE?>
  <?=CDN_JS_SCROLLBAR?>
  @yield('js')
  <?=CDN_JS_NUCLEO_FONTAWESOME?>
  <?=CDN_JS_TOAST?>
  <?=CDN_JS_MAIN?>
  @php
      $scriptPage = $page??'home';
  @endphp
  <script src="{{asset('assets/js/view/pages.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/view/'.$scriptPage.'.js')}}" type="text/javascript"></script>
  @yield('js2')
</body>

</html>
