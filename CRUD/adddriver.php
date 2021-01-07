<?php
    require_once "managers/carmanager.php";
    require_once "managers/drivermanager.php";

    $cm = new carmanager();
    $countries = $cm->getAll();

    if($_POST) {
        $pm = new drivermanager();
        $pm->insert($_POST["firstname"],$_POST["lastname"],$_POST["age"],$_POST["car_id"]);
    }
?>

<html>
    <body>
        <form method="post">
            FirstName: <input type="text" name="firstname" /> <br/>
            LastName: <input type="text" name="lastname" /> <br/>
            Age: <input type="number" name="age" /> <br/>
            Car:
            <select name="car_id">
                <?php 
                    foreach($countries as $car) {
                        echo "<option value='$car->id'>$car->name</option>";
                    }
                ?>
            </select><br/><br/>
            <input class="btn btn-primary" type="button" value="Opslaan">
        </form>
    </body>
</html>