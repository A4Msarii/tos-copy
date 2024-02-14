<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
include('../includes/message.php');
session_start();
if (isset($_SESSION['login_id'])) {
    $_SESSION['success'] = "Login Status : Active ";
    header("Location: includes/Pages/Home.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Title -->
    <title>Log In</title>

    <!-- Favicon -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, 
                 initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>tos.svg">

    <!-- Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"> -->

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

    <!-- CSS Front Template -->

    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <<!-- script src="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="<?php echo BASE_URL; ?>assets/organization/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous"> -->
    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"],
                "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.css", "assets/css/docs.css", "assets/vendor/icon-set/style.css", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js", "assets/js/demo.js"]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
    <style>
        .button {
            background-color: #D4AF37;
            border: 2px solid #D4AF37;
            font-size: large;
            font-weight: bold;

        }


        .input {
            border-radius: 20px;
            background: white;
            border: white;
        }

        .input:focus {
            outline: none;
        }

        #toggle-password {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            background: white;
            border: none;
            text-align: center;
            width: 50px;
        }

        .main {
            background: #ffffff54;
            margin-top: 100px;
            border-radius: 100px;
        }

        #iconpassword {
            border-top-left-radius: 20px;
            border-end-start-radius: 20px;
            background: white;
            border: white;
        }

        .btnicon {
            border-radius: 200px;
            height: 40px;
            width: 40px;
            border: none;
            box-shadow: rgba(0, 0, 0, 0.24) 11px 6px 10px 5px;
        }

        .swiper {
            width: 320px;
            height: 320px;
        }

        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            font-size: 22px;
            font-weight: bold;
            color: black;
            background: #ffffff61;
            height: 400px;
        }
        .swiper-slide-active
        {
            background: white;
        }
        .body {
            background-image: url('<?php echo BASE_URL; ?>assets/text.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .btnicon:hover
        {
          background-color: black;
          border: 2px solid white;  
        }

    </style>
</head>

<body class="body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center vh-100">


                <form>
                    <div class="d-flex justify-content-center mb-5">
                        <img src="<?php echo BASE_URL; ?>assets/tos.png" class="d-block" style="height:60px;"><br>
                    </div>
                    <input type="hidden" id="appName" name="appName" value="library" />
                    <div class="mb-3">
                        <div class="input-group" id="password-container">
                            <button class="btn btn-outline-secondary text-black" type="button" id="iconpassword">
                                <i class="bi bi-person-circle"></i>
                            </button>
                            <input class=" input" type="text" class="login-input" name="username" placeholder="User Id" autofocus="true" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group" id="password-container">
                            <button class="btn btn-outline-secondary text-black" type="button" id="iconpassword">
                                <i class="bi bi-file-lock2"></i>
                            </button>
                            <input type="password" id="password" class=" input" placeholder="Password">
                            <button class="btn btn-outline-secondary text-black" type="button" id="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="button" class="btnicon m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:20px; width: 20px; margin: 2px;">
                        </button>

                        <button type="button" class="btnicon m-2 rediect library" data-bs-toggle="tooltip" data-bs-placement="right" title="Library">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:20px; width: 20px; margin: 2px;">
                        </button>

                        <button type="button" class="btnicon m-2 rediect bri" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:20px; width: 20px; margin: 2px;">
                        </button>

                        <button type="button" class="btnicon m-2 rediect scheduling" data-bs-toggle="tooltip" data-bs-placement="right" title="Scedulling">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:20px; width: 20px; margin: 2px;">
                        </button>

                        <button type="button" class="btnicon m-2 rediect hotwash" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
                            <img src="<?php echo BASE_URL; ?>assets/svg/new/hotwash.png" style="height:20px; width: 20px; margin: 2px;">
                        </button>

                        <button type="button" class="btnicon m-2 rediect globalsearch" data-bs-toggle="tooltip" data-bs-placement="right" title="global search">
                            <img src="<?php echo BASE_URL; ?>assets/approved/search.png" style="height:20px; width: 20px; margin: 2px;">
                        </button>
                    </div>
                    <div class="mb-4 d-flex justify-content-center">
                        <button type="submit" class="col-8 btn btn-outline-warning button text-black">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <?php
                $indexpersontitle = "SELECT * FROM persontitle";
                $indexstatement = $connect->prepare($indexpersontitle);
                $indexstatement->execute();
                $indexdata = $indexstatement->fetchAll();
                ?>
                <!-- Swiper -->
                <div class="swiper mySwiper mt-5">
                    <div class="swiper-wrapper">
                        <?php foreach ($indexdata as $dt) {
                            $indexuserid = $dt['user_id'];
                            $indexuserquery = $connect->query("SELECT * FROM users WHERE id = '$indexuserid'");
                            while ($indexuserdata = $indexuserquery->fetch()) {
                        ?>
                                <?php
                                $prof_pic = $indexuserdata['file_name'];
                                if ($prof_pic != null) {
                                    $pic = BASE_URL . 'includes/Pages/upload/' . $prof_pic;
                                } else {
                                    $pic = BASE_URL . 'includes/Pages/avatar/avtar.png';
                                }
                                ?>
                                <div class="swiper-slide d-block text-center">
                                    <img style="width: 250px;height:250px" class="avatar" src="<?php echo $pic; ?>" alt="Logo">
                                    <div style="margin-top: 4rem;">
                                        <h3 class="mb-0 text-success"><?php echo $indexuserdata['nickname']; ?></h3>
                                        <h5 class="card-text text-body"><?php echo $dt['title'] ?></h5><br>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                $iindexuserevent = "SELECT * FROM user_event";
                $iindexuserevent_data = $connect->prepare($iindexuserevent);
                $iindexuserevent_data->execute();
                $iindexuedata = $iindexuserevent_data->fetchAll();
                ?>
                <div class="main swiffy-slider slider-item-show5 slider-nav-outside slider-nav-dark slider-nav-sm slider-nav-visible slider-nav-page slider-item-snapstart slider-nav-autoplay slider-nav-autopause slider-item-ratio slider-item-ratio-contain slider-item-ratio-40x20 slider-indicators-round slider-indicators-dark slider-indicators-outside py-4" data-slider-nav-autoplay-interval="2000">
                    <div class="slider-container">
                        <?php foreach ($iindexuedata  as $key => $dt) { ?>
                            <a class="media-viewer" href="<?php echo BASE_URL ?>includes/Pages/events/<?php echo $dt['fileName'] ?>" data-fslightbox="gallery">
                                <img class="img-fluid" src="<?php echo BASE_URL ?>includes/Pages/events/<?php echo $dt['fileName'] ?>" alt="Image Description">
                            </a>
                        <?php }; ?>
                    </div>
                    <ul class="slider-indicators" style="justify-content:right;margin-left: 3rem; margin-top: 5rem !important;">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="<?php echo BASE_URL ?>/assets/vendor/fslightbox/index.js"></script>
        <!-- Swiper JS -->
        <script src="<?php echo BASE_URL; ?>assets/js/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });

            function togglePasswordVisibility() {
                const passwordInput = document.getElementById('password');
                const toggleButton = document.getElementById('toggle-password');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.innerHTML = '<i class="bi bi-eye"></i>';
                } else {
                    passwordInput.type = 'password';
                    toggleButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
                }
            }
        </script>

</body>

</html>