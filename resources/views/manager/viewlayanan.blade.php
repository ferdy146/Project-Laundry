<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
</head>
<style>
    .container {
        background-color: #ffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 5 0 10px rgba(0, 0, 0, 1);
        width: 800px;
        text-align: center;
        position: center;
        z-index: 1;
        margin-left: 100px;
        margin: center;
    }

    h2 {
        color: black;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        text-align: left;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button,
    .btn-edit,
    .btn-hapus {
        background-color: #5eb1e6;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }

    button:hover,
    .btn-edit:hover {
        background-color: #007bff;
    }

    .btn-hapus {
        background-color: #f44336;
    }

    .btn-hapus:hover {
        background-color: #e53935;
    }

    .btn-secondary {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 15%;
            
    }

    .btn-secondary:hover {
        background-color: #e53935;
    }
</style>

<body>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>Daftar Jenis dan Tarif Layanan Laundry</h2>
            <!-- Tabel daftar layanan -->
            <table>
                <thead>
                    <tr>
                        <th>Jenis Layanan</th>
                        <th>Nama Layanan</th>
                        <th>Durasi Layanan</th>
                        <th>Tarif Layanan (Rp/kg)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data layanan, nanti ganti dengan data dari server -->
                    <tr>
                        <td>Cuci Kering</td>
                        <td>Express</td>
                        <td>8 jam</td>
                        <td>Rp 5000</td>
                        <td>
                            <a href="editlayanan" class="btn-edit">Edit</a>
                            <form action="delete_layanan.php?id=1" method="POST" style="display:inline-block;">
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>Cuci Setrika</td>
                        <td>Reguler</td>
                        <td>24 jam</td>
                        <td>Rp 7000</td>
                        <td>
                            <a href="editlayanan" class="btn-edit">Edit</a>
                            <form action="delete_layanan.php?id=2" method="POST" style="display:inline-block;">
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <div>
                <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>      
    </div>
    
    
</body>

</html>