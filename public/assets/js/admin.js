var app = angular.module('admin', ['ui.bootstrap', 'angularFileUpload', "blockUI"], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});
app.factory('myHttpInterceptor', function($q, $window, blockUI) {
    return function(promise) {
        return promise.then(function(response) {
            // do something on success
            // todo hide the spinner
            blockUI.stop();
            return response;

        }, function(response) {
            // do something on error
            // todo hide the spinner
            blockUI.stop();
            return $q.reject(response);
        });
    };
})
app.factory('baseURL', function($location) {
    return {
        url: function(url) {
            return base_url + '/' + url;
        }
    };
});
app.filter('_uriseg', function($location, baseURL) {
    return function(segment) {
        var query = $location.absUrl().replace(baseURL.url(), "");
        var data = query.split("/");
        if (data[segment - 1]) {
            return data[segment - 1];
        }
        return false;
    }
});