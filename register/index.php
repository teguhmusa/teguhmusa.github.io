<?php

include '../php/connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: https://deinvitee.com/login");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM aDEUser WHERE email='$email'";
        $result = mysqli_query($db, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO aDEUser (username, name, email, whatsapp, password)
                    VALUES ('$username', '$name', '$email', '$whatsapp', '$password')";
            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=csrf-token content="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
    <title>Register - Deinvitee</title>
    <link rel="canonical" href="https://deinvitee.com/register">
    <meta name=title content="Register - deinvitee">
    <meta name=description content="Platform undangan pernikahan online gratis dan langsung bisa kamu bagikan ke tamu undanganmu secara mudah dan cepat, ayo buat undangan pernikahan online sekarang!">
    <meta name=keywords content="website undangan, undangan pernikahan, undangan pernikahan gratis, undangan pernikahan online, platform undangan online, gratis undangan online islami, undangan pernikahan islami, undangan pernikahan simpel">

    <link rel="stylesheet" href="../css/materialdesignicons.min.css">
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
                            <h1 class="mb-0" style="color:#ebeef5">Buat Undangan</h1>
                            <a href="https://deinvitee.com" class="d-block mb-5"><img src=https://deinvitee.com/images/logo-color.png alt="logo"></a>
                        </div>
                        <div class="auth-form-light py-5 px-4 px-sm-5">
                            <form class="pt-3" action="" method="POST">
                                <input type=hidden name=_token value="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
                                <div class="form-group mt-4">
                                    <input type=text name=username class="form-control form-control-lg " id="InputName1" placeholder="Username" value="<?php echo $username; ?>" required>
                                </div>
                                <div class="form-group mt-4">
                                    <input type=name name=name class="form-control form-control-lg " id="InputName1" placeholder="Nama" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type=email name=email class="form-control form-control-lg " id="InputEmail1" placeholder="Email" value="<?php echo $email; ?>" required autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <input type=number name=whatsapp class="form-control form-control-lg " id="InputEmail1" placeholder="WhatsApp" value="<?php echo $whatsapp; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type=password name=password class="form-control form-control-lg " id="InputPassword1" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type=password name=cpassword class="form-control form-control-lg " id="ConfirmInputPassword1" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                                </div>
                                <!--div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                      <input type=checkbox class="form-check-input" name=agree-term value="1" required>
                      I agree to the Terms &amp; Conditions
                    </label>
                                    </div>
                                    <a href="https://deinvitee.com/terms-conditions" class="auth-link text-black">Read this</a>
                                </div-->
                                <div class="mt-3">
                                    <button name=submit class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">BUAT UNDANGAN</button>
                                </div>

                            </form>
                        </div>

                        <div class="text-center mt-4 font-weight-light">
                            Sudah punya akun? <a href="https://deinvitee.com/login" class="text-primary font-weight-bold">Login disini</a>
                            <br><br><br>
                            <small>&copy; 2022 deinvitee. Made by <i style="color:rgb(255, 112, 112)" class="mdi mdi-cards-heart"></i> in Yogyakarta</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src=https://deinvitee.com/js/client/app.js></script>
    <script src=https://deinvitee.com/js/register.js></script>
    <script>
        function submitForm(btn) {
            btn.disabled = true;
            btn.form.submit();
        }
    </script>
</body>

</html>