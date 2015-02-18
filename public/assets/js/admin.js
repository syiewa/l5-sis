var app = angular.module('admin', ['ui.bootstrap', 'angularFileUpload'], function($interpolateProvider) {
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
app.controller('datastatis', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/datastatis')).success(function(data) {
        $scope.data = data;
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/datastatis') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/datastatis')).success(function(data) {
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
app.controller('datastatiscreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.menu = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/menu')).success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function() {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.post(baseURL.url('admin/datastatis'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/datastatis'));
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
});
app.controller('datastatisedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.menu = {};
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/menu')).success(function(data) {
        $scope.menu = data;
    });
    $scope.submit = function(id) {
        $scope.data['content'] = CKEDITOR.instances.editor1.getData();
        $http.put(baseURL.url('admin/datastatis/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url());
                }, 3000);
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
        ;
    }
});

app.controller('databerita', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/berita')).success(function(data) {
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
            $http.delete(baseURL.url('admin/berita/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/berita')).success(function(data) {
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
app.controller('beritacreate', function($scope, $http, $filter, $timeout, $upload, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $scope.data['isi'] = CKEDITOR.instances.editor1.getData();
        if ($scope.data.foto) {
            $upload.upload({
                url: baseURL.url('admin/berita'),
                method: 'POST',
                file: $scope.data.foto,
                data: $scope.data
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/berita'));
                    }, 3000);
                }
            });
        } else {
            $http.post(baseURL.url('admin/berita'), $scope.data).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/berita'));
                    }, 3000);
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
app.controller('beritaedit', function($scope, $http, $filter, $timeout, $upload, baseURL) {
    $scope.data = {}
    var id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/berita/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $scope.data['isi'] = CKEDITOR.instances.editor1.getData();
        if ($scope.data.foto) {
            $upload.upload({
                url: baseURL.url('admin/berita'),
                method: 'POST',
                file: $scope.data.foto,
                data: $scope.data
            }).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/berita'));
                    }, 3000);
                }
            });
        } else {
            $http.put(baseURL.url('admin/berita/') + id, $scope.data).success(function(data) {
                if (data.success) {
                    $timeout(function() {
                        window.location.replace(baseURL.url('admin/berita'));
                    }, 3000);
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
app.controller('pengumuman', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/pengumuman')).success(function(data) {
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
            $http.delete(baseURL.url('admin/pengumuman/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/pengumuman')).success(function(data) {
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
app.controller('pengumumancreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $scope.data['isi'] = CKEDITOR.instances.editor1.getData();
        $http.post(baseURL.url('admin/pengumuman'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/pengumuman'));
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
});

app.controller('pengumumanedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/pengumuman/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $scope.data['isi'] = CKEDITOR.instances.editor1.getData();
        $http.put(baseURL.url('admin/pengumuman/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/pengumuman'));
                }, 3000);
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
});
app.controller('agenda', function($scope, $http, $filter, $timeout, baseURL) {
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
app.controller('agendacreate', function($scope, $http, $filter, $timeout, baseURL) {
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
});
app.controller('agendaedit', function($scope, $http, $filter, $timeout, baseURL) {
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
    var id = $filter('_uriseg')(4);
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
});
app.controller('kelas', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/kelas')).success(function(data) {
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
            $http.delete('http://laravel.dev/admin/kelas/' + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/kelas')).success(function(data) {
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
app.controller('kelascreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $http.post(baseURL.url('admin/kelas'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/kelas'));
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
});
app.controller('kelasedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/kelas/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/kelas/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/kelas'));
                }, 3000);
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
});
app.controller('siswa', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var kelas_id = $filter('_uriseg')(4);
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
app.controller('siswacreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
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
});
app.controller('siswaedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var kelas_id = $filter('_uriseg')(4);
    var id = $filter('_uriseg')(6);
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
});
app.controller('pegawai', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/pegawai')).success(function(data) {
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
            $scope.numPerPage = 10;
        }, true);
    })
    $scope.delete = function(id) {
        if (confirm("Anda yakin untuk menghapus data?") === true) {
            $http.delete(baseURL.url('admin/pegawai/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/pegawai')).success(function(data) {
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
app.controller('pegawaicreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.jk = [{'id': 'L', 'label': 'Laki Laki'}, {'id': 'P', 'label': 'Perempuan'}];
    $scope.status = [{'id': 'guru', 'label': 'Guru'}, {'id': 'pegawai', 'label': 'Pegawai'}, {'id': 'admin', 'label': 'Admin'}];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $http.post(baseURL.url('admin/pegawai'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/pegawai'));
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
});
app.controller('pegawaiedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.jk = [{'id': 'L', 'label': 'Laki Laki'}, {'id': 'P', 'label': 'Perempuan'}];
    $scope.status = [{'id': 'guru', 'label': 'Guru'}, {'id': 'pegawai', 'label': 'Pegawai'}, {'id': 'admin', 'label': 'Admin'}];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/pegawai/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/pegawai/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/pegawai'));
                }, 3000);
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
});
app.controller('polling', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/polling')).success(function(data) {
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
            $http.delete(baseURL.url('admin/polling/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/polling')).success(function(data) {
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
app.controller('pollingcreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.status = [{'id': 'N', 'label': 'Tidak Aktif'}, {'id': 'Y', 'label': 'Aktif'}];
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $http.post(baseURL.url('admin/polling'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/polling'));
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
});
app.controller('pollingedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.status = [{'id': 'N', 'label': 'Tidak Aktif'}, {'id': 'Y', 'label': 'Aktif'}];
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/polling/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/polling/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/polling'));
                }, 3000);
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
});
app.controller('jawaban', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var galeri_id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/galeri/') + galeri_id + '/jawaban').success(function(data) {
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
            $http.delete(baseURL.url('admin/galeri/') + galeri_id + '/jawaban/' + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/galeri/') + galeri_id + '/jawaban').success(function(data) {
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
app.controller('jawabancreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
    $scope.data['id_soal_poll'] = id;
    $scope.galeri = {};
    $http.get(baseURL.url('api/galeridropdown')).success(function(data) {
        $scope.galeri = data;
    });
    $scope.submit = function() {
        $http.post(baseURL.url('admin/galeri/') + id + '/jawaban', $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/galeri/') + $scope.data['id_soal_poll'] + '/jawaban');
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
});
app.controller('jawabanedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var galeri_id = $filter('_uriseg')(4);
    var id = $filter('_uriseg')(6);
    $http.get(baseURL.url('api/jawaban/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.galeri = {};
    $http.get(baseURL.url('api/galeridropdown')).success(function(data) {
        $scope.galeri = data;
    });
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/galeri/') + galeri_id + '/jawaban/' + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/galeri/') + $scope.data['id_soal_poll'] + '/jawaban');
                }, 3000);
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
});
app.controller('galeri', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.post = {};
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $http.get(baseURL.url('api/galeri')).success(function(data) {
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
            $http.delete(baseURL.url('admin/galeri/') + id).success(function(data) {
                if (data.success) {
                    $http.get(baseURL.url('api/galeri')).success(function(data) {
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
    $scope.submit = function() {
        $http.post(baseURL.url('admin/galeri'), $scope.post).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/galeri'));
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
});
app.controller('galericreate', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.status = [{'id': 'N', 'label': 'Tidak Aktif'}, {'id': 'Y', 'label': 'Aktif'}];
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    $scope.submit = function() {
        $http.post(baseURL.url('admin/galeri'), $scope.data).success(function(data) {
            if (data.success) {
                window.location.replace(baseURL.url('admin/galeri'));
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
});
app.controller('galeriedit', function($scope, $http, $filter, $timeout, baseURL) {
    $scope.data = {};
    $scope.status = [{'id': 'N', 'label': 'Tidak Aktif'}, {'id': 'Y', 'label': 'Aktif'}];
    $scope.alerts = [];
    $scope.closeAlert = function(index) {
        $scope.alerts.splice(index, 1);
    };
    var id = $filter('_uriseg')(4);
    $http.get(baseURL.url('api/galeri/') + id).success(function(data) {
        $scope.data = data;
    })
    $scope.submit = function(id) {
        $http.put(baseURL.url('admin/galeri/') + id, $scope.data).success(function(data) {
            if (data.success) {
                $timeout(function() {
                    window.location.replace(baseURL.url('admin/galeri'));
                }, 3000);
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
});