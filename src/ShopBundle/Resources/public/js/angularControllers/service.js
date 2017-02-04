App.controller("WebService",function ($scope,$http)
{

    $http({
          //getting data from web service
          method: 'GET',
          url:'http://vps183328.ovh.net:3000/providers/1/products',
           headers:{
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Headers': 'Content-Type, X-Requested-With',
                'X-Random-Shit':'123123123'
            }

          }).then(function successCallback(response) {
          //stocking data in products
          $scope.products=response.data;
            $scope.prod = null;

          //moving to pagination 
          //var number products/page
          $scope.viewby = 52;
          //total number of products
          $scope.totalItems = $scope.products.length;
          //default pagination 
          $scope.currentPage = 1;
          //pagination:52 products/page
          $scope.itemsPerPage = $scope.viewby;
          //$scope.maxSize = 5; //Number of pager buttons to show
          //current page
          $scope.setPage = function (pageNo) {
          $scope.currentPage = pageNo;
          };
          //change page
          $scope.pageChanged = function() {
          console.log('Page changed to: ' + $scope.currentPage);
          };
          }, function errorCallback(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
          });
    $http({
      method: 'GET',
      url:'http://vps183328.ovh.net:3000/providers/2/products'
      }).then(function successCallback(response2) {
        $scope.categories2=response2.data
      }, function errorCallback(response2) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    $http({
      method: 'GET',
      url:'http://vps183328.ovh.net:3000/providers/3/products'
      }).then(function successCallback(response3) {
        $scope.categories3=response3.data
      }, function errorCallback(response3) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    $http({
      method: 'GET',
      url:'http://vps183328.ovh.net:3000/providers/4/products'
      }).then(function successCallback(response4) {
        $scope.categories4=response4.data
      }, function errorCallback(response4) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
 });
App.controller('MaxCtrl', function($scope) {
$scope.maxi = function(num1,num2,num3,num4)
{
  if (parseFloat(num1) > parseFloat(num2) )
  $scope.result= parseFloat(num1);
  else 
    $scope.result= parseFloat(num2);
  if (parseFloat(num3) > $scope.result)
  $scope.result=parseFloat(num3);
  if (parseFloat(num4) > $scope.result)
  $scope.result=parseFloat(num4);
return $scope.result;

}
$scope.mini = function(num1,num2,num3,num4)
{
  if (parseFloat(num1) < parseFloat(num2) )
  $scope.result= parseFloat(num1);
  else 
    $scope.result= parseFloat(num2);
  if (parseFloat(num3) < $scope.result)
  $scope.result=parseFloat(num3);
  if (parseFloat(num4) < $scope.result)
  $scope.result=parseFloat(num4);
return $scope.result;

}
});
