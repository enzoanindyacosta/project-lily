<?php
require_once("./guard.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Story Management | Project Lilly | AIDA</title>
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
      <span>
        <h4 class="text-primary m-0 p-0">Story List</h4>
        <?php
        if (isset($_GET['success'])) {
          echo '<span class="text-success"><b>SUCCESS: </b>' . $_GET['success'] . '</span>';
        } else if (isset($_GET['error'])) {
          echo '<span class="text-danger"><b>ERROR: </b>' . $_GET['error'] . '</span>';
        }
        ?>
      </span>
      <span>
        <?php
        if (isset($_GET['error']) || isset($_GET['success'])) {
          echo '<button class="btn btn-outline-danger btn-sm me-2 px-3" onclick="window.location.href=\'story_management.php\'">Clear Notification</button>';
        }
        ?>
      </span>
    </div>
    <span class="text-danger mb-3 d-block">
      *Note: Deleting a story is permanent and cannot be undone.
    </span>
    <table id="story_list" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination pt-2">
      <thead>
        <tr>
          <th>No.</th>
          <th>Fullname</th>
          <th>Age (in years)</th>
          <th>Category</th>
          <th>Status</th>
          <th style="width: 10rem; text-align: center;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once "../config/db_connection.php";

        $sql = "SELECT story.*, story_category.title AS 'category' FROM story INNER JOIN users ON story.user_id = users.id INNER JOIN story_category ON story_category.id = story.category_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $i = 1;
          while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $age = $row['age'];
            $fullname = $row['fullname'];
            $category = $row['category'];
            $status = $row['status'];
        ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $fullname; ?></td>
              <td><?php echo $age; ?></td>
              <td><?php echo $category; ?></td>
              <td><?php echo strtoupper($status); ?></td>
              <td style="width: 10rem; text-align: center;">
                <a class="btn btn-outline-primary btn-sm px-3" href="view_story.php?id=<?php echo $id; ?>">View</a>
                <a class="btn btn-outline-danger btn-sm px-3" href="delete_story.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this story?')">Delete</a>
              </td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../libs/DataTables/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#story_list').DataTable({
        "ordering": false,
        "paging": true,
        "lengthChange": false,
        "pageLength": 10,
        "searching": false,
        "info": true,
      });
    });
  </script>
</body>

</html>