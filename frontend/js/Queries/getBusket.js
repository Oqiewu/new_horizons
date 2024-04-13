window.onload = function() {
    const parts = getCookie('token').split('.');

    const url = "http://newhorizons/backend/Controller/BusketController/getBusket/" + parts[1];

    var xhr = new XMLHttpRequest();

    xhr.open("GET", url, true);

    xhr.onload = function() {
        if (this.status == 200) {
            if (JSON.parse(this.responseText)) {
                const busket = JSON.parse(this.responseText);
        
                JSON.parse(busket['element']).forEach(element => {
                    addToCart(element[0], element[1])
                });
            }

        }
    }
    xhr.send();
}