@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('event.invite', $event) }}">
        @csrf
        <div class="field has-addons">
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="email" type="email" placeholder="Email de la personne à inviter" required>
                <span class="icon is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <div class="control">
                <button class="button is-primary">
                    Envoyer
                </button>
            </div>
        </div>
    </form>
@endsection
