@extends('layouts.entrar')
@section('title','Login - AngoFuel')
@section('content')

<div class="card mb-3">

    <div class="card-body">
        <x-jet-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="displa-4">
                {{ session('status') }}
            </div>
        @endif

        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Entrar na Conta</h5>
            <p class="text-center small">Inicie sua sessão no sistema</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="row g-3 needs-validation" enctype="multipart/from-data" novalidate>
            @csrf 

            <div class="col-12">
                <label for="login" class="form-label">Email ou Username:</label>
                <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input id="login" class="form-control" type="text" name="login" :value="old('login')" required autofocus>
                <div class="invalid-feedback">Por favor, Insira o email ou username correcto.</div>
                </div>
            </div>

            <div class="col-12">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" >
                <div class="invalid-feedback">Por favor digita uma password!</div>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Lembrar-me senha</label>
                </div>
            </div>

                    <div class="col-12">
                        <button class="btn btn-outline-primary w-100" type="submit">{{ __('Log in') }}</button>
                    </div>
                </div>
                <div class="text-center my-3">
                    
                    <hr>
                    <div class="col-12">
                        <p class="small mb-0">Não possui uma conta? <a class="link link-primary" href="{{ route('register') }}">Cadastrar</a></p>
                    </div>
                        <div class="col-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua Password?') }}
                                </a>
                            @endif
                        </div> 
                </div>
        </form>

    </div>
</div>
@endsection('content')