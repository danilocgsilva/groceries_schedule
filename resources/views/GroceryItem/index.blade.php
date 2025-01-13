@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

@include('layouts.page_summary', [
    "textContent" => "This is the page summary"
])

@if (session("just_happened_event_info"))
<div class="info">
{{ session("just_happened_event_info") }}
</div>
@endif

@if (count($groceriesItems))
    <div class="list_with_entries">
        <ul class="list-inside">
            @foreach ($groceriesItems as $groceryItem)
                <li>
                    <a href="{{ route("grocery_items.show", ['grocery_item' => $groceryItem->id]) }}">
                        {{ $groceryItem->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    <div>
@else
    <div class="list_empty">
        <p>Still there's no entries registered!</p>
    <div>
@endif

@endsection