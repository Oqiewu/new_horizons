document.getElementById('profile-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const parts = getCookie('token').split('.');

    const url = "http://newhorizons/backend/Controller/UserController/editUser/" + parts[1];
  
    var data = new FormData(this);
  
    // Преобразовать данные формы в объект JSON
    var json = {};
    for (var [key, value] of data.entries()) {
      json[key] = value;
    }
  
    var xhr = new XMLHttpRequest();
    xhr.open("PUT", url, true);
  
    // Добавить заголовок Content-Type
    xhr.setRequestHeader('Content-Type', 'application/json');
  
    xhr.onload = function() {
      if (this.status == 200) {
        document.location.reload();
      } else {
        console.log('Request failed.  Returned status of ' + this.status);
      }
    };
  
    // Преобразовать объект JSON в строку и отправить его в запросе
    xhr.send(JSON.stringify(json));
  });
  