@extends('layouts.app')

@section('title', 'Editar peixe')

@section('content')
    <div class="mx-auto max-w-lg rounded-lg bg-white p-6 shadow">
        <h1 class="mb-6 text-2xl font-bold text-orange-600">Editar peixe: {{ $fish->name }}</h1>

        @include('fishes._form')
    </div>
@endsection
