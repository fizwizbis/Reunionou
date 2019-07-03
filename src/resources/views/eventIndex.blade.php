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
                <div class="field has-addons">
                    <p class="control is-expanded">
                        <input class="input" placeholder="Chercher un nouvel évènement" type="text">
                    </p>
                    <p class="control">
                        <a class="button is-primary">
                            Rechercher
                        </a>
                    </p>
                </div>
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
                <a href="{{ route('eventCreate') }}" class="button is-primary is-pulled-right">Ajouter</a>
            </div>
        </div>
    </div>
    <div class="columns is-mobile">
        @foreach(Auth::user()->myEvents as $event)
            <div class="column is-3-tablet is-6-mobile">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img alt="" src="https://placehold.it/300x225">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <span class="tag is-dark subtitle">{{ $event->title }}</span>
                            <p>{{ $event->description }}</p>
                        </div>
                    </div>
                    <footer class="card-footer">

                        <a href="{{ route('eventDetail', ['id' => $event->id]) }}" class="card-footer-item card-footer-item-hoover">Details</a>
                        <a href="{{ route('eventDelete', ['id' => $event->id]) }}" class="card-footer-item card-footer-item-hoover">Delete</a>
                    </footer>
                </div>
                <br>
            </div>
        @endforeach
    </div>
    <div class="box">
        <p class="subtitle">
            Evènements où vous êtes inscrit
        </p>
    </div>
    <div class="columns is-mobile">
        @foreach(Auth::user()->events as $event)
            <div class="column is-3-tablet is-6-mobile">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img alt="" src="https://placehold.it/300x225">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <span class="tag is-dark subtitle">#1</span>
                            <p>{{ $event->description }}</p>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a class="card-footer-item">Compare</a>
                        <a class="card-footer-item">Share</a>
                        <a class="card-footer-item">Delete</a>
                    </footer>
                </div>
                <br>
            </div>
        @endforeach
    </div>
@endsection
