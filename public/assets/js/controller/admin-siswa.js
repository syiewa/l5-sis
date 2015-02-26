angular.module('admin').controller('siswa', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var kelas_id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/kelas/') + kelas_id + '/siswa').success(function(data) {
        $scope.data = data;
        $scope.totalItems = $scope.data.length;
        $scope.currentPage = 1;
        $scope.numPerPage = 5;
        // fungsi sorting data ASC/DESC
        $scope.paginate = function(value) {
            var begin, end, index;
            begin = ($scope.currentPage - 1) * $scope.numPerPage;
            end = begin + $scope.numPerPage;
            index = $scope.data.indexOf(value);
            return (begin <= index && index < end);
        };
        $scope.$watch('query', function(query) {
            $scope.data = data;
            $scope.data = $filter('filter')($scope.data, $scope.query);
            $scope.totalItems = $scope.data.length;
            $scope.currentPage = 1;
            $scope.numPerPage = 15;
        }, true);
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/kelas/') + kelas_id + '/siswa/' + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/kelas/') + kelas_id + '/siswa').success(function(data) {
                        $scope.data = data;
                        $scope.alerts.push({type: 'success', msg: 'Data Berhasil Dihapus'});
                        $timeout(function() {
                            $scope.alerts = [];
                        }, 5000);
                    })
                }
            });
        }
    }
});
angular.module('admin').controller('siswacreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(6);
    $scope.data['id_kelas'] = id;
    $scope.kelas = {};
    $http.get(baseURL.url('api/kelasdropdown')).success(function(data) {
        $scope.kelas = data;
    });
    $scope.submit = function() {
        $http.post(baseURL.url('admin/kelas/') + id + '/siswa', $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/kelas/') + $scope.data['id_kelas'] + '/siswa');
            }
        }).error(function(e, status) {
            if (status === 422) {
                var x;
                for (x in e) {
                    $scope.alerts.push({'type': "danger", 'msg': (e[x][0])});
                }
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            }
        });
    }
});
angular.module('admin').controller('siswaedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var kelas_id = $filter('_uriseg')(6);
    var id = $filter('_uriseg')(8);
    $http.get(baseURL.url('api/siswa/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.kelas = {};
    $http.get(baseURL.url('api/kelasdropdown')).success(function(data) {
        $scope.kelas = data;
    });
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/kelas/') + kelas_id + '/siswa/' + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/kelas/') + $scope.data['id_kelas'] + '/siswa');
                }, 3000);
            }
        }).error(function(e, status) {
            if (status === 422) {
                var x;
                for (x in e) {
                    $scope.alerts.push({'type': "danger", 'msg': (e[x][0])});
                }
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            }
        });
    }
});
