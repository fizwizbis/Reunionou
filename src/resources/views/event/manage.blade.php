@extends('layouts.app')

@section('content')
    <a class="button is-primary is-outlined" href="{{ route('event.change', $event) }}" id="edit-preferences">
        <span class="icon"><i class="fa fa-cogs"></i></span>
        <span>Préférences</span>
    </a>
    <div class="box">
        <div class="level">
            <h1 class="title level-left">Todo</h1>
            <a href="{{ route('todo.create', $event) }}" class="button is-primary level-left">Ajouter</a>
        </div>
        @foreach($todos as $todo)
            @include('todo.element.resume')
        @endforeach
    </div>

    <div class="box">
        <div class="level">
            <h1 class="title level-left">Poll</h1>
            <a href="{{ route('poll.create', $event) }}" class="button is-primary level-left">Ajouter</a>
        </div>
        @foreach($polls as $poll)
            @include('poll.element.resume')
        @endforeach
    </div>

    @if($event->public == 0)
        <div class="box" style="max-height: 480px">
            <div class="level">
                <h1 class="title level-left">Invité</h1>
                <a href="{{ route('event.invite', $event) }}" class="button is-primary level-left">Inviter</a>
            </div>
            @foreach($invites as $invite)
                <p>{{ $invite->name }}</p>
            @endforeach
        </div>
    @endif



@endsection
