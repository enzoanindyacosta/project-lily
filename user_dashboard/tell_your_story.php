<?php
require_once("../components/user_sidebar.php");
require_once("./guard.php");
require_once("../config/db_connection.php");

$sql = "SELECT * FROM story_category";
$result = $conn->query($sql);
$category_list = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $category_list[] = $row;
  }
}

if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $age = $_POST['age'];
  $state_stay_in = $_POST['state_stay_in'];
  $q1 = $_POST['q1'];
  $q2 = $_POST['q2'];
  $q3 = $_POST['q3'];
  $q4 = $_POST['q4'];
  $q5 = $_POST['q5'];
  $your_story = $_POST['your_story'];
  $category = $_POST['category'];
  $user_id = $_SESSION['user_id'];
  $story = mysqli_real_escape_string($conn, $your_story);

  $sql = "INSERT INTO story (user_id, category_id, fullname, age, state_stay_in, q1, q2, q3, q4, q5, your_story) VALUES ('$user_id', '$category', '$fullname', '$age', '$state_stay_in', '$q1', '$q2', '$q3', '$q4', '$q5', '$story')";
  if ($conn->query($sql)) {
    header("Location: index.php?success=Story Successfully created!");
    exit();
  } else {
    echo '<script>alert("Story Submission Failed!");</script>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tell Your Story | Project Lilly | AIDA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
  <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="user-main-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 m-0 p-0">
        <?php
        UserSidebar(1);
        ?>
      </div>
      <div class="col-md-9">
        <div class="container p-3 bg-white mt-2 rounded-3" style="text-align: justify;">
          <form method="POST" action="" class="px-2">
            <h2 class="text-center mt-3 text-uppercase">
              Tell Your <u><b class="text-danger">Story</b></u>
            </h2>
            <div class="row m-0 p-0">
              <div class="col m-0 p-0 pe-2">
                <div class="mb-3">
                  <label for="fullname" class="form-label">What is your name?</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" required minlength="3" maxlength="75" placeholder="Enter your full name">
                </div>
              </div>
              <div class="col m-0 p-0 ps-2">
                <div class="mb-3">
                  <label for="age" class="form-label">How old are you?</label>
                  <input type="number" class="form-control" id="age" name="age" required placeholder="Enter your age" min="1" max="150">
                </div>
              </div>
            </div>

            <div class="row m-0 p-0">
              <div class="col m-0 p-0 pe-2">
                <div class="mb-3">
                  <label for="state_stay_in" class="form-label">Which state do you stay-in?</label>
                  <input type="text" class="form-control" id="state_stay_in" name="state_stay_in" required minlength="3" maxlength="75" placeholder="Enter your state">
                </div>
              </div>
              <div class="col m-0 p-0 ps-2">
                <div class="mb-3">
                  <label for="story_category" class="form-label">Story Category</label>
                  <select class="form-select" id="story_category" name="category" required>
                    <option value="" selected disabled>Select Category</option>
                    <?php
                    foreach ($category_list as $category) {
                      echo '<option value="' . $category['id'] . '">' . $category['title'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="q1" class="form-label">Do you think the current policies placed by the government are sufficient for autistic people in Malaysia?</label>
              <input type="text" class="form-control" id="q1" name="q1" required placeholder="Write your answer here" minlength="3" required>
            </div>

            <div class="mb-3">
              <label for="q2" class="form-label">What specific challenges have you faced in accessing services or support due to the existing policies?</label>
              <input type="text" class="form-control" id="q2" name="q2" required placeholder="Write your answer here" minlength="3" required>
            </div>

            <div class="mb-3">
              <label for="q3" class="form-label">How have these challenges impacted your daily life, education, employment, or social interactions?</label>
              <input type="text" class="form-control" id="q3" name="q3" required placeholder="Write your answer here" minlength="3" required>
            </div>

            <div class="mb-3">
              <label for="q4" class="form-label">What types of support or accommodations do you feel are necessary for autistic individuals to thrive in education, employment, and community settings?</label>
              <input type="text" class="form-control" id="q4" name="q4" required placeholder="Write your answer here" minlength="3" required>
            </div>

            <div class="mb-3">
              <label for="q5" class="form-label">What policy do you wish the Gvt of Malaysia implemented?</label>
              <input type="text" class="form-control" id="q5" name="q5" required placeholder="Write your answer here" minlength="3" required>
            </div>

            <div class="mb-3">
              <label for="your_story" class="form-label">Tell us your story</label>
              <textarea class="form-control" id="your_story" name="your_story" rows="10" required></textarea>
            </div>

            <!-- clear, submit -->
            <div class="d-flex justify-content-between">
              <button type="reset" class="px-3 btn btn-danger">Clear</button>
              <button type="submit" class="px-3 btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container my-5"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>