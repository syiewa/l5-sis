var app = angular.module('admin', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.controller('datastatis', function($scope, $http, $filter) {
    $scope.data = {};
    $http.get('api/datastatis').success(function(data) {
        $scope.data = data;
    })
});