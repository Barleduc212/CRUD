<?php
    require_once "managers/drivermanager.php";
    require_once "managers/carmanager.php";

    $pm = new drivermanager();
    $driver = $pm->getById($_GET["driverid"]);

    $cm = new carmanager();
    $cars = $cm->getAll();

    if($_POST) {
        $pm->update(
            $_GET["driverid"],
            $_POST["firstname"],
            $_POST["lastname"],
            $_POST["age"],
            $_POST["car_id"]
        );
    }
?>

<html>
    <body>
        <form method="post">
            FirstName: <input type="text" name="firstname" value="<?php echo $driver->firstname; ?>"/> <br/>
            LastName: <input type="text" name="lastname" value="<?php echo $driver->lastname; ?>"/> <br/>
            Age: <input type="number" name="age" value="<?php echo $driver->age; ?>"/> <br/>
            Car:
            <select name="car_id">
                <?php 
                    foreach($countries as $car) {
                        if($car->id == $driver->car_id) {
                            echo "<option selected value='$car->id'>$car->name</option>";
                        }
                        else {
                            echo "<option value='$car->id'>$car->name</option>";
                        }
                    }
                ?>
            </select><br/><br/>
            <input class="btn btn-primary" type="button" value="Save">
        </form>
    </body>
</html>