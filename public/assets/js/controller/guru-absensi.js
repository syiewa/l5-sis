/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
angular.module('admin').controller('absensi', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.kelas = {};
    $scope.date = [];
    $scope.tahun = [];
    $scope.bulan = [
        {'id': 1, 'label': 'Januari'},
        {'id': 2, 'label': 'Februari'},
        {'id': 3, 'label': 'Maret'},
        {'id': 4, 'label': 'April'},
        {'id': 5, 'label': 'Mei'},
        {'id': 6, 'label': 'Juni'},
        {'id': 7, 'label': 'July'},
        {'id': 8, 'label': 'Agustus'},
        {'id': 9, 'label': 'September'},
        {'id': 10, 'label': 'Oktober'},
        {'id': 11, 'label': 'November'},
        {'id': 12, 'label': 'Desember'},
    ];
    var dateobj = new Date();
    $scope.data['kelas'] = 1;
    $scope.data['bulan'] = dateobj.getMonth() + 1; // 3  (0 = January, 3 = April)
    $scope.data['tanggal'] = dateobj.getDate();  // 28
    $scope.data['tahun'] = dateobj.getFullYear(); // 6
    for (var i = 1; i < 32; i++) {
        var tanggal = {'id': i, 'label': i};
        $scope.date.push(tanggal);
    }
    for (var t = dateobj.getFullYear() - 5; t <= dateobj.getFullYear(); t++)
    {
        var tahun = {'id': t, 'label': t};
        $scope.tahun.push(tahun);
    }
    $http.get(baseURL.url('api/kelasdropdown')).success(function(data) {
        $scope.kelas = data;
    });
});

angular.module('admin').controller('absensicreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
});
angular.module('admin').controller('absensiedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.date = [];
    $scope.tahun = [];
    $scope.bulan = [
        {'id': 1, 'label': 'Januari'},
        {'id': 2, 'label': 'Februari'},
        {'id': 3, 'label': 'Maret'},
        {'id': 4, 'label': 'April'},
        {'id': 5, 'label': 'Mei'},
        {'id': 6, 'label': 'Juni'},
        {'id': 7, 'label': 'July'},
        {'id': 8, 'label': 'Agustus'},
        {'id': 9, 'label': 'September'},
        {'id': 10, 'label': 'Oktober'},
        {'id': 11, 'label': 'November'},
        {'id': 12, 'label': 'Desember'},
    ];
    var dateobj = new Date();
    for (var i = 1; i < 32; i++) {
        var tanggal = {'id': i, 'label': i};
        $scope.date.push(tanggal);
    }
    for (var t = dateobj.getFullYear() - 5; t <= dateobj.getFullYear(); t++)
    {
        var tahun = {'id': t, 'label': t};
        $scope.tahun.push(tahun);
    }
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/absensi/') + id).success(function(data) {
        $scope.data = data;
        $scope.data['nama_siswa'] = data.siswa.nama_siswa;
        $scope.data['kelas'] = data.kelas.nama_kelas;
        $scope.data['bulan'] = data.bulan; // 3  (0 = January, 3 = April)
        $scope.data['tanggal'] = data.tanggal  // 28
        $scope.data['tahun'] = data.tahun // 6s
    })
    $scope.submit = function() {
        $http.put(baseURL.url('guru/absensi/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('guru/absensi'));
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