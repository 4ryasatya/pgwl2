@extends('layout.template')

@section('content')
    <div class="container mt-4 mb-4">
        <div class="card mt-3">
            <div class="card-header">
                <h4>Marker Data</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="pointsTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- loop point --}}
                        @foreach ($points as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td> <img src="{{ asset('storage/images/' . $p->images) }}" alt="Image" width="100">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabel Polyline --}}
        <div class="card mt-3">
            <div class="card-header">
                <h4>Linestring Data</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="polylineTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- loop polyline --}}
                        @foreach ($polyline as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td> <img src="{{ asset('storage/images/' . $p->images) }}" alt="Image" width="100">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tabel Polygon --}}
        <div class="card mt-3">
            <div class="card-header">
                <h4>Polygon Data</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="polygonTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- loop polyline --}}
                        @foreach ($polygon as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td> <img src="{{ asset('storage/images/' . $p->images) }}" alt="Image" width="100">
                                </td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @section('styles')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    @endsection

    @section('script')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

        <script>
            let table = new DataTable('#pointsTable');
            let table1 = new DataTable('#polylineTable');
            let table2 = new DataTable('#polygonTable');
        </script>
    @endsection
</div>
