<!DOCTYPE HTML>
<html>
    <head>
        <title>Home | The Edge Landscaping</title>
        <?php include $_SERVER['DOCUMENT_ROOT']. '/assignments/edge/modules/head.php'; ?>
    </head>
    <body>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT']. '/assignments/edge/modules/navigation.php'; ?>
        </nav>
        <header>
            <img src="media/images/landscape.jpg" alt="Image: Lawn" title="The Edge Landscape Maintenance">
        </header>
        <main>
            <div class="col1">
                <h1>The Edge</h1>
                <p>We are a company devoted to providing the best lawn care possible to your property, along with services
                to your sprinklers, gardens and bushes. We guaruntee you will be satisfied with our precise and thorough care.</p>
            </div>
            <div class="col2">
                <h2>Employee Login</h2>
                <?php if (!empty($errorMessage)) { ?>
                <p class="error"><?php echo $errorMessage; ?></p>
                <?php } ?>
                <form action="index.php" method="post">
                    <fieldset>
                      <div id="login_form">
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="<?php if(!empty($_SESSION['username'])){echo $_SESSION['username'];} ?>"><br>
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="<?php if(!empty($_SESSION['password'])){echo $_SESSION['password'];} ?>"><br>
                        <label>&nbsp;</label>
                        <input type="submit" name="action" value="Login" id="login">
                      </div>
                    </fieldset>
                </form>
            </div>
        </main>
    </body>
</html>
