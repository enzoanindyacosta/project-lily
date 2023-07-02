<?php
session_start();
if (!isset($_SESSION['user_role'])) {
  header("location: ./logout.php");
  exit();
} else if (isset($_SESSION['user_role'])) {
  if ($_SESSION['user_role'] == 0) {
    header("location: ../admin_dashboard/index.php");
    exit();
  }
}
