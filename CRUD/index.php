<?php

    require_once "managers/drivermanager.php";

    $pm = new drivermanager();
    $drivers = $pm->getAll();

    if(isset($GET["driverid"])) {
        $pm->delete($_GET["driverid"]);

        header("location:index.php");
        exit();
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <a class="m-2 float-right btn btn-primary" href="adddriver.php">Add</a>
        <h1>driveren</h1>

        <table class="table table-striped">
            <thead class="table-dark">
                <th>Id</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Age</th>
                <th>Auto</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                foreach($drivers as $driver) {
                    echo "<tr>";
                        echo "<td>$driver->id</td>";
                        echo "<td>$driver->firstname</td>";
                        echo "<td>$driver->lastname</td>";
                        echo "<td>$driver->age</td>";
                        echo "<td>$driver->car</td>";
                        echo "<td><a href='editdriver.php?driverid=$driver->id'>Edit</a></td>";
                        echo "<td><a href='index.php?driverid=$driver->id'>Delete</a></td>";
                    echo "</tr>";
                }
            </tbody>
        </table>
    </body>
</html>