<?php
require './src/book.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case $_GET:
        if ($_GET < 1) { //pokaz wszystkie ksiazki
            $sql = ("SELECT id FROM books");
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $ksiazki = [];
                while ($row = $result->fetch_assoc()) {
                    $ksiazki[] = (new Book())->loadFromDB($conn, $row['id'])->getBook();
                }
                echo json_encode($ksiazki);
            };
        } else {
            $id = $_GET['id'];
            $book = new Book();
            $book->loadFromDB($conn, $id);
            echo json_encode($book->getBook());
        }
        break;

    case $_POST: //utworzenie jednego elementu
        $name = $_POST['name'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $book = new Book();
        $result = $book->create($conn, '', '', '');
        $answer = ['status' => !!$result]; //zaprzeczenie zaprzeczenia
        echo json_encode($answer);
        break;
    
    case PUT: //aktualizacja jednego elementu
        $id = $_GET['id'];
        //pobranie danych
        parse_str(file_get_contents('php://input'), $put_vars); //tworzymy pseudoplik z danymi, ktore chcemy pobrac (id, name, itp.), odczytujemy jego zawartosc i tworzymy z niej tablice, $put_vars odtad przechowuje dzieki temu wszystkie przeslane wartosci

        $id = $put_vars['id'];
        $name = $put_vars['name'];
        $author = $put_vars['author'];
        $description = $put_vars['description'];

        $book = new Book();
        $book->loadFromDB($conn, $id);
        $res = $book->update($conn, $name, $author, $description, $id);
        //wyswietlamy status i koniec

        break;

    case $_DELETE:
        //usuniecie jednego elementu, np. z linka z  id DELETE books.php?id=3
        $id = $_GET['id'];
        $book = new Book();
        $book->loadFromDB($conn, $id);
        $result = $book->deleteFromDB($conn);
        $answer = ['status' => !!$result];
        echo json_encode($answer);
        break;
}
?>