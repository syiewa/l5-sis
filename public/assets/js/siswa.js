var app = angular.module('siswa', ['ui.bootstrap'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.factory('baseURL', function() {
    return {
        url: function(url) {
            return 'http://laravel.dev/' + url;
        }
    };
});
app.filter('_uriseg', function($location) {
    return function(segment) {
        var query = $location.absUrl().replace('http://laravel.dev', "");
        var data = query.split("/");
        if (data[segment - 1]) {
            return data[segment - 1];
        }
        return false;
    }
});
angular.module('siswa').controller('kelas', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.kelas = {};
    $scope.data = {};
    $scope.show = false;
    $http.get(baseURL.url('api/kelasdropdown')).success(function(data) {
        $scope.kelas = data;
    });
    $scope.submit = function() {
        $scope.show = true;
        $http.get(baseURL.url('api/ambilsiswa/'+$scope.data['id_kelas'])).success(function(e){
            
            $scope.telo = e;
        })
    }

});