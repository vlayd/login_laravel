<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
  <title><?= NAME_APP ?></title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css?v=2.0.5')}}" rel="stylesheet" />
</head>

<body class="bg-gray-100">
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-50 pt-7 bg-primary">
    </div>
    <div class="container">
      <div class="row mt-md-n11 mt-n12 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card">
            <div class="card-header pb-0 text-center">
              <img src="{{asset('assets/img/apoio/logo_transp.png')}}" class="img-fluid" alt="Procon/Acre" style="width: 200px;">
              <h3 class="font-weight-bolder"><?= NAME_APP ?></h3>
            </div>
            <div class="card-body">
              <form role="form" class="text-start needs-validation" method="post" action="login" novalidate>
                @csrf
                <label>E-mail</label>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" value="vlaydisson@gmail.com" required>
                    {{-- show error --}}
                    @error('email')
                        <div class="text-danger text-xs">{{$message}}</div>
                    @enderror
                </div>
                <label>Senha</label>
                <div class="mb-3">
                    <input type="password" name="senha" value="123" class="form-control" required>
                    {{-- show error --}}
                    @error('senha')
                        <div class="text-danger text-xs">{{$message}}</div>
                    @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary w-100 mt-4 mb-0">Acessar</button>

                    {{-- invalid login --}}
                    @if(session('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show text-white mt-3" role="alert">
                            <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                            <span class="alert-text"><strong>Erro! </strong>{{session('loginError')}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                  @endif

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
