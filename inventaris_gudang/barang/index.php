<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar langsung di dalam file -->
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

<div class="container">
    <h2 class="mb-4 text-center">Manajemen Data Barang</h2>

    <div class="mb-3 text-end">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Barang</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Batas Minimum</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM barang");
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>
                        <td>{$row['nama_barang']}</td>
                        <td>{$row['stok']}</td>
                        <td>{$row['satuan']}</td>
                        <td>{$row['batas_minimum']}</td>
                        <td>
                            <a href='edit.php?id={$row['id_barang']}' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='delete.php?id={$row['id_barang']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus?')\">Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
