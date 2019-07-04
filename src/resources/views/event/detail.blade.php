@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="level align-items-start">
            <div class="level-left is-block">
                <h1 class="title is-1">{{ $event->title }}</h1>
                <p class="subtitle">{{ substr($event->description, 0, 100).'...' }}</p>
            </div>
            <div class="level-right">
                @if ($event->free)
                    <a href="{{ route('eventSubscribe', ['id' => $event->id]) }}" class="button is-primary">S'INSCRIRE</a>
                @else
                    <a href="{{ route('eventSubscribe', ['id' => $event->id]) }}" class="button is-primary">ACHETER MA PLACE</a>
                    <h3 class="title is-3">&nbsp;{{ $event->price }}€</h3>
                @endif
            </div>
        </div>
        @include('event.element.count')
        @include('event.element.subscribers', ['size' => 9])
    </div>

@endsection
