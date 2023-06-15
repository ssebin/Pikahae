//order_item table

const foodContainer = document.getElementById('food');
const cartBtn = document.querySelector('.head-rgt__btn');
const cartContainer = document.getElementById('menu-head-cart');
const cartCloseBtn = document.querySelector('.cart-close');
const cartItemsContainer = document.getElementById('cart-items-container');
const cartTotalPrice = document.getElementById('cart-total-price');
const cartCheckoutBtn = document.getElementById('cart-checkout-btn');
const cartItemCount = document.querySelector('.cart-item-count');

let cartItems = []; // Array to store the cart items

// Function to fetch the menu items from the server
async function fetchMenuItems() {
    try {
        const response = await fetch('get_menu_items.php');

        // Check if the response is okay
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const menu = await response.json();

        // Check if there's any error message from the server
        if (menu.error) {
            throw new Error(menu.error);
        }

        // Process the menu items and update the menu HTML
        menu.forEach((menuItem) => {
            const {menu_id,menu_name,menu_price,menu_cat,
                menu_stock,menu_img,menu_desc,} = menuItem;

            const box = document.createElement('div');
            box.className = 'box';

            const categoryBtn = document.createElement('a');
            categoryBtn.className = 'category-btn';
            categoryBtn.textContent = menu_cat;

            const img = document.createElement('img');
            img.src = menu_img;

            const itemText = document.createElement('div');
            itemText.className = 'item-text';

            const itemName = document.createElement('h3');
            itemName.className = 'item-name';
            itemName.textContent = menu_name;

            const price = document.createElement('span');
            price.className = 'menu-price';
            price.textContent = 'RM' + parseFloat(menu_price).toFixed(2);

            const viewDetails = document.createElement('span');
            viewDetails.className = 'menu-details-btn';
            viewDetails.textContent = 'View details';

            const poBtnContainer = document.createElement('div');
            poBtnContainer.className = 'po-btn-container';

            const menuQuantity = document.createElement('div');
            menuQuantity.className = 'menu-quantity';

            const minusBtn = document.createElement('button');
            minusBtn.className = 'minus-btn price-btn__img';
            minusBtn.innerHTML = '<i class="fa-solid fa-minus"></i>';

            const quantityText = document.createElement('span');
            quantityText.className = 'price-btn__txt';
            quantityText.textContent = '0';

            const plusBtn = document.createElement('button');
            plusBtn.className = 'plus-btn price-btn__img';
            plusBtn.innerHTML = '<i class="fa-solid fa-plus"></i>';

            // Add event listeners for the plus and minus buttons
            minusBtn.addEventListener('click', function () {
                const currentQuantity = parseInt(quantityText.textContent, 10);
                if (currentQuantity > 0) {
                    quantityText.textContent = currentQuantity - 1;
                }
            });

            plusBtn.addEventListener('click', function () {
                const currentQuantity = parseInt(quantityText.textContent, 10);
                quantityText.textContent = currentQuantity + 1;
            });

            const poBtn = document.createElement('a');
            poBtn.href = '#';
            poBtn.className = 'po-btn';
            poBtn.textContent = 'Add to cart';

            // Add event listener for "Add to cart" button
            poBtn.addEventListener('click', function () {
                const currentQuantity = parseInt(quantityText.textContent, 10);
                if (currentQuantity > 0) {
                    const cartItem = {
                        menu_id: menu_id,
                        menu_name: menu_name,
                        menu_price: menu_price,
                        menu_img: menu_img,
                        quantity: currentQuantity,
                    };
                    console.log(`Adding to cart: ${menu_name} with image ${menu_img}`); // Log the menu name and image

                    addToCart(cartItem);
                    updateCartItemCount();
                }
            });

            // Append elements to the box div
            box.appendChild(categoryBtn);
            box.appendChild(img);
            box.appendChild(itemText);
            box.appendChild(viewDetails);
            itemText.appendChild(itemName);
            itemText.appendChild(price);

            // Append elements to the poBtnContainer div
            menuQuantity.appendChild(minusBtn);
            menuQuantity.appendChild(quantityText);
            menuQuantity.appendChild(plusBtn);
            poBtnContainer.appendChild(menuQuantity);
            poBtnContainer.appendChild(poBtn);

            // Append the poBtnContainer to the box
            box.appendChild(poBtnContainer);

            // Append the box to the food container
            foodContainer.appendChild(box);
        });
    } catch (error) {
        console.log('Error:', error.message);
    }

// Function to add an item to the cart
function addToCart(item) {
    const existingItem = cartItems.find((cartItem) => cartItem.menu_id === item.menu_id);

    if (existingItem) {
        existingItem.quantity += item.quantity;
        console.log(`Item with menu_id ${existingItem.menu_id} now has quantity ${existingItem.quantity}`);
    } else {
        cartItems.push(item);
        console.log(`New item with menu_id ${item.menu_id} added to cart with quantity ${item.quantity}`);
    }

    console.log('Current cartItems:', cartItems);
    updateCart();
}

// Event listener for cart checkout button click
cartCheckoutBtn.addEventListener('click', async function () {
    // Implement your checkout logic here
    console.log('Checkout clicked');

    // Create a new order
    // const response = await fetch('create_order.php', {
    //     method: 'POST',
    //     headers: { 'Content-Type': 'application/json' },
    //     body: JSON.stringify({})
    // });

    // const new_order = await response.json();

    // if (new_order.error) {
    //     console.error(new_order.error);
    //     return;
    // }

    const orderId = new_order.order_id;

    // Add items to the new_order
    for (let item of cartItems) {
        const response = await fetch('add_item_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ order_id: orderId, menu_id: item.menu_id, order_qty: item.quantity })
        });

        const result = await response.json();

        if (result.error) {
            console.error(`Error adding item ${item.menu_id} to order ${orderId}: ${result.error}`);
        } else {
            console.log(`Added item ${item.menu_id} to order ${orderId}`);
        }
    }
    cartItems = [];
    updateCart();
    updateCartItemCount();
});

