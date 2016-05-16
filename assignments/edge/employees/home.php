<!DOCTYPE HTML>
<html>
    <head>
        <title>Employees | The Edge Landscaping</title>
        <?php include $_SERVER['DOCUMENT_ROOT']. '/public/cs313/homepage/assignments/edge/employees/modules/head.php'; ?>
    </head>
    <body>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT']. '/public/cs313/homepage/assignments/edge/employees/modules/navigation.php'; ?>
        </nav>
        <header>
            <img src="../media/images/landscape.jpg" alt="Image: Lawn" title="The Edge Landscape Maintenance">
        </header>
        <main>
          <div id="col1">
            <h1>Customer Information</h1>
            <?php if (!empty($changed_customer)) { ?>
              <p class="changed_customer"><?php echo $changed_customer; ?></p>
            <?php } ?>
            <label>Search By Work Day:</label>
            <form action="index.php" method="post">
              <fieldset>
                <input type="hidden" name="action" value="get_customers_by_day">
                <select name="work_day_id" style="width: 175px" id="work_day">
                  <?php foreach ($work_days as $work_day) : ?>
                    <option value="<?php echo $work_day['work_day_id']; ?>">
                      <?php echo $work_day['work_day']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <input type="submit" value="Submit">
              </fieldset>
            </form>
            <label>Search By Name:</label>
            <?php if (!empty($nameError)) { ?>
              <p class="error"><?php echo $nameError; ?></p>
            <?php } ?>
            <form action="index.php" method="post">
              <fieldset>
                <input type="hidden" name="action" value="get_customers_by_name">
                <input type="text" name="name">
                <input type="submit" value="Submit">
              </fieldset>
            </form>
            <form action="index.php" method="post" id="view_all">
              <input type="hidden" name="action" value="get_customers">
              <input type="submit" value="View All Customers" style="width: 175px">
            </form>
            <form action="index.php" method="post"  id="log_out">
              <input type="hidden" name="action" value="log_out">
              <input type="submit" value="Log Out">
            </form>
          </div>
          <div class="col2">
              <h2>Add Customer</h2>
              <?php if (!empty($addError)) { ?>
                <p class="error"><?php echo $addError; ?></p>
              <?php } else if (!empty($addedCustomer)) {  ?>
                <p class="added"><?php echo $addedCustomer; ?></p>
              <?php } ?>
              <form action="index.php" method="post">
                <input type="hidden" name="action" value="add_customer">
                <fieldset>
                  <label>Select a Work Day: </label><br>
                  <select name="customer_work_day_id">
                    <?php foreach ($work_days as $work_day) : ?>
                      <option value="<?php echo $work_day['work_day_id']; ?>">
                        <?php echo $work_day['work_day']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select><br><br>
                  <label>Name:</label><br>
                  <input type="text" name="customer_name"><br><br>
                  <label>Street Address:</label><br>
                  <input type="text" name="customer_street_address"><br><br>
                  <label>City:</label><br>
                  <input type="text" name="customer_city"><br><br>
                  <label>State (ex. Utah, Nevada, etc):</label><br>
                  <input type="text" name="customer_state"><br><br>
                  <label>Zip Code:</label><br>
                  <input type="text" name="customer_zip_code"><br><br>
                  <label>Phone Number (ex. 555-555-5555):</label><br>
                  <input type="text" name="customer_phone_number"><br><br>
                  <label>Comments:</label><br>
                  <textarea name="customer_comments" cols="30" rows="3"></textarea><br><br>
                  <input type="submit" value="Submit">
                </fieldset>
              </form>
          </div>
        </main>
    </body>
</html>
