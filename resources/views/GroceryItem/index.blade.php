@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<div class="page_summary">
    <p>This is the grocery item index</p>
</div>
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