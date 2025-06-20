<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="../index.php">Inventaris Gudang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="../dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="../barang/index.php">Barang</a></li>
        <li class="nav-item"><a class="nav-link" href="../supplier/index.php">Supplier</a></li>
        <li class="nav-item"><a class="nav-link" href="../transaksi_masuk/index.php">Transaksi Masuk</a></li>
        <li class="nav-item"><a class="nav-link" href="../transaksi_keluar/index.php">Transaksi Keluar</a></li>
        <li class="nav-item"><a class="nav-link" href="../laporan.php">Laporan</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container mt-5">
    <h2 class="mb-4 text-center">Data Transaksi Masuk</h2>

    <div class="mb-3 text-end">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Transaksi Masuk</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "
                    SELECT tm.*, b.nama_barang, s.nama_supplier 
                    FROM transaksi_masuk tm
                    JOIN barang b ON tm.id_barang = b.id_barang
                    JOIN supplier s ON tm.id_supplier = s.id_supplier
                    ORDER BY tm.tanggal DESC
                ");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['nama_barang']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>{$row['nama_supplier']}</td>
                        <td>
                            <a href='delete.php?id={$row['id_masuk']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin hapus?')\">Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
