<!DOCTYPE HTML>
<html>
    <head>
        <title>Employees | The Edge Landscaping</title>
        <?php include $_SERVER['DOCUMENT_ROOT']. '/php/assignments/edge/employees/modules/head.php'; ?>
    </head>
    <body>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT']. '/php/assignments/edge/employees/modules/navigation.php'; ?>
        </nav>
        <header>
            <img src="../media/images/landscape.jpg" alt="Image: Lawn" title="The Edge Landscape Maintenance">
        </header>
        <main>
          <h1>Customer Information</h1>
          <div id="col1">
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
        </main>
    </body>
</html>
