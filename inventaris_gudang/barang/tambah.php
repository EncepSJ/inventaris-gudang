<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Tambah Data Barang</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Batas Minimum</label>
            <input type="number" name="batas_minimum" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $batas = $_POST['batas_minimum'];
        mysqli_query($conn, "INSERT INTO barang (nama_barang, stok, satuan, batas_minimum) VALUES ('$nama', '$stok', '$satuan', '$batas')");
        echo "<script>window.location='index.php';</script>";
    }
    ?>
</div>
</body>
</html>
