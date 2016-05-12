<?php
require ("dbConnector.php");
$db = loadDatabase();

// Select all scriptures from scriptures table
$stmt = $db->prepare('SELECT * FROM scriptures');
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Scripture Resources | Team Readiness Activity 5</title>
</head>
<body>
  <h1>Scripture Resources</h1>
  <?php foreach($rows as $row) {
    echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'] . '"<br><br>';
  }
  ?>
</body>
</html>
