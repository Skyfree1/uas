<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $saldo = $_POST['saldo'];
        $query = "INSERT INTO records (description, amount) VALUES ('$nama', '$saldo')";
        mysqli_query($conn, $query);
        echo "<script>alert('Record added successfully');</script>";
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM records WHERE id = $id";
        mysqli_query($conn, $query);
        echo "<script>alert('Record deleted successfully');</script>";
    }
}

$records = mysqli_query($conn, "SELECT * FROM records");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Catatan</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="content">
        <h1>Kelola Catatan</h1>
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
            <label for="saldo">Saldo:</label>
            <input type="number" name="saldo" required>
            <button type="submit" name="add">Tambah Catatan</button>
        </form>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Saldo</th>
                <th>Aksi</th>
                
            </tr>
            <?php while ($row = mysqli_fetch_assoc($records)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td>
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete">Hapus</button>
                        <button type="submit" name="update">update</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>