@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<div class="max-w-2xl mx-auto">

    @include('layouts.page_summary', [
        'textContent' => 'This places listing',
    ])

    @if (session('just_happened_event_info'))
        <div class="flex items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline ml-2">{{ session('just_happened_event_info') }}</span>

            <button type="button" class="ml-auto bg-transparent text-green-700 hover:text-green-900 focus:outline-none"
                onclick="this.parentElement.remove();">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414 7.066 14.35a1 1 0 01-1.414-1.414l2.933-2.935L5.652 7.066a1 1 0 011.414-1.414L10 8.586l2.934-2.933a1 1 0 011.414 1.414l-2.933 2.934 2.933 2.935a1 1 0 010 1.414z" />
                </svg>
            </button>
        </div>
    @endif

    @if (count($places))
        <div class="list_with_entries">
            <ul class="list-inside">
                @foreach ($places as $place)
                    <li>{{ $place->id }}, {{ $place->name }}</li>
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