const cart = JSON.parse(localStorage.getItem("cart") || "[]");
const cartItems = document.getElementById("cartItems");
const totalPriceElement = document.getElementById("totalPrice");

let totalPrice = 0;

cart.forEach(item => {
    const li = document.createElement("li");
    li.textContent = `${item.name} - $${item.price}`;
    cartItems.appendChild(li);
    totalPrice += item.price;
});

totalPriceElement.textContent = totalPrice.toFixed(2);

document.getElementById("checkoutButton").addEventListener("click", function() {
    window.location.href = "payment.html";
});
