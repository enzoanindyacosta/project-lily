<?php
require_once("./guard.php");
require_once("../config/db_connection.php");

if (isset($_POST['approve']) || isset($_POST['reject']) || isset($_POST['pending'])) {
  $id = validate($_POST['story_id']);
  $approve = validate($_POST['approve']);
  $reject = validate($_POST['reject']);
  $pending = validate($_POST['pending']);

  if ($approve == "approved") {
    $sql = "UPDATE story SET status = 'approved' WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
      header("Location: story_management.php?success=Story Approved!");
      exit();
    } else {
      header("Location: story_management.php?error=Something Went Wrong!");
      exit();
    }
  } else if ($reject == "rejected") {
    $sql = "UPDATE story SET status = 'rejected' WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
      header("Location: story_management.php?success=Story Rejected!");
      exit();
    } else {
      header("Location: story_management.php?error=Something Went Wrong!");
      exit();
    }
  } else if ($pending == "pending") {
    $sql = "UPDATE story SET status = 'pending' WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result) {
      header("Location: story_management.php?success=Story Status Changed!");
      exit();
    } else {
      header("Location: story_management.php?error=Something Went Wrong!");
      exit();
    }
  } else {
    header("Location: story_management.php?error=Something Went Wrong!");
    exit();
  }
}

if (!isset($_GET['id'])) {
  header("Location: story_management.php");
  exit();
} else if (isset($_GET['id'])) {
  $id = validate($_GET['id']);

  $sql = "SELECT story.*, users.fullname, story_category.title AS 'category' FROM story INNER JOIN users ON story.user_id = users.id INNER JOIN story_category ON story_category.id = story.category_id WHERE story.id = '$id'";
  $result = $conn->query($sql);

  if (mysqli_num_rows($result) == 0) {
    header("Location: story_management.php?error=Story Not Found!");
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
  <title>View Story | Project Lilly | AIDA</title>
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
      <a class="btn btn-primary fw-bold text-uppercase px-4 w-100" href="story_management.php">Story Management</a>
      <span class="px-2"></span>
      <a class="btn btn-outline-secondary fw-bold text-uppercase px-4 w-100" href="story_category.php">Story Category</a>
    </div>
  </div>

  <div class="container p-3 my-3 shadow-sm bg-body rounded-2 border border-1 border-bg">
    <div class="d-flex justify-content-between align-items-center mb-2 border-bottom border-1 border-secondary pb-3">
      <h4 class="text-primary m-0 p-0">View Story</h4>
      <a class="btn btn-secondary btn-sm me-2 px-3" href="story_management.php">Go Back</a>
    </div>
    <span class="text-danger mb-3 d-block"></span>
    <table class="table table-bordered">
      <tr>
        <th class="bg-light">Fullname</th>
        <td><?php echo $row['fullname']; ?></td>
      </tr>
      <tr>
        <th class="bg-light w-25">Age</th>
        <td><?php echo $row['age']; ?> Years</td>
      </tr>
      <tr>
        <th class="bg-light w-25">Category</th>
        <td><?php echo $row['category']; ?></td>
      </tr>
      <tr>
        <th class="bg-light">Status</th>
        <td><?php echo strtoupper($row['status']); ?></td>
      </tr>
      <tr>
        <th class="bg-light">Question 01</th>
        <td>
          <b>Do you think the current policies placed by the government are sufficient for autistic people in Malaysia?</b><br>
          <?php echo $row['q1']; ?>
        </td>
      </tr>
      <tr>
        <th class="bg-light">Question 02</th>
        <td>
          <b>What specific challenges have you faced in accessing services or support due to the existing policies?</b><br>
          <?php echo $row['q2']; ?>
        </td>
      </tr>
      <tr>
        <th class="bg-light">Question 03</th>
        <td>
          <b>How have these challenges impacted your daily life, education, employment, or social interactions?</b><br>
          <?php echo $row['q3']; ?>
        </td>
      </tr>
      <tr>
        <th class="bg-light">Question 04</th>
        <td>
          <b>What types of support or accommodations do you feel are necessary for autistic individuals to thrive in education, employment, and community settings?</b><br>
          <?php echo $row['q4']; ?>
        </td>
      </tr>
      <tr>
        <th class="bg-light">Question 05</th>
        <td>
          <b>What policy do you wish the Gvt of Malaysia implemented?</b><br>
          <?php echo $row['q5']; ?>
        </td>
      </tr>
      <tr>
        <th class="bg-light">Story Content</th>
        <td class="text-justify text-break">
          <?php echo $row['your_story']; ?>
        </td>
      </tr>
    </table>

    <div class="d-flex justify-content-between align-items-center mt-3">
      <form method="POST" action="">
        <input type="hidden" name="story_id" value="<?php echo $row['id']; ?>">
        <button type="submit" class="btn btn-primary btn-sm px-4 me-2" name="pending" value="pending">Pending</button>
        <button type="submit" class="btn btn-success btn-sm px-4 me-2" name="approve" value="approved">Approve</button>
        <button type="submit" class="btn btn-danger btn-sm px-4" name="reject" value="rejected">Reject</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>