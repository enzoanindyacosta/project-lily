<?php
function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'project_lilly';

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Error: Database not connected!" . mysqli_connect_error());
}
