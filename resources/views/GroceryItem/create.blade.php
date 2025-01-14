@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<form action="{{ route("grocery_items.store") }}" method="POST">
    <label for="name" class="
        block
        font-medium
        px-2
        ">
        Name
    </label>
    @csrf
    <input id="name" name="name" type="text" placeholder="Item name"
        class="
        border 
        rounded-lg
        py-2 
        px-3 
        text-gray-700 
        focus:outline-none
        block
        "
    >

    <label for="lasting_estimate" class="
        block
        font-medium
        px-2
        ">
        Estimate
    </label>
    @csrf
    <input id="lasting_estimate" name="lasting_estimate" type="text" placeholder="Estimates lasting"
        class="
        border 
        rounded-lg
        py-2 
        px-3 
        text-gray-700 
        focus:outline-none
        block
        "
    >


    <input type="submit" value="Create"
    class="
        border 
        hover:bg-blue-800 
        focus:ring-blue-300 
        font-medium 
        rounded-lg 
        sm:w-auto 
        py-2 
        px-6 
        text-center 
        dark:hover:bg-blue-700 
        dark:focus:ring-blue-800
    " />
</form>

@endsection
