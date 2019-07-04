@extends('layouts.app')

@section('content')

    <div class="container">

        <nav><a href="{{ route('event.detail', $event) }}">{{ $event->title }}</a> > Listes de tâches</nav>

        <h1>
            <span class="title">{{ $todo['name'] }}</span>
            <span class="subtitle">{{ $todo->progress() }}</span>
        </h1>

        <br>

        <div class="columns">
            <div class="column is-8">
                <div id="todo__content" class="box">
                    @yield('poll_content')
                    @include('todo.element.index')
                </div>
            </div>
            @if($event->isAuthor())
                <div class="column">
                    <div class="box">
                        <a href="{{ route('todo.destroy', ['event' => $event, 'todo' => $todo->id]) }}">Supprimer la
                            liste</a><br>
                        <a href="{{ route('todo.update', ['event' => $event, 'todo' => $todo->id]) }}">Renommer la
                            liste</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
