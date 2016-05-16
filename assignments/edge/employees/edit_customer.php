<!DOCTYPE HTML>
<html>
    <head>
        <title>Employees | The Edge Landscaping</title>
        <?php include $_SERVER['DOCUMENT_ROOT']. '/assignments/edge/employees/modules/head.php'; ?>
    </head>
    <body>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT']. '/assignments/edge/employees/modules/navigation.php'; ?>
        </nav>
        <header>
            <img src="../media/images/landscape.jpg" alt="Image: Lawn" title="The Edge Landscape Maintenance">
        </header>
        <main>
          <div class="edit_customer">
              <form action="index.php" method="post">
                <input type="hidden" name="action" value="home">
                <input type="submit" value="Back">
              </form>
              <h1>Edit Customer</h1>
              <?php if (!empty($edit_error)) { ?>
                <p class="error"><?php echo $edit_error; ?></p>
              <?php } ?>
              <form action="index.php" method="post">
                <input type="hidden" name="action" value="edit_customer">
                <fieldset>
                  <label>Select a Work Day: </label><br>
                  <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>"></input>
                  <select name="edit_work_day_id">
                    <?php foreach ($work_days as $work_day) : ?>
                      <option value="<?php echo $work_day['work_day_id']; ?>"
                        <?php if ($work_day['work_day_id'] == $customer['work_day_id']){echo 'selected'; } ?>>
                        <?php echo $work_day['work_day']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select><br><br>
                  <label>Name:</label><br>
                  <input type="text" name="edit_name" value="<?php echo $customer['name']; ?>"></input><br><br>
                  <label>Street Address:</label><br>
                  <input type="text" name="edit_street_address" value="<?php echo $customer['street_address']; ?>"><br><br>
                  <label>City:</label><br>
                  <input type="text" name="edit_city" value="<?php echo $customer['city']; ?>"><br><br>
                  <label>State (ex. Utah, Nevada, etc):</label><br>
                  <input type="text" name="edit_state" value="<?php echo $customer['state']; ?>"><br><br>
                  <label>Zip Code:</label><br>
                  <input type="text" name="edit_zip_code" value="<?php echo $customer['zip_code']; ?>"><br><br>
                  <label>Phone Number (ex. 555-555-5555):</label><br>
                  <input type="text" name="edit_phone_number" value="<?php echo $customer['phone_number']; ?>"><br><br>
                  <label>Comments:</label><br>
                  <textarea name="edit_comments" cols="30" rows="3"><?php echo $customer['comments']; ?></textarea><br><br>
                  <input type="submit" value="Submit">
                </fieldset>
              </form>
          </div>
        </main>
    </body>
</html>
