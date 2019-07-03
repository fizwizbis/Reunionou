@extends('layouts.app')

@section('content')

    {{ $event->isSubscribed() }}
    <div class="columns">
        <div class="column is-8">
            @include('event.chat')
        </div>
    </div>

@endsection
