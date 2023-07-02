<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>User List</h2>
    <?php
        // Retrieve user data from your data source (e.g., database)
        $users = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com'],
        ];

        // Convert PHP array to JSON for JavaScript consumption
        $usersJson = json_encode($users);
    ?>

    <ul>
        <?php foreach ($users as $user) { ?>
            <li>
                <?php echo $user['name']; ?>
                <button class="openModalBtn" data-userid="<?php echo $user['id']; ?>">View Details</button>
            </li>
        <?php } ?>
    </ul>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle"></h2>
            <p id="modalDescription"></p>
        </div>
    </div>


    <div class="modal fade show" id="autisticTwo" tabindex="-1" aria-labelledby="autisticTwoLabel" style="display: block;" aria-modal="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="autisticOneLabel">Autistic Story</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row d-flex align-items-center story-author">
          <div class="col-3"><img src="img/icon-autistic.png" class="img-fluid mx-auto d-block"></div>
          <div class="col-9"><h5>Cheah Boon Eu, 37</h5><p>Penang, Malaysia</p><p><b>Autistic</b></p></div>
        </div>
        <p class="mt-3">Self diagnosed with autism. Other co-morbids - Dyslexia, ADHD, Irlen Syndrome diagnosed in my 30s. I am living independently and trying to overcome my struggles.</p>
        <img src="img/submission1.jpg" class="img-fluid mx-auto d-block">
      </div>
    </div>
  </div>
</div>

    <script>
        var users = <?php echo $usersJson; ?>;

        window.onload = function() {
            var modal = document.getElementById('myModal');
            var btns = document.getElementsByClassName('openModalBtn');
            var span = document.getElementsByClassName('close')[0];

            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', function() {
                    var userId = this.getAttribute('data-userid');
                    var user = getUserDetails(userId);

                    if (user) {
                        document.getElementById('modalTitle').innerText = user.name;
                        document.getElementById('modalDescription').innerText = user.email;
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
            // Retrieve the user details using the provided userId
            // Implement your logic to fetch the details from the database or any data source
            // Return the user details as an object or null if the user is not found

            for (var i = 0; i < users.length; i++) {
                if (users[i].id == userId) {
                    return users[i];
                }
            }
            return null;
        }
    </script>
</body>
</html>
