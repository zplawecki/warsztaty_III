$(function () {

    $.ajax({
        dataType: "json",
        url: 'api/books.php',
        success: function (data) {
            $.each(data, function (i, book) {

            });
        }
    });
});

   