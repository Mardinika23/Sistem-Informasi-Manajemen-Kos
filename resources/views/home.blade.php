@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
    }
    .dashboard-header {
        padding: 20px 0;
        margin-bottom: 20px;
    }
    .dashboard-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        padding: 20px;
        transition: 0.3s;
    }
    .dashboard-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .dashboard-title {
        color: #2575fc;
        font-weight: 700;
        font-size: 24px;
    }
    .stat-value {
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }
    .stat-label {
        font-size: 14px;
        color: #777;
    }
    .sidebar-custom {
        background: #2575fc;
        color: white;
        height: 100vh;
        padding-top: 20px;
    }
    .sidebar-custom a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 12px 20px;
        transition: 0.3s;
    }
    .sidebar-custom a:hover {
        background: rgba(255,255,255,0.2);
        border-radius: 6px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <div class="col-md-2 sidebar-custom">
            <h4 class="px-3">Manajemen Kost</h4>
            <a href="#">🏠 Dashboard</a>
            <a href="#">👤 Data Penghuni</a>
            <a href="#">💰 Pembayaran</a>
            <a href="#">📦 Kamar</a>
            <a href="#">⚙️ Pengaturan</a>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10 p-4">
            <div class="dashboard-header">
                <h2 class="dashboard-title">Dashboard</h2>
                <p>Selamat datang, {{ Auth::user()->name ?? 'Admin' }}</p>
            </div>

            {{-- Statistik --}}
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <div class="stat-value">24</div>
                        <div class="stat-label">Total Penghuni</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <div class="stat-value">18</div>
                        <div class="stat-label">Kamar Terisi</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dashboard-card text-center">
                        <div class="stat-value">Rp 12.500.000</div>
                        <div class="stat-label">Total Pembayaran Bulan Ini</div>
                    </div>
                </div>
            </div>

            {{-- Tabel Data --}}
            <div class="dashboard-card mt-4">
                <h5>Penghuni Terbaru</h5>
                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kamar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Annisa Putri</td>
                            <td>Kamar 101</td>
                            <td><span class="badge bg-success">Aktif</span></td>
                        </tr>
                        <tr>
                            <td>Budi Santoso</td>
                            <td>Kamar 102</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Citra Ayu</td>
                            <td>Kamar 103</td>
                            <td><span class="badge bg-danger">Nonaktif</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
