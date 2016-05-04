<?php
session_start();
if ($_SESSION["submitted"] == Submit) {
  header('Location: survey_results.php');
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
              <h1>Website Survey</h1>
              <form action="survey_results.php" method="post">
                <label>1. What is your name?</label><br>
                <input type="text" name="name" size="30" required></input><br>
                <label>2. Do you like my website so far?</label><br>
                <input type="radio" name="like" value="Yes">Yes</input><br>
                <input type="radio" name="like" value="No">No</input><br>
                <label>3. Have you visited all of the links?</label><br>
                <input type="radio" name="visit" value="Yes">Yes</input><br>
                <input type="radio" name="visit" value="No">No</input><br>
                <label>4. What would you change about it?</label><br>
                <input type="radio" name="change" value="Menu Bar">Menu Bar</input><br>
                <input type="radio" name="change" value="Color">Color</input><br>
                <input type="radio" name="change" value="Layout">Layout</input><br>
                <label>5. Would you visit it again?</label><br>
                <input type="radio" name="again" value="Yes">Yes</input><br>
                <input type="radio" name="again" value="No">No</input><br>
                <label>6. Comments</label><br>
                <textarea name="comments" rows="4" cols="30"></textarea><br><br>
                <input type="submit" name="submit" value="Submit">
              </form>
              <a href="survey_results.php" title="Link directly to results">Go directly to the results...</a>
            </div>
        </main>
       </div>
    </body>
</html>
