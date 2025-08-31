<?php
$page1 = $page[0] ?? '';
$page2 = $page[1] ?? '';
$menusBar = [
    [
        'titulo' => 'DASHBOARD',
        'menu' => 'Home',
        'route' => 'index',
        'activeMenu' => $page1 == 'home' ? 'active' : '',
        'icon' => 'fas fa-home text-primary',
    ],
    [
        'titulo' => 'PESSOAS',
        'menu' => 'Usuários',
        'activeMenu' => $page1 == 'usuario' ? 'active' : '',
        'icon' => 'fa-solid fa-user text-warning',
        'collapse' => [
            'id' => 'listaUsuariosCollapse',
            'show' => $page1 == 'usuario' ? 'show' : '',
        ],
        'collapses' => [
            [
                'item' => 'Lista',
                'miniItem' => 'Lis',
                'activeMenuItem' => $page2 == 'listaUsuarios' ? 'active' : '',
                'route' => 'usuario',
            ]
        ],
    ],
    [
        'titulo' => 'GERENCIAR',
        'menu' => 'Cadastros',
        'activeMenu' => $page1 == 'cadastro' ? 'active' : '',
        'icon' => 'fa fa-cog text-info',
        'collapse' => [
            'id' => 'listaGerenciarCollapse',
            'show' => $page1 == 'cadastro' ? 'show' : '',
        ],
        'collapses' => [
            [
                'item' => 'Grupos',
                'miniItem' => 'Gru',
                'activeMenuItem' => $page2 == 'listaGrupos' ? 'active' : '',
                'route' => 'grupo',
            ],
            [
                'item' => 'Acesso',
                'miniItem' => 'Ace',
                'activeMenuItem' => $page2 == 'listaAcessos' ? 'active' : '',
                'route' => 'acesso',
            ],
        ],
    ],
];
if (session('user.nivel') != 2) {
    if (PERMISSOES == null) {
        unset($menusBar[0]);
        unset($menusBar[1]);
        unset($menusBar[2]);
    } else {
        if (!in_array('1', json_decode(PERMISSOES->permissoes))) unset($menusBar[0]);
        if (!in_array('4', json_decode(PERMISSOES->permissoes))) unset($menusBar[1]);
        if (!in_array('8', json_decode(PERMISSOES->permissoes))) unset($menusBar[2]['collapses'][0]);
        if (!in_array('5', json_decode(PERMISSOES->permissoes))) unset($menusBar[2]['collapses'][1]);
    }
}

?>
<!-- INÍCIO Menu lateral -->
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 text-center" href="{{route('index')}}">
            <img src="{{asset('assets/img/apoio/logo_transp.png')}}" class="navbar-brand-img" alt="Logo Procon"><br>
            <span class="font-weight-bold mt-n2"><?= NAME_APP ?></span>
        </a>
    </div>
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <?php
            foreach ($menusBar as $menuBar):
                $collapse = '';
                $route = '';
                if (isset($menuBar['collapse'])) {
                    $route = '#' . $menuBar['collapse']['id'];
                    $collapse = 'collapse';
                } else {
                    $route = route($menuBar['route']);
                }

                if (isset($menuBar['titulo'])): ?>
                    <hr class="horizontal dark mt-2">
                    <li class="nav-item">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{$menuBar['titulo']}}</h6>
                    </li>
                <?php endif ?>

                <li class="nav-item">
                    <a href="{{$route}}" data-bs-toggle="{{$collapse}}" role="button" aria-expanded="false" class="nav-link {{$menuBar['activeMenu']}}">
                        <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="{{$menuBar['icon']}} text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{$menuBar['menu']}}</span>
                    </a>
                        <?php if (isset($menuBar['collapse'])): ?>
                        <div class="collapse {{$menuBar['collapse']['show']}}" id="{{$menuBar['collapse']['id']}}">
                            <ul class="nav ms-4">
                                <?php
                                foreach ($menuBar['collapses'] as $itemCollapse): ?>
                                    <li class="nav-item {{$itemCollapse['activeMenuItem']}}">
                                        <a class="nav-link {{$itemCollapse['activeMenuItem']}}" href="{{route($itemCollapse['route'])}}">
                                            <span class="sidenav-mini-icon"> {{$itemCollapse['miniItem']}} </span>
                                            <span class="sidenav-normal"> {{$itemCollapse['item']}} </span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <?php endif ?>
                </li>


            <?php endforeach ?>

        </ul>
    </div>
</aside>
