$(function () {
    $('#show').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            type: 'GET',
            url: 'api/books.php',
            success: function (books) {
                $.each(books, function (i, books) {
                    $('#bookInfo').append('<li>autor: ' + data.author + ', name: ' + data.name + ', opis: ' + data.descr + '<button data-id=' + data.id + ' class="remove">X</button></li>');
                });
            },
            error: function () {
                alert('blad wyswietlania ksiazek');
            }
        });
    });
    $('#send').on('click', function (event) {
        event.preventDefault();
        var Book = {
            name: $('#name').val(),
            author: $('#author').val(),
            description: $('#descr').val(),
            id: $('#id').val()
        };
        $.ajax({
            type: 'POST',
            url: 'api/books.php',
            data: {name: 'ksiazka_1', author: 'autor_nieznany', description: 'opis_1'},
            success: function (data) {
                alert("Ksiazka dodana", data);
            },
            error: function () {
                alert('blad dodawania ksiazek');
            }
        });
    });
    $.ajax({
        type: 'GET',
        url: 'api/books.php',
        success: function (data) {
            alert("Dane ksiazki:", data);
        }
    });
    $.ajax({
        type: 'PUT',
        data: {name: 'ksiazka_1', author: 'autor_nieznany', description: 'opis_2'},
        url: 'api/books.php',
        success: function () {
            alert('Aktualizacja ksiazki powiodla sie!');
        }
    });
    $('.remove').on('click', function () {
        var $li = $(this).closest('li');
        $.ajax({
            type: 'DELETE',
            url: 'api/books.php' + $(this).attr('data-id'),
            success: function () {
                $li.remove();
                alert('Usuniecie ksiazki powiodlo sie!');
            }
        });
    });
});

   