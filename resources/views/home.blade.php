@extends('layouts.admin')

@section('title', 'Administrator Dashboard')

@section('content')
<div class="container">
    <div class="card bg-light bg-gradient shadow-sm mb-3">
        <div class="card-body d-flex justify-content-center align-items-center">
            <h5 class="mb-0">
                <x-feathericon-user/>
                Hello, Admin <span class="text-capitalize fw-bold">{{ Auth::user()->name }}</span>
            </h5>
        </div>
    </div>
</div>

@livewire('reservations')

@endsection
