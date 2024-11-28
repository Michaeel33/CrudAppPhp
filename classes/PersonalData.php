<?php

class PersonalData {
    private $conn;
    private $table_name = "personaldata";

    public $perId;
    public $firstname;
    public $lastname;
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


    public function readOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE perId = :perId LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":perId", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($row) {
            $this->perId = $row['perId'];
            $this->firstname = $row['firstname'];
            $this->lastname = $row['lastname'];
            $this->ulica = $row['ulica'];
            $this->mesto = $row['mesto'];
            $this->psc = $row['psc'];
        }

        return $row;
    }


    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (firstname, lastname, ulica, mesto, psc) 
                  VALUES (:firstname, :lastname, :ulica, :mesto, :psc)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
        $stmt->bindParam(":ulica", $this->ulica);
        $stmt->bindParam(":mesto", $this->mesto);
        $stmt->bindParam(":psc", $this->psc);

        return $stmt->execute();
    }


    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET firstname=:firstname, lastname=:lastname, ulica=:ulica, mesto=:mesto, psc=:psc 
                  WHERE perId=:perId";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":perId", $this->perId);
        $stmt->bindParam(":firstname", $this->firstname);
        $stmt->bindParam(":lastname", $this->lastname);
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
