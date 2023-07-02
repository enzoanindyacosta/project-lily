<?php
require_once("./guard.php");
require_once("../config/db_connection.php");

$title =  "";

if (isset($_POST['submit'])) {
  $title = validate($_POST['title']);
  $id = validate($_GET['id']);

  $sql = "UPDATE story_category SET title = '$title' WHERE id = '$id'";
  $result = $conn->query($sql);

  if ($result) {
    header("Location: story_category.php?success=Category Updated Successfully!");
    exit();
  } else {
    header("Location: edit_category.php?error=Something Went Wrong!");
    exit();
  }
}

if (!isset($_GET['id'])) {
  header("Location: story_category.php");
  exit();
} else if (isset($_GET['id'])) {
  $id = validate($_GET['id']);

  $sql = "SELECT * FROM story_category WHERE id = '$id'";
  $result = $conn->query($sql);

  if (mysqli_num_rows($result) == 0) {
    header("Location: story_category.php?error=Category Not Found!");
    exit();
  }

  $row = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Category | Project Lilly | AIDA</title>
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
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="index.php">Dashboard</a>
      <span class="px-2"></span>
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="user_management.php">User Management</a>
      <span class="px-2"></span>
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="story_management.php">Story Management</a>
      <span class="px-2"></span>
      <a class="btn btn-primary fw-bold text-uppercase px-4 w-100" href="story_category.php">Story Category</a>
    </div>
  </div>

  <div class="container my-3">
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <div class="card">
          <div class="card-header text-uppercase text-center bg-primary text-white">
            <span class="p-0 m-0 fs-5 fw-bold">Edit Category</span>
          </div>
          <div class="card-body p-4">
            <?php
            if (isset($_GET['error'])) {
              echo '<p class="text-danger mb-3"><b>ERROR: </b>' . $_GET['error'] . '</p>';
            }
            ?>
            <form method="POST" action="">
              <div class="mb-3">
                <label for="title" class="form-label">Category Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Category Title" name="title" required value="<?php echo $row['title']; ?>" minlength="3" maxlength="75">
              </div>
              <span class="d-flex justify-content-between">
                <a href="story_category.php" class="btn btn-secondary btn-sm w-100">Go Back</a>
                <span class="px-2"></span>
                <button type="reset" class="btn btn-danger btn-sm w-100">Reset</button>
                <span class="px-2"></span>
                <button type="submit" class="btn btn-primary btn-sm w-100" name="submit">Update</button>
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