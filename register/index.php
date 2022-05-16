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

    <link rel="shortcut icon" href="https://deinvitee.com/images/favicon.png">
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
                            <form class="pt-3" action="https://deinvitee.com/register" method="POST">
                                <input type=hidden name=_token value="7DCpZxfEU0iw4hqlZahdPPhImwJd3LgbdJmdxzU7">
                                <div class="form-group input-group subdomain mb-0" data-url="https://deinvitee.com/api/check-subdomain">
                                    <input type=text style="border-top-right-radius: 0;border-bottom-right-radius: 0;" class="form-control form-control-lg " name=domain id="domain" placeholder="namapasangan" value="" aria-label="romeojuliet" aria-describedby="basic-addon2" minlength="3"
                                        maxlength="30" required autofocus>
                                    <div class="input-group-append">
                                        <span style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;" class="input-group-text" id="basic-addon2">.deinvitee.com</span>
                                    </div>
                                    <span class="invalid-feedback domain-validation" style="display: none;" role="alert">
                      <strong>Domain sudah digunakan!</strong>
                  </span>
                                </div>
                                <div class="form-group mt-4">
                                    <input type=name name=name class="form-control form-control-lg " id="InputName1" placeholder="Nama" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type=email name=email class="form-control form-control-lg " id="InputEmail1" placeholder="Email" value="" required autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <input type=number name=phone class="form-control form-control-lg " id="InputEmail1" placeholder="WhatsApp" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type=password name=password class="form-control form-control-lg " id="InputPassword1" placeholder="Password" required>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                      <input type=checkbox class="form-check-input" name=agree-term value="1" required>
                      I agree to the Terms &amp; Conditions
                    </label>
                                    </div>
                                    <a href="https://deinvitee.com/terms-conditions" class="auth-link text-black">Read this</a>
                                </div>
                                <div class="mt-3">
                                    <button type=submit class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="submitForm(this);">BUAT UNDANGAN</button>
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