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
    <link rel="stylesheet" href="src/style/global.css">
</head>


<body>
    <div class="container">
        <div class="row mt-5">
        <div class="col-md-6 my-auto">
            <div class="d-flex align-items-center">
                <h1>Welcome To E-Perjadin</h1>
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
                                <label for="email"><i class="fa fa-user"></i> Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukan password" name="password" required>
                            </div>
                            <div class="form-group form-check">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>
                                    <a href="#"><i class="fas fa-key"></i> Reset Password</a>
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
    <script src="src/js/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            session_start();
            include "connection.php";
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])
            ) {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $sql = mysqli_query($conn, "SELECT * FROM login WHERE username='$user' AND pass='$pass'");

                $cek = mysqli_num_rows($sql);
            }
            ?>
            <?php if ($cek > 0) : ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'menuUtama.php';
                });
            <?php else : ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Username Atau Password Salah !!!!',
                    showConfirmButton: true,
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>