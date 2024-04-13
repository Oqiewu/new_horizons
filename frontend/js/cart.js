const addToCartBtns = document.querySelectorAll(".add-to-cart");

addToCartBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    // Получите данные о товаре, используя его родительский элемент
    const product = btn.parentNode;
    const name = product.querySelector("h3").textContent;
    const price = parseInt(product.querySelector("span").textContent.split("₽")[1]);

    // Вызовите функцию добавления товара в корзину
    addToCart(name, price);
  });
});

function addToCart(name, price) {
  // Создайте новый элемент корзины
  const cartItem = document.createElement("li");
  cartItem.classList.add("cart-item");
  cartItem.innerHTML = `
    <h4>${name}</h4>
    <span>₽${price}</span>
    <button class="remove-item" id="remove">Удалить</button>
  `;

  // Добавьте элемент в корзину и обновите итоговую стоимость
  const cartItems = document.querySelector(".cart-items");
  cartItems.appendChild(cartItem);
  updateTotal();
  
  // Добавьте обработчик события клика на кнопку "Remove"
  const removeBtn = cartItem.querySelector(".remove-item");
  removeBtn.addEventListener("click", () => {
    cartItem.remove();
    updateTotal();

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
        json['elements'].push([el.children[0].textContent, el.children[1].textContent.slice(1)])
    })
    xhr.send(JSON.stringify(json));
    document.location.reload();
  });
}

function updateTotal() {
  // Получите все элементы цены и вычислите общую стоимость
  const prices = document.querySelectorAll(".cart-item span");
  let total = 0;
  prices.forEach(price => {
    total += parseInt(price.textContent.split("₽")[1]);
  });

  // Обновите текст итоговой стоимости
  const totalPrice = document.querySelector(".total-price");
  totalPrice.textContent = `₽${total}`;
}
