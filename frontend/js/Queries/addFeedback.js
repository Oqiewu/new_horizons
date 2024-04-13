document.querySelector('.feedback-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const parts = getCookie('token').split('.');

    var form = this;
    var url = 'http://newhorizons/backend/Controller/FeedbackController/addFeedback';
    let description = document.querySelector('#feedback-text');

    let json = {"user_id": parts[1], "description": description.value};

    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);

    xhr.onload = function() {
        if (this.status == 200) {
            document.location.reload();
        } else {
            console.error(this.statusText);
        }
    };

    xhr.onerror = function() {
        console.error(this.statusText);
    };

    xhr.send(JSON.stringify(json));
});
