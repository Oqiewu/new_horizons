let button = document.querySelector('#exit');

button.addEventListener("click", function(e) {
    document.cookie = "token=" + null + "; path=/";
}) 