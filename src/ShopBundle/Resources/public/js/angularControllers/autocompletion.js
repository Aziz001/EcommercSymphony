angular.module('autocompletion', [])
//This filter to avoid repeating the category names in the search bar
.filter('unique', function() {
   return function(collection, keyname) {
      var output = [], 
          keys = [];

      angular.forEach(collection, function(item) {
          var key = item[keyname];
          if(keys.indexOf(key) === -1) {
              keys.push(key);
              output.push(item);
          }
      });
      return output;
   };
})
//Consuming a service to take the categories
.controller('listctrl', function ($scope , $http) {
	$http({
		  method: 'GET',
		  url:'http://vps183328.ovh.net:3000/providers/1/products'
		}).then(function successCallback(response) {
		    $scope.categories=response.data;
        $scope.categ= null;
		  }, function errorCallback(response) {
		    // called asynchronously if an error occurs
		    // or server returns response with an error status.
		  });
});