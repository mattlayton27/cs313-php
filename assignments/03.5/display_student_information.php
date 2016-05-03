<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Display Student Information | Team Readiness Activity 3</title>
</head>
<body>
  <h1>Student Information</h1>
  <label>Name:</label>
  <span><?php echo $_POST['name']; ?></span><br><br>
  <label>Email:</label>
  <span><a href="mailto:<?php echo $_POST['email']; ?>"><?php echo $_POST['email']; ?></a></span><br><br>
  <label>Major:</label>
  <span><?php echo $_POST['major']; ?></span><br><br>
  <label>Places visited:</label><br>
  <ul>
    <?php
    foreach ($_POST['places_visited'] as $place) {
      echo "<li>" . $place . "</li>";
    }
    ?>
  </ul><br>
  <label>Comments:</label>
  <span><?php echo $_POST['comments']; ?></span>
</body>
</html>
