<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Presensi Pegawai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_presensi.css') }}" />
</head>

<body>
    <form action="{{ route('presensi.update', $presensi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <h2>Edit Presensi Pegawai</h2>

            <label for="nama">Nama Pegawai</label>
            <select id="nama" name="nama">
                <option value="Ferdy" {{ $presensi->nama_pegawai == 'Ferdy' ? 'selected' : '' }}>Ferdy</option>
                <option value="Mado" {{ $presensi->nama_pegawai == 'Mado' ? 'selected' : '' }}>Mado</option>
                <option value="Juliano" {{ $presensi->nama_pegawai == 'Juliano' ? 'selected' : '' }}>Juliano</option>
                <option value="Rio" {{ $presensi->nama_pegawai == 'Rio' ? 'selected' : '' }}>Rio</option>
            </select>

            <label for="kehadiran">Kehadiran</label>
            <select id="kehadiran" name="kehadiran">
                <option value="Hadir" {{ $presensi->kehadiran == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Sakit" {{ $presensi->kehadiran == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="Absent" {{ $presensi->kehadiran == 'Absent' ? 'selected' : '' }}>Absent</option>
                <option value="Ijin" {{ $presensi->kehadiran == 'Ijin' ? 'selected' : '' }}>Ijin</option>
            </select>

            <label for="keterangan">Keterangan Ijin</label>
            <textarea id="keterangan" name="keterangan" rows="4">{{ $presensi->keterangan }}</textarea>

            <label for="upload">Upload Surat Keterangan Sakit</label>
            <input type="file" id="upload" name="upload">

            @if($presensi->upload)
                <p>File saat ini: <a href="{{ route('presensi.file', $presensi->id) }}" target="_blank">Lihat File</a></p>
            @endif

            <div class="buttons">
                <a href="{{ route('pegawai.dashboard') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</body>

</html>
