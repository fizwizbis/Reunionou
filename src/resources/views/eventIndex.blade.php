@extends('layouts.profil')

@section('profil_content')
    <div class="box">

        <div class="columns">
            <div class="column is-2 user-property-count has-text-centered">
                <p class="subtitle is-5">
                    <strong>{{ $events->count() }}</strong>
                    <br>
                    events
                </p>
            </div>
            <div class="column">
                <div class="field has-addons">
                    <p class="control is-expanded">
                        <input class="input" placeholder="Chercher un nouvel évènement" type="text">
                    </p>
                    <p class="control">
                        <a class="button is-static">
                            Search
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="box columns">
        <div class="column">
            <p class="subtitle">
                Vos Evènements
            </p>
        </div>
        <div class="column">
            <a href="{{ route('eventCreate') }}" class="button is-primary is-pulled-right">Ajouter</a>
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
    <div class="box columns">
        <div class="column">
            <p class="subtitle">
                Evènements où vous êtes inscrit
            </p>
        </div>
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
