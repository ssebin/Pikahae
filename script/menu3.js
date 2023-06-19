function openModal(detailsBtn) {
    const modal = detailsBtn.nextElementSibling;
    modal.style.display = "block";
}

function closeModal(closeBtn) {
    const modal = closeBtn.parentNode.parentNode;
    modal.style.display = "none";
}

document.addEventListener("DOMContentLoaded", function() {
    const quantityElements = document.getElementsByClassName("menu-quantity");
    const cartItems = [];

    for (let i = 0; i < quantityElements.length; i++) {
        const minusButton = quantityElements[i].querySelector(".minus-btn");
        const plusButton = quantityElements[i].querySelector(".plus-btn");
        const quantityText = quantityElements[i].querySelector(".price-btn__txt");

        minusButton.addEventListener("click", function() {
            let quantity = parseInt(quantityText.textContent);
            if (quantity > 0) {
                quantity--;
                quantityText.textContent = quantity.toString();
            }
        });

        plusButton.addEventListener("click", function() {
            let quantity = parseInt(quantityText.textContent);
            quantity++;
            quantityText.textContent = quantity.toString();
        });
    }

    const cartIcon = document.querySelector(".head-rgt__btn");
    const cartCount = document.querySelector(".cart-item-count");
    const cartContainer = document.getElementById("menu-head-cart");
    // const cartText = document.querySelector(".head-cart__txt");
    const cartCloseBtn = document.querySelector(".cart-close");

    cartIcon.addEventListener("click", function() {
        cartContainer.style.visibility = "visible";
    });

    cartCloseBtn.addEventListener("click", function() {
        cartContainer.style.visibility = "hidden";
    });

    const addToCartButtons = document.getElementsByClassName("po-btn");
    for (let i = 0; i < addToCartButtons.length; i++) {
        const addToCartButton = addToCartButtons[i];
        addToCartButton.addEventListener("click", function(event) {
            event.preventDefault();
            const menuItem = this.parentNode.parentNode;
            const menuName = menuItem.querySelector(".item-name").textContent;
            const menuPrice = menuItem.querySelector(".menu-price").textContent;
            const menuImgSrc = menuItem.querySelector("img").getAttribute("data-img-src");
            const quantity = parseInt(menuItem.querySelector(".price-btn__txt").textContent);

            const existingItem = cartItems.find(item => item.menuName === menuName);
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cartItems.push({ menuName, menuPrice, menuImgSrc, quantity });
            }

            renderCartItems();

            cartContainer.style.visibility = "visible";
        });
    }

    function renderCartItems() {
        const cartItemsContainer = cartContainer.querySelector(".head-cart__items");
        cartItemsContainer.innerHTML = "";

        cartItems.forEach(item => {
            const cartItem = document.createElement("div");
            cartItem.classList.add("head-cart__item");

            const cartItemWrapper = document.createElement("div");
            cartItemWrapper.classList.add("head-cart__item-wrapper");

            const deleteBtn = document.createElement("span");
            deleteBtn.classList.add("delete-btn");
            deleteBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';

            deleteBtn.addEventListener("click", function() {
                const itemIndex = cartItems.findIndex(cartItem => cartItem.menuName === item.menuName);
                if (itemIndex !== -1) {
                    cartItems.splice(itemIndex, 1);
                    renderCartItems();
                }
            });

            const itemImg = document.createElement("img");
            itemImg.classList.add("head-cart__item-img");
            itemImg.src = item.menuImgSrc;

            const itemDes = document.createElement("div");
            itemDes.classList.add("head-cart__des");

            const itemName = document.createElement("p");
            itemName.classList.add("head-cart__des-txt");
            itemName.textContent = item.menuName;

            const itemPrice = document.createElement("div");
            itemPrice.classList.add("head-cart__price");

            const itemPriceSingle = document.createElement("span");
            itemPriceSingle.classList.add("head-cart__price-single");
            itemPriceSingle.textContent = item.menuPrice + "*" + item.quantity.toString();

            itemPrice.appendChild(itemPriceSingle);
            itemDes.appendChild(itemName);
            itemDes.appendChild(itemPrice);
            cartItemWrapper.appendChild(deleteBtn);
            cartItemWrapper.appendChild(itemImg);
            cartItemWrapper.appendChild(itemDes);
            cartItem.appendChild(cartItemWrapper);

            cartItemsContainer.appendChild(cartItem);
        });

        const cartItemCount = cartItems.reduce((count, item) => count + item.quantity, 0);
        cartCount.textContent = cartItemCount.toString();

        const totalPriceElements = cartItemsContainer.getElementsByClassName("head-cart__price-single");
        let totalPrice = 0;
        for (let j = 0; j < totalPriceElements.length; j++) {
            const priceString = totalPriceElements[j].textContent;
            const priceArray = priceString.split("*");
            const itemPrice = parseFloat(priceArray[0].substring(3));
            const itemQuantity = parseInt(priceArray[1]);
            totalPrice += itemPrice * itemQuantity;
        }
        const totalPriceElement = cartContainer.querySelector(".head-cart__price-total");
        totalPriceElement.textContent = "RM " + totalPrice.toFixed(2);

        // if (cartItems.length === 0) {
        //     cartText.style.visibility = "visible";
        // } else {
        //     cartText.style.visibility = "hidden";
        // }
    }

    const modalElements = document.getElementsByClassName("modal");
    for (let i = 0; i < modalElements.length; i++) {
        const closeButton = modalElements[i].querySelector(".close");
        const modalContent = modalElements[i].querySelector(".modal-content");

        closeButton.addEventListener("click", function() {
            closeModal(this);
        });

        modalContent.addEventListener("click", function(event) {
            event.stopPropagation();
        });

        modalElements[i].addEventListener("click", function() {
            closeModal(closeButton);
        });
    }

    renderCartItems();

    const checkoutButton = document.querySelector(".head-cart-checkout");

    checkoutButton.addEventListener("click", function(event) {
        event.preventDefault();
        if (cartItems.length > 0) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "checkout.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify(cartItems));

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                    cartItems.length = 0;  // Empty the cart
                    renderCartItems();  // Update the cart UI
                    cartContainer.style.visibility = "hidden";  // Close the cart
                }
            }
        } else {
            alert("Your cart is empty.");
        }
    });
});
