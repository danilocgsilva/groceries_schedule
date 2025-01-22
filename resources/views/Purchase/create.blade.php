@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

<div class="max-w-2xl mx-auto">
    <h2>Register a purchase</h2>

    <form action="{{ route("purchase.store") }}" method="POST">

        <div class="mb-5">
            <label for="date" class="block mb-2 font-medium px-1">Date</label>
            <input id="date" name="date" type="date" placeholder="date" class="@form_input_classes" />
        </div>

        <div class="mb-5">
            <label for="item" class="block mb-2 font-medium px-1">Item</label>
            <select name="item" id="item" class="@form_input_classes">
                @foreach ($groceriesItems as $groceryItem)
                    <option value="item1">{{ $groceryItem->getName() }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="expenditure" class="block mb-2 font-medium px-1">Expenditure</label>
            <input id="expenditure" name="expenditure" type="text" placeholder="Expenditure"
                class="@form_input_classes" />
        </div>

        <div class="mb-5">
            <label for="place" class="block mb-2 font-medium px-1">Place</label>
            <input id="place" name="place" type="text" placeholder="Place" class="@form_input_classes" />
        </div>

        @csrf

        <input type="submit" value="Create" class="@form_submit_classes" />
    </form>
</div>



@endsection