<?php
include('../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dummy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <style>
        .color1 {
            background: #FA9C23;
            color: white;
        }

        .color2 {
            background: #CBE8FF;
            color: black !important;
        }


        .nt {
            position: relative;
            z-index: 10;
        }

        .rounde {
            border-radius: 20px;
            width: 100px
        }

        .circle1 {
            width: 128px;
            height: 128px;
            flex-shrink: 0;
            background: rgba(82, 166, 243, 0.24);
            position: absolute;
            z-index: 1000;
            border-radius: 100px;
        }

        .circle {
            width: 60px;
            height: 60px;
            flex-shrink: 0;
            background: rgba(250, 156, 35, 0.22);
            position: absolute;
            z-index: 1000;
            right: 0px;
            bottom: 0px;
            border-radius: 100px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar nt">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo BASE_URL; ?>assets/tos.png" alt="Logo" width="60" height="30" class="d-inline-block align-text-top" /> TOS
                </a>
                <span class="navbar-text">
                    <button type="button" class="btn btn-sm text-black">Login</button>
                    <button type="button" class="btn text-black btn-sm rounde color1">
                        Enquiry
                    </button>
                </span>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 pt-5 position-relative">
                <div class="circle"></div>
                <div class="circle1"></div>
                <h1 class="text-center">What can we help you with?</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error nesciunt at alias facere dolore, possimus repudiandae similique odit atque temporibus qui saepe eaque? Culpa, doloribus corporis voluptatibus suscipit hic omnis.</p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row justify-content-between" style="background-image: url('https://images.pexels.com/photos/10643474/pexels-photo-10643474.jpeg?auto=compress&cs=tinysrgb&w=600');background-size:cover;background-repeat:no-repeat;background-position:center;">
            <div class="col-lg-4 col-md-4 align-self-end mt-5">
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">01</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">02</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">03</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">04</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">05</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">06</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">07</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 align-self-start mt-5">
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">08</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">09</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">10</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">11</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">12</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">13</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid border  mb-2 card">
                    <div class="row p-1">
                        <div class="col-2 d-flex justify-content-center">
                            <h3 class="pt-5">13</h3>
                        </div>
                        <div class="col-10">
                            <h6>Lorem ipsum dolor sit amet.</h6>
                            <ul>
                                <li>Guid File</li>
                                <li>FAQs</li>
                                <li>Tutorial & Gift</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>