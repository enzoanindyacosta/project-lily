<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
  <style>
    #lang-btn {
      background: #e5e5d4 !important;
    }
  </style>
</head>

<body class="auth-main-bg">
  <?php require_once("../components/language.php"); ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-4 text-center mt-5">
        <h3 class="fw-bold">Project Lilly</h3>
        <img src="../images/logo.png" alt="logo" class="img-fluid mb-5" style="width:80%; padding-top: calc(100vh/3.25);" />
      </div>
      <div class="col-8 auth-right-side">
        <form style="height: calc(100vh - 5rem);" class="d-flex flex-column justify-content-between">
          <h4 class="text-left">Please Verify Phone Number</h4>
          <div class="text-center">
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-mobile-alt"></i>
              </span>
              <input type="tel" class="form-control" placeholder="Enter Your Phone Number" required>
            </div>
            <button type="button" class="btn btn-danger px-4 rounded-5">
              Send OTP
            </button>
          </div>

          <!-- 6 Digit OTP Input -->
          <div>
            <div class="row">
              <div class="col-2">
                <input type="text" class="form-control rounded-5 text-center border border-2 border-danger bg-transparent" placeholder="0" maxlength="1" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control rounded-5 text-center border border-2 border-danger bg-transparent" placeholder="0" maxlength="1" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control rounded-5 text-center border border-2 border-danger bg-transparent" placeholder="0" maxlength="1" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control rounded-5 text-center border border-2 border-danger bg-transparent" placeholder="0" maxlength="1" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control rounded-5 text-center border border-2 border-danger bg-transparent" placeholder="0" maxlength="1" required>
              </div>
              <div class="col-2">
                <input type="text" class="form-control rounded-5 text-center border border-2 border-danger bg-transparent" placeholder="0" maxlength="1" required>
              </div>
            </div>
          </div>

          <div class="">
            <button type="submit" class="btn btn-danger w-100 rounded-5">
              Verify
            </button>
            <p class="m-0 p-0 pt-2">
              Did not receive OTP?
              <a href="./register.php" class="text-danger" style="text-decoration: none;">Resend OTP</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>