@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

@include('layouts.page_summary', [
    "textContent" => "Change some data from the grocery {$groceryItem->name}."
])


<form 
    id="set_first_data" 
    method="POST" 
    action="{{ route("set_first_date", ["grocery_item" => $groceryItem->id]) }}"
>
@csrf
</form>

<form class="max-w-2xl mx-auto" action="{{ route('grocery_items.update', ['grocery_item' => $groceryItem->id ]) }}" method="POST">
    <div class="mb-5">
        <label for="name" class="block font-medium px-2">Name</label>
        <input type="text" name="name" id="name" class="@form_input_classes" value="{{ $groceryItem->name }}" />
    </div>

    <div class="mb-5">
        <label for="lasting_estimate" class="block font-medium px-2">Estimate</label>
        <input 
            type="text" 
            name="lasting_estimate" 
            id="lasting_estimate" 
            class="@form_input_classes" 
            placeholder="Estimate lasting"
            value={{ $groceryItem->getEstimation() }}
        />
    </div>

    <div class="mb-5">
        @if ($groceryItem->firstCountDate)
            The first date has been seted:<span class="font-medium"> {{ $groceryItem->firstCountDate->first_date }}</span>
            <br />
        @endif
        <input
            form="set_first_data"
            type="submit" 
            class="@form_action_classes" 
            value="Set first date now!" />
    </div>

    @method("PUT")
    @csrf
    <input type="submit" value="Update" class="@form_submit_classes" />
    <a class="@form_action_classes py-3" href="{{ route("grocery_items.show", [ "grocery_item" => $groceryItem->id ]) }}">Done / Abort</a>
</form>

@endsection
