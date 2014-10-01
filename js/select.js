(function() {
  'use strict';

  var select = function(container) {
    if (document.selection) {
      var range = document.body.createTextRange();
      range.moveToElementText(container);
      range.select();
    } else if (window.getSelection) {
      var range = document.createRange();
      range.selectNode(container);
      window.getSelection().addRange(range);
    }
  };

  window.app = window.app || {};
  window.app.select = select;
}).call(this);
