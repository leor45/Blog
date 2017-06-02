app.controller('MsjCtrl', function ($scope, $http) {

    $scope.Sort = function (val) {
        if ($scope.sort == val) {
            $scope.reverse = !$scope.reverse;
        }
        $scope.sort = val;
        $('th a').each(function () {
            $(this).removeClass().addClass('icon-sort');
        });

    };

    $scope.currentPage = 0;
    $scope.pageSize = 7;
    $scope.mm = [];

    $scope.msj = function () {
        $http.get('../modules/mensajes.php').then(function (data) {
            $scope.mm = data.data;
            console.log(data);
        }).catch(function (err) {
            console.log(err);
        });
    }
    $scope.msj();
    $scope.numberOfPages = function () {
        return Math.ceil($scope.mm.length / $scope.pageSize);
    }
    $("#IgrM").submit(function (event) {
        event.preventDefault();
        var mensaje = $("#envM").val();
        $.ajax({
            url: "../modules/igrM.php",
            type: "post",
            dataType: "json",
            data: {
                "msj": mensaje
            },
        }).done(function (data) {
            if (mensaje != "") {
                $scope.msj();
                $("#envM").val('');
                $("#envM").attr("placeholder", 'Escriba su mensaje...');
            } else {
                $("#envM").attr("placeholder", 'No ingreso ningun mensaje.. Por favor intente de nuevo.');
            }

        }).fail(function (errorThrown, StatusText) {
            console.log(errorThrown.responseText);
        });
    });

    $("#modM").submit(function (event) {
        event.preventDefault();
        var mensajes = $("#msjN").val();
        var id = $("#opc").val();
        $.ajax({
            url: "../modules/modificarM.php",
            type: "post",
            dataType: "json",
            data: {
                "mensajes": mensajes,
                "opcion": id
            },
        }).done(function (data) {
            if (mensajes != "") {
                location.reload();
            } 
        }).fail(function (errorThrown, StatusText) {
            console.log(errorThrown.responseText);
        });
    });
});