@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

    <div class="max-w-2xl mx-auto">
        <h2>Register a purchase</h2>

        <form action="{{ route('purchase.store') }}" method="POST">

            <div class="mb-5">
                <label for="date" class="block mb-2 font-medium px-1">Date</label>
                <input id="date" name="date" type="date" placeholder="date"
                    class="@form_input_classes" />
            @error('date')
                <p class="mt-1 text-sm text-red-600" id="name-error">Problem on date</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="grocery_item_id" class="block mb-2 font-medium px-1">Item</label>
            <select name="grocery_item_id" id="grocery_item_id" class="@form_input_classes">
                @foreach ($groceriesItems as $groceryItem)
                    <option value="{{ $groceryItem->id }}">{{ $groceryItem->getName() }}</option> @endforeach
            </select>
            @error('grocery_item_id')
<p class="mt-1
                    text-sm text-red-600" id="name-error">Problem on item choosed</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="expenditure" class="block mb-2 font-medium px-1">Expenditure</label>
            <input id="expenditure" name="expenditure" type="text" placeholder="Expenditure"
                class="@form_input_classes" />
            @error('expenditure')
                <p class="mt-1 text-sm text-red-600" id="name-error">Problem on expenditure</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="place" class="block mb-2 font-medium px-1">Place</label>
            <input id="place" name="place" type="text" placeholder="Place" class="@form_input_classes" />
            @error('place')
                <p class="mt-1 text-sm text-red-600" id="name-error">Problem on place.</p>
            @enderror
        </div>

        @csrf

        <input type="submit" value="Create" class="@form_submit_classes" />
    </form>
</div>

@endsection
