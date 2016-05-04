<?php
// Start the session
session_start();

// Assign the variables
$name = $_POST['name'];
$like = $_POST['like'];
$visit = $_POST['visit'];
$change = $_POST['change'];
$again = $_POST['again'];
$comments = $_POST['comments'];

// Write the data to a file
if (isset($name, $like, $visit, $change, $again)) {
  $myfile = fopen("results.txt", "a") or die("Unable to open file!");
  $txt = "Name: " . $name . "\n";
  fwrite($myfile, $txt);
  $txt = "Do you like my website so far? " . $like . "\n";
  fwrite($myfile, $txt);
  $txt = "Have you visited all of the links? " . $visit . "\n";
  fwrite($myfile, $txt);
  $txt = "What would you change about it? " . $change . "\n";
  fwrite($myfile, $txt);
  $txt = "Would you visit it again? " . $again . "\n";
  fwrite($myfile, $txt);
  $txt = "Comments: " . $comments . "\n \n";
  fwrite($myfile, $txt);
  fclose($myfile);
}

// Set the session
if (!isset($_SESSION['submitted'])) {
  $_SESSION['submitted'] = $_POST['submit'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Survey | CS 313: Web Engineering II</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../css/screen.css" type="text/css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div>
        <header role="banner">
            <div>
              <h1>CS 313: Web Engineering II</h1>
            </div>
        </header>
        <nav role="navigation">
            <div>
              <ul>
                  <li><a href="../../index.html" title="Home">Home</a></li>
                  <li id="introduction_fix"><a href="../../introduction/index.html" title="Introduction">Introduction</a></li>
                  <li><a href="../index.html" title="Assignments">Assignments</a></li>
              </ul>
            </div>
        </nav>
        <main role="main">
            <div id="survey">
              <h1>Website Survey Results</h1>
              <p id="hint">To view your survey results scroll to the bottom of the page</p>
              <?php
              $myfile = fopen("results.txt", "r") or die("Unable to open file!");
              while(!feof($myfile)) {
                echo fgets($myfile) . "<br>";
              }
              fclose($myfile);
              ?>
            </div>
        </main>
       </div>
    </body>
</html>
