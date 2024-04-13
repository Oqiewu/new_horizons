    
    
    document.querySelectorAll('.cart-item').forEach(function(e) {
        e.onclick = function() {
            const parts = getCookie('token').split('.');
            var xhr = new XMLHttpRequest();
            const url = "http://newhorizons/backend/Controller/BusketController/editBusket";
            let json = {"user_id": parts[1], "elements": []};

            xhr.open("POST", url, true)
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (this.status != 200) {
                    console.log('Request failed.  Returned status of ' + this.status);
                }
            }
            document.querySelectorAll('.cart-item').forEach(function(el){
                json['elements'].push([el.children[0].textContent, Number(el.children[1].textContent.slice(1, -1))])
            })
            xhr.send(JSON.stringify(json));

            console.log(json)
        }
    })