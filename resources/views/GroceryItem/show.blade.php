@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<div class="max-w-2xl mx-auto">

    <p>This is the show template</p>
    <ul class="mt-4 space-y-2">
        <li class="ml-2">Item: {{ $groceryItem->name }}</li>
        <li class="ml-2">Estimation: {{ $groceryItem->getEstimation() }}</li>
    </ul>

    <div class="mt-5">
        <a 
        href="{{ route('grocery_items.delete', ['grocery_item' => $groceryItem->id]) }}" 
        class="@form_action_classes m-2">
            Delete
        </a>
        <a 
        href="{{ route('grocery_items.edit', ['grocery_item' => $groceryItem->id]) }}"
        class="@form_action_classes">
            Edit
        </a>
    </div>

</div>


@endsection