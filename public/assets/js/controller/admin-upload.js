angular.module('admin').controller('upload', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/upload')).success(function(data) {
        $scope.data = data;
        $scope.totalItems = $scope.data.length;
        $scope.currentPage = 1;
        $scope.numPerPage = 5;
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
            $http.delete(baseURL.url('admin/upload/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/upload')).success(function(data) {
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
angular.module('admin').controller('uploadcreate', function($scope, $http, $filter, $timeout, $upload, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        if ($scope.data.file) {
            $upload.upload({
                url: baseURL.url('admin/upload'),
                method: 'POST',
                file: $scope.data.file,
                data: $scope.data.judul_upload
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/upload'));
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
        } else {
            $http.post(baseURL.url('admin/upload'), $scope.data).success(function(data) {
                if (data.success) {
                    window.location.replace(baseURL.url('admin/upload'));
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
    }
});

angular.module('admin').controller('uploadedit', function($scope, $http, $filter, $timeout,$upload, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/upload/') + id).success(function(data) {
        $scope.data = data;
        $scope.data['judul_file'] = data.judul_file;
    });
    $scope.submit = function() {
        if ($scope.data.file) {
            $upload.upload({
                url: baseURL.url('admin/upload/update'),
                method: 'POST',
                file: $scope.data.file,
                data: $scope.data
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/upload'));
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
        } else {
            $http.put(baseURL.url('admin/upload/'+id), $scope.data).success(function(data) {
                if (data.success) {
                    window.location.replace(baseURL.url('admin/upload'));
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
    }
});