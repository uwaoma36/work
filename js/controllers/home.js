var app=angular.module('home',['ngRoute']);
// controllers
app.controller('panel',function($scope){
  $scope.titles=[
[{t:"Submit Question",url:"#/submitq"},{t:"Edit Question",url:"#/editq"},{t:"View Users",url:"#/viewusers"}],

[{t:"View Scores",url:"#/viewscores"},{t:"Register Admin",url:"#/regadmin"}]
               ];
$scope.name="ali";
                 });

app.controller('viewq',function($scope){
   $scope.qst=[{id:1,qt:"who is abu",optA:"me",optB:"ye",optC:"ge",ans:"A"},{id:2,qt:"which is do",optA:"do",optB:"go",optC:"aa",ans:"B"}]; 

   $scope.delete=function(i){
       $scope.qst.splice(i,1);
     }   

});


app.controller('submitq',function($scope){
       

});


app.controller('editq',function($scope,$routeParams){
       
      $scope.q=angular.fromJson($routeParams.q);
});

app.config(function($routeProvider){

$routeProvider.when('/',{
     templateUrl:"view/viewq.html",
      controller:"viewq"
 }).when('/submitq',{
      templateUrl:"view/submitq.html",
      controller:"submitq"
  }).when('/viewq',{
      templateUrl:"view/viewq.html",
      controller:"viewq" 
  }).when('/editq/:q/:id',{
      templateUrl:"view/editq.html",
      controller:"editq" 
  }).otherwise({redirectTo:"/"});
});