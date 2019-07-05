@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="level align-items-start">
            <div class="level-left is-block">
                <h1 class="title is-1">{{ $event->title }}</h1>
                <p class="subtitle">{{ substr($event->description, 0, 100).'...' }}</p>
            </div>
        </div>
        <div class="columns">
            <div class="column is-8">
                @include('event.chat')
            </div>
            <div class="column">
                @include('todo.index')
                @include('poll.index')
            </div>
        </div>
    </div>

@endsection
