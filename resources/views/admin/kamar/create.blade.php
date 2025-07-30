@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="col">
        <a href="{{ route('kamar.index') }}" class="btn btn-warning btn-sm">
            <span data-feather="arrow-left-circle"></span> Batal
        </a>
    </div>
</div>

<div class="container">
    <div class="text-left mb-3">
        <h2>Form Tambah Kamar</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-7 col-lg-8">
            <form action="{{ route('kamar.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <div class="col-sm-3">
                        <label for="nama_kamar" class="form-label">Nama Kamar</label>
                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar" value="{{ old('nama_kamar') }}" required>
                    </div>

                    <div class="col-sm-3">
                        <label for="kapasitas" class="form-label">Kapasitas <small>(Orang)</small></label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" required>
                    </div>

                    <div class="col-sm-3">
                        <label for="panjang" class="form-label">Panjang <small>(m)</small></label>
                        <input type="number" class="form-control" id="panjang" name="panjang" value="{{ old('panjang') }}" required>
                    </div>

                    <div class="col-sm-3">
                        <label for="lebar" class="form-label">Lebar <small>(m)</small></label>
                        <input type="number" class="form-control" id="lebar" name="lebar" value="{{ old('lebar') }}" required>
                    </div>

                    <div class="col-sm-12">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required>
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="keterangan" id="floatingTextarea">{{ old('keterangan') }}</textarea>
                            <label for="floatingTextarea">Keterangan</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="formFile" name="foto">
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
