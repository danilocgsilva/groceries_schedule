@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<div class="max-w-2xl mx-auto">
    <h2>Create a grocery item</h2>

    <form action="{{ route("grocery_items.store") }}" method="POST">
        <div class="mb-5">
            <label for="name" class="block mb-2 font-medium px-1">Name</label>
            <input id="name" name="name" type="text" placeholder="Item name" class="@form_input_classes" />
        </div>
        
        <div class="mb-5">
            <label for="lasting_estimate" class="block mb-2 font-medium px-1">Estimate</label>
            <input id="lasting_estimate" name="lasting_estimate" type="text" placeholder="Estimates lasting" class="@form_input_classes" />
        </div>
        
        @csrf
        
        <input type="submit" value="Create" class="@form_submit_classes" />
    </form>
</div>

@endsection
