<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Sign In | Team Readiness Activity 7</title>
</head>
<body>
  <h1>Sign In</h1>
  <?php if (!empty($error)) { ?>
  <p style="color: red"><?php echo $error; ?></p>
  <?php } ?>
  <form action="index.php" method="post">
    <input type="hidden" name="action" value="sign_in">
    <fieldset>
      <label>Username:</label><br>
      <input type="text" name="username"><br><br>
      <label>Password:</label><br>
      <input type="password" name="password"><br><br>
      <input type="submit" value="Submit">
    </fieldset>
  </form><br>
  <form action="index.php" method="post">
    <input type="hidden" name="action" value="sign_up_page">
    <input type="submit" value="Sign Up">
  </form>
</body>
</html>
