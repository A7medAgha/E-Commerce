// Function to display the wishlist items from localStorage
function renderWishlist() {
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    let wishlistContainer = document.querySelector('.table tbody');

    wishlistContainer.innerHTML = ''; // Clear the container first

    if (wishlist.length === 0) {
        wishlistContainer.innerHTML = "<tr><td colspan='5'>Your wishlist is empty</td></tr>";
    } else {
        wishlist.forEach((item, index) => {
            let productRow = document.createElement('tr');
            productRow.innerHTML = `
                <td class="product-col">
                    <div class="product">
                        <figure class="product-media">
                            <a href="#">
                                <img src="${item.image}" alt="Product image">
                            </a>
                        </figure>
                        <h3 class="product-title"><a href="#">${item.name}</a></h3>
                    </div>
                </td>
                <td class="price-col">${item.price}</td>
                <td class="action-col">
                    <button class="btn btn-block btn-outline-primary-2" onclick="addToCart('${item.name}', '${item.price}', '${item.image}', 1)">
                        <i class="icon-cart-plus"></i>Add to Cart
                    </button>
                </td>
                <td class="remove-col">
                    <button class="btn-remove" onclick="removeFromWishlist(${index})">
                        <i class="icon-close"></i>
                    </button>
                </td>
            `;
            wishlistContainer.appendChild(productRow);
        });
    }
}

// Function to remove item from wishlist
function removeFromWishlist(index) {
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
    wishlist.splice(index, 1); // Remove the product from the array
    localStorage.setItem('wishlist', JSON.stringify(wishlist)); // Update localStorage
    renderWishlist(); // Re-render wishlist
}

// Function to add product to cart
function addToCart(name, price, image, quantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    let product = {
        name: name,
        price: price,
        image: image,
        quantity: parseInt(quantity)
    };

    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));

    alert(`${name} has been added to your cart!`);
}

// Load wishlist when page is ready
document.addEventListener('DOMContentLoaded', function () {
    renderWishlist();
});
