angular.module('MainApp', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
}).controller('MainCtrl', function ($scope, $http) {
    $scope.getall = function () {
        $http.get('/get-all/').then(function (response) {
            $scope.todos = response.data.data;
        }).catch(function (error) {
            console.log(error.data);
        });
    };
    $scope.search = function (query) {
        let data = {};
        if (query.length > 2) {
            data.search = query;
            $http.post('/search', data).then(function (response) {
                $scope.todos = response.data;
            }).catch(function (error) {
                console.log(error.data)
            })
        } else {
            $scope.getall();
        }
    }
}).controller('DashCtrl', function ($scope, $http) {
    $scope.getMyList = function (userID) {
        sessionStorage.setItem("userId", userID);
        $http.get('/get-mine/' + userID).then(function (response) {
            $scope.todos = response.data.data;
        }).catch(function (error) {
            console.log(error.data);
        })
    };
    $scope.changeStatus = function (uuid, status) {
        $http.get('/change-status/' + uuid + '/' + status).then(function (response) {
            $scope.getMyList(sessionStorage.getItem("userId"));
        }).catch(function (error) {
            console.log(error.data)
        })
    };
});
