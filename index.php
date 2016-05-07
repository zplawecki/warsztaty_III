<html>
    <head>
        <title>Formularz dla wypozyczalni</title>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
        <script src="js/app.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form id="addBook">
            <label>Tytul</label><br>
            <input type="text" id="title" name="title"><br>
            <label>Autor</label><br>
            <input type="text" id="author" name="author"><br>
            <label>Opis</label><br>
            <textarea id="descr" name="descr"></textarea><br>
            <input type="submit" value="Wyslij">

        </form><br><br>
        <div id="bookInfo">
            <label>Info o ksiazce:</label>


        </div>


        <script>
            $(function () {
                var $tytul = //zmienna przechowujaca tytul ksiazki
                        $tytul.on('click', function () {
                            //rozwin div
$('#bookInfo').slideDown(300, );
                            //wyslij ajax
                            $.ajax({
                                dataType: "json",
                                url: 'api/books.php?id=1',
                                success: function (data) {
                                    $.each(data, function (i, book) {

                                    });
                                }
                            });
                        });



            });



        </script>

    </body>
</html>


<?php
//link: http://localhost/testphp/warsztaty/index.php
?>