<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Layanan Laundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/da.css') }}">
    <style>
        .container {
            background-color: #ffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 5 0 10px rgba(0, 0, 0, 1);
            width: 500px;
            text-align: center;
            position: center;
            z-index: 1;
            margin-left: 250px;
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

        button {
            background-color: #5eb1e6;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 30%;
        }

        button:hover {
            background-color: #007bff;
        }

        .btn-batal {
            background-color: #f44336;
            color: white;
        }

        .btn-batal:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>
    @include('template.sidebarmanager')
    <div class="dashboard-content">
        <div class="container">
            <h2>Input Jenis dan Tarif Layanan Laundry</h2>
            <form action="prc_input.php" method="POST">
                <label for="jenis_layanan">Jenis Layanan:</label>
                <input type="text" id="jenis_layanan" name="jenis_layanan"
                    placeholder="Masukkan jenis layanan (contoh: Cuci Kering)" required>
    
                <label for="jenis_laundry">Jenis Laundry:</label>
                <input type="text" id="jenis_laundry" name="jenis_laundry"
                    placeholder="Masukkan nama layanan (contoh: Express)" required>
    
                <label for="durasi_layanan">Durasi Layanan:</label>
                <input type="text" id="durasi_layanan" name="durasi_layanan"
                    placeholder="Masukkan durasi layanan (contoh: 8 jam)" required>
    
                <label for="tarif_layanan">Tarif Layanan (Rp/kg):</label>
                <input type="number" id="tarif_layanan" name="tarif_layanan" placeholder="Masukkan tarif (contoh: 5000)"
                    step="1000" min="0" required>
                    
                <div class="form-group d-flex">
                    <button type="button" class="btn btn-batal" onclick="window.location.href='{{ Auth::user()->name === 'manager' ? route('manager.dashboard') : route('manager.dashboard') }}'">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>                
                </div>
            </form>
        </div>      
    </div>
    

</body>

</html>