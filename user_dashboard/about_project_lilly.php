<?php
require_once("../components/user_sidebar.php");
require_once("./guard.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Project Lilly | Project Lilly | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="user-main-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 m-0 p-0">
        <?php
        UserSidebar(2);
        ?>
      </div>
      <div class="col-md-9">
        <div class="container p-3 bg-white mt-2 rounded-3" style="text-align: justify;">
          <h2 class="text-center mt-3 text-uppercase">
            The Roadmap for <u><b>2023</b></u>
          </h2>
          <img src="../images/roadmap_2023.png" class="img-fluid p-3" alt="The Roadmap for 2023">
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>