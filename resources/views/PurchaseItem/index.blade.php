@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h2>List of purchases itens</h2>

        @if (count($purchasesHistory))
            <div class="list_with_entries">
                <ul class="list-inside">
                    @foreach ($purchasesHistory as $purchase)
                        <li>
                            {{ $purchase->id }}, purchase done on <strong>{{ $purchase->place->name }}</strong>, expended {{ $purchase->amount }}, at <strong>{{ $purchase->created_at }}</strong><br />
                            Next purchase: <strong>Next</strong>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="list_empty">
                <p>Still there's no entries registered!</p>
            </div>
        @endif
    </div>
@endsection
