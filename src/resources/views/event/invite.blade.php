@extends('layouts.app')

@section('content')
    <form>
        @csrf
        <div class="field has-addons">
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email de la personne à inviter" required>
                <span class="icon is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <div class="control">
                <a class="button is-primary">
                    Envoyer
                </a>
            </div>
        </div>
    </form>
@endsection
