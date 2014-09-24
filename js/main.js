(function() {
  'use strict';

  var form = document.getElementsByTagName('form')[0];
  var inputs = form.getElementsByTagName('input');

  var handleFormChange = function() {
    console.log('Form changed');
  };

  var debouncedHandleFormChange = app.debounce(handleFormChange, 100);

  for(var i = 0, len = inputs.length; i < len; ++i) {
    var input = inputs[i];

    if(input.type === 'number') {
      input.addEventListener('keypress', debouncedHandleFormChange, false);
      input.addEventListener('paste', debouncedHandleFormChange, false);
      input.addEventListener('input', debouncedHandleFormChange, false);
    }
    else if(input.type === 'checkbox') {
      input.addEventListener('change', debouncedHandleFormChange, false);
    }
  }

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    var queryString = app.serialize(form);

    if(window.history && '?' + queryString !== window.location.search) {
      window.history.pushState({}, window.title, './?' + queryString);
    }
  }, false);
}).call(this);
