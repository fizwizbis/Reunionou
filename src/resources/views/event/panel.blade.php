@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="columns">
            <div class="column is-8">
                @include('event.chat')
            </div>
            <div class="column">
                @include('todo.index')
            </div>
        </div>
    </div>

@endsection
