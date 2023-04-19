
@extends('layouts.entrar')
@section('title','Recuperar Conta - AngoFuel')
@section('content')

<div class="card mb-3">

    <div class="card-body">
        <div class="container my-4 text-sm text-gray-600">
            {{ __('Esqueceu sua palavra-passe? Sem problema. Basta apenas dizer nos qual o seu endereço de email e nós iremos enviar lhe um e-mail com a password mas depois terá que alterar') }}
        </div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Recuperar Conta</h5>
        </div>

        <form action="{{ route('password.email') }}" method="POST" class="row g-3 needs-validation">
            @csrf 

            <div class="col-12">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus >
                <div class="invalid-feedback">Por favor digita um email!</div>
            </div>

                    <div class="col-12">
                        <button class="btn btn-outline-primary w-100" type="submit">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </div>
                <div class="text-center my-3">
                    
                    <hr>
                    <div class="col-12">
                        <p class="small mb-0">Já possui uma conta? <a class="link link-primary" href="{{ route('login') }}">Entrar</a></p>
                    </div>
                    <!--
                        <div class="col-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua Password?') }}
                                </a>
                            @endif
                        </div> 
                    -->
                </div>
        </form>

    </div>
</div>
@endsection('content')