angular.module('admin').controller('foto', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var galeri_id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/galeri/') + galeri_id + '/foto').success(function(data) {
        $scope.data = data;
        if (data[0]) {
            $scope.title = data[0]['galeri'].nama_album;
        }
        $scope.totalItems = $scope.data.length;
        $scope.currentPage = 1;
        $scope.numPerPage = 4;
        // fungsi sorting data ASC/DESC
        $scope.paginate = function(value) {
            var begin, end, index;
            begin = ($scope.currentPage - 1) * $scope.numPerPage;
            end = begin + $scope.numPerPage;
            index = $scope.data.indexOf(value);
            return (begin <= index && index < end);
        };
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/galeri/') + galeri_id + '/foto/' + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/galeri/') + galeri_id + '/foto').success(function(data) {
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
angular.module('admin').controller('fotocreate', function($scope, $http, $filter, $timeout, $upload, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(6);
    $scope.data['id_album'] = id;
    $scope.galeri = {};
    $http.get(baseURL.url('api/galeridropdown')).success(function(data) {
        $scope.galeri = data;
    });
    $scope.submit = function() {
        if ($scope.data.foto) {
            $upload.upload({
                url: baseURL.url('admin/galeri/' + id + '/foto'),
                method: 'POST',
                file: $scope.data.foto,
                data: $scope.data.id_album
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/galeri/' + id + '/foto'));
                    }, 3000);
                }
            });
        } else {
            $http.post(baseURL.url('admin/galeri/') + id + '/foto', $scope.data).success(function(data) {
                if (data.success) {
                    window.location.replace(baseURL.url('admin/galeri/') + $scope.data['id_album'] + '/foto');
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
angular.module('admin').controller('fotoedit', function($scope, $http, $filter, $timeout, $upload, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var galeri_id = $filter('_uriseg')(6);
    var id = $filter('_uriseg')(8);
    $http.get(baseURL.url('api/foto/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.galeri = {};
    $http.get(baseURL.url('api/galeridropdown')).success(function(data) {
        $scope.galeri = data;
    });
    $scope.submit = function() {
        if ($scope.data.foto) {
            $upload.upload({
                url: baseURL.url('admin/galeri/' + galeri_id + '/foto'),
                method: 'POST',
                file: $scope.data.foto,
                data: $scope.data
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/galeri/' + galeri_id + '/foto'));
                    }, 3000);
                }
            });
        } else {
            $http.put(baseURL.url('admin/galeri/' + galeri_id + '/foto/' + id), $scope.data).success(function(data) {
                if (data.success) {
                    window.location.replace(baseURL.url('admin/galeri/') + $scope.data['id_album'] + '/foto');
                }
            }).error(function(e) {
                var x;
                for (x in e) {
                    $scope.alerts.push({'type': "danger", 'msg': (e[x][0])});
                }
                $timeout(function() {
                    $scope.alerts = [];
                }, 5000);
            });
        }
    }
});