//TODO: Combine the previous javascript
//TODO: Fix the css for some of the stuff (the plus/minus/add to cart position)
//TODO: Fix the plus and minus button not appearing
//TODO: Add the modal when you click at the details

document.addEventListener("DOMContentLoaded", function() {
    const SUPABASE_URL = 'https://lrdpllwtkxlqgwcmpjju.supabase.co'
    const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImxyZHBsbHd0a3hscWd3Y21wamp1Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2ODU1OTY4MDMsImV4cCI6MjAwMTE3MjgwM30.6VFgPcFj9bYG1b5Tza3O70H-HitdPb9kzjwJ5OnBz9k'
    const _supabase = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY)

    // Fetch data from database
    async function fetchMenuItems(category = 'all') {
        const { data, error } = await _supabase.from('menu').select('*');

        if (error) {
            console.error('Error fetching menu items: ', error);
        } else {
            // Clear existing items before creating new ones
            const container = document.getElementById('food');
            container.innerHTML = '';

            // Filter the items based on the category (unless it's 'ALL')
            const filteredItems = category === 'all' ? data : data.filter(item => item.menu_cat.toLowerCase() === category);

            // Create menu items
            filteredItems.forEach(item => {
                createMenuItem(item);
            });
        }
    }

    // Variables related to cart functionality
    let cartItems = {};
    let noOfItems = 0;

// Other necessary variables
    const menuContainer = document.querySelector('.menu-container');
    const categoriesMenu = document.querySelector('.categories-menu');
    const addToCartBtns = document.querySelectorAll('.add-to-cart-btn');

// Variables for quantity modification
    const plusBtns = document.querySelectorAll('.plus-btn');
    const minusBtns = document.querySelectorAll('.minus-btn');
    const quantityDisplays = document.querySelectorAll('.price-btn__txt');

// Variables for cart functionality
    const cart = document.querySelector('.menu-head-cart');
    const cartBtn = document.querySelector('.head-rgt__btn');
    const cartItemCount = document.querySelector('.cart-item-count');
    const cartTotal = document.querySelector('.head-cart__price-total');
    const headerCart = document.querySelector('.head-rgt');
    let cartCheckoutBtn = document.querySelector('.head-cart-checkout');
    const closeCartBtn = document.querySelector('.cart-close');
    const clearCart = document.querySelector('.delete-btn');
    const cartItem = document.querySelector('.head-cart__item');
    const emptyCartTxt = document.querySelector('.head-cart__txt');


// Variable for the scroll to top button
    const topBtn = document.getElementById('topBtn');

// Helper function to create a menu item in HTML
    function createMenuItem(item) {
        // Create the elements
        const divBox = document.createElement('div');
        divBox.classList.add('box');

        const aCategory = document.createElement('a');
        aCategory.href = '#';
        aCategory.classList.add('category-btn');
        aCategory.innerText = item.menu_cat;

        const img = document.createElement('img');
        img.src = item.menu_img;
        img.dataset.imgSrc = item.menu_img;

        const divItemText = document.createElement('div');
        divItemText.classList.add('item-text');

        const h3ItemName = document.createElement('h3');
        h3ItemName.classList.add('item-name');
        h3ItemName.innerText = item.menu_name;

        const spanPrice = document.createElement('span');
        spanPrice.classList.add('menu-price');
        spanPrice.innerText = `RM ${item.menu_price}.00`;

        //add a line break
        const br = document.createElement('br');

        const spanDetailsBtn = document.createElement('span');
        spanDetailsBtn.classList.add('menu-details-btn');
        spanDetailsBtn.innerText = "View details";

        //for modal
        const divModal = document.createElement('div');
        divModal.classList.add('modal');
        const divModalContent = document.createElement('div');
        divModalContent.classList.add('modal-content');
        divModal.appendChild(divModalContent);

        const divBtnContainer = document.createElement('div');
        divBtnContainer.classList.add('po-btn-container');

        //the icons doesnt appear for now
        const divMenuQuantity = document.createElement('div');
        divMenuQuantity.classList.add('menu-quantity');
        const btnMinus = document.createElement('button');
        btnMinus.classList.add('minus-btn', 'price-btn__img');
        const btnPlus = document.createElement('button');
        btnPlus.classList.add('plus-btn', 'price-btn__img');

        // Create quantity span
        const spanQuantity = document.createElement('span');
        spanQuantity.classList.add('price-btn__txt');
        spanQuantity.innerText = '0';  // Initial quantity = 0

        // Add event listeners to plus and minus buttons
        btnMinus.addEventListener('click', function() {
            let quantity = parseInt(spanQuantity.innerText);
            if (quantity > 0) {
                spanQuantity.innerText = quantity - 1;
            }
        });

        btnPlus.addEventListener('click', function() {
            let quantity = parseInt(spanQuantity.innerText);
            spanQuantity.innerText = quantity + 1;
        });

        divMenuQuantity.appendChild(btnMinus);
        divMenuQuantity.appendChild(spanQuantity);  // Append quantity span to divMenuQuantity
        divMenuQuantity.appendChild(btnPlus);

        const aAddToCart = document.createElement('a');
        aAddToCart.href = '#';
        aAddToCart.classList.add('po-btn');
        aAddToCart.innerText = "Add to cart";
        divBtnContainer.appendChild(divMenuQuantity);
        divBtnContainer.appendChild(aAddToCart);

        divBtnContainer.appendChild(divMenuQuantity);
        divBtnContainer.appendChild(aAddToCart);

        // Append elements to the parents
        divItemText.appendChild(h3ItemName);
        divItemText.appendChild(spanPrice);
        divItemText.appendChild(br); // append line break here
        divItemText.appendChild(spanDetailsBtn);
        divItemText.appendChild(divModal);

        divBox.appendChild(aCategory);
        divBox.appendChild(img);
        divBox.appendChild(divItemText);
        divBox.appendChild(divBtnContainer);

        // Append the box to the main container
        const container = document.getElementById('food');
        container.appendChild(divBox);
    }

// Add the click event listener to each category button
    document.querySelectorAll('.menu-navlist a').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();

            // Get category from href attribute of the clicked link,
            // and convert it to lowercase to match database
            const category = item.getAttribute('href').replace('#', '').toLowerCase();

            // Fetch and display data based on the clicked category
            fetchMenuItems(category);
        });
    });

    // Call the fetch function
    fetchMenuItems();

    // checkout button redirect
    cartCheckoutBtn = document.querySelector('.head-cart-checkout');
    if(cartCheckoutBtn) {
        cartCheckoutBtn.addEventListener("click", function () {
            window.location.href = "../html/reservation-confirmation.html";
        });
    }

    //for the modal thingy
    // Get all the buttons that open the modals
    var modalBtns = document.querySelectorAll(".menu-details-btn");

    // Add an event listener to each button
    /*modalBtns.forEach((modalBtn) => {
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
    });*/

    // scroll to top

    // Get the button:
    let mybutton = document.getElementById("topBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    };

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    mybutton.addEventListener("click", topFunction);
});
