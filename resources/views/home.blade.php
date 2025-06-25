@extends('layout.template')

@section('content')
    <div class="container my-5">
        {{-- Hero Section --}}
        <div class="card shadow-lg border-0 mb-4">
            <div class="card-body bg-light">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('lungs (1).png') }}" class="rounded me-2" alt="..." style="width: 90px; height: 90px;">
                        <br><br>
                        <h2 class="mb-4 text-success fw-bold">Nafas Patriot</h2>
                        <p>
                            Aplikasi WebGIS ini menyajikan peta interaktif dan data spasial terkait Ruang Terbuka Hijau
                            (RTH) di Kota Bekasi.
                            Jelajahi taman kota, kawasan hijau, dan fasilitas pendukung dalam satu platform.
                        </p>
                        <a href="{{ route('map') }}" class="btn btn-success btn-lg mt-3">
                            🌍 Lihat Peta Interaktif
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('patriot.jpg') }}" class="img-fluid rounded" alt="Ilustrasi RTH"
                            style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>

        {{-- Apa Itu RTH --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="bi bi-tree-fill me-2"></i> Apa Itu Ruang Terbuka Hijau (RTH)?</h5>
            </div>
            <div class="card-body">
                <p>Ruang Terbuka Hijau (RTH) adalah ruang terbuka yang direncanakan untuk kegiatan masyarakat di luar
                    ruangan dan tempat tumbuh tanaman secara alami atau buatan. Menurut UU No. 26 Tahun 2007, minimal 30%
                    wilayah kota harus berbentuk RTH (20% publik, 10% privat).</p>
                <p>Contoh RTH publik: taman kota, sabuk hijau, hutan kota. Contoh RTH privat: halaman rumah, taman gedung,
                    kebun pribadi.</p>
            </div>
        </div>

        {{-- Jenis dan Fungsi RTH --}}
        <div class="row">
            {{-- Jenis RTH --}}
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-layers-half me-2"></i> Jenis RTH</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Berdasarkan Fisik:</b> RTH alami dan RTH buatan.</li>
                            <li class="list-group-item"><b>Berdasarkan Fungsi:</b> Ekologis, Ekonomi, Estetika, Sosial.</li>
                            <li class="list-group-item"><b>Berdasarkan Struktur Ruang:</b> Pola ekologis dan planologis.
                            </li>
                            <li class="list-group-item"><b>Berdasarkan Kepemilikan:</b> RTH publik dan RTH privat.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Fungsi RTH --}}
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-bounding-box me-2"></i> Fungsi RTH</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">🌿 Menyerap CO₂ & menghasilkan O₂</li>
                            <li class="list-group-item">💧 Menjaga air tanah & mencegah banjir</li>
                            <li class="list-group-item">💨 Menahan angin & menurunkan suhu</li>
                            <li class="list-group-item">🐦 Menjadi habitat satwa liar</li>
                            <li class="list-group-item">🌤️ Menyejukkan iklim kota (ameliorasi)</li>
                            <li class="list-group-item">🏞️ Tempat rekreasi & interaksi sosial</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
