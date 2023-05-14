<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
    <a href="create.php" class="btn btn-primary mt-3 mb-3">Tambah</a>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 include 'koneksi.php';
                // Query untuk membaca data dari tabel
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                
                // Memeriksa apakah ada data yang ditemukan
                if ($result->num_rows > 0) {
                    // Menampilkan data
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $row["id"] . "</td>";
                        echo "<td>";
                        echo "<div class='btn-group' role='group' aria-label='Basic mixed styles example'>";
                        echo "<a class='btn btn-primary' href='detail.php?id=" . $row["id"] . "'>Detail</a> ";
                        echo "<a class='btn btn-warning' href='edit.php?id=" . $row["id"] . "'>Edit</a> ";
                        echo "<a class='btn btn-danger' href='delete.php?id=" . $row["id"] . "'>Hapus</a>";
                        echo "</div>";
                        echo "</td>";
                        echo "<td><img src=\"avatar/{$row['avatar']}\" width='100em' class='rounded-circle'></td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["role"] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
