<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transaksi Laundry</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('manager.dashboard') }}" class="btn btn-secondary">Back</a>
        </div>
        @foreach($transactions as $transaction)
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="card-title">Detail Transaksi Laundry</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Tanggal Masuk</div>
                    <div class="col-sm-8">{{ $transaction->tanggal_masuk }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Nama Pelanggan</div>
                    <div class="col-sm-8">{{ $transaction->nama_pelanggan }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Jenis Layanan</div>
                    <div class="col-sm-8">{{ $transaction->jenis_layanan }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Jenis Laundry</div>
                    <div class="col-sm-8">{{ $transaction->jenis_laundry }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Berat (kg)</div>
                    <div class="col-sm-8">{{ $transaction->berat }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Metode Pembayaran</div>
                    <div class="col-sm-8">{{ $transaction->metode_pembayaran }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Total Harga</div>
                    <div class="col-sm-8">Rp {{ $transaction->total_harga }}</div>
                </div>
                <div class="text-right">
                    <a href="{{ route('manager.editdata', ['id' => $transaction->id]) }}" class="btn btn-warning">Edit Transaksi</a>
                    <form action="{{ route('manager.delete', ['id' => $transaction->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
