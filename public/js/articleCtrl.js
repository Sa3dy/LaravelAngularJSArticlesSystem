

var app = angular.module('ArticleApp', ['ngRoute']);
app.constant('API_URL', 'http://localhost/LaravelArticlesSystem/public/api/');

app.controller('articleCtrl', function ($scope, $http, API_URL) {

    $scope.comment = [];

    $http.get(API_URL + "articles")
        .then(function (response) {
            $scope.articles = response.data;
            //console.log("articles: " + JSON.stringify(response.data));
        });

    $http.get(API_URL + "categories")
        .then(function (response) {
            $scope.categories = response.data;
            //console.log("categories: " + JSON.stringify(response.data));
        });

    $http.get(API_URL + "comments")
        .then(function (response) {
            $scope.comments = response.data;
            //console.log("comments: " + JSON.stringify(response.data));
        });

    $scope.addCommentBtnClicked = function ($index, article) {
        // console.log($scope.addCommentBtnClicked);
        // console.log(article);
        // console.log($scope.comment[article.id]);

        $http.post(API_URL + "article/" + article.id + "/comment/" + $scope.comment[article.id])
            .then(function (response) {
                var response = response.data;
                if (response.success == "added") {

                    $scope.comment[article.id] = "";

                    $http.get(API_URL + "articles")
                        .then(function (response) {
                            $scope.articles = response.data;

                            //console.log("articles: " + JSON.stringify(response.data));
                        });
                }
            });
    };

    $scope.filterWithAllCategories = function () {
        $http.get(API_URL + "articles")
            .then(function (response) {
                $scope.articles = response.data;

                //console.log("articles: " + JSON.stringify(response.data));
            });
    };

    $scope.filterWithCategory = function (category) {
        console.log("$scope.filterWithCategory");
        console.log(category);

        $http.get(API_URL + "category/" + category.id + "/articles")
            .then(function (response) {
                $scope.articles = response.data;
            });
    };

    //console.log("API_URL: " + API_URL);
});
