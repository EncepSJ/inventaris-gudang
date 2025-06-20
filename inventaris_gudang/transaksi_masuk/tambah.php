<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Tambah Transaksi Masuk</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Barang</label>
            <select name="id_barang" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                $barang = mysqli_query($conn, "SELECT * FROM barang");
                while ($b = mysqli_fetch_assoc($barang)) {
                    echo "<option value='{$b['id_barang']}'>{$b['nama_barang']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Supplier</label>
            <select name="id_supplier" class="form-control" required>
                <option value="">-- Pilih Supplier --</option>
                <?php
                $supplier = mysqli_query($conn, "SELECT * FROM supplier");
                while ($s = mysqli_fetch_assoc($supplier)) {
                    echo "<option value='{$s['id_supplier']}'>{$s['nama_supplier']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $id_supplier = $_POST['id_supplier'];
        mysqli_query($conn, "INSERT INTO transaksi_masuk (id_barang, jumlah, id_supplier, tanggal) 
                             VALUES ('$id_barang', '$jumlah', '$id_supplier', NOW())");
        echo "<script>window.location='index.php';</script>";
    }
    ?>
</div>
</body>
</html>
