@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

@include('layouts.page_summary', [
    "textContent" => "Change some data from the grocery {$groceryItem->name}."
])

<form action="{{ route('grocery_items.update', ['grocery_item' => $groceryItem->id ]) }}" method="POST">
    <input type="text" name="name" class="
        border 
        rounded-lg
        py-2 
        px-3 
        text-gray-700 
        focus:outline-none
        block
    " value="{{ $groceryItem->name }}" />
    <input type="text" name="estimate_lasting" class="
        border 
        rounded-lg
        py-2 
        px-3 
        text-gray-700 
        focus:outline-none
        block
    " placeholder="Estimate lasting" />
    @method("PUT")
    @csrf
    <input type="submit" value="update" class="
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
