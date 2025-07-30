@extends('admin.layouts.main')
@section('container')

<div class="container mt-4">
    <h2>Dashboard Beranda</h2>

    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Penghuni</th>
                        <th>Kamar</th>
                        <th>Harga Sewa / Bulan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penghuni as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_penghuni ?? '-' }}</td>
                        <td>{{ $p->nama_kamar ?? '-' }}</td>
                        <td>Rp {{ number_format($p->harga ?? 0,0,',','.') }}</td>
                        <td>{{ $p->status_penghuni ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
