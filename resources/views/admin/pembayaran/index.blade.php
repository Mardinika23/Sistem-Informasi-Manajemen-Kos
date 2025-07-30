@extends('admin.layouts.main')
@section('container')

<div class="container pt-3">
    <h2>Form Pembayaran</h2>

    <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="id_penghuni" class="form-label">Penghuni</label>
            <select class="form-select" name="id_penghuni" required>
                <option value="">-- Pilih Penghuni --</option>
                @foreach($pembayaran as $p)
                    <option value="{{ $p->penghuni_kost_id }}">
                        {{ $p->nama_penghuni }} | {{ $p->nama_kamar }} | Rp {{ number_format($p->harga) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="periode" class="form-label">Periode Pembayaran</label>
            <input type="date" class="form-control" name="periode" required>
        </div>

        <div class="mb-3">
            <label for="bukti_bayar" class="form-label">Bukti Pembayaran</label>
            <input type="file" class="form-control" name="bukti_bayar" required>
        </div>

        <button class="btn btn-primary w-100" type="submit">Simpan</button>
    </form>

    <h3>Data Pembayaran</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Penghuni</th>
                <th>Kamar</th>
                <th>Harga</th>
                <th>Bukti</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($lunas as $l)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $l->nama_penghuni }}</td>
                    <td>{{ $l->nama_kamar }}</td>
                    <td>Rp {{ number_format($l->harga) }}</td>
                    <td><img src="{{ asset('foto_bukti_bayar/'.$l->bukti_bayar) }}" width="80"></td>
                    <td>{{ $l->periode }}</td>
                    @php $total += $l->harga; @endphp
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total Pendapatan: Rp {{ number_format($total) }}</h4>
</div>

@endsection
