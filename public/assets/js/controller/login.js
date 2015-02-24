/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

angular.module('admin').controller('login', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $http.post('login', $scope.data).success(function(e) {
            if (e.success) {
                $scope.alerts.push({'type': "success", 'msg': e.msg});
                if (e.user.status == 'admin') {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin'));
                    }, 2000);
                } else {
                    $timeout(function() {
                        window.location.replace(baseURL.url('guru'));
                    }, 2000);
                }
            } else {
                $scope.alerts.push({'type': "danger", 'msg': e.msg});
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            }
        }).error(function(e, status) {
            if (status == 422) {
                var x;
                for (x in e) {
                    $scope.alerts.push({'type': "danger", 'msg': (e[x][0])});
                }
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            }
        });
    };
});
