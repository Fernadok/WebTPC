'use strict';
    angular.module('app').controller('views.test1.index', [
        '$scope',
        function ($scope) {
            var vm = this;

            vm.save = function()
            {
                console.log("-sddd--");
            };
        }
    ]);
