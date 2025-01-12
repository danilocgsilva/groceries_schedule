@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<p>This is the show template</p>
<p>Item: {{ $groceryItem->name }}</p>

<form method="GET" action="{{ route('grocery_items.delete', ['grocery_item' => $groceryItem->id ]) }}">
    <input type="submit" value="Delete" />
</form>

@endsection
