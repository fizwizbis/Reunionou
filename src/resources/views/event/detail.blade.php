@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="level">
            <div class="level-left">
                <h1>{{ $event->title }}</h1>
                <p class="subtitle">{{ substr($event->description, 0, 100).'...' }}</p>
            </div>
            <div class="level-right">
                <a href="{{ route('eventSubscribe', ['id' => $event->id]) }}" class="button is-primary">S'INSCRIRE</a>
            </div>
        </div>
        @include('event.element.count')
        @include('event.element.subscribers', ['size' => 9])
        <div class="columns">
            <div class="column is-8">
                @include('event.chat')
            </div>
        </div>
    </div>

@endsection
