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