@extends('layouts.entrar')

@section('title','Cadastrar - AngoFuel')

@section('content')

<div class="create card mb-3">
    <div class="card-body">
        <x-jet-validation-errors class="mb-4" />

        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Criar Conta</h5>
            <p class="text-center small">Crie uma conta pra poder navegar no sistema</p>
        </div>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4">
            <div class="col-md-6 mt-4">
                <label for="name">Nome*</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="col-md-6 mt-4">
                <label for="username">Username*</label>
                <input id="username" class="form-control" type="text" name="username" :value="old('username')" required autocomplete="username" />
            </div>

            </div>

            <div class="mt-4">
                <label for="email">Email*</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Input do tipo hidden -->
                <input id="acesso" type="hidden" name="acesso" value=0 />
                
                <input id="acesso_id" type="hidden" name="acesso_id" value=2 />

            <div class="row mt-4">
                <div class="col-md-6 mt-4">
                    <label for="password">Password*</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="col-md-6 mt-4">
                    <label for="password_confirmation">Confirmar Password*</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4 text-center">
                <div class="col-12">
                    <button class="btn btn-outline-primary w-100" type="submit">{{ __('Cadastrar') }}</button>
                </div>
                <hr>
                <div class="col-12">
                    <p class="small mb-0">Já esta cadastrado/a? <a class="link link-primary" href="{{ route('login') }}">Entrar</a></p>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection('content')