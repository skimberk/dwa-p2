(function() {
  'use strict';

  var form = document.getElementsByTagName('form')[0];
  var inputs = form.getElementsByTagName('input');
  var passwordElem = document.getElementById('password');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    var queryString = app.serialize(form);

    if(window.history && '?' + queryString !== window.location.search) {
      window.history.pushState({}, window.title, './?' + queryString);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('GET', './password.php?' + app.serialize(form));

    xhr.addEventListener('readystatechange', function() {
      if (this.readyState == 4 && this.status == 200) {
        passwordElem.innerHTML = this.responseText;
      }
    }, false);

    xhr.send();
  }, false);

  passwordElem.addEventListener('click', function() {
    app.select(passwordElem);
  });
}).call(this);
