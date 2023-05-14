<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $avatar = $_FILES["avatar"]["name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $role = $_POST["role"];
    $password = $_POST["password"];

    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $x = explode('.', $avatar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES["avatar"]["tmp_name"];

    if (!empty($avatar)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'avatar/' . $avatar);

            $sql = "INSERT INTO users (name, email, avatar, address, phone, role, password) VALUES ('$name', '$email', '$avatar', '$address', '$phone', '$role', '$password')";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

// Mengambil data role dari tabel role
$sqlRole = "SELECT * FROM role";
$resultRole = $conn->query($sqlRole);

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="mb-3 mt-3">Tambah pengguna</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap" required>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <?php
                            while ($rowRole = $resultRole->fetch_assoc()) {
                                $role_id = $rowRole["id"];
                                $role_name = $rowRole["role_name"];
                                echo "<option value=\"$role_id\">$role_name</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="name@example.com">
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="08199987262">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat lengkap</label>
                <textarea type="text" class="form-control" id="address" name="address"></textarea>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Unggah Foto</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>

