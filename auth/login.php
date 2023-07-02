<?php
require_once('./captcha.php');
require_once('../config/db_connection.php');

session_start();
$email = $password = "";

if (isset($_POST['submit'])) {
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);

  if (!VerifyCaptcha($_POST['g-recaptcha-response'], $SECRET_KEY)) {
    echo '<script>alert("Error in Google reCAPTACHA")</script>';
  } else {
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_fullname'] = $row['fullname'];
      $_SESSION['user_phone'] = $row['phone'];
      $_SESSION['user_role'] = $row['role'];

      if ($row['role'] == 0) {
        header('Location: ../admin_dashboard/index.php');
      } else if ($row['role'] == 1) {
        header('Location: ../user_dashboard/index.php');
      } else {
        echo '<script>alert("Invalid Role!")</script>';
      }
    } else {
      echo '<script>alert("Invalid Email or Password!")</script>';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | AIDA</title>
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
      <div class="col-4 text-center my-5">
        <h3 class="fw-bold">Project Lilly</h3>
        <img src="../images/logo.png" alt="logo" class="img-fluid mb-5" style="width:80%; padding-top: calc(100vh/3.25);" />
      </div>
      <div class="col-8 auth-right-side">
        <form style="height: calc(100vh - 5rem);" class="d-flex flex-column justify-content-between" action="login.php" method="POST">
          <h4 class=" text-center">Login</h4>
          <div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-envelope"></i>
              </span>
              <input type="email" class="form-control" placeholder="Enter Your Email Address" required required name="email" minlength="3" maxlength="50" value="<?php echo $email ?>" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fas fa-lock"></i>
              </span>
              <input type="password" class="form-control" placeholder="Enter Your Password" required name="password" minlength="5" maxlength="20" value="<?php echo $password ?>" />
              <span class="input-group-text" id="password-toggle">
                <i class="fas fa-eye-slash"></i>
              </span>
            </div>
            <div class="g-recaptcha" data-sitekey="<?php echo $SITE_KEY ?>"></div>
          </div>

          <div class="">
            <button type="submit" class="btn btn-danger w-100 rounded-5" name="submit">
              Log In
            </button>
            <p class="m-0 p-0 pt-2">
              Don't have an account?
              <a href="./register.php" class="text-danger" style="text-decoration: none;">Register</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script>
    const passwordToggle = document.querySelector('#password-toggle');
    const password = document.querySelector('.input-group input[type="password"]');
    passwordToggle.addEventListener('click', function() {
      if (password.type === 'password') {
        password.type = 'text';
        passwordToggle.innerHTML = '<i class="fas fa-eye"></i>';
      } else {
        password.type = 'password';
        passwordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
      }
    });
  </script>
</body>

</html>