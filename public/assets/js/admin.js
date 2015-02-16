var app = angular.module('admin', ['ui.bootstrap', 'angularFileUpload'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
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
app.controller('datastatis', function($scope, $http, $filter, $timeout) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get('http://laravel.dev/api/datastatis').success(function(data) {
        $scope.data = data;
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete('http://laravel.dev/admin/datastatis/' + id).success(function(data) {
                if (data.success) {
                    $http.get('http://laravel.dev/api/datastatis').success(function(data) {
                        $scope.data = data;
                        $scope.alerts.push({type: 'success', msg: data.msg});
                        $timeout(function() {
                            $scope.alerts = [];
                        }, 5000);
                    })
                }
            });
        }
    }
});
app.controller('datastatiscreate', function($scope, $http, $filter) {
    $scope.data = {};
    $scope.menu = {};
    $http.get('http://laravel.dev/api/menu').success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function() {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.post('http://laravel.dev/admin/datastatis', $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace('../datastatis');
            }
        });
    }
});
app.controller('datastatisedit', function($scope, $http, $filter, $timeout) {
    $scope.menu = {};
    $scope.data = {};
    $http.get('http://laravel.dev/api/menu').success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function(id) {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.put('http://laravel.dev/admin/datastatis/' + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace('http://laravel.dev/');
                }, 3000);
            }
        });
    }
});

app.controller('databerita', function($scope, $http, $filter, $timeout) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get('http://laravel.dev/api/berita').success(function(data) {
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
            $http.delete('http://laravel.dev/admin/berita/' + id).success(function(data) {
                if (data.success) {
                    $http.get('http://laravel.dev/api/berita').success(function(data) {
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
app.controller('beritacreate', function($scope, $http, $filter, $compile, $upload) {
    $scope.data = {};
    $scope.submit = function() {
        $scope.data['isi'] = CKEDITOR.instances.editor1.getData();
        $upload.upload({
            url: 'http://laravel.dev/admin/berita',
            method: 'POST',
            file: $scope.data.foto,
            data: $scope.data
        }).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace('http://laravel.dev/admin/berita');
                }, 3000);
            }
        });
    }
});
app.controller('beritaedit', function($scope, $http, $filter, $timeout, $upload) {
    $scope.data = {}
    var id = $filter('_uriseg')(4);
    $http.get('http://laravel.dev/api/berita/' + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $scope.data['isi'] = CKEDITOR.instances.editor1.getData();
        if ($scope.data.foto) {
            $upload.upload({
                url: 'http://laravel.dev/admin/berita',
                method: 'POST',
                file: $scope.data.foto,
                data: $scope.data
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace('http://laravel.dev/admin/berita');
                    }, 3000);
                }
            });
        } else {
            $http.put('http://laravel.dev/admin/berita/' + id, $scope.data).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace('http://laravel.dev/admin/berita');
                    }, 3000);
                }
            })
        }
    }
});