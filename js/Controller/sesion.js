    $("#InicioS").submit(function (event) {
        event.preventDefault();
        var log = $("#log").val();
        var pass = $("#password").val();
        console.log(log);
        $.ajax({
            url: "../modules/sesion.php",
            type: "post",
            dataType: "json",
            data: {
                "login": log,
                "pass": pass
            },
        }).done(function (data) {
            if (mensajes != "") {
                // location.reload();
            } 
        }).fail(function (errorThrown, StatusText) {
            console.log(errorThrown.responseText);
        });
    });