const emptyCartText = document.querySelector('.head-cart__txt');

// Function to update the cart items display
function updateCart() {
    cartItemsContainer.innerHTML = '';
    let totalItems = 0;

    if (cartItems.length === 0) {
        emptyCartText.style.visibility = 'visible';
        cartTotalPrice.style.visibility = 'hidden';
        cartCheckoutBtn.style.visibility = 'hidden';
    } else {
        cartItems.forEach((item) => {
            emptyCartText.style.visibility = 'hidden';
            const cartItem = document.createElement('div');
            cartItem.className = 'head-cart__item';

            const cartItemWrapper = document.createElement('div');
            cartItemWrapper.className = 'head-cart__item-wrapper';

            const deleteBtn = document.createElement('span');
            deleteBtn.className = 'delete-btn';
            deleteBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';

            const img = document.createElement('img');
            img.src = item.menu_img;
            img.className = 'head-cart__item-img';

            const itemDesc = document.createElement('div');
            itemDesc.className = 'head-cart__des';

            const itemName = document.createElement('p');
            itemName.className = 'head-cart__des-txt';
            itemName.textContent = item.menu_name;

            const itemPrice = document.createElement('span');
            itemPrice.className = 'head-cart__price-single';
            itemPrice.textContent = 'RM' + parseFloat(item.menu_price).toFixed(2) + '*' + item.quantity;

            // Add event listener for delete button
            deleteBtn.addEventListener('click', function () {
                removeFromCart(item.menu_id);
                updateCartItemCount();
            });

            itemDesc.appendChild(itemName);
            itemDesc.appendChild(itemPrice);
            cartItemWrapper.appendChild(deleteBtn);
            cartItemWrapper.appendChild(img);
            cartItemWrapper.appendChild(itemDesc);
            cartItem.appendChild(cartItemWrapper);
            cartItemsContainer.appendChild(cartItem);

            document.querySelectorAll('.head-cart__item').forEach(item => item.style.visibility = 'visible');
            totalItems += item.quantity;
        });

        // After appending the cart items, update the cart total price visibility
        updateCartTotalPrice();
        // Show the cart items container
        cartItemsContainer.style.visibility = 'visible';
        cartTotalPrice.style.visibility = 'visible';
        cartCheckoutBtn.style.visibility = 'visible';
    }

    // Update cart item count
    cartItemCount.textContent = totalItems;
    cartItemCount.style.display = totalItems > 0 ? 'block' : 'none';
    cartItemCount.classList.toggle('open-cart', totalItems > 0);
}


document.addEventListener('click', function (event) {
    const target = event.target;
    if (!target.closest('.menu-head-cart') && !target.closest('.head-rgt__btn')) {
        cartContainer.classList.remove('open-cart');
        cartItemsContainer.style.visibility = 'hidden';
    }
});

// Function to remove an item from the cart
function removeFromCart(menuId) {
    cartItems = cartItems.filter((item) => item.menu_id !== menuId);
    updateCart();
}

// Function to update the cart total price
function updateCartTotalPrice() {
    if (cartItems.length === 0) {
        cartTotalPrice.style.visibility = 'hidden';
        cartCheckoutBtn.style.visibility = 'hidden';
    } else {
        const totalPrice = cartItems.reduce((total, item) => total + item.menu_price * item.quantity, 0);
        cartTotalPrice.textContent = 'RM' + totalPrice.toFixed(2);
        cartTotalPrice.style.visibility = 'visible';
        cartCheckoutBtn.style.visibility = 'visible';
    }
}

// Function to update the cart item count
function updateCartItemCount() {
    const itemCount = cartItems.reduce((count, item) => count + item.quantity, 0);
    cartItemCount.textContent = itemCount;
    cartItemCount.style.display = itemCount > 0 ? 'block' : 'none';
    cartItemCount.classList.toggle('open-cart', itemCount > 0);
}

// Function to toggle the cart visibility
function toggleCart() {
    cartContainer.classList.toggle('open-cart');
    cartItemsContainer.style.visibility = cartContainer.classList.contains('open-cart') ? 'visible' : 'hidden';
}

// Event listener for cart button click
cartBtn.addEventListener('click', toggleCart);

// Event listener for cart close button click
cartCloseBtn.addEventListener('click', toggleCart);


// Call the fetchMenuItems function to load the menu items
fetchMenuItems();
}