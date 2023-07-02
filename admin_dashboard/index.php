<?php
require_once("./guard.php");
require_once("../config/db_connection.php");

// total users
$sql = "SELECT COUNT(*) AS total_users FROM users WHERE role = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];

// total stories
$sql = "SELECT COUNT(*) AS total_stories FROM story";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_stories = $row['total_stories'];

// total categories
$sql = "SELECT COUNT(*) AS total_categories FROM story_category";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_categories = $row['total_categories'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard | Project Lilly | AIDA</title>
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

  <div class="container">
    <div class="row">
      <div class="col p-0 m-0">
        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg">
          <div class="d-flex align-items-center justify-content-between p-3" style="color: #8a006c;">
            <div class="d-flex align-items-center">
              <i class="fas fa-users fa-2x"></i>
              <span class="fw-bold fs-5 text-uppercase ps-3">Total Users</span>
            </div>
            <span class="fw-bold fs-4"><?php echo $total_users; ?></span>
          </div>
        </div>
      </div>
      <div class="col p-0 m-0 px-3">
        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg" style="color: #09008a;">
          <div class="d-flex align-items-center justify-content-between p-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-book fa-2x"></i>
              <span class="fw-bold fs-5 text-uppercase ps-3">Total Stories</span>
            </div>
            <span class="fw-bold fs-4"><?php echo $total_stories; ?></span>
          </div>
        </div>
      </div>
      <div class="col p-0 m-0">
        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg" style="color: #048a8a;">
          <div class="d-flex align-items-center justify-content-between p-3">
            <div class="d-flex align-items-center">
              <i class="fas fa-list fa-2x"></i>
              <span class="fw-bold fs-5 text-uppercase ps-3">Total Categories</span>
            </div>
            <span class="fw-bold fs-4"><?php echo $total_categories; ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row my-3">
      <div class="col p-0 m-0">
        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg">
          <div class="card-header bg-success text-white fw-bold fs-5">Top 10 Users
            <span class="fw-normal fs-6 d-block">
              (with most stories)
            </span>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT users.fullname, COUNT(*) AS total_stories FROM story INNER JOIN users ON story.user_id = users.id GROUP BY user_id ORDER BY total_stories DESC LIMIT 10";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td class="text-break"><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['total_stories']; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg mt-3">
          <div class="card-header bg-danger text-white fw-bold fs-5">Top 5 Users
            <span class="fw-normal fs-6 d-block">
              (with least stories)
            </span>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT users.fullname, COUNT(*) AS total_stories FROM story INNER JOIN users ON story.user_id = users.id GROUP BY user_id ORDER BY total_stories ASC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td class="text-break"><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['total_stories']; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col p-0 m-0 px-3">
        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg">
          <div class="card-header bg-success text-white fw-bold fs-5">Top 5 Categories
            <span class="fw-normal fs-6 d-block">
              (with most stories)
            </span>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT story_category.title, COUNT(*) AS total_stories FROM story INNER JOIN story_category ON story.category_id = story_category.id GROUP BY category_id ORDER BY total_stories DESC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['total_stories']; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg mt-3">
          <div class="card-header bg-danger text-white fw-bold fs-5">Top 3 Categories
            <span class="fw-normal fs-6 d-block">
              (with least stories)
            </span>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT story_category.title, COUNT(*) AS total_stories FROM story INNER JOIN story_category ON story.category_id = story_category.id GROUP BY category_id ORDER BY total_stories ASC LIMIT 3";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['total_stories']; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col p-0 m-0">
        <div class="card shadow-sm bg-body rounded-2 border border-1 border-bg">
          <div class="card-header text-white fw-bold fs-5" style="background: #6e38a0;">Number of Stories
            <span class="fw-normal fs-6 d-block">
              (belong to each category)
            </span>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Category Name</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT story_category.title, COUNT(*) AS total_stories FROM story INNER JOIN story_category ON story.category_id = story_category.id GROUP BY category_id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['total_stories']; ?></td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>