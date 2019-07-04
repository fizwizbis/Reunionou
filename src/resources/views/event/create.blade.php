@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('error'))
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ $message }}
            </div>
        @endif

        <form method="POST">
            @csrf

            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input name="title" class="input" type="text" placeholder="Titre de l'événement">
                </div>
            </div>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea name="description" class="textarea" placeholder="Description de l'événement"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Adresse</label>
                <div class="control">
                    <input name="address" class="input" type="text" placeholder="Adresse de l'événement">
                </div>
            </div>

            <event-public-radio></event-public-radio>

            <div class="control">
                <button class="button is-link">Créer</button>
            </div>

        </form>
    </div>
@endsection
