@extends('layouts.app')

@section('content')

    {{ $event->isSubscribed() }}

@endsection
