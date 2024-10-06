<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Pegawai</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style_presensi.css') }}" />
</head>

<body>
    <form action="{{ route('presensi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h2>Input Presensi Pegawai</h2>
            <form>
                <label for="nama">Nama Pegawai</label>
                <select id="nama" name="nama">
                    <option value="Ferdy">Ferdy</option>
                    <option value="Mado">Mado</option>
                    <option value="Juliano">Juliano</option>
                    <option value="Rio">Rio</option>
                </select>
    
                <label for="kehadiran">Kehadiran</label>
                <select id="kehadiran" name="kehadiran">
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Absent">Absent</option>
                    <option value="Ijin">Ijin</option>
                </select>
    
                <label for="keterangan">Keterangan Ijin</label>
                <textarea id="keterangan" name="keterangan" rows="4"></textarea>
    
                <label for="upload">Upload Surat Keterangan Sakit</label>
                <input type="file" id="upload" name="upload">
    
                <div class="buttons">
                    <a href="{{ route('pegawai.dashboard') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </form>
</body>
    
</html>
