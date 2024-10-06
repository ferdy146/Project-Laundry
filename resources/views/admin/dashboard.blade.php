<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/st_login.css') }}"> --}}  
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="dashboard"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto t ext-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Dashboard</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="inputdata" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Input Transaksi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewdata" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Lihat data transaksi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="presensi" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Presensi Pegawai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewpresensi" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Lihat Presensi Pegawai</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-xl-10 px-sm-2 px-0">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1>Selamat Datang Admin Podomoro Laundry</h1>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"  class="btn btn-outline-danger">Logout</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{-- Riwayat semua data transaksi pada data base --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
