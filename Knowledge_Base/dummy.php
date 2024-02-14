<?php
include '../config.php';
include ROOT_PATH . 'includes/connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dummy</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>includes/Pages/tos.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <style>
        .color1{
            background:#FA9C23;
            color:white;
        }
        .color2{
            background:#CBE8FF;
            color:black !important;
        }
        .rotate {
            height: 100vh;
            width: 100%;
            background: #eef3f8;
            position: absolute;
            top: 0px;
            right: 0px;
            z-index: 2;
            overflow: hidden;
        }
        
        .nt {
            position: relative;
            z-index: 10;
        }
        
        .clip {
            transform: rotate(120deg);
            background-color: rgba( 82.1179711818695, 165.9391325712204, 243.31249594688416, 1);
            width: 1063.3531494140625px;
            height: 1237.4171142578125px;
            position: absolute;
            right: -450px;
            top: -650px;
            border-top-left-radius: 20px;
            border-top-right-radius: 50px;
            border-bottom-left-radius: 89px;
            border-bottom-right-radius: 100px;
        }
        
        .cd {
            border-radius: 2.5rem;
            background: #FFF;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            height: Auto;
        }
        .rounde{
            border-radius: 20px;
            width:100px
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
            <button type="button" class="btn btn-sm text-white">Login</button>
            <button type="button" class="btn text-white btn-sm rounde color1">
              Enquiry
            </button>
          </span>
            </div>
        </nav>
        <div>
            <div class="rotate">
                <div class="clip"></div>
            </div>
            <div class="container" style="position: relative;z-index: 1000;">
                <div class="row">
                    <div class="col-md-6 pt-5 mt-5">
                        <h1 class="mt-5">How Can We Help?</h1>
                        <div class="input-group">
                            <input type="text" class="form-control mt-3 rounde p-2" aria-label="" placeholder="Somthing search here....">
                        </div>
                        <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil eos blanditiis ab laboriosam ducimus. Quas consequuntur similique qui aliquid, consequatur nulla, minima, molestiae maiores ducimus provident natus sit et aliquam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ea deleniti minus esse? Incidunt ea corporis asperiores dignissimos, ullam repudiandae?</p>
                    </div>
                    <div class="col-md-6" style="overflow: hidden;">
                        <img src="<?php echo BASE_URL; ?>assets/dummy.png" class="img-fluid" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="position: relative; z-index: 10000;">
        <div class="container overflow-hidden text-center">
            <div class="row p-3">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3 ">
                    <div class="p-3 cd">
                        <img src="<?php echo BASE_URL; ?>assets/croods_chart.png" class="card-img-top" alt="...">
                        <h5 class="card-title text-center mt-4">Get Started</h5>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, est illo. Similique voluptatibus laboriosam pariatur voluptatem, inventore soluta quasi nemo.</p>
                        <button class="btn color2" style="border-radius: 20px; color:white;"><h6>All Articals</h6></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                    <div class="p-3  cd">
                        <img src="<?php echo BASE_URL; ?>assets/croods_chart.png" class="card-img-top" alt="...">
                        <h5 class="card-title text-center mt-4">Get Started</h5>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, est illo. Similique voluptatibus laboriosam pariatur voluptatem, inventore soluta quasi nemo.</p>
                        <button class="btn color2" style="border-radius: 20px; color:white;"><h6>All Articals</h6></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                    <div class="p-3  cd">
                        <img src="<?php echo BASE_URL; ?>assets/croods_chart.png" class="card-img-top" alt="...">
                        <h5 class="card-title text-center mt-4">Get Started</h5>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, est illo. Similique voluptatibus laboriosam pariatur voluptatem, inventore soluta quasi nemo.</p>
                        <button class="btn color2" style="border-radius: 20px; color:white;"><h6>All Articals</h6></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container overflow-hidden text-center">
            <div class="row p-3">
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3 ">
                    <div class="p-3 cd">
                        <img src="<?php echo BASE_URL; ?>assets/croods_chart.png" class="card-img-top" alt="...">
                        <h5 class="card-title text-center mt-4">Get Started</h5>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, est illo. Similique voluptatibus laboriosam pariatur voluptatem, inventore soluta quasi nemo.</p>
                        <button class="btn color2" style="border-radius: 20px; color:white;"><h6>All Articals</h6></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                    <div class="p-3  cd">
                        <img src="<?php echo BASE_URL; ?>assets/croods_chart.png" class="card-img-top" alt="...">
                        <h5 class="card-title text-center mt-4">Get Started</h5>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, est illo. Similique voluptatibus laboriosam pariatur voluptatem, inventore soluta quasi nemo.</p>
                        <button class="btn color2" style="border-radius: 20px; color:white;"><h6>All Articals</h6></button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                    <div class="p-3  cd">
                        <img src="<?php echo BASE_URL; ?>assets/croods_chart.png" class="card-img-top" alt="...">
                        <h5 class="card-title text-center mt-4">Get Started</h5>
                        <p class="mt-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit, est illo. Similique voluptatibus laboriosam pariatur voluptatem, inventore soluta quasi nemo.</p>
                        <button class="btn color2" style="border-radius: 20px; color:white;"><h6>All Articals</h6></button>
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