@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<div class="max-w-2xl mx-auto">
    <h2>Register a place</h2>

    <form action="{{ route("place.store") }}" method="POST">
        <div class="mb-5">
            <label for="name" class="block mb-2 font-medium px-1">Name</label>
            <input id="name" name="name" type="text" placeholder="Place name" class="@form_input_classes" />
        </div>
        
        @csrf
        
        <input type="submit" value="Create" class="@form_submit_classes" />
    </form>
</div>

@endsection