<?php
require_once('./captcha.php');
require_once('../config/db_connection.php');

$fullname = $email = $phone = $password = $confirm_password = "";

if (isset($_POST['submit'])) {
  $fullname = validate($_POST['fullname']);
  $email = validate($_POST['email']);
  $phone = validate($_POST['phone']);
  $password = validate($_POST['password']);
  $confirm_password = validate($_POST['confirm_password']);

  if ($password !== $confirm_password) {
    echo '<script>alert("Password and Confirm Password are not same")</script>';
  } else if (!VerifyCaptcha($_POST['g-recaptcha-response'], $SECRET_KEY)) {
    echo '<script>alert("Error in Google reCAPTACHA")</script>';
  } else {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo '<script>alert("Email Already Exists!")</script>';
    } else {
      $sql = "INSERT INTO users (fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$password')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo '<script>alert("Account Created Successfully!")</script>';
        header('Location: ./login.php');
      } else {
        echo '<script>alert("Error in Creating Account!")</script>';
      }
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
  <title>Register | AIDA</title>
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

  <form class="container-fluid" method="POST" action="register.php">
    <div class="row">
      <div class="col-4 text-center">
        <h3 class="fw-bold text-center mt-5 mb-4">Project Lilly</h3>
        <div class="d-flex justify-content-center pt-4">
          <div class="g-recaptcha" data-sitekey="<?php echo $SITE_KEY ?>"></div>
        </div>
        <img src="../images/logo.png" alt="logo" class="img-fluid mb-5" style="width:80%; padding-top: calc(100vh/4);" />
      </div>
      <div class="col-8 auth-right-side d-flex flex-column justify-content-between">
        <h4 class="text-left">Create Account</h4>
        <div class="row my-3">
          <div class="col">
            <button type="button" class="btn btn-outline-danger w-100 rounded-5" onclick="alert('Will be available soon')">
              <i class="fab fa-google me-2"></i>
              Sign Up With Google
            </button>
          </div>
          <div class="col">
            <!-- sign up with facebook -->
            <button type="button" class="btn btn-outline-primary w-100 rounded-5" onclick="alert('Will be available soon')">
              <i class="fab fa-facebook-f me-2"></i>
              Sign Up With Facebook
            </button>
          </div>
        </div>
        <p class="text-center fw-bold text-secondary">
          <i class="fas fa-minus me-2"></i>
          OR
          <i class="fas fa-minus ms-2"></i>
        </p>
        <div>
          <!-- fullname -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fas fa-user"></i>
            </span>
            <input type="text" class="form-control" placeholder="Enter Your Full Name" required name="fullname" minlength="3" maxlength="50" value="<?php echo $fullname ?>">
          </div>
          <!-- email -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fas fa-envelope"></i>
            </span>
            <input type="email" class="form-control" placeholder="Enter Your Email Address" required name="email" minlength="3" maxlength="50" value="<?php echo $email ?>">
          </div>
          <!-- phone number -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fas fa-mobile-alt"></i>
            </span>
            <input type="tel" class="form-control" placeholder="Enter Your Phone Number" required name="phone" minlength="10" maxlength="15" value="<?php echo $phone ?>">
          </div>
          <!-- password -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" class="form-control" placeholder="Enter Your Password" required name="password" minlength="5" maxlength="20" value="<?php echo $password ?>">
            <span class="input-group-text" id="password-toggle">
              <i class="fas fa-eye-slash"></i>
            </span>
          </div>
          <!-- confirm password -->
          <div class="input-group mb-3">
            <span class="input-group-text">
              <i class="fas fa-lock"></i>
            </span>
            <input type="password" class="form-control" placeholder="Confirm Your Password" required name="confirm_password" minlength="5" maxlength="20" value="<?php echo $confirm_password ?>">
            <span class="input-group-text" id="cpassword-toggle">
              <i class="fas fa-eye-slash"></i>
            </span>
          </div>
        </div>
        <div class="">
          <button type="submit" class="btn btn-danger w-100 rounded-5" name="submit">
            Create Account
          </button>
          <p class="m-0 p-0 pt-2">
            Already have an account?
            <a href="./login.php" class="text-danger" style="text-decoration: none;">Log In</a>
          </p>
        </div>
      </div>
    </div>
  </form>

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

    const cpasswordToggle = document.querySelector('#cpassword-toggle');
    const cpassword = document.querySelector('.input-group input[name="confirm_password"]');
    cpasswordToggle.addEventListener('click', function() {
      if (cpassword.type === 'password') {
        cpassword.type = 'text';
        cpasswordToggle.innerHTML = '<i class="fas fa-eye"></i>';
      } else {
        cpassword.type = 'password';
        cpasswordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
      }
    });
  </script>
</body>

</html>