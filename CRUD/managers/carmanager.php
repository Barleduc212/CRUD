<?php

    require_once "database.php";

    class carmanager {
        public function getAll() {
            global $con;

            $stmt = $con->prepare("SELECT * FROM car");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }

?>