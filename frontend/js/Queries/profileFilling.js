window.onload = function() {
    const parts = getCookie('token').split('.');

    var xhr = new XMLHttpRequest();

    url = "http://newhorizons/backend/Controller/UserController/getUserById/" + parts[1];

    xhr.open("GET", url, true);

    xhr.onload = function() {
        if (this.status == 200) {
            const user = JSON.parse(this.responseText);
            
            let full_name = document.querySelector('input[name="full_name"]');
            let town = document.querySelector('input[name="town"]');
            let region = document.querySelector('input[name="region"]');
            let postal_code = document.querySelector('input[name="postal_code"]');
            let country_select  = document.querySelector('select[name="country"]');

            full_name.value = user['full_name'];
            town.value = user['town'];
            region.value = user['region'];
            postal_code.value = user['postal_code'];

            let country_options = country_select.options;
            let found = false;
            for (let i = 0; i < country_options.length; i++) {
                let option = country_options[i];
                if (option.value === user['country']) {

                    option.selected = true;
                    found = true;
                    break;
                }
            }
            if (!found) {
                country_select.selectedIndex = 0;
            }
        }
    }

    xhr.send();
}