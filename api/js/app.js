$.ajax('api/books.php', {dataType: "json", success: function (dane) {
        console.log(dane.niebieski);

    }});