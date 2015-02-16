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
app.controller('datastatiscreate', function($scope, $http, $filter) {
    $scope.data = {};
    $scope.menu = {};
    $http.get('../api/menu').success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function() {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.post('/datastatis', $scope.data).success(function(data) {
            console.log(data);
        });
    }
});