<?php
require_once("./guard.php");
require_once("../config/db_connection.php");

if (isset($_POST['submit'])) {
  $fullname = validate($_POST['fullname']);
  $email = validate($_POST['email']);
  $phone = validate($_POST['phone']);
  $password = validate($_POST['password']);
  $id = validate($_GET['id']);

  $sql = "INSERT INTO users (fullname, email, phone, password, role) VALUES ('$fullname', '$email', '$phone', '$password', 1)";
  $result = $conn->query($sql);

  if ($result) {
    header("Location: user_management.php?success=User Added Successfully!");
    exit();
  } else {
    header("Location: add_user.php?error=?error=Something Went Wrong!");
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add User | Project Lilly | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg shadow-sm p-3 mb-3 bg-body rounded">
    <div class="container p-0">
      <a class="navbar-brand p-0 m-0 d-flex align-items-center" href="index.php">
        <img src="../images/logo.png" height="60">
        <p class="d-inline p-0 m-0 fw-bold text-primary ps-3" style="font-size: 1.75rem;">Project Lilly</p>
      </a>
      <span class="float-right d-flex align-items-center">
        <span class="navbar-text fw-bold fs-5 me-3">Hello, <?php echo $_SESSION['user_fullname']; ?></span>
        <a class="btn btn-primary text-uppercase px-4" href="./logout.php">Logout</a>
      </span>
    </div>
  </nav>

  <?php require_once("../components/language.php"); ?>

  <div class="container p-3 my-3 shadow-sm bg-body rounded-2 border border-1 border-bg">
    <div class="d-flex">
      <a class="btn btn-primary fw-bold text-uppercase px-4 w-100" href="index.php">Dashboard</a>
      <span class="px-2"></span>
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="user_management.php">User Management</a>
      <span class="px-2"></span>
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="story_management.php">Story Management</a>
      <span class="px-2"></span>
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="story_category.php">Story Category</a>
    </div>
  </div>

  <div class="container my-3">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <div class="card">
          <div class="card-header text-uppercase text-center bg-primary text-white">
            <span class="p-0 m-0 fs-5 fw-bold">Add New User</span>
          </div>
          <div class="card-body p-4">
            <?php
            if (isset($_GET['error'])) {
              echo '<p class="text-danger mb-3"><b>ERROR: </b>' . $_GET['error'] . '</p>';
            }
            ?>
            <form method="POST" action="">
              <div class="mb-3">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter Fullname" name="fullname" required minlength="3" maxlength="50" />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" required minlength="3" maxlength="50" />
              </div>
              <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phone" required minlength="10" maxlength="15" />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password" required minlength="5" maxlength="20" />
              </div>
              <span class="d-flex justify-content-between">
                <a href="user_management.php" class="btn btn-secondary btn-sm w-100">Go Back</a>
                <span class="px-2"></span>
                <button type="reset" class="btn btn-danger btn-sm w-100">Clear</button>
                <span class="px-2"></span>
                <button type="submit" class="btn btn-primary btn-sm w-100" name="submit">Save</button>
              </span>
            </form>
          </div>
        </div>
      </div>
      <div class="col"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>