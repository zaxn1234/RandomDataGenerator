<?php

require_once '../src/autoload.php';

use RandomDataGenerator\Factory;

ini_set('display_errors', 1);
error_reporting(E_ALL);

$factory = Factory::create();

$back = true;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Basic Address Example</title>

    <link rel="stylesheet" type="text/css" href="css/examples.css">
</head>
<body>
    <?php require_once("includes/header.php"); ?>

    <table>
        <thead>
            <th>Random Street</th>
            <th>Random City</th>
            <th>Random Administrative Area</th>
            <th>Random Locality</th>
            <th>Random Full Address</th>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 10; $i++): ?>
                <tr>
                    <td><?php echo $factory->street; ?></td>
                    <td><?php echo $factory->city; ?></td>
                    <td><?php echo $factory->administrativeArea($factory->city); ?></td>
                    <td><?php echo $factory->locality($factory->city); ?></td>
                    <td><?php echo str_replace("\n", "<br>", $factory->fullAddressString); ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <hr>

    <div class="code">
        <code>
            require_once '../src/autoload.php';<br>
            use RandomDataGenerator\Factory;<br><br>

            $factory = Factory::create();<br>

            echo $factor->street;<br>
            echo $factor->city;<br>
            echo $factor->administrativeArea($factory->city); <span class="comment">// Will randomly picked a city if one is not passed</span> <br>
            echo $factor->locality($factory->city); <span class="comment">// Will randomly picked a city if one is not passed</span><br>
            echo str_replace("\n", "&lt;br&gt;", $factory->fullAddressString); <span class="comment">// str_replace() is simply just for replacing new line character for HTML break line element</span>
        </code>
    </div>
</body>
</html>
