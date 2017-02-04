angular.module('cache', [])
//service EntityCache
.service('EntityCache', [function () {
	
	var self = this;

	self.cache = {};
	self.durationHolder = {};
	self.maxTTL = 500000;


	self.hasKey = function(key){
		return self.cache[key] !== undefined;
	}

	self.hasExpired = function(key){

		var date = new Date();

		return date.getTime() - self.durationHolder[key] > self.maxTTL;
	}

	self.storeAndReturn = function(key){

		if (self.hasExpired(key)){
			self.cache[key] = undefined;
		}

		if (self.hasKey(key)){
			return self.cache[key];
		}
		return null;
	}

	return self;

}])
//pas de paramètre $scope, en effet un service n’est pas directement lié à la view

.service('PhotoService', ['$http', 'EntityCache', '$q', function ($http, EntityCache, $q) {

	var self = this;

	self.fetchPhotos = function(){

		var deferred = $q.defer();

		var photos = EntityCache.storeAndReturn('photos');

		if (photos == null){
			$http.get('http://vps183328.ovh.net:3000/providers/1/products').then(function(response){
				deferred.resolve(response.data);
			})
		}
		else {
			deferred.resolve(photos);
		}

		return deferred.promise;
	}

	return self;
	
}])
.service('fournisseur2', ['$http', 'EntityCache', '$q', function ($http, EntityCache, $q) {

	var self = this;

	self.fetchProd2 = function(){

		var deferred = $q.defer();

		var prod = EntityCache.storeAndReturn('prod');

		if (prod == null){
			$http.get('http://vps183328.ovh.net:3000/providers/2/products').then(function(response){
				deferred.resolve(response.data);
			})
		}
		else {
			deferred.resolve(prod);
		}

		return deferred.promise;
	}

	return self;
	
}])
.service('fournisseur3', ['$http', 'EntityCache', '$q', function ($http, EntityCache, $q) {

	var self = this;

	self.fetchProd3 = function(){

		var deferred = $q.defer();

		var prod3 = EntityCache.storeAndReturn('prod3');

		if (prod3 == null){
			$http.get('http://vps183328.ovh.net:3000/providers/3/products').then(function(response){
				deferred.resolve(response.data);
			})
		}
		else {
			deferred.resolve(prod3);
		}

		return deferred.promise;
	}

	return self;
	
}])
.service('fournisseur4', ['$http', 'EntityCache', '$q', function ($http, EntityCache, $q) {

	var self = this;

	self.fetchProd4 = function(){

		var deferred = $q.defer();

		var prod4 = EntityCache.storeAndReturn('prod4');

		if (prod4 == null){
			$http.get('http://vps183328.ovh.net:3000/providers/4/products').then(function(response){
				deferred.resolve(response.data);
			})
		}
		else {
			deferred.resolve(prod);
		}

		return deferred.promise;
	}

	return self;
	
}])

.controller("PhotosCtrl", ['PhotoService', 'EntityCache', '$scope', function (PhotoService, EntityCache, $scope) {
//donner à la view accès direct au service
	$scope.PhotoService = PhotoService;

	$scope.PhotoService.fetchPhotos().then(function(response){
		$scope.photos = response;
		EntityCache.cache['photos'] = $scope.photos;
	})

}])
.controller("Prodfour2", ['fournisseur2', 'EntityCache', '$scope', function (fournisseur2, EntityCache, $scope) {
//donner à la view accès direct au service
	$scope.fournisseur2 = fournisseur2;

	$scope.fournisseur2.fetchProd2().then(function(response){
		$scope.prod = response;
		EntityCache.cache['prod'] = $scope.prod;
	})

}])
.controller("Prodfour3", ['fournisseur3', 'EntityCache', '$scope', function (fournisseur3, EntityCache, $scope) {
//donner à la view accès direct au service
	$scope.fournisseur3 = fournisseur3;

	$scope.fournisseur3.fetchProd3().then(function(response){
		$scope.prod3 = response;
		EntityCache.cache['prod3'] = $scope.prod3;
	})

}])
.controller("Prodfour4", ['fournisseur4', 'EntityCache', '$scope', function (fournisseur4, EntityCache, $scope) {
//donner à la view accès direct au service
	$scope.fournisseur4 = fournisseur4;

	$scope.fournisseur4.fetchProd4().then(function(response){
		$scope.prod4 = response;
		EntityCache.cache['prod4'] = $scope.prod4;
	})

}])
.controller("main",['PhotoService','fournisseur1','fournisseur2','fournisseur3','fournisseur4','EntityCache','$scope',function (PhotoService,fournisseur2,fournisseur3,fournisseur4,$scope)
{
$scope.PhotoService = PhotoService;

	$scope.PhotoService.fetchProd().then(function(response){
		$scope.photos = response;
		EntityCache.cache['photos'] = $scope.photos;
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
	});
	$scope.fournisseur2 = fournisseur2;

	$scope.fournisseur2.fetchProd2().then(function(response){
		$scope.prod = response;
		EntityCache.cache['prod'] = $scope.prod;
	});
	$scope.fournisseur3 = fournisseur3;

	$scope.fournisseur3.fetchProd3().then(function(response){
		$scope.prod3 = response;
		EntityCache.cache['prod3'] = $scope.prod3;
	});
	$scope.fournisseur4 = fournisseur4;

	$scope.fournisseur4.fetchProd4().then(function(response){
		$scope.prod4 = response;
		EntityCache.cache['prod4'] = $scope.prod4;
	});

   
 }]);

