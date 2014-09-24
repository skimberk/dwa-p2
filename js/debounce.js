(function() {
  'use strict';

  var debounce = function(fn, delay) {
    var timer = null;
    return function () {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        fn.apply(context, args);
      }, delay);
    };
  };

  window.app = window.app || {};
  window.app.debounce = debounce;
}).call(this);
