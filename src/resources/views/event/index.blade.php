@extends('layouts.profil')

@section('profil_content')
    <div class="box">
        <div class="columns">
            <div class="column is-2 has-text-centered">
                <p>
                    <strong>{{ $events->count() }}</strong>
                    <br>
                    événement(s)
                </p>
            </div>
            <div class="column">
                <form action="{{ route('event.search') }}" method="post">
                    @csrf
                    <div class="field has-addons">
                        <p class="control is-expanded">
                            <input class="input" name="name" placeholder="Chercher un nouvel évènement" type="text">
                        </p>
                        <p class="control">
                            <button class="button is-primary">
                                Rechercher
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="columns">
            <div class="column">
                <p class="subtitle">
                    Vos Évènements
                </p>
            </div>
            <div class="column">
                <a href="{{ route('event.create') }}" class="button is-primary is-pulled-right">Ajouter</a>
            </div>
        </div>
    </div>
    <div class="columns is-mobile is-multiline">
        @foreach(Auth::user()->myEvents as $event)
            @include('event.element.eventCard')
        @endforeach
    </div>
    <div class="box">
        <p class="subtitle">
            Evènements où vous êtes inscrit
        </p>
    </div>
    <div class="columns is-mobile is-multiline">
        @foreach(Auth::user()->events as $event)
            @include('event.element.eventCard')
        @endforeach
    </div>
@endsection
