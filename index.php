<html>
    <head>
        <title>Formularz dla wypozyczalni</title>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        <script src="api/js/app.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="addBook">
            <label>Tytul</label><br>
            <input type="text" id="name" name="name"><br>
            <label>Autor</label><br>
            <input type="text" id="author" name="author"><br>
            <label>Opis</label><br>
            <textarea id="descr" name="descr"></textarea><br>
            <input id="send" type="submit" value="Wyslij">
            <input id="show" type="submit" value="Wyswietl wszystkie">
        </form><br><br>
        <div id="bookInfo">
            <label>Info o ksiazce:</label>
            <p id="pBookInfo"></p>

        </div>


  

    </body>
</html>


<?php
//link: http://localhost/testphp/warsztaty/index.php
?>