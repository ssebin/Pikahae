"use strict";

const img = document.querySelector(".img-main");
const cartBtn = document.querySelector(".head-rgt__btn");
const cart = document.querySelector(".menu-head-cart");
const cartItem = document.querySelector(".head-cart__item");
const cartCheckoutBtn = document.querySelector(".head-cart-checkout");
const cartTotal = document.querySelector(".head-cart__price-total");
const emptyCartTxt = document.querySelector(".head-cart__txt");
const addToCartBtns = document.querySelectorAll(".po-btn");
const clearCart = document.querySelector(".delete-btn");
const priceSingle = document.querySelector(".head-cart__price-single");
const priceTotal = document.querySelector(".head-cart__price-total");
const priceBtns = Array.from(document.querySelectorAll(".price-btn__img"));
const totalItems = document.querySelector(".price-btn__txt");
const body = document.querySelector("body");
const headerCart = document.querySelector(".head-rgt");
const closeCartBtn = document.querySelector(".cart-close");

let noOfItems = 0;
let cartItems = {};

function productPrice() {
    let total = 0;

    for (const itemId in cartItems) {
        total += cartItems[itemId].price * cartItems[itemId].quantity;
    }

    priceTotal.textContent = `RM${total.toFixed(2)}`;

    if (total > 0) {
        headerCart.setAttribute("data-content", `${total}`);
        headerCart.style.setProperty("--display", `block`);
    } else {
        headerCart.style.setProperty("--display", `none`);
    }
}

function getItemImageSrc(itemName) {
    let itemImgSrc;
    document.querySelectorAll(".box").forEach((box) => {
        const itemNameElement = box.querySelector(".item-name");
        if (itemNameElement && itemNameElement.textContent === itemName) {
            itemImgSrc = box.querySelector("img").src;
        }
    });
    return itemImgSrc;
}


function renderCart() {
    let cartItemsHTML = '';

    for (const itemId in cartItems) {
        let itemImgSrc = getItemImageSrc(itemId);

        cartItemsHTML += `
      <div class="head-cart__item${cart.classList.contains("open-cart") ? " open-cart" : ""}">
        <div class="head-cart__item-wrapper">
          <span class="delete-btn"><i class="fa-solid fa-xmark"></i></span>
          <img src="${itemImgSrc}" class="head-cart__item-img" alt="" />
          <div class="head-cart__des">
            <p class="head-cart__des-txt">${itemId}</p>
            <div class="head-cart__price">
              <span class="head-cart__price-single">RM${cartItems[itemId].price.toFixed(2)} * ${cartItems[itemId].quantity}</span>
            </div>
          </div>
        </div>
      </div>
    `;
    }

    cartItem.innerHTML = cartItemsHTML;

    // Add event listeners to the delete buttons
    updateDeleteBtnListeners();
}


function cartIt() {
    cartItem.classList.add("open-cart");
    cartTotal.classList.add("open-cart");
    cartCheckoutBtn.classList.add("open-cart");
    emptyCartTxt.classList.remove("open-cart");
    renderCart();
}

function cartTx() {
    cartItem.classList.remove("open-cart");
    cartTotal.classList.remove("open-cart");
    cartCheckoutBtn.classList.remove("open-cart");
    emptyCartTxt.classList.add("open-cart");
}


cartBtn.addEventListener("click", function () {
    cart.classList.toggle("open-cart");
    const cartItemsList = document.querySelectorAll('.head-cart__item'); // Add this line

    if (cart.classList.contains("open-cart")) {
        if (noOfItems >= 1) {
            cartIt();
        } else {
            cartTx();
        }

        // Show the total and checkout button if there are items in the cart
        if (noOfItems > 0) {
            cartTotal.classList.add("open-cart");
            cartCheckoutBtn.classList.add("open-cart");

            // Add this loop to toggle the open-cart class for each cart item
            cartItemsList.forEach(function (cartItem) {
                cartItem.classList.add("open-cart");
            });
        } else {
            cartTotal.classList.remove("open-cart");
            cartCheckoutBtn.classList.remove("open-cart");
            emptyCartTxt.classList.add("open-cart");
        }
    } else {
        emptyCartTxt.classList.remove("open-cart");

        // Hide the total, checkout button, and items when closing the cart
        cartTotal.classList.remove("open-cart");
        cartCheckoutBtn.classList.remove("open-cart");

        // Add this loop to toggle the open-cart class for each cart item
        cartItemsList.forEach(function (cartItem) {
            cartItem.classList.remove("open-cart");
        });
    }
});
closeCartBtn.addEventListener("click", function () {
    cart.classList.toggle("open-cart");
    const cartItemsList = document.querySelectorAll('.head-cart__item'); // Add this line

    if (cart.classList.contains("open-cart")) {
        if (noOfItems >= 1) {
            cartIt();
        } else {
            cartTx();
        }

        // Show the total and checkout button if there are items in the cart
        if (noOfItems > 0) {
            cartTotal.classList.add("open-cart");
            cartCheckoutBtn.classList.add("open-cart");

            // Add this loop to toggle the open-cart class for each cart item
            cartItemsList.forEach(function (cartItem) {
                cartItem.classList.add("open-cart");
            });
        } else {
            cartTotal.classList.remove("open-cart");
            cartCheckoutBtn.classList.remove("open-cart");
            emptyCartTxt.classList.add("open-cart");
        }
    } else {
        emptyCartTxt.classList.remove("open-cart");

        // Hide the total, checkout button, and items when closing the cart
        cartTotal.classList.remove("open-cart");
        cartCheckoutBtn.classList.remove("open-cart");

        // Add this loop to toggle the open-cart class for each cart item
        cartItemsList.forEach(function (cartItem) {
            cartItem.classList.remove("open-cart");
        });
    }
});


priceBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        const qtyElement = e.target.closest(".menu-quantity").querySelector(".price-btn__txt");
        const itemId = e.target.closest(".box").querySelector(".item-name").innerText;
        let currentQty = parseInt(qtyElement.textContent);
        let previousQty = cartItems[itemId] ? cartItems[itemId].quantity : 0;

        if (e.target.classList.contains("plus-btn") || e.target.classList.contains("fa-plus")) {
            if (currentQty >= 10) return;
            currentQty++;
        } else if (e.target.classList.contains("minus-btn") || e.target.classList.contains("fa-minus")) {
            if (currentQty <= 0) return;
            currentQty--;
        }

        qtyElement.textContent = currentQty;

        // Update the cartItems and cart display if the item already exists in the cart
        if (cartItems[itemId]) {
            cartItems[itemId].quantity = currentQty;
            if (currentQty === 0) {
                delete cartItems[itemId];
            }
            noOfItems += currentQty - previousQty;
            renderCart();
            productPrice();

            if (!cart.classList.contains("open-cart")) {
                let cartItemsList;
                cartItemsList = document.querySelectorAll(".head-cart__item");
                cartItemsList.forEach(function (cartItem) {
                    cartItem.classList.remove("open-cart");
                });
            }
        }
    });
});



addToCartBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
        e.preventDefault();
        const itemId = e.target.closest(".box").querySelector(".item-name").innerText;
        const itemPrice = parseFloat(e.target.closest(".box").querySelector(".menu-price").innerText.replace("RM", ""));
        const itemQuantity = parseInt(e.target.closest(".box").querySelector(".price-btn__txt").innerText);

        if (!cartItems[itemId]) {
            cartItems[itemId] = {
                price: itemPrice,
                quantity: 0
            };
        }

        cartItems[itemId].quantity += itemQuantity;
        noOfItems += itemQuantity;

        productPrice();
        renderCart();

        if (cart.classList.contains("open-cart")) {
            if (noOfItems >= 1) {
                cartIt();
            } else if (noOfItems <= 0) {
                cartTx();
            }
        }
    });
});


clearCart.addEventListener("click", function () {
    cartTx();
    noOfItems = 0;
    cartItems = {};
    renderCart();
    headerCart.style.setProperty("--display", `none`);
});

function updateDeleteBtnListeners() {
    const deleteBtns = document.querySelectorAll(".delete-btn");

    deleteBtns.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            const itemElement = e.target.closest(".head-cart__item");
            const itemName = itemElement.querySelector(".head-cart__des-txt").textContent;
            const itemQuantity = cartItems[itemName].quantity;

            // Remove item from cartItems and update noOfItems
            delete cartItems[itemName];
            noOfItems -= itemQuantity;

            // Remove the item element from the cart
            itemElement.remove();

            // Update the cart total price
            productPrice();

            // If no items remain in the cart, display the empty cart message
            if (noOfItems === 0) {
                cartTx();
            }
        });
    });
}

//checkout button redirect
cartCheckoutBtn.addEventListener("click", function () {
    window.location.href = "../html/reservation-confirmation.html";
});

//for the modal thingy
// Get all the buttons that open the modals
var modalBtns = document.querySelectorAll(".menu-details-btn");

// Add an event listener to each button
modalBtns.forEach((modalBtn) => {
    modalBtn.addEventListener("click", function () {
        // Find the corresponding modal for the clicked button
        const modal = modalBtn.nextElementSibling;

        // Show the modal
        modal.style.display = "block";

        // Get the <span> element that closes the modal
        const span = modal.querySelector(".close");

        // Add event listeners for closing the modal
        span.addEventListener("click", function () {
            modal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    });
});




