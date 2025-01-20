@extends('layouts.master')

@section('title', 'Schedule')

@section('content')

@include('layouts.page_summary', [
    "textContent" => "Change some data from the grocery {$groceryItem->name}."
])

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
        <a href="#" class="@form_action_classes">Set first date now!</a>
    </div>

    @method("PUT")
    @csrf
    <input type="submit" value="Update" class="@form_submit_classes" />
</form>

@endsection
