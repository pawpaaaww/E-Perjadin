<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Memasukkan file CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Memasukkan file CSS Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./src/style/global.css">
</head>

<body class="bg vh-100">
    <div class="container w-container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 my-auto">
                <div class="d-flex align-items-center p-5 text-primary-emphasis">
                    <p class="h4 bg-primary-subtle p-5 rounded-5 ms-5">Welcome E-Perjadin </p>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Login</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($message)) : ?>
                            <div class="alert alert-success"><?php echo $message; ?></div>
                        <?php endif; ?>
                        <form action="#" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="email"><i class="fas fa-user"></i> Username :</label>
                                <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username" required value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>">
                            </div>
                            <div class="">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password" required value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                            </div>
                            <div class="form-group form-check">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe" <?php echo isset($_COOKIE['remember']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary" name="login" value="login">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <span>Don't have an account? </span>
                            <a href="register.php" class="btn btn-success"><i class="fas fa-user-plus"></i> Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memasukkan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./src/js/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            include "function.php";
            $conn = koneksi();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $sql = mysqli_query($conn, "SELECT pass FROM login WHERE username='$user'");

                $row = mysqli_fetch_assoc($sql);

                if (mysqli_num_rows($sql) > 0) {
                    if ($pass == $row['pass']) {
                        if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
                            setcookie('username', $user, time() + (30 * 24 * 60 * 60), '/');
                            setcookie('password', $pass, time() + (30 * 24 * 60 * 60), '/');
                            setcookie('remember', '1', time() + (30 * 24 * 60 * 60), '/');
                        } else {
                            setcookie('username', '', time() - 3600, '/');
                            setcookie('password', '', time() - 3600, '/');
                            setcookie('remember', '', time() - 3600, '/');
                        }
                        session_start();
                        $_SESSION['username'] = $user;

                        echo "Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = 'menuUtama.php';
                        });";
                    } else {
                        echo "Swal.fire({
                            title: 'Password Salah',
                            text: 'Pastikan password yang anda input benar',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });";
                    }
                } else {
                    echo "Swal.fire({
                        title: 'Username tidak terdaftar',
                        text: 'Lakukan Registrasi',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });";
                }
            }
            ?>
        });
    </script>

</body>

</html>