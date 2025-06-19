@extends('layout.template')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{ route('map') }}" class="btn btn-primary">Go Now</a>
            </div>
        </div>
    </div>
@endsection
