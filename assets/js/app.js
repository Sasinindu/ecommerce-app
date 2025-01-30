// Example of adding interactivity, like handling the add-to-cart event
document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            alert('Added product ' + productId + ' to cart!');
        });
    });
});
