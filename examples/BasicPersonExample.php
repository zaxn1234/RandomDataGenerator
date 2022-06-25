<?php

require_once '../src/autoload.php';

use RandomDataGenerator\Factory;

ini_set('display_errors', 1);
error_reporting(E_ALL);

$factory = Factory::create();
?>
<!DOCTYPE>
<html>
  <head>
    <title>Basic Person Example</title>

    <link rel="stylesheet" type="text/css" href="css/examples.css">
  </head>
  <body>
    <table>
      <thead>
        <th>Random First Name (Male)</th>
        <th>Random First Name (Female)</th>
        <th>Random Last Name</th>
        <th>Random Full Name</th>
      </thead>
      <tbody>
        <?php for ($i = 0; $i < 10; $i++): ?>
          <tr>
            <td><?php echo $factory->maleFirstName; ?></td>
            <td><?php echo $factory->femaleFirstName; ?></td>
            <td><?php echo $factory->lastName; ?></td>
            <td><?php echo $factory->name; ?></td>
          </tr>
        <?php endfor; ?>
      </tbody>
    </table>

    <hr>

    <code>
      require_once '../src/autoload.php'; <br>
      use RandomDataGenerator\Factory;<br><br>

      $factory = Factory::create();<br>
      
      echo $factory->maleFirstName;<br>
      echo $factory->femaleFirstName;<br>
      echo $factory->lastName;<br>
      echo $factory->name;<br>
    </code>
  </body>
</html>