@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<p>This is the show template</p>
<p>Item: {{ $groceryItem->name }}</p>

<form method="GET" action="{{ route('grocery_items.delete', ['grocery_item' => $groceryItem->id ]) }}">
    <input type="submit" value="Delete" class="
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
    dark:focus:ring-blue-800" />
</form>

@endsection
