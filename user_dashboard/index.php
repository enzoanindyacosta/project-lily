<?php
require_once("../components/user_sidebar.php");
require_once("./guard.php");
include_once "../config/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard | Project Lilly | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="./chat/chat.css">
</head>

<body class="user-main-bg">
  <?php require_once("../components/language.php"); ?>
  <div class="container-fluid">
        <?php
        if (isset($_GET['success'])) {
          echo '<span class="text-success"><b>SUCCESS: </b>' . $_GET['success'] . '</span>';
        } else if (isset($_GET['error'])) {
          echo '<span class="text-danger"><b>ERROR: </b>' . $_GET['error'] . '</span>';
        }
        ?>
    <div class="row">
      <div class="col-lg-2 col-sm-12 m-0 p-0">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <?php
          UserSidebar(0);
        ?>
      </div>
      <div class="col-lg-10 col-sm-12">
        <div class="container">
          <?php 
          
          $sql = "SELECT * FROM story WHERE status = 'approved'";
          $result = $conn->query($sql);
          $stories = array(); 
          
          // dd($result);
          ?>
          <div class="row content-elements">

          <?php if ($result->num_rows > 0) { ?>
              <ul>
                
                <?php

                  while ($row = $result->fetch_assoc()) {
                    $story = array(
                      'id' => $row['id'],
                      'fullname' => $row['fullname'],
                      'age' => $row['age'],
                      'state_stay_in' => $row['state_stay_in'],
                      'q1' => $row['q1'],
                      'q2' => $row['q2'],
                      'q3' => $row['q3'],
                      'q4' => $row['q4'],
                      'q4' => $row['q4'],
                      'q5' => $row['q5'],
                      'your_story' => $row['your_story'],
                      'status' => $row['status'],
                      'category_id' => $row['category_id'],
                      'user_id' => $row['user_id'],
                      // Add any other user attributes you want to include
                  );

                  $stories[] = $story;

                ?>
                  <?php if($row['category_id'] == 1) { ?>
                    <li><a href="#" data-bs-toggle="modal" data-options="<?php $row ?>" class="btn" data-userid="<?php echo $row['id']; ?>" data-bs-target="#tellStory"><img src="../images/ele-autistic.png"
                          class="img-fluid"><img src="../images/ele-face.png" class="img-fluid element-face"></a>
                    </li>
                <?php } elseif($row['category_id'] == 2) { ?>
                  <li><a href="#" data-bs-toggle="modal" class="btn" data-userid="<?php echo $row['id']; ?>" data-bs-target="#tellStory"><img src="../images/ele-caregivers.png"
                          class="img-fluid"><img src="../images/ele-face.png" class="img-fluid element-face"></a>
                    </li>
                <?php } elseif($row['category_id'] == 3) { ?>
                  <li><a href="#" data-bs-toggle="modal" class="btn" data-userid="<?php echo $row['id']; ?>" data-bs-target="#tellStory"><img src="../images/ele-friends.png"
                          class="img-fluid"><img src="../images/ele-face.png" class="img-fluid element-face"></a>
                    </li>
                <?php } elseif($row['category_id'] == 4) { ?>
                  <li><a href="#" data-bs-toggle="modal" class="btn" data-userid="<?php echo $row['id']; ?>" data-bs-target="#tellStory"><img src="../images/ele-notsure.png"
                          class="img-fluid"><img src="../images/ele-face.png" class="img-fluid element-face"></a>
                    </li>
                <?php } elseif($row['category_id'] == 5) { ?>
                  <li><a href="#" data-bs-toggle="modal" class="btn" data-userid="<?php echo $row['id']; ?>" data-bs-target="#tellStory"><img src="../images/ele-parents.png"
                          class="img-fluid"><img src="../images/ele-face.png" class="img-fluid element-face"></a>
                    </li>

                <?php } $storyJson = json_encode($stories); ?>
                <?php }
              ?>
               
              </ul>
            <?php }else { ?>
                <div class="not-found">
                  <h2>No Story found!</h2>
                </div>
              <?php } ?>


            <!-- <div class="col align-self-end">
              <ul>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#tellStory"><img src="../images/ele-autistic.png"
                      class="img-fluid"><img src="../images/ele-face.png" class="img-fluid element-face"></a>
                </li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-parents.png" class="img-fluid"></a> </li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a> </li>
              </ul>
            </div> -->

            <!-- <div class="col align-self-end">
              <ul>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#tellStory"><img
                      src="../images/ele-autistic.png" class="img-fluid"><img src="../images/ele-face.png"
                      class="img-fluid element-face"></a></li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
              </ul>
            </div>

            <div class="col align-self-end">
              <ul>
                <li><a href="#"><img src="../images/ele-autistic.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-parents.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a> </li>
              </ul>
            </div>

            <div class="col align-self-end">
              <ul>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a> </li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-autistic.png" class="img-fluid"></a></li>
              </ul>
            </div>

            <div class="col align-self-end">
              <ul>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-parents.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-autistic.png" class="img-fluid"></a></li>
              </ul>
            </div>

            <div class="col align-self-end">
              <ul>
                <li><a href="#"><img src="../images/ele-autistic.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-parents.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a></li>
              </ul>
            </div>

            <div class="col align-self-end">
              <ul>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-parents.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-notsure.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-autistic.png" class="img-fluid"></a></li>
              </ul>
            </div>

            <div class="col align-self-end">
              <ul>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-friends.png" class="img-fluid"></a></li>
                <li><a href="#"><img src="../images/ele-caregivers.png" class="img-fluid"></a></li>
              </ul>
            </div> -->




          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tellStory" tabindex="-1" aria-labelledby="tellStoryLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="autisticOneLabel">Autistic Story</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row d-flex align-items-center story-author">
          <div class="col-3"><img id="image" src="../images/icon-autistic.png" class="img-fluid mx-auto d-block"></div>
          <div class="col-9"><h5><span id="name"></span>, <span id="age"></span></h5><p id="address">Penang, Malaysia</p><p><b>Autistic</b></p></div>
        </div>
        <p class="mt-3" id="modalDescription"></p>
        <!-- <img src="../images/submission1.jpg" class="img-fluid mx-auto d-block"> -->
      </div>
    </div>
  </div>
