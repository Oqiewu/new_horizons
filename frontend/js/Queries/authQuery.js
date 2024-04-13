document.getElementById('auth-form').addEventListener('submit', function(e) {
    e.preventDefault(); 
    var form = this;
    var url = form.action;
    var data = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    xhr.onload = function() {
        if (this.status == 200) {
            let token = JSON.parse(this.responseText);
            if (token) {
                document.cookie = 'token=' + token +  "; path=/";
                document.location = 'main-action.html';
            } else {
                alert('Зарегистрируйтесь')
                document.location.reload();
            }
            
        } else {
            console.log('Request failed.  Returned status of ' + this.status);

        }
    };
    login = data.get('login');
    password = data.get('password')
    data = {'login': login, 'password': password}
    xhr.send(JSON.stringify(data));
});