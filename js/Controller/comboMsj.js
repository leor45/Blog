app.controller('ComboMCtrl',function($scope,$http){
    	$scope.ComboMensaje = function(){
		$http.get('../modules/comboM.php').then(function(data) { 
		    $scope.ComboM = data.data;
		    console.log(data);
		}).catch(function(err){
		    console.log(err);
		});
	}
    $scope.ComboMensaje();
});