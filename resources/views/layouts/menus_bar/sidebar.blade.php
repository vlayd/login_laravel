<?php
    $acessoUsuario = true;
    if(session('user.nivel') != 2){
        if(PERMISSOES == null || !str_contains('"4"', PERMISSOES->permissoes)) {
            $acessoUsuario = false;
        }
    }

    $sideBar = [
        [
            'titulo' => 'DASHBOARD',
            'menu' => 'Home',
            'linkMenu' => '',
            'activeMenu' => $activeHome??false,
        ]
    ]
?>
<!-- INÍCIO Menu lateral -->
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center" href="{{asset('')}}">
            <img src="{{asset('assets/img/apoio/logo_transp.png')}}" class="navbar-brand-img" alt="Logo Procon"><br>
            <span class="font-weight-bold mt-n2"><?= NAME_APP ?></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach ($sideBar as $menuBar)
            <li class="nav-item">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{$menuBar['titulo']}}</h6>
            </li>
            <li class="nav-item">
                <a href="{{asset($menuBar['linkMenu'])}}" class="nav-link {{$menuBar['activeMenu']==true?'active':''}}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fas fa-home text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{$menuBar['menu']}}</span>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</aside>
