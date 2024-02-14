<div class="card card-hover-shadow card-lg mb-5">
  <div class="card-body">
    <!-- Form -->
    <form action="logindata.php" method="POST">
      <input type="hidden" id="appName" name="appName" required value="notchoose" />

      <div class="mb-4">
        <label class="form-label" for="username">Your UserId</label>
        <input class="form-control" type="text" class="login-input" name="username" placeholder="User Id" autofocus="true" />
        <span class="invalid-feedback">Please enter a valid userid</span>
      </div>

      <div class="mb-4">
        <label class="form-label" for="password" name="password">Password</label><br>
        <input class="form-control" type="password" id="myInput" class="login-input" name="password" placeholder="Password" />
        <!-- <a class="form-label-link" href="./page-reset-password.html">Forgot Password?</a> -->
      </div>
      <div class="mb-4">
        <input type="checkbox" onclick="myFunction()">Show Password
      </div>
      <hr>
      <div class="mb-4">
        <center>
          <button type="button" class="btn btn-soft-dark btn-icon rounded-circle m-2 rediect gradeSheet" data-bs-toggle="tooltip" data-bs-placement="right" title="Gradesheet">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/GS logo.svg" style="height:20px; width: 20px; margin: 3px;">
          </button>

          <button type="button" class="btn btn-soft-dark btn-icon rounded-circle m-2 rediect library" data-bs-toggle="tooltip" data-bs-placement="right" title="Library">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/L logo.svg" style="height:20px; width: 20px; margin: 3px;">
          </button>

          <button type="button" class="btn btn-soft-dark btn-icon rounded-circle m-2 rediect bri" data-bs-toggle="tooltip" data-bs-placement="right" title="BRI">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/BRI logo.svg" style="height:20px; width: 20px; margin: 3px;">
          </button>

          <button type="button" class="btn btn-soft-dark btn-icon rounded-circle m-2 rediect scheduling" data-bs-toggle="tooltip" data-bs-placement="right" title="Scedulling">
            <img src="<?php echo BASE_URL; ?>assets/svg/new/S logo.svg" style="height:20px; width: 20px; margin: 3px;">
          </button>

          <button type="button" class="btn btn-soft-dark btn-icon rounded-circle m-2 rediect hotwash" data-bs-toggle="tooltip" data-bs-placement="right" title="Hotwash">
            <img src="<?php echo BASE_URL; ?>assets/svg/2D icons PNG/new/MicrosoftTeams-image (21).png" style="height:20px; width: 20px; margin: 3px;">
          </button>
        </center>
      </div>
      <div class="d-grid mb-4">
        <input class="btn btn-success" type="submit" value="Login" name="login" class="login-button" />
      </div>


    </form>
    <!-- End Form -->
  </div>
</div>