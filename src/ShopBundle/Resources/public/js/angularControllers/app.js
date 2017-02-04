'use strict';
var App = angular.module('myApp', ['ngRoute','ngCart','ui.bootstrap' , 'autocompletion']);
//delete conflit of{{}} between twig and angular
App.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
});
//routing angular
App.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "home.html",
        //controller: ""
    })
    .when("/Shop", {
        templateUrl : "shop.html",
       controller: "ModalCtrl"
    })
    .when("/Single-product/:type", {
        templateUrl : "product.html",
        controller: "Route1Controller"
    })
     .when("/Cart", {
        templateUrl : "cart.html",
       // controller: "PostCtrl"
    })
      .when("/Checkout", {
        templateUrl : "checkout.html",
       controller: "checkController"
    })
      .when("/Category", {
        templateUrl : "category.html",
       //controller: "ModalCtrl"
    })
   
});

//switched to the specifate root

App.run(['$rootScope', '$location', function ($rootScope, $location) {

  $rootScope.switchTo = function(path){
    console.log(path);
    $location.path(path);

  }
//using this function to activate navbar menu
 $rootScope.isRoute = function(path){
    return $location.path() == path;
  }
  
  
}])
App.controller('checkController', ['$scope','$http',function($scope,$http) {
  $scope.useradr = {};
       
  $scope.submit = function() {
   
          $http({
              
               method: 'POST',
               url:  'save.php',
               data: { info : $scope.useradr  }
               
         }).then(function (response) {

      alert(JSON.stringify($scope.useradr));

              console.log('hello');
              
          }, function (response) {
              
              // on error
              console.log(response.data,response.status);
              
          });
    };
     
  
}]);

App.controller("Route1Controller",['$scope','$routeParams','$http',function ($scope, $routeParams,$http){
  $scope.type = $routeParams.type;
     $scope.get_type = function() {
          $http({
              
               method: 'POST',
               url:  '/',
               data: { type : $scope.type  }
               
         }).then(function (response) {
              
              // on success
           
              console.log('hello');
              
          }, function (response) {
              
              // on error
              console.log(response.data,response.status);
              
          });
    };
 $scope.get_type();
  
}]);
//this controller for the ngCart , in which you can specify the amount of Taxes and shipping
App.controller("MainController",['$scope', '$http', 'ngCart', '$location', function($scope, $http, ngCart,$location) {
 

//$scope.msg="hello";
	//for exemple , we can specify the pourcentage of taxes
    ngCart.setTaxRate(7.5);
    //if there is shipping, we can specify the amout of shipping
    //ngCart.setShipping(3.5); 
}]);
App.controller('ModalCtrl', function($scope,  $modal) {

      $scope.showModal = function(i) {
        
        var modalInstance = $modal.open({
        backdrop: true,
        backdropClick: true,
        dialogFade: false,
        keyboard: true,
        templateUrl : 'modalContent.html',
        controller : ModalInstanceCtrl,
        resolve: {
           details: function () {
          return i.details ;},
           name: function () {
          return i.productName ;},
           brand: function () {
          return i.brand ;},
           category: function () {
          return i.category ;},
           material: function () {
          return i.productMaterial ;},
         
        } 
          });
     
          
          
          modalInstance.result.then(function(){
            //on ok button press 
          },function(){
            //on cancel button press
            console.log("Modal Closed");
          });
      };                   
});

var ModalInstanceCtrl = function($scope, $modalInstance, $modal,details,brand,category,material,name) {
    
     $scope.details = details;
          $scope.brand = brand;
$scope.category = category;
     $scope.material = material;
     $scope.name = name;

      $scope.ok = function () {
        $modalInstance.close();
      };
      
      
}