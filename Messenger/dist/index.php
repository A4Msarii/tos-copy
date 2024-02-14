<?php
session_start();
include '../../includes/config.php';
include ROOT_PATH . 'includes/connect.php';
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
        <meta name="color-scheme" content="light dark">

        <title>Chat</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo BASE_URL;?>Messenger/dist/assets/img/favicon/favicon2.png" type="image/x-icon">

        <!-- Font -->
        <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700" rel="stylesheet"> -->

        <!-- Template CSS -->
        
        <link class="css-lt" rel="stylesheet" href="<?php echo BASE_URL;?>Messenger/dist/assets/css/template.bundle.css" media="(prefers-color-scheme: light)">
        <link class="css-dk" rel="stylesheet" href="<?php echo BASE_URL;?>Messenger/dist/assets/css/template.dark.bundle.css" media="(prefers-color-scheme: dark)">

        <!-- Theme mode -->
        <script>
            if (localStorage.getItem('color-scheme')) {
                let scheme = localStorage.getItem('color-scheme');

                const LTCSS = document.querySelectorAll('link[class=css-lt]');
                const DKCSS = document.querySelectorAll('link[class=css-dk]');

                [...LTCSS].forEach((link) => {
                    link.media = (scheme === 'light') ? 'all' : 'not all';
                });

                [...DKCSS].forEach((link) => {
                    link.media = (scheme === 'dark') ? 'all' : 'not all';
                });
            }
        </script>

    </head>
    <style>
        .offcanvas-status {
            width: 70% !important;
        }
    </style>

    <?php
    include ROOT_PATH . 'includes/message.php';
    displayMSG();
    ?>
    <?php
    include ROOT_PATH . 'includes/alert_for_users.php';
    ?>

    <body>
<?php
                include ROOT_PATH . 'Messenger/dist/loader.php';
                ?>
        <!-- Layout -->
<div class="container-fluid" id="header-hide">
  <?php
                include ROOT_PATH . 'Messenger/dist/header.php';
                ?>     
</div>
        <div class="layout overflow-hidden" id="contentmain">

            <!-- Sidebar -->
            <aside class="sidebar bg-light">
                <?php
                include ROOT_PATH . 'Messenger/dist/asidebar.php';
                ?>
            </aside>
            <!-- Sidebar -->

            <!-- Chat -->
            <main class="main is-visible">
                <div class="container-fluid h-100">

                    <div class="d-flex flex-column h-100 justify-content-center text-center">
                        <div class="mb-6">
                            <span class="icon icon-xl text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            </span>
                        </div>

                        <p class="text-muted">Pick a person from left menu, <br> and start your conversation.</p>
                    </div>

                </div>
            </main>
            <!-- Chat -->

        </div>

        <?php include ROOT_PATH . 'Messenger/dist/offcanvasstatus.php' ?>
        <!-- Layout -->

        <!-- Scripts -->
        <script src="<?php echo BASE_URL;?>Messenger/dist/assets/js/vendor.js"></script>
        <script src="<?php echo BASE_URL;?>Messenger/dist/assets/js/template.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    </body>
</html>