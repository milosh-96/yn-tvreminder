
/**
* First we will load all of this project's JavaScript dependencies which
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');


(function(window) {
    'use strict';
    var tvReminder = {
        globalActions: {
            confirmDelete:function (e) {
                e = window.event;
                            
                var confirmDialog = confirm("WARNING: This action is irreversible! Are you sure?");
                if(confirmDialog == false) {
                    e.preventDefault();
                }
            }
        }
    }
    window.tvReminder = tvReminder;
})(window);

