angular.module('admin').controller('agenda', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/agenda')).success(function(data) {
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
            $scope.numPerPage = 5;
        }, true);
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/agenda/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/agenda')).success(function(data) {
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
angular.module('admin').controller('agendacreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.mulai = false;
    $scope.selesai = false;
    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };
    $scope.submit = function() {
        $scope.data['isi'] = CKEDITOR.instances.isi.getData();
        $scope.data['keterangan'] = CKEDITOR.instances.keterangan.getData();
        $http.post(baseURL.url('admin/agenda'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/agenda'));
            }
        }).error(function(e,status) {
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
angular.module('admin').controller('agendaedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.mulai = false;
    $scope.selesai = false;
    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };
    var id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/agenda/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $scope.data['isi'] = CKEDITOR.instances.isi.getData();
        $scope.data['keterangan'] = CKEDITOR.instances.keterangan.getData();
        $http.put(baseURL.url('admin/agenda/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/agenda'));
                }, 3000);
            }
        }).error(function(e,status) {
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