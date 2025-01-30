document.addEventListener("DOMContentLoaded", function () {
  const addToCartButtons = document.querySelectorAll(".add-to-cart");
  const offcanvasCart = new bootstrap.Offcanvas(
    document.getElementById("offcanvasCart")
  );
  const cartItemsList = document.getElementById("cart-items-list");

  // Add to Cart functionality
  addToCartButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      const productId = button.getAttribute("data-product-id");
      const productName = button.getAttribute("data-product-name");
      const productPrice = button.getAttribute("data-product-price");

      // Send AJAX request to add item to the cart
      fetch("backend/add_to_cart.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `action=add&id=${productId}&name=${productName}&price=${productPrice}`,
      })
        .then((response) => response.json())
        .then((data) => {
          alert(data.message); // Show success message

          // Update cart items in the offcanvas
          updateCartItems(data.cart);
          offcanvasCart.show(); // Open the offcanvas cart
        })
        .catch((error) => {
          console.error("Error adding to cart:", error);
        });
    });
  });

  // Remove one quantity of an item
  cartItemsList.addEventListener("click", function (event) {
    if (event.target && event.target.classList.contains("remove-one")) {
      const productId = event.target.getAttribute("data-product-id");

      // Send AJAX request to remove one quantity from the cart
      fetch("backend/add_to_cart.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `action=remove_one&id=${productId}`,
      })
        .then((response) => response.json())
        .then((data) => {
          alert(data.message); // Show success message

          // Update cart items in the offcanvas
          updateCartItems(data.cart);
        })
        .catch((error) => {
          console.error("Error removing one from cart:", error);
        });
    }

    // Remove item completely from the cart
    if (event.target && event.target.classList.contains("remove")) {
      const productId = event.target.getAttribute("data-product-id");

      // Send AJAX request to remove item completely from the cart
      fetch("backend/add_to_cart.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `action=remove&id=${productId}`,
      })
        .then((response) => response.json())
        .then((data) => {
          alert(data.message); // Show success message

          // Update cart items in the offcanvas
          updateCartItems(data.cart);
        })
        .catch((error) => {
          console.error("Error removing from cart:", error);
        });
    }
  });

  // Update the cart display inside the offcanvas
  function updateCartItems(cart) {
    cartItemsList.innerHTML = ""; // Clear existing items

    cart.forEach((item) => {
      const li = document.createElement("li");
      li.classList.add(
        "list-group-item",
        "d-flex",
        "justify-content-between",
        "align-items-center"
      );

      // Create left side for the item name and price
      const leftSide = document.createElement("div");
      leftSide.classList.add(
        "d-flex",
        "justify-content-start",
        "align-items-center"
      );
      leftSide.innerHTML = `${item.name} - $${item.price} x ${item.quantity}`;

      // Create right side for the buttons
      const rightSide = document.createElement("div");
      rightSide.classList.add(
        "d-flex",
        "justify-content-end",
        "align-items-center"
      );

      // Add the Remove One and Remove buttons to the right side
      const removeOneButton = document.createElement("button");
      removeOneButton.classList.add("btn", "btn-sm", "btn-danger", "me-2");
      removeOneButton.textContent = "-";
      removeOneButton.setAttribute("data-product-id", item.id);
      removeOneButton.classList.add("remove-one");

      const removeButton = document.createElement("button");
      removeButton.classList.add("btn", "btn-sm", "btn-danger");
      removeButton.textContent = "x";
      removeButton.setAttribute("data-product-id", item.id);
      removeButton.classList.add("remove");

      // Append buttons to the right side
      rightSide.appendChild(removeOneButton);
      rightSide.appendChild(removeButton);

      // Append both sides (left and right) to the list item (li)
      li.appendChild(leftSide);
      li.appendChild(rightSide);

      // Append the list item to the cart list
      cartItemsList.appendChild(li);
    });
  }
});

// Display the toast messages if they are set
document.addEventListener("DOMContentLoaded", function () {
  const successToast = document.querySelector(".toast.bg-success");
  const errorToast = document.querySelector(".toast.bg-danger");

  // Show the success toast if it exists
  if (successToast) {
    const toast = new bootstrap.Toast(successToast);
    toast.show();
  }

  // Show the error toast if it exists
  if (errorToast) {
    const toast = new bootstrap.Toast(errorToast);
    toast.show();
  }
});
