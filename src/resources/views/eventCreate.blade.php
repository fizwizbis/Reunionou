@extends('layouts.app')

@section('content')
    @if ($message = Session::get('error'))
        <div class="notification is-danger">
            <button class="delete"></button>
            {{ $message }}
        </div>
    @endif

    <form method="POST">
        @csrf

        <div class="field">
            <label class="label">Title</label>
            <div class="control">
                <input name="title" class="input" type="text" placeholder="Event title">
            </div>
        </div>

        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <textarea name="description" class="textarea" placeholder="Event description"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Address</label>
            <div class="control">
                <input name="address" class="input" type="text" placeholder="Event address">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="radio">
                    <input type="radio" name="public" value="1">
                    Public
                </label>
                <label class="radio">
                    <input type="radio" name="public" value="0" checked>
                    Private
                </label>
            </div>
        </div>

        <div class="control">
            <button class="button is-link">Submit</button>
        </div>

    </form>
@endsection
