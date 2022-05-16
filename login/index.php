<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name=csrf-token content="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
    <title>Login - Deinvitee</title>
    <link rel="canonical" href="https://deinvitee.com/login">
    <meta name=title content="Login - deinvitee">
    <meta name=description content="Buat undangan pernikahan online gratis disini dan langsung bisa kamu bagikan ke tamu undanganmu secara mudah dan cepat, ayo buat undangan pernikahan online sekarang!">
    <meta name=keywords content="website undangan, undangan pernikahan, undangan pernikahan gratis, undangan pernikahan online, platform undangan online, gratis undangan online islami, undangan pernikahan islami, undangan pernikahan simpel">

    <link rel="stylesheet" href="../css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/client/app.css">

    <link rel="shortcut icon" href="https://deinvitee.com/images/favicon.png">
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
                            <form action="https://deinvitee.com/login" method="POST">
                                <input type=hidden name=_token value="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
                                <div class="form-group">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type=email name=email class="form-control form-control-lg " id="exampleInputEmail1" placeholder="Email" value="" required autocomplete="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type=password name=password class="form-control form-control-lg " id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button type=submit class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="submitForm(this);">LOGIN</button>
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
    <script>
        function submitForm(btn) {
            btn.disabled = true;
            btn.form.submit();
        }
    </script>
</body>

</html>