@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.verify_email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.fresh_verification_link') }}
                        </div>
                    @endif

                    {{ __('auth.before_proceeding_verify_email') }}
                    {{ __('auth.didnt_received_link') }}, <a href="{{ route('verification.resend') }}">{{ __('auth.request_new_link') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
