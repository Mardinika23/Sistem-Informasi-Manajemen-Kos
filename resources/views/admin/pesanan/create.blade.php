@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col mb-2">
                <a href="{{ route('pesanan.index') }}" class="btn btn-warning btn-sm">
                    <span data-feather="arrow-left-circle"></span> Batal
                </a>
            </div>
        </div>

        <div class="text-left mb-3">
            <h2>Form Tambah Penghuni Kost</h2>
        </div>

        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <form action="{{ route('pesanan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <hr class="my-4">
                    <small class="text-muted">Data Pribadi</small>

                    <div class="col-sm-12 mt-2">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <label class="form-label">Gender</label><br>
                        <input class="form-check-input ms-3" type="radio" name="gender" id="gender_pria" value="1">
                        <label class="form-check-label ms-1 me-4" for="gender_pria">Pria</label>

                        <input class="form-check-input" type="radio" name="gender" id="gender_wanita" value="2">
                        <label class="form-check-label ms-1" for="gender_wanita">Wanita</label>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <label for="ttl" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="ttl" name="ttl" required>
                    </div>

                    <div class="col-12 mt-2">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="formFile" name="foto" required>
                    </div>

                    <div class="col-sm-12 mt-2">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="kontak" required>
                    </div>

                    <hr class="my-4">
                    <small class="text-muted">Data Pesanan Kost</small>

                    <!-- Gallery Kamar -->
                    <div class="row g-2 mt-2">
                        @foreach ($kamar as $k)
                        <div class="col-md-4">
                            <div class="thumbnail text-center bg-white shadow-sm p-2 mb-4 bg-body rounded">
                                <input type="radio" class="btn-check" name="id_kamar" id="kamar{{$k->id}}" value="{{$k->id}}" autocomplete="off">
                                <label class="btn btn-outline-success w-100" for="kamar{{$k->id}}">{{$k->nama_kamar}}</label>
                                <h6><small>Rp {{$k->harga}} / bulan</small></h6>
                                <img src="/foto_kamar/{{$k->foto}}" alt="kamar" class="img-fluid">
                                <div class="caption mt-2">
                                    <p>{{$k->keterangan}}</p>
                                    <a href="{{ route('kamar.show', $k->id) }}" class="btn btn-warning col-12">Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Akhir Gallery Kamar -->

                    <button class="w-100 btn btn-primary btn-lg mt-3" type="submit">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
