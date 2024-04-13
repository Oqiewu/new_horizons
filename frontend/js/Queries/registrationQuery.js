document.getElementById('registration-form').addEventListener('submit', function(e) {
    e.preventDefault(); 
    var form = this;
    var url = form.action;
    var data = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    var json = {};
    for (var [key, value] of data.entries()) {
      json[key] = value;
    }

    xhr.onload = function() {
        if (this.status == 200) {
            let token = JSON.parse(this.responseText);
            if (token) {
                document.cookie = 'token=' + token +  "; path=/";
                document.location = 'main-action.html';
            } else {
                alert('Пользователь уже зарегистрирован')
                document.location.reload();
            }}};
    
    xhr.send(JSON.stringify(json));
});