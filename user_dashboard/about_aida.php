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
  <title>About AIDA | Project Lilly | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="user-main-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 m-0 p-0">
        <?php
        UserSidebar(3);
        ?>
      </div>
      <div class="col-md-9">
        <div class="container p-3 bg-white mt-2 rounded-3" style="text-align: justify;">
          <img src="../images/about_aida.png" class="img-fluid" alt="About AIDA">
          <p class="fs-5 px-4">
            <b>AIDA</b> is a registered NGO based in Malaysia. It was founded in 2021, to introduce a gap in the community on autistic community self-representation. Our main goal is to advocate for the inclusion and representation of autistic voices themselves in policymaking. This is to ensure laws and policies made, meet our community’s needs.
          </p>
          <p class="fs-5 px-4">
            We also support all forms of self- advocacy and strive to expand the understanding of autism through advocacy, awareness and ensuring accessibility to information on autism. We believe in improving the quality of life and wellness of the autistic community in Malaysia. We want to break the ceiling of what autistics community were told they could not have been. We work to make sure that autistic people are in control in our own lives.
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>