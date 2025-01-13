@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<p>Are you sure that you want to delete the item {{ $groceryItem->name }}?</p>

<form 
    method="POST" 
    action="{{ route('grocery_items.destroy', [ 'grocery_item' => $groceryItem->id ]) }}">
    @csrf
    <input type="submit" value="Sure to delete {{ $groceryItem->name }}" class="
    border 
    hover:bg-red-800 
    focus:ring-red-300 
    font-medium 
    rounded-lg 
    sm:w-auto 
    py-2 
    px-6 
    text-center 
    dark:hover:bg-red-700 
    dark:focus:ring-red-800
    " />
</form>

@endsection