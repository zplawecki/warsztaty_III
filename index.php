<html>
    <head>
        <title>Formularz dla wypozyczalni</title>
        <link rel='stylesheet' href='css/style.css' />
        <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        <script src="api/js/app.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Lista ksiazek:</h2>
        <ul id="ksiazki">
<!--        <template id="ksiazki-template">-->
            <li>
            <p>Tytul </p>  
            <p>Autor </p>       
            <p>Opis  </p>     
            <button data-id="$id" class="remove"></button>
            </li>
<!--        </template>-->


        </ul>
        <form id="addBook">
            <p>Dodaj nowa ksiazke:</p>
            <label>Tytul</label><br>
            <input type="text" id="name" name="name"><br>
            <label>Autor</label><br>
            <input type="text" id="author" name="author"><br>
            <label>Opis</label><br>
            <textarea id="descr" name="descr"></textarea><br>
            <input id="send" type="submit" value="Wyslij">
            <input id="show" type="submit" value="Wyswietl wszystkie">
        </form><br><br>
        <label>Info o ksiazce:</label>
        <div id="bookInfo">



        </div>




    </body>
</html>

