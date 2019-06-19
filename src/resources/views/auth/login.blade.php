@extends('layouts.hero')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <article class="card column is-8-tablet is-6-desktop">
            <div class="card-content">
                <h1 class="title is-1 has-text-black">{{ __('auth.login') }}</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field">
                        <label for="email" class="label">{{ __('auth.email') }}</label>
                        <div class="control">
                            <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <p class="help is-danger" role="alert">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label for="password" class="label">{{ __('auth.password') }}</label>
                        <div class="control">
                            <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                                <p class="help is-danger" role="alert">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('auth.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="field is-grouped align-items-center">
                        <div class="control">
                            <button type="submit" class="button is-link">
                                {{ __('auth.login') }}
                            </button>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="control" href="{{ route('password.request') }}">
                                {{ __('auth.forgot_your_password') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection
