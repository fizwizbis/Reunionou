@extends('layouts.hero')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <article class="card column is-8-tablet is-6-desktop">
            <div class="card-content">
                <h1 class="title is-1 has-text-black">{{ __('auth.register') }}</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label for="name" class="label">{{ __('auth.name') }}</label>
                        <div class="control">
                            <input id="name" type="text" class="input{{ $errors->has('name') ? ' is-danger' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <p class="help is-danger" role="alert">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="field">
                        <label for="email" class="label">{{ __('auth.email') }}</label>
                        <div class="control">
                            <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
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
                        <label for="password-confirm" class="label">{{ __('auth.confirm_password') }}</label>
                        <div class="control">
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-info">{{ __('auth.register') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection
