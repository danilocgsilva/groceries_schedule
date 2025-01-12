@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<p>Are you sure that you want to delete the item {{ $groceryItem->name }}?</p>

<form 
    method="POST" 
    action="{{ route('grocery_items.destroy', [ 'grocery_item' => $groceryItem->id ]) }}">
</form>

@endsection