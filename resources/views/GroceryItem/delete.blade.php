@extends('layouts.master')

@section('title', 'Schedule')

@section('content')
<p>Are you sure that you want to delete the item {{ $groceryItem->name }}?</p>
@endsection