@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('error'))
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ $message }}
            </div>
        @endif

        <form method="POST" action="{{ route('event.change', $event) }}">
            @csrf

            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input name="title" class="input" type="text" placeholder="Titre de l'événement" value="{{ $event->title }}">
                </div>
            </div>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea name="description" class="textarea" placeholder="Description de l'événement" value=""{{ $event->description }}></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Adresse</label>
                <div class="control">
                    <input name="address" class="input" type="text" placeholder="Adresse de l'événement" value="{{ $event->address }}">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="public" value="1" {{ $event->public == 1? 'checked': '' }}>
                        Public
                    </label>
                    <label class="radio">
                        <input type="radio" name="public" value="0" {{ $event->public == 0? 'checked': '' }}>
                        Privé
                    </label>
                </div>
            </div>

            <div class="control">
                <button class="button is-link">Créer</button>
            </div>

        </form>
    </div>
@endsection
