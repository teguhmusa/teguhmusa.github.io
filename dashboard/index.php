<?php

include '../php/connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    $theUserName = $_SESSION['username'];
} else {
    header("Location: https://deinvitee.com/login");
}

// fetch records
$resultUser = @mysqli_query($db, "SELECT * FROM aDEUser where username = '$theUserName'") or die("Error: " . mysqli_error($db));
while ($rowUser = mysqli_fetch_assoc($resultUser)) {
    $coupleId = $rowUser['coupleId'];
}

$result = @mysqli_query($db, "SELECT * FROM aDEUserMessage where coupleId = '$coupleId' order by createdDate desc ") or die("Error: " . mysqli_error($db));

// accept message
if (isset($_POST['chk_id'])) {
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        if (isset($_POST['update_button'])) {
            @mysqli_query($db, "UPDATE aDEUserMessage set IsApproved = 1 WHERE id = '$id' AND coupleId = '$coupleId'");
        } else if (isset($_POST['delete_button'])) {
            @mysqli_query($db, "DELETE FROM aDEUserMessage WHERE id = '$id' AND coupleId = '$coupleId'");
        } else {
            //no button pressed
        }
    }
    $msg = "Updated Successfully!";
    //header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=google-site-verification content="S0AMyShugVFDLpbdTcRKhq0xHAaxHNYvR6uIL4i39rQ">
    <meta name=theme-color content="#827fc7">
    <meta name=robots content="index, follow">
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
    <link rel="manifest" href="https://deinvitee.com/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://deinvitee.com/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Online Website Invitation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media="all" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin=anonymous>
    <link rel="stylesheet" href="https://deinvitee.com/fonts/icon-font/css/style.css" media="all">
    <link rel="stylesheet" href="https://deinvitee.com/fonts/typography-font/typo.css" media="all">
    <link rel="stylesheet" href="https://deinvitee.com/css/fontawesome-all.min.css" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" media="all">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <link rel="stylesheet" href="https://deinvitee.com/css/frontend.css" media="all">
    <link rel="canonical" href="https://deinvitee.com">
    <meta name=title content="Online Website Invitation">
    <meta name=description content="Buat Online Website Invitation semudah bermain sosmed. Dengan fitur terlengkap, termurah dan tema yang menarik. Buat undangan pernikahan digital gratis sekarang juga!">
    <meta name=keywords content="website undangan, undangan pernikahan, undangan pernikahan gratis, undangan pernikahan online, platform undangan online, gratis undangan online islami, undangan pernikahan islami, undangan pernikahan simpel">
    <meta name=thumbnail content="./image/undangan-pernikahan-online-1x1.jpg">
    <meta name=twitter:card content="summary">
    <meta name=twitter:site content="@a">
    <meta name=twitter:creator content="@a">
    <meta name=twitter:image content="./images/thumb.jpg">
    <meta name=twitter:description content="Buat Online Website Invitation semudah bermain sosmed. Dengan fitur terlengkap, termurah dan tema yang menarik. Buat undangan pernikahan digital gratis sekarang juga!">
    <meta property="fb:app_id" content="942419909533421">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://deinvitee.com">
    <meta property="og:title" content="Online Website Invitation">
    <meta property="og:description" content="Buat Online Website Invitation semudah bermain sosmed. Dengan fitur terlengkap, termurah dan tema yang menarik. Buat undangan pernikahan digital gratis sekarang juga!">
    <meta property="og:image" content="./images/thumb.jpg">
    <meta property="og:image:width" content="657">
    <meta property="og:image:height" content="500">
    <meta property="og:image:alt" content="Online Website Invitation">
    <script type='application/ld+json'>
        {
            "@context": "http://schema.org",
            "@graph": [{
                "@type": "WebSite",
                "name": "deinvitee.com",
                "alternateName": "Online Website Invitation",
                "url": "https://deinvitee.com",
                "image": [
                    "./image/undangan-pernikahan-online-1x1.jpg",
                    "./image/undangan-pernikahan-online-4x3.jpg",
                    "./image/undangan-pernikahan-online-16x9.jpg"
                ],
                "keywords": ["website undangan pernikahan", "undangan pernikahan", "undangan pernikahan gratis", "undangan pernikahan online", "undangan online pernikahan", "platform undangan online", "gratis undangan online islami", "undangan pernikahan islami", "undangan pernikahan simpel"]
            }, {
                "@type": "Organization",
                "url": "https://deinvitee.com",
                "logo": "./image/logo-color.png",
                "sameAs": [
                    "https://www.facebook.com/",
                    "https://www.instagram.com/",
                    "https://twitter.com/"
                ]
            }, {
                "@type": "ImageObject",
                "@id": "http://deinvitee.com/#primaryimage",
                "inLanguage": "id",
                "url": "./image/landing1-hero-phone.webp",
                "width": 500,
                "height": 650,
                "caption": "Buat undangan online pernikahan dengan mudah dan murah"
            }]
        }
    </script>

    <script async src=https://www.googletagmanager.com/gtag/js?id=UA-157767722-1></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js></script>
    <script src=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js defer integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin=anonymous></script>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js defer></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js defer></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js defer></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js defer></script>


    <script src=https://deinvitee.com/js/frontend.js?v=1.0.2></script>
    <script src=https://deinvitee.com/js/register.js></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-157767722-1');
    </script>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5V7MRKH');
    </script>

    <style>
        .combo-padding {
            top: 0;
            left: 0;
            width: 100%;
            padding-top: 80px;
            padding-left: 30px
        }

        .message-page {
            top: 0;
            left: 0;
            align-items: center;
            width: 100%;
            padding-top: 15px;
            padding-left: 15px;
            padding-right: 15px
        }

        .filter-title {
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px
        }

        @media (min-width:768px) {
            .combo-padding {
                top: 0;
                left: 0;
                width: 100%;
                padding-top: 80px;
                padding-left: 40px
            }

            .message-page {
                top: 0;
                left: 0;
                align-items: center;
                width: 100%;
                padding-top: 15px;
                padding-left: 25px;
                padding-right: 25px
            }
        }

        @media (min-width:992px) {
            .combo-padding {
                top: 0;
                left: 0;
                width: 100%;
                padding-top: 80px;
                padding-left: 55px
            }

            .message-page {
                top: 0;
                left: 0;
                align-items: center;
                width: 100%;
                padding-top: 15px;
                padding-left: 45px;
                padding-right: 45px
            }
        }
    </style>
