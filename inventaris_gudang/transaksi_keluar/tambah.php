<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Tambah Transaksi Keluar</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Barang</label>
            <select name="id_barang" class="form-select" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                $barang = mysqli_query($conn, "SELECT * FROM barang ORDER BY nama_barang ASC");
                while ($row = mysqli_fetch_assoc($barang)) {
                    echo "<option value='{$row['id_barang']}'>{$row['nama_barang']} (Stok: {$row['stok']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $id_barang = $_POST['id_barang'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];

        // Cek stok cukup
        $cek = mysqli_query($conn, "SELECT stok FROM barang WHERE id_barang = '$id_barang'");
        $stok = mysqli_fetch_assoc($cek)['stok'];

        if ($jumlah > $stok) {
            echo "<div class='alert alert-danger mt-3'>Stok tidak mencukupi! (Tersedia: $stok)</div>";
        } else {
            mysqli_query($conn, "INSERT INTO transaksi_keluar (id_barang, jumlah, tanggal, keterangan) 
                                 VALUES ('$id_barang', '$jumlah', NOW(), '$keterangan')");
            echo "<script>window.location='index.php';</script>";
        }
    }
    ?>
</div>
</body>
</html>
