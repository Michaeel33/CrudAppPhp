<?php

class PersonalData {
    private $conn;
    private $table_name = "personaldata";

    public $perId;
    public $firstName;
    public $lastName;
    public $ulica;
    public $mesto;
    public $psc;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (firstName, lastName, ulica, mesto, psc) 
              VALUES (:firstName, :lastName, :ulica, :mesto, :psc)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":ulica", $this->ulica);
        $stmt->bindParam(":mesto", $this->mesto);
        $stmt->bindParam(":psc", $this->psc);

        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET firstName=:firstName, lastName=:lastName, ulica=:ulica, mesto=:mesto, psc=:psc WHERE perId=:perId";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":perId", $this->perId);
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":ulica", $this->ulica);
        $stmt->bindParam(":mesto", $this->mesto);
        $stmt->bindParam(":psc", $this->psc);

        return $stmt->execute();
    }

    public function delete() {

        $query = "DELETE FROM " . $this->table_name . " WHERE perId = :perId";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(":perId", $this->perId);


        return $stmt->execute();
    }
}
