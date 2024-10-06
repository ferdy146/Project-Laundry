<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Presensi Pegawai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_view_presensi.css') }}" />
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Presensi Pegawai</h2>

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Memeriksa apakah ada data presensi -->
        @if ($presensis->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Kehadiran</th>
                        <th>Keterangan</th>
                        <th>Surat Keterangan Sakit</th>
                        <th>Tanggal Presensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presensis as $presensi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $presensi->nama_pegawai }}</td>
                            <td>{{ $presensi->kehadiran }}</td>
                            <td>{{ $presensi->keterangan ?? '-' }}</td>
                            <td>
                                @if ($presensi->upload)
                                    <a href="{{ asset('storage/' . $presensi->upload) }}" target="_blank">Lihat File</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>{{ $presensi->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        @else
            <div class="alert alert-info text-center">
                Tidak ada data presensi yang tersedia.
            </div>
        @endif
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
    </div>
</body>

</html>
