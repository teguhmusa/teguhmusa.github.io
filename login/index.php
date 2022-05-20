<?php

include '../php/connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM aDEUser WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
        echo "test2";
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: berhasil_login.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=csrf-token content="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
    <title>Login - Deinvitee</title>
    <!--link rel="canonical" href="https://deinvitee.com/login"-->
    <meta name=title content="Login - deinvitee">
    <meta name=description content="Buat undangan pernikahan online gratis disini dan langsung bisa kamu bagikan ke tamu undanganmu secara mudah dan cepat, ayo buat undangan pernikahan online sekarang!">
    <meta name=keywords content="website undangan, undangan pernikahan, undangan pernikahan gratis, undangan pernikahan online, platform undangan online, gratis undangan online islami, undangan pernikahan islami, undangan pernikahan simpel">

    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/client/app.css">
    <link rel="shortcut icon" href="https://deinvitee.com/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="57x57" href="https://deinvitee.com/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://deinvitee.com/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://deinvitee.com/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://deinvitee.com/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://deinvitee.com/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://deinvitee.com/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://deinvitee.com/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://deinvitee.com/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://deinvitee.com/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://deinvitee.com/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://deinvitee.com/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://deinvitee.com/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://deinvitee.com/icon/favicon-16x16.png">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-12 col-md-4 mx-auto">
                        <div class="brand-logo text-center">
                            <h1 class="mb-0" style="color:#ebeef5">Login</h1>
                            <a href="https://deinvitee.com" class="d-block mb-5"><img src=https://deinvitee.com/images/logo-color.png alt="logo"></a>
                        </div>
                        <div class="auth-form-light py-5 px-4 px-sm-5">
                            <form action="" method="POST" class="login-email">
                                <input type=hidden name=_token value="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
                                <div class="form-group">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type=email name=email class="form-control form-control-lg "  placeholder="Email" value="<?php echo $email; ?>" required autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type=password name=password class="form-control form-control-lg " value="<?php echo $_POST['password']; ?>" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name=submit class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type=checkbox name=remember class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="https://deinvitee.com/password/reset" class="auth-link text-black">Forgot password?</a>
                                </div>

                            </form>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Belum punya akun? <a href="https://deinvitee.com/register" class="text-primary font-weight-bold">Buat sekarang</a>
                            <br><br><br>
                            <small>&copy; 2022 deinvitee. Made by <i style="color:rgb(255, 112, 112)" class="mdi mdi-cards-heart"></i> in Yogyakarta</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src=js/client/app.js></script>
</body>
</html>