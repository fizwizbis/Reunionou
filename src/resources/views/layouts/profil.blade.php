@extends('layouts.app')

@section('content')
    <article class="container profile">
        <div class="modal" id="edit-preferences-modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">
                        <span class="icon"><i class="fa fa-cogs"></i></span>
                        <span>Préférences</span>
                    </p>
                    <button class="delete"></button>
                </header>
                <footer class="modal-card-foot">
                    <a class="button is-primary modal-save">Enregistrer</a>
                    <a class="button modal-cancel">Annuler</a>
                </footer>
            </div>
        </div>
        <section class="section">
            <div class="columns">
                <div class="column is-2">
                    <img alt="" src="https://placehold.it/300x225">
                </div>
                <div class="column">
                    <h1 class="title is-1 is-bold">{{ Auth::user()->name }}</h1>
                    <a class="button is-primary is-outlined" href="#" id="edit-preferences">
                        <span class="icon"><i class="fa fa-cogs"></i></span>
                        <span>Préférences</span>
                    </a>
                    <p>
                        {{ Auth::user()->description }}
                    </p>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="tabs is-fullwidth">
                <ul>
                    <li class="link {{ Request::is('profil') ? 'is-active' : '' }}">
                        <a href="{{ route('profil') }}">
                            <span class="icon"><i class="fa fa-list"></i></span>
                            <span>Mon Profil</span>
                        </a>
                    </li>
                    <li class="link {{ Request::is('event') ? 'is-active' : '' }}">
                        <a href="{{ route('eventIndex') }}">
                            <span class="icon"><i class="fa fa-thumbs-up"></i></span>
                            <span>Mes Evèments</span>
                        </a>
                    </li>
                    <li class="link">
                        <a>
                            <span class="icon"><i class="fa fa-search"></i></span>
                            <span>Mes invitations</span>
                        </a>
                    </li>
                </ul>
            </div>
            @yield('profil_content')
        </section>
    </article>
@endsection
