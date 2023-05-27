<?php
include_once "connection.php";

if (isset($_POST['save'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Pengecekan apakah username sudah ada dalam tabel login
    $checkQuery = "SELECT * FROM login WHERE username = '$user'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Jika username sudah ada, tampilkan pesan kesalahan
        echo "<script>alert('Username sudah digunakan. Silakan pilih username lain.');</script>";
    } else {
        // Jika username belum ada, lakukan penyimpanan data ke database
        $insertQuery = "INSERT INTO login (username, pass) VALUES ('$user', '$pass')";
        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Registrasi Behasil '); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Registrasi Gagal');</script>";
            echo "Error: " . $insertQuery . "
" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Memasukkan file CSS Font Awesome -->
    <link rel="stylesheet" href="src/style/sweetalert2.min.css">
    <link rel="stylesheet" href="src/style/global.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Register </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="email"><i class="fas fa-user"></i> Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter email" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                            </div>
                            <div class="form-group form-check">
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger" name="save" value="submit">Register</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <span> Sudah Memiliki Akun ? </span>
                            <a href="login.php" class="text-dark"><i class="fas fa-key"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memasukkan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="src/js/sweetalert2.all.min.js""></script>
</body>

</html>