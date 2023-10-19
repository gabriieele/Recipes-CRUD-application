import "./bootstrap";

setTimeout(function () {
    var successMessage = document.getElementById("message");
    if (successMessage) {
        successMessage.style.display = "none";
    }
}, 2500);
