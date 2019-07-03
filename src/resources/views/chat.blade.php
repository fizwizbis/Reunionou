@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-4-desktop is-offset-8-desktop">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-header-title">Chats</h1>
                    </div>
                    <div class="card-content">
                        <chat-messages :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
