@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="container profile">
            <div class="modal" id="edit-preferences-modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Edit Preferences</p>
                        <button class="delete"></button>
                    </header>
                    <footer class="modal-card-foot">
                        <a class="button is-primary modal-save">Save changes</a>
                        <a class="button modal-cancel">Cancel</a>
                    </footer>
                </div>
            </div>
            <div class="section profile-heading">
                <div class="columns is-mobile is-multiline">
                    <div class="column is-2">
                        <span class="header-icon user-profile-image">
                        <img alt="" src="https://placehold.it/300x225">
                        </span>
                    </div>
                    <div class="column name">
                        <p>
                            <span class="title is-bold">{{ Auth::user()->name }}</span>
                            <br>
                            <a class="button is-primary is-outlined" href="#" id="edit-preferences" style="margin: 5px 0">
                                Edit Preferences
                            </a>
                            <br>
                        </p>
                        <p class="tagline">
                            {{ Auth::user()->description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="profile-options is-fullwidth">
                <div class="tabs is-fullwidth is-medium">
                    <ul>
                        <li class="link {{ Request::is('profil') ? 'is-active' : '' }}">
                            <a href="{{ route('profil') }}">
                                <span class="icon">
                                    <i class="fa fa-list"></i>
                                </span>
                                <span>Mon Profil</span>
                            </a>
                        </li>
                        <li class="link {{ Request::is('event') ? 'is-active' : '' }}">
                            <a href="{{ route('eventIndex') }}">
                                <span class="icon">
                                <i class="fa fa-thumbs-up"></i>
                                </span>
                                <span>Mes Evèments</span>
                            </a>
                        </li>
                        <li class="link">
                            <a>
                                <span class="icon">
                                <i class="fa fa-search"></i>
                                </span>
                                <span>Mes invitations</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('profil_content')
        </div>
    </div>
@endsection
