@extends('layouts.squelette')

@section('content')
<div id="container-inside">
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
</div>

<div id="container p-0">

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ route('home') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="images/logo.png" width="80" alt="">
                </a>
                <p class="text-center">Police Républicaine-Bénin</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Adresse mail</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" name="email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-block" type="submit"> Connexion </button>
                    </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Connexion') }}</div>

                <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Adresse mail</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress" name="email" required autocomplete="email" autofocus>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-block" type="submit"> Login </button>
                                </div>
                                <div class=" mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>  
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
</div>
@endsection
