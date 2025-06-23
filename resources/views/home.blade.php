@extends('layout.template')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body bg-light">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="mb-4 text-success fw-bold">WebGIS Ruang Terbuka Hijau Kota X</h2>
                        <p class="card-text">
                            Aplikasi WebGIS ini menyajikan peta interaktif dan data spasial terkait Ruang Terbuka Hijau
                            (RTH) di wilayah Kota X.
                            Jelajahi taman kota, kawasan hijau, dan fasilitas pendukung dalam satu platform.
                        </p>
                        <a href="{{ route('map') }}" class="btn btn-success btn-lg mt-3">
                            🌍 Lihat Peta Interaktif
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('images/rth-illustration.png') }}" class="img-fluid rounded" alt="Ilustrasi RTH"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- KOde landing page (nanti aja) --}}
{{-- <div class="bg-cover text-white py-5" style="
        background-image: url('{{ asset('images/forest.jpg') }}');
        background-size: cover;
        background-position: center;
        min-height: 90vh;
    ">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="display-4 fw-bold">Selamat Datang di WebGIS RTH Kota X</h1>
                    <p class="lead mt-3">
                        Jelajahi informasi spasial Ruang Terbuka Hijau untuk masa depan yang lebih hijau dan berkelanjutan.
                    </p>
                    <a href="{{ route('map') }}" class="btn btn-success btn-lg mt-4">🌍 Lihat Peta Interaktif</a>
                </div>
            </div>
        </div>
    </div> --}}
