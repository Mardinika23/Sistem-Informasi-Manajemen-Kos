@extends('admin.layouts.main')
@section('container')

<div class="container mt-4">
    <h2>Laporan Pembayaran</h2>

    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Penghuni</th>
                <th>Kamar</th>
                <th>Harga</th>
                <th>Periode</th>
                <th>Bukti Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $l)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $l->nama_penghuni ?? '-' }}</td>
                <td>{{ $l->nama_kamar ?? '-' }}</td>
                <td>Rp {{ number_format($l->harga ?? 0,0,',','.') }}</td>
                <td>{{ $l->periode ?? '-' }}</td>
                <td>
                    @if($l->bukti_bayar)
                        <img src="/foto_bukti_bayar/{{ $l->bukti_bayar }}" width="80px">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
