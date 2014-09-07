/**
 *
 * Example of a Captcha Controller
 * Created by Jordane JOUFFROY
 * contact@jordane.net
 *
 * Created with VisualCaptcha
 * A library from EmotionLoop
 * http://visualcaptcha.net
 *
 *
 * This example need the VisualCaptcha-AngularJS library
 * Available here : https://github.com/emotionLoop/visualCaptcha-frontend-angular
 * 
 */

var app = angular.module('app', ['visualCaptcha'])

.config(['$interpolateProvider', function($interpolateProvider){
    // Change default mustaches of AngularJS
    $interpolateProvider.startSymbol('[[').endSymbol(']]');
}]);


// The Catpcha controller
app.controller('catpcha', ['$scope', function ($scope)
{

    $scope.captchaOptions = {
    	imgPath: 'img/captcha/',
        captcha: {
            numberOfImages: 5,
            routes: {
            	start: '/captcha/start',
            	image:'/captcha/image',
            	audio:'/captcha/audio',
            }
        },

        init: function ( captcha ) {
            $scope.registerCaptcha = captcha;
        }
    };

}]);