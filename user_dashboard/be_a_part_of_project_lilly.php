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
  <title>Be a Part of Project Lilly | Project Lilly | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="user-main-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 m-0 p-0">
        <?php
        UserSidebar(4);
        ?>
      </div>
      <div class="col-md-9">
        <div class="container p-3 bg-white mt-2 rounded-3" style="text-align: justify;">
          <h2 class="text-center mt-3 text-uppercase">
            Be a Part of <u><b>Project Lilly</b></u>
          </h2>
          <p class="fs-5 px-4">
            We believe in the power of community and collaboration. Your involvement can make a significant impact in several ways. Consider volunteering your time and expertise to assist in our programs and events, where you can directly engage with individuals with autism and their families, providing invaluable support and encouragement.
          </p>
          <p class="fs-5 px-4">
            Join us today and be a part of the positive change we are making. Together, let's build a world that recognizes the unique strengths and abilities of individuals with autism, providing them with every opportunity to thrive and succeed. Together, we can make a lasting difference in their lives.
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>