</div>

  <?php require_once("./chat/chat.php"); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js"></script>
  <script src="./chat/responses.js"></script>
  <script src="./chat/chat.js"></script>

  <script>
        var stories = <?php echo $storyJson; ?>;
            
        

        window.onload = function() {
            var modal = document.getElementById('myModal');
            var btns = document.getElementsByClassName('btn');
            var span = document.getElementsByClassName('close')[0];

            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', function() {
                    var userId = this.getAttribute('data-userid');
                    var user = getUserDetails(userId);
                    console.log(stories);
                    if (user) {
                        if(user.category_id == 1){
                          document.getElementById('image').src = "../images/icon-autistic.png"
                        }else if(user.category_id == 2){
                          document.getElementById('image').src = "../images/ele-caregivers.png"
                        }else if(user.category_id == 3){
                          document.getElementById('image').src = "../images/ele-friends.png"
                        } else if(user.category_id == 4){
                          document.getElementById('image').src = "../images/ele-notsure.png"
                        }  else {
                          document.getElementById('image').src = "../images/ele-parents.png"
                        }
                        document.getElementById('name').innerText = user.fullname;
                        document.getElementById('age').innerText = user.age;
                        document.getElementById('modalDescription').innerText = user.your_story;
                        document.getElementById('address').innerText = user.state_stay_in;
                        modal.style.display = 'block';
                    }
                });
            }

            span.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        }

        function getUserDetails(userId) {
           console.log(stories);
            // Retrieve the user details using the provided userId
            // Implement your logic to fetch the details from the database or any data source
            // Return the user details as an object or null if the user is not found

            for (var i = 0; i < stories.length; i++) {
                if (stories[i].id == userId) {
                    return stories[i];
                }
            }
            return null;
        }
    </script>
</body>

</html>