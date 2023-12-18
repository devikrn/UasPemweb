<!-- form_buku.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Toko Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Buku Di Toko</h2>
    
    <form action="simpan_data_buku.php" method="post">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" required>
        
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" required>
        
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" required>
        
        <label>Status:</label>
        <input type="radio" name="tersedia" value="1" checked> Tersedia
        <input type="radio" name="tersedia" value="0"> Tidak Tersedia
        <br>
        <button type="submit">Simpan</button>
    </form>

  

    <!-- Form untuk filter berdasarkan judul -->
    <form action="form_buku.php" method="get">
        <label for="filter_judul">Filter Judul:</label>
        <input type="text" name="filter_judul">
        <button type="submit">Filter</button>
    </form>

    <!-- Tabel untuk menampilkan data -->
    <h2>Data Buku</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';

            // Ambil nilai filter judul dari URL
            $filterJudul = isset($_GET['filter_judul']) ? $_GET['filter_judul'] : '';

            // Modifikasi query SQL sesuai dengan filter judul
            $sql = "SELECT * FROM data_buku";
            if ($filterJudul !== '') {
                $sql .= " WHERE judul LIKE '%$filterJudul%'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['judul'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>" . ($row['tersedia'] ? 'Tersedia' : 'Tidak Tersedia') . "</td>";
                    echo "<td><a href='edit_data_buku.php?id=" . $row['id'] . "'>Edit</a> | <a href='hapus_data_buku.php?id=" . $row['id'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
