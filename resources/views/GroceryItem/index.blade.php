@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<p>This is the grocery item index</p>
<ul>
    @foreach ($groceriesItems as $groceryItem)
        <li>
            <a href="{{ route("grocery_items.show", ['grocery_item' => $groceryItem->id]) }}">
                {{ $groceryItem->name }}
            </a>
        </li>
    @endforeach
</ul>
@endsection