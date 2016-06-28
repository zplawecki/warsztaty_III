$(function () {

    $('#show').on('click', function (event) {
        event.preventDefault();

        $.ajax({
            type: 'GET',
            url: 'api/books.php',
            success: function (books) {
                $.each(books, function (i, book) {
                    positions.append('<li>autor: ' + book.author + ', name: ' + book.name + ', opis: ' + book.descr + '<button data-id=' + book.id + ' class="remove">X</button></li>');
                });
            },
            error: function () {
                alert('Blad wyswietlania ksiazek');
            }
        });
    });
    $('#send').on('click', function (event) {
        event.preventDefault();
        var book = {
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

    $('#ksiazki').delegate('.editBook', 'click', function () {
        event.preventDefault();
        var $li = $(this).closest('li');
        $li.find('input.name').val($li.find('span.name').html());
        $li.find('input.author').val($li.find('span.author').html());
        $li.find('input.descr').val($li.find('span.descr').html());
        $li.addClass('edit');
    });
    $('#ksiazki').delegate('.cancelEdit', 'click', function () {
        event.preventDefault();
        $(this).closest('li').removeClass('edit');
    });
    $('#ksiazki').delegate('.saveEdit', 'click', function () {
        event.preventDefault();
        var $li = $(this).closest('li');
        var book = {
            name: $('#name').val(),
            author: $('#author').val(),
            description: $('#descr').val(),
            id: $('#id').val()
        };
        $.ajax({
            type: 'PUT',
            data: {name: 'ksiazka_1', author: 'autor_nieznany', description: 'opis_2'},
            url: 'api/books.php' + li.attr('data-id'),
            data: Book,
                    success: function () {
                        $li.find('span.name').html(book.name);
                        $li.find('span.author').html(book.author);
                        $li.find('span.descr').html(book.descr);
                        $li.removeClass('edit');
                        alert('Aktualizacja ksiazki powiodla sie!');
                    },
            error: function () {
                alert('Blad przy aktualizacji ksiazki');
            }
        });
    });
    $('#ksiazki').delegate('.remove', 'click', function () {
        event.preventDefault();
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

   