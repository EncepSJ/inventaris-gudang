<?php include '../koneksi.php'; ?>
<?php
// Ambil data supplier berdasarkan ID
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id_supplier = '$id'");
$supplier = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Edit Data Supplier</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" value="<?= $supplier['nama_supplier'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $supplier['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" value="<?= $supplier['kontak'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $kontak = $_POST['kontak'];

        mysqli_query($conn, "UPDATE supplier SET nama_supplier='$nama', alamat='$alamat', kontak='$kontak' WHERE id_supplier='$id'");
        echo "<script>window.location='index.php';</script>";
    }
    ?>
</div>
</body>
</html>
