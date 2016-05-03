<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Information | Team Readiness Activity 3</title>
</head>
<body>
  <h1>Student Information</h1>
  <form action="display_student_information.php" method="post">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>
    <label>Email:</label>
    <input type="text" name="email" required><br><br>
    <label>Major:</label>
    <div id="radio_button">
      <input type="radio" name="major" value="Computer Science">Computer Science</input><br>
      <input type="radio" name="major" value="Web Development and Design">Web Development and Design</input><br>
      <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology</input><br>
      <input type="radio" name="major" value="Computer Engineering">Computer Engineering</input><br>
    </div><br>
    <label>Places you have visted:</label>
    <div id="checkbox">
      <input type="checkbox" name="places_visited[]" value="North America">North America</input><br>
      <input type="checkbox" name="places_visited[]" value="South America">South America</input><br>
      <input type="checkbox" name="places_visited[]" value="Europe">Europe</input><br>
      <input type="checkbox" name="places_visited[]" value="Asia">Asia</input><br>
      <input type="checkbox" name="places_visited[]" value="Australia">Australia</input><br>
      <input type="checkbox" name="places_visited[]" value="Africa">Africa</input><br>
      <input type="checkbox" name="places_visited[]" value="Antartica">Antartica</input><br>
    </div><br>
    <label>Comments:</label><br>
    <textarea rows="4" cols="40" name="comments"></textarea><br>
    <input type="submit" name="submit" value="Submit">
  </form><br><br>
  <div id="results">
  <?php
    if (isset($_POST['submit'])) {
      echo "Name: " . $_POST['name'] . "<br>";
      echo "Major: " . $_POST['major'] . "<br>";
      echo "Places Visited: <br>";
      foreach($_POST['places_visited'] as $place) {
        echo "<li>$place</li>";
      }
      echo "Comments: " . $_POST['comments'];
    }
  ?>
  </div>
</body>
</html>
