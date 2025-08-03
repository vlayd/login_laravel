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
            <li class="nav-item">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">DASHBOARD</h6>
            </li>
            <li class="nav-item">
                <a href="{{asset('')}}" class="nav-link {{$activeHome??''}}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fas fa-home text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <hr class="horizontal dark" />
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pessoas</h6>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" aria-controls="usuariosColapse" role="button" aria-expanded="false" href="#usuariosColapse" class="nav-link {{$activeUsuarios??''}}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Usuários</span>
                </a>
                <div class="collapse {{$showUsuarios??''}}" id="usuariosColapse">
                    <ul class="nav ms-4">
                        <li class="nav-item ">
                            <a class="nav-link {{$activeListaUsuarios??''}}" href="{{route('usuario')}}">
                                <span class="sidenav-mini-icon"> U </span>
                                <span class="sidenav-normal"> Lista </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 my-3">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <div class="card-body text-center p-3 w-100 pt-0">
            </div>
        </div>
    </div>
</aside>
<!-- FIM Menu lateral -->
