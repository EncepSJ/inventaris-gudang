<?php include '../koneksi.php'; ?>
<?php
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");
$barang = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Edit Data Barang</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="<?= $barang['stok'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" value="<?= $barang['satuan'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Batas Minimum</label>
            <input type="number" name="batas_minimum" value="<?= $barang['batas_minimum'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $satuan = $_POST['satuan'];
        $batas = $_POST['batas_minimum'];
        mysqli_query($conn, "UPDATE barang SET nama_barang='$nama', stok='$stok', satuan='$satuan', batas_minimum='$batas' WHERE id_barang='$id'");
        echo "<script>window.location='index.php';</script>";
    }
    ?>
</div>
</body>
</html>
