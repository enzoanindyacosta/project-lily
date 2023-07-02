<?php
require_once("./guard.php");
require_once("../config/db_connection.php");

if (!isset($_GET['id'])) {
  header("Location: story_management.php");
  exit();
} else if (isset($_GET['id'])) {
  $id = validate($_GET['id']);

  $sql = "SELECT * FROM story WHERE id = '$id'";
  $result = $conn->query($sql);

  if (mysqli_num_rows($result) == 0) {
    header("Location: story_management.php?error=Story Not Found!");
    exit();
  }

  $sql = "DELETE FROM story WHERE id = '$id'";
  $result = $conn->query($sql);

  if ($result) {
    header("Location: story_management.php?success=Story Deleted Successfully!");
    exit();
  } else {
    header("Location: story_management.php?error=Something Went Wrong!");
    exit();
  }
}
