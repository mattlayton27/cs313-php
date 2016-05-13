<!DOCTYPE HTML>
<html>
    <head>
        <title>Customers | The Edge Landscaping</title>
        <?php include $_SERVER['DOCUMENT_ROOT']. '/php/assignments/edge/employees/modules/head.php'; ?>
    </head>
    <body>
        <main>
          <form action="index.php" method="post">
            <input type="hidden" name="action" value="home">
            <input type="submit" value="Back">
          </form>
          <table>
              <tr>
                  <th>Name</th>
                  <th>Street Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zip Code</th>
                  <th>Phone Number</th>
                  <th>Comments</th>
              </tr>
              <?php foreach ($customers as $customer) : ?>
                  <tr>
                      <td><?php echo $customer['name']; ?></td>
                      <td><?php echo $customer['street_address']; ?></td>
                      <td><?php echo $customer['city']; ?></td>
                      <td><?php echo $customer['state']; ?></td>
                      <td><?php echo $customer['zip_code']; ?></td>
                      <td><?php echo $customer['phone_number']; ?></td>
                      <td><?php echo $customer['comments']; ?></td>
                  </tr>
              <?php endforeach; ?>
          </table>
        </main>
    </body>
</html>
