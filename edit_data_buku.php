<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM data_buku WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
</head>
<body>
    <h2>Edit Data Buku</h2>
    
    <form action="simpan_edit_buku.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required>
        
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" value="<?php echo $row['penulis']; ?>" required>
        
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required>
        
        <label for="tersedia">Status:</label>
        <input type="radio" name="tersedia" value="1" <?php echo ($row['tersedia'] == 1) ? 'checked' : ''; ?>> Tersedia
        <input type="radio" name="tersedia" value="0" <?php echo ($row['tersedia'] == 0) ? 'checked' : ''; ?>> Tidak Tersedia
        
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
