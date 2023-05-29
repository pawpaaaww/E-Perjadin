<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        require "function.php";

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $username = $_POST['username'];
                            $newPassword = $_POST['newPassword'];

                            $result = resetPassword($username, $newPassword);

                            if ($result !== 0) {
                                echo "<scirpt>alert('Password berhasil direset') ; </scirpt>";
                                echo '<script>window.location.href = "index.php";</script>';
                                exit;
                            } else {
                                echo '<div class="alert alert-danger">Gagal mereset password.</div>';
                            }
                        }
                        ?>

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password:</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            </div>
                            <button type="submit" class="btn btn-danger" name="resetPassword">Reset Password</button>
                            <a href="index.php">Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>