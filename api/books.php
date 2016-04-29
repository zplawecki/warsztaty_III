<?php

require './src/book.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case $GET:
        if ($GET < 1) { //pokaz wszystkie ksiazki
            $sql = ("SELECT id FROM books");
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $ksiazki = [];
                while ($row = $result->fetch_assoc()) {
                    $ksiazki[] = (new Book())->loadFromDB($conn, $row['id'])->getBook();
                }
                echo json_encode($ksiazki);
            };
        }

    case $POST:

    case $PUT:

    case $DELETE:
}
?>