</head>

<body oncontextmenu="return false">
    <div class="site-wrapper overflow-hidden">
        <header class="site-header bg--conflower-blue sticky-header">
            <div class="container-fluid pr-lg--30 pl-lg--30">
                <nav class="navbar site-navbar offcanvas-active navbar-expand-lg navbar-light">

                    <div class="brand-logo">
                        <a href="https://deinvitee.com"><img src="https://deinvitee.com/image/logo-color.png" alt="Logo deinvitee"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="mobile-menu">
                        <div class="navbar-nav ml-lg-auto mr--10">
                            <ul class="navbar-nav main-menu">
                                <li class="nav-item">
                                    <a class="nav-link goto" href="https://deinvitee.com">Home</a>
                                </li>
                                <?php if (!isset($_SESSION['username'])) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://deinvitee.com/login">Login</a>
                                    </li>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['username'])) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login/logout.php">Logout</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <button class="navbar-toggler btn-close-off-canvas" type=button data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="icon icon-simple-remove icon-close"></i>
                        <i class="icon icon-menu-34 icon-burger"></i>
                        <span style="font-size: 10px;margin-top: 2px;display: block;">menu</span>
                    </button>

                </nav>
            </div>
        </header>
        <div class="row combo-padding">
            <div class="filter-title">
                <td>Filter Message: </td>
            </div>
            <div>
                <select id="statusDropdown">
                    <option value="0">All</option>
                    <option value="1">Accepted</option>
                    <option value="2">Pending</option>
                </select>
            </div>
        </div>

        <div class="message-page">
            <form id="thisForm" action="index.php" method="post">
                <?php if (isset($_GET['msg'])) { ?>
                    <p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
                <?php } ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><input id="chk_all" name="chk_all" type="checkbox" /></th>
                            <th>Sender</th>
                            <th>Reservation</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="showMessage">
                        <div></div>
                        <script type="text/javascript">
                            $('.showMessage').load(<?php echo "'https://deinvitee.com/php/show_message.php?statusFilter=0&coupleId=$coupleId'"; ?>);
                        </script>
                    </tbody>
                </table>
                <input id="update_button" name="update_button" type="submit" class="btn btn-danger" value="Accept Selected Message(s)" />
                <input id="delete_button" name="delete_button" type="submit" class="btn btn-danger" value="Delete Selected Message(s)" />
            </form>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#chk_all').click(function() {
                if (this.checked)
                    $(".chkbox").prop("checked", true);
                else
                    $(".chkbox").prop("checked", false);
            });
        });

        $(document).ready(function() {
            $('#thisForm').submit(function(e) {
                var button = e.originalEvent.submitter;
                if (button.id == "delete_button") {
                    if (!confirm("Confirm Delete?")) {
                        e.preventDefault();
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#statusDropdown').change(function() {
                //Selected value
                var inputValue = $(this).val();
                if (inputValue == 0) {
                    $('.showMessage').load(<?php echo "'https://deinvitee.com/php/show_message.php?statusFilter=0&coupleId=$coupleId'"; ?>);

                } else if (inputValue == 1) {
                    $('.showMessage').load(<?php echo "'https://deinvitee.com/php/show_message.php?statusFilter=1&coupleId=$coupleId'"; ?>);

                } else if (inputValue == 2) {
                    $('.showMessage').load(<?php echo "'https://deinvitee.com/php/show_message.php?statusFilter=2&coupleId=$coupleId'"; ?>);

                }
            });
        });
    </script>

</body>

</html>