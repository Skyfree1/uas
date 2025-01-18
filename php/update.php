<?php
include('db_connection.php');

// Ambil data yang akan diupdate berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM records WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $record = mysqli_fetch_assoc($result);
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $saldo = $_POST['saldo'];

    $query = "UPDATE records SET description = '$nama', amount = '$saldo' WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location.href = 'index.php';</script>"; // Redirect ke halaman utama
    } else {
        echo "<script>alert('Error updating record');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Catatan</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="content">
        <h1>Update Catatan</h1>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $record['description']; ?>" required>
            <label for="saldo">Saldo:</label>
            <input type="number" name="saldo" value="<?php echo $record['amount']; ?>" required>
            <button type="submit">Update Catatan</button>
        </form>
    </div>
</body>
</html>
