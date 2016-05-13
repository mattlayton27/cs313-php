<!DOCTYPE HTML>
<html>
    <head>
        <title>Home | The Edge Landscaping</title>
        <?php include $_SERVER['DOCUMENT_ROOT']. 'modules/head.php'; ?>
    </head>
    <body>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT']. 'modules/navigation.php'; ?>
        </nav>
        <header>
            <img src="media/images/landscape.jpg" alt="Image: Lawn" title="The Edge Landscape Maintenance">
        </header>
        <main>
            <div class="col1">
                <h1>The Edge</h1>
                <p>paoisdfpaiodhfaoidf padsoihf apdfioh aspdfoih apdfioha pdfoh aspdfiha dsfka ;lsdfkn as;dfkew
                    apsodif posnd fpofn epoina foin fpona ofin wpoenf ionapsodinf asoidfn paonf paodn fpwoeinf poawein
                    poiansd fpoainsd fposnf oawine fpoaeine poienf epoanef oaine fpioan efoina peofina psoeinf apoeinf
                    poinaef aewopifna woefin aewpoifna wpeofinaw epofina wepfoina ewfpoinaw epfoinapweoifna poiefn aeof
                    poaieap oanwief awpoinwfe poinef poin dpkoan dspokna poeifh apoeifj apowiehf pawoiehf paweoihf apwe</p>
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
