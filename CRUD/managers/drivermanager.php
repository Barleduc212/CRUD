<?php

    require_once "database.php";

    class drivermanager {
        public function getAll() {
            global $con;

            $stmt = $con->prepare("SELECT 
                                        driver.id,
                                        driver.firstname,
                                        driver.lastname,
                                        driver.age,
                                        car.name as car
                                    FROM
                                        driver
                                        LEFT JOIN car ON driver.car_id = car.id");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function getById($id) {
            global $con;

            $stmt = $con->prepare("SELECT * FROM car WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }

        public function insert($firstname, $lastname, $age, $car_id) {
            global $con;

            $stmt = $con->prepare("INSERT INTO driver(firstname, lastname, age, car_id) VALUES (?,?,?,?)");
            $stmt->bindValue(1, $firstname);
            $stmt->bindValue(2, $lastname);
            $stmt->bindValue(3, $age);
            $stmt->bindValue(4, $car_id);

            $stmt->execute();
        }

        public function update($id, $firstname, $lastname, $age, $car_id) {
            global $con;

            $stmt = $con->prepare("UDPATE driver SET firstname=?, lastname=?, age=?, car_id=?) where id = ?");
            $stmt->bindValue(1, $firstname);
            $stmt->bindValue(2, $lastname);
            $stmt->bindValue(3, $age);
            $stmt->bindValue(4, $car_id);
            $stmt->bindValue(5, $id);

            $stmt->execute();
        }

        public function delete($id) {
            global $con;

            $stmt = $con->prepare("DELETE FROM driver WHERE id = ?");
            $stmt->bindValue(1, $id); 

            $stmt->execute();
        }
    }

?>