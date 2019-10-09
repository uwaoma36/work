var app=angular.module("home",["ngRoute"]);

app.config(function($routeProvider,$httpProvider,$provider){
$routeProvider.when("/",{
           template:"<p>hello</p>",
           controller:"panel"
}).otherwise({redirectTo:"/");

});