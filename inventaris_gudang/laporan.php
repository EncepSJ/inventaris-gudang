<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">Inventaris Gudang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="barang/index.php">Barang</a></li>
        <li class="nav-item"><a class="nav-link" href="supplier/index.php">Supplier</a></li>
        <li class="nav-item"><a class="nav-link" href="transaksi_masuk/index.php">Transaksi Masuk</a></li>
        <li class="nav-item"><a class="nav-link" href="transaksi_keluar/index.php">Transaksi Keluar</a></li>
        <li class="nav-item"><a class="nav-link active" href="laporan.php">Laporan</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-3">
    <h2 class="mb-4 text-center">Laporan Transaksi Bulanan</h2>

    <form method="POST" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="bulan" class="form-label">Bulan</label>
            <select name="bulan" class="form-select" required>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?= $i ?>"><?= date("F", mktime(0, 0, 0, $i, 1)) ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" value="<?= date('Y') ?>" class="form-control" required>
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" name="tampilkan" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>

    <?php
    if (isset($_POST['tampilkan'])) {
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];

        $result = mysqli_query($conn, "CALL laporan_bulanan($bulan, $tahun)");

        echo "<h5>Hasil Laporan Bulan: " . date("F", mktime(0, 0, 0, $bulan, 1)) . " $tahun</h5>";
        echo '<div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Jenis</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>';

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['tipe']}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['keterangan']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='text-center'>Tidak ada data.</td></tr>";
        }

        echo '</tbody></table></div>';

        // Reset connection after CALL
        mysqli_next_result($conn);
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
