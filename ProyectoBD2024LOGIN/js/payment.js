document.getElementById("cashOption").addEventListener("click", function() {
    localStorage.removeItem("cart");
    window.location.href = "order-status.html";
});

document.getElementById("cardOption").addEventListener("click", function() {
    document.getElementById("cardForm").style.display = "block";
});

document.getElementById("cardForm").addEventListener("submit", function(e) {
    e.preventDefault();
    localStorage.removeItem("cart");
    window.location.href = "order-status.html";
});
