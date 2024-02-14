<form action="<?php echo BASE_URL ?>logindata.php" method="POST">
    <div class="d-flex justify-content-center mb-5">
        <img src="<?php echo BASE_URL; ?>assets/tos.png" class="d-block" style="height:80px;"><br>
    </div>
    <input type="hidden" id="appName" name="appName" value="library" />
    <div class="mb-3">
        <div class="input-group" id="password-container">
            <button class="btn btn-outline-secondary text-black" type="button" id="iconpassword">
                <i class="bi bi-person-circle"></i>
            </button>
            <input class="form-control" type="text" name="username" placeholder="User Id new" autofocus="true" />
        </div>
    </div>
    <div class="mb-3">
        <div class="input-group" id="password-container">
            <button class="btn btn-outline-secondary text-black" type="button" id="iconpassword">
                <i class="bi bi-file-lock2"></i>
            </button>
            <input type="password" id="password" name="password" class="form-control input" placeholder="Password">
            <button class="btn btn-outline-secondary text-black" type="button" id="toggle-password" onclick="togglePasswordVisibility()">
                <i class="bi bi-eye-slash"></i>
            </button>
        </div>
    </div>
    <div class="mb-4">
        <button type="button" class="btnicon m-2 rediect gradeSheet bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:20px; width: 20px; margin: 2px;">
        </button>

        <button type="button" class="btnicon m-2 rediect library bg-light onclickbtnicon" data-bs-toggle="tooltip" data-bs-placement="right" title="Library">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:20px; width: 20px; margin: 2px;">
        </button>

        <button type="button" class="btnicon m-2 rediect bri bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:20px; width: 20px; margin: 2px;">
        </button>

        <button type="button" class="btnicon m-2 rediect scheduling bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Scedulling">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:20px; width: 20px; margin: 2px;">
        </button>

        <button type="button" class="btnicon m-2 rediect hotwash bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/hotwash.png" style="height:20px; width: 20px; margin: 2px;">
        </button>

        <button type="button" class="btnicon m-2 rediect globalsearch bg-light" data-bs-toggle="tooltip" data-bs-placement="right" title="global search">
            <img src="<?php echo BASE_URL; ?>assets/approved/search.png" style="height:20px; width: 20px; margin: 2px;">
        </button>
    </div>
    <div class="mb-4 d-flex justify-content-center">
        <button type="submit" class="col-8 btn btn-outline-warning button text-black">Login</button>
    </div>
</form>