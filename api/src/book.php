<?php

$conn = new mysqli('localhost', 'root', '', 'exercises_db');

if ($conn->connect_error) {
    die('Komunikat bledu: ' . $conn->connect_error);
}

class Book {

    private $name;
    private $author;
    private $description;
    private $id;

    public function _construct() {
        $this->name = '';
        $this->author = '';
        $this->description = '';
        $this->id = -1;
    }

    public function loadFromDB(&$conn, $id) {
        if (!is_Numeric($id) || $id < 1) {
            return false;
        };
        $sql = "SELECT * FROM books WHERE id = $id";
        $result = $conn->query($sql);
        if (count($result->num_rows) !== 1) {
            return false;
        }
        $linia = $result->fetch_assoc();
        $this->id = $id;
        $this->name = $linia['name'];
        $this->author = $linia['author'];
        $this->description = $linia['desription'];
        
        return $this;
    }

    public function create(&$conn, $name, $author, $description) {
        if (!isString($name) || !isString($author) || !isString($description)) {
            return false;
        }
        $sql = "INSERT INTO books(name, author, description) VALUES "
                . "('" . addslashes($name) . "', '" . addslashes($author) . "', '" . addslashes($description) . "')";
        $result = $conn->query($sql);
        $this->id = $conn->$insert_id();

        $this->name = 'id';
        $this->author = 'author';
        $this->description = 'description';
    }

    public function update(&$conn, $name, $author, $description) {
        if ($this->id < 1) {
            return false;
        }
        $sql = "UPDATE books SET (name=" . addslashes($name) . ", author=" . addslashes($author) . ", description=" . $description . ") WHERE id=$this->id";

        $result = $conn->query($sql);
        $this->id = $conn->$insert_id();

        $this->name = 'id';
        $this->author = 'author';
        $this->description = 'description';
    }

    public function deleteFromDB($conn) {
        if ($this->id == 1) {
            return false;
        }
        $sql = "DELETE FROM books WHERE id=$this->id";
        $result = $conn->query($sql);
    }
    public function getBook() {
        if ($this->id == 1) {
            return false;
        
}
    return array(
        'id' => $this->id,
        'name' => $this->name,
        'author' => $this->author,
        'description' => $this->description
    );
    }
}
?>

