<?php
require_once("./guard.php");
require_once("../config/db_connection.php");

if (!isset($_GET['id'])) {
  header("Location: user_management.php");
  exit();
} else if (isset($_GET['id'])) {
  $id = validate($_GET['id']);

  $sql = "SELECT * FROM users WHERE id = '$id' AND role = 1";
  $result = $conn->query($sql);

  if (mysqli_num_rows($result) == 0) {
    header("Location: user_management.php?error=User Not Found!");
    exit();
  }

  $sql = "DELETE FROM users WHERE id = '$id' AND role = 1";
  $result = $conn->query($sql);

  if ($result) {
    header("Location: user_management.php?success=User Deleted Successfully!");
    exit();
  } else {
    header("Location: user_management.php?error=Something Went Wrong!");
    exit();
  }
}
