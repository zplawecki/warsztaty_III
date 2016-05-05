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
        break;

    case $POST: //utworzenie jednego elementu
        $book = new Book ();
        $result = $book->create($conn, '', '', '');
        $answer = ['status' => !!$result]; //zaprzeczenie zaprzeczenia
        echo json_encode($answer);


        break;
    case $PUT: //aktualizacja jednego elementu
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

    case $DELETE:
        //usuniecie jednego elementu, np. z linka z  id DELETE books.php?id=3
        $id = $_GET['id'];
        $book = Book();
        $book->loadFromDB($conn, $id);
        $result = $book->deleteFromDB($conn);
        $answer = ['status' => !!$result];
        echo json_encode($answer);
        break;
}
?>

<script>
    var name = $('#name').val();
    var author = $('#author').val();
    var description = $('#description').val();
    var id = $('#id').val();
    
    $.ajax({
        //jakiestam opcje...
        data:{
            "id": $id;
            "name": $name;
            "author": $author;
            "description": $description;
        };
        success:function(data){
            var id = data.id;
            var name = data.name;
            var author = data.author;
            var desc = data.desc;
        }
    }

//1. Lista wszystkich.
//
//- Wysłanie po DOMContentLoaded AJAX-a do adresu GET /api/books.php
//- W callback-u success mamy jako parametr wszystkie książki
//- Iterujemy po nich pętlą i dodajemy elementy HTML na stronę (np. append(), after(), html(), do wyboru)
//
//
//2. Formularz do tworzenia nowych.
//
//- Na górze strony ma być formularz do tworzenia
//- Dodajemy w DOMConentLoaded event na przycisk wysyłający
//- Przycisk po kliknięciu ma zablokować domyślne działanie i wykonać kod:
//- Pobieramy wartości z formularza (za pomocą val()) i zapisujemy do zmiennych
//- Wywołujemy AJAX na POST /api/books.php
//
//
//3. Rozwinięcie informacji o wybranej książce + formularz do jej edycji.
//
//- Dodać jakiś przycisk "dodaj więcej" do kazdego elementu dodanego w punkcie 1.
//- Każdy przycisk ma mieć dodany event z następującą funkcją:
//- Pobierz szczegółowe dane o książce przez GET /api/books.php?id=XYZ
//- Skąd wziąć XYZ? Przy zadaniu 1. możemy gdzieś dodać ukryty element lub data id na czymś, żeby kazdy element miał zapisany jakiego id dotyczy
//- W callbacku na success dostajemy data, który jest informacjami o książce, w tym momencie go wyświetlamy (np. append(), after(), html()). Wyświetlamy też formularz do edycji. Pamiętamy, żeby formularz nie miał pól z ID! Tylko z klasą! Bo jak otworzymy npo. 3 książki to byśmy mieli 3 razy to samo ID.
//- Taki formularz ma mieć przycisk, do którego podpięty jest event
//- Event zczytuje dane z AKTUALNEGO formularza, zapisuje do zmiennych
//- Wysyła zmienne + ID książki na adres PUT /api/books.php
//
//
//4. Przycisk do usuwania.
//
//- Znowu modyfikujemy punkt 1.
//- Modyfikacja delikatna: dodajemy przycisk
//- Na przycisku event na DELETE /api/books.php?id=XYZ

</script>