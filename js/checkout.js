document.addEventListener("DOMContentLoaded", function () {
  // Payment method selection
  const paymentMethods = document.querySelectorAll(".payment-method");
  const cardDetails = document.getElementById("card-details");

  paymentMethods.forEach((method) => {
    method.addEventListener("click", function () {
      // Remove selected class from all methods
      paymentMethods.forEach((m) => m.classList.remove("selected"));

      // Add selected class to clicked method
      this.classList.add("selected");

      // Hide all payment details
      cardDetails.classList.add("hide");

      // Show relevant payment details
      const methodId = this.getAttribute("data-method");
      if (methodId === "card") {
        cardDetails.classList.remove("hide");
      }
    });
  });

  // Shipping option selection
  const shippingOptions = document.querySelectorAll(".shipping-option");

  shippingOptions.forEach((option) => {
    option.addEventListener("click", function () {
      shippingOptions.forEach((o) => o.classList.remove("selected"));
      this.classList.add("selected");
    });
  });

  // Mobile order summary toggle
  const toggleSummary = document.querySelector(".toggle-summary");
  const orderSummary = document.querySelector(".order-summary");

  toggleSummary.addEventListener("click", function () {
    orderSummary.classList.toggle("show");
    const icon = this.querySelector("i");
    icon.classList.toggle("fa-chevron-down");
    icon.classList.toggle("fa-chevron-up");
  });
});

document.addEventListener("DOMContentLoaded", function () {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  const itemsContainer = document.querySelector(".order-summary .items");
  const summaryRow = document.querySelector(".order-summary .summary-row");

  function renderCart() {
    itemsContainer.innerHTML = "";
    summaryRow.innerHTML = "";

    if (cart.length === 0) {
      itemsContainer.innerHTML = "<p>Your cart is empty.</p>";
      return;
    }

    let total = 0;

    cart.forEach((product, index) => {
      let itemTotal = parseFloat(product.price) * product.quantity;
      total += itemTotal;

      const itemHTML = `
          <div class="item" style="display: flex; gap: 15px; align-items: center; margin-bottom: 20px;">
            <img src="${product.image}" alt="${
        product.name
      }" style="width: 100px; height: auto; object-fit: contain; border: 1px solid #ccc; padding: 5px;">
            <div>
              <p><strong>${product.name}</strong></p>
              <p>Price: EGP ${parseFloat(product.price).toFixed(2)}</p>
            <div class="quantity-controls">
                <button onclick="changeQuantity(${index}, -1)">-</button>
                <span>${product.quantity}</span>
                <button onclick="changeQuantity(${index}, 1)">+</button>
                </div>
        
              <p>Total: EGP ${itemTotal.toFixed(2)}</p>
              <button onclick="removeFromCart(${index})" title="Remove item"
                style="margin-top: 8px; background: none; border: none; cursor: pointer;">
                🗑️
              </button>
            </div>
          </div>
        `;
      itemsContainer.innerHTML += itemHTML;
    });

    summaryRow.innerHTML = `
        <p><strong>Subtotal (${
          cart.length
        } items):</strong> EGP ${total.toFixed(2)}</p>
      `;
  }

  // Change quantity (increment or decrement)
  window.changeQuantity = function (index, change) {
    if (cart[index].quantity + change >= 1) {
      cart[index].quantity += change;
      localStorage.setItem("cart", JSON.stringify(cart));
      renderCart();
    }
  };

  // Remove product from cart
  window.removeFromCart = function (index) {
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
  };

  renderCart(); // Initial render
});

function completePurchase() {
  const requiredFields = ["firstName", "lastName", "email", "phone", "address", "city"];
  let valid = true;
  
  // Hide any previous error or success message
  const errorMessageDiv = document.getElementById("errorMessage");
  if (errorMessageDiv) {
    errorMessageDiv.style.display = "none";
  }

  const successMessageDiv = document.getElementById("successMessage");
  if (successMessageDiv) {
    successMessageDiv.style.display = "none";
  }

  // Check if required fields are filled
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    if (!input || input.value.trim() === "") {
      input.style.border = "2px solid red"; // Highlight empty fields
      valid = false;
    } else {
      input.style.border = "";
    }
  });

  const selectedMethod = document.querySelector(".payment-method.selected");
  const isCard = selectedMethod && selectedMethod.dataset.method === "card";

  // If card payment is selected, validate card fields
  if (isCard) {
    const cardFields = ["cardName", "cardNumber", "expiry", "cvv"];
    cardFields.forEach((id) => {
      const input = document.getElementById(id);
      if (!input || input.value.trim() === "") {
        input.style.border = "2px solid red"; // Highlight empty fields
        valid = false;
      } else {
        input.style.border = "";
      }
    });
  }

  // If validation fails, show an error message
  if (!valid) {
    const errorMessageDiv = document.getElementById("errorMessage");
    if (!errorMessageDiv) {
      const newErrorMessageDiv = document.createElement("div");
      newErrorMessageDiv.id = "errorMessage";
      newErrorMessageDiv.style.backgroundColor = "#FF4747"; // Red background for error
      newErrorMessageDiv.style.color = "white";
      newErrorMessageDiv.style.padding = "15px 25px";
      newErrorMessageDiv.style.borderRadius = "10px";
      newErrorMessageDiv.style.boxShadow = "0 4px 10px rgba(0,0,0,0.2)";
      newErrorMessageDiv.style.fontWeight = "bold";
      newErrorMessageDiv.style.position = "fixed";
      newErrorMessageDiv.style.bottom = "30px";
      newErrorMessageDiv.style.right = "30px";
      newErrorMessageDiv.style.zIndex = "9999";
      newErrorMessageDiv.innerText = "❌ Please fill in all required fields before completing your purchase.";
      document.body.appendChild(newErrorMessageDiv); // Append to body to display
    } else {
      errorMessageDiv.style.display = "block"; // In case the message div already exists, just show it
    }
    return;
  }

  // Show success message after successful validation
  const successDiv = document.getElementById("successMessage");
  successDiv.style.display = "block";

  // Hide success message and redirect after 3 seconds
  setTimeout(() => {
    successDiv.style.display = "none";
    localStorage.removeItem("cart");
    window.location.href = "index.html";
  }, 3000);
}
