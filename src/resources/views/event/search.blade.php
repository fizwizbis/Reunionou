@extends('layouts.app')

@section('content')
    <section class="container">
        <a href="{{ route('event.index') }}" class="button is-primary">Retour</a>
        <div class="columns is-multiline" style="margin-top: 5px;">
        @foreach($events as $event)
            @include('event.element.eventCard')
        @endforeach
        </div>
    </section>

@endsection
