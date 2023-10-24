import "./bootstrap";

setTimeout(function () {
    var successMessage = document.getElementById("message");
    if (successMessage) {
        successMessage.style.display = "none";
    }
}, 2500);

document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".del-recipe");
    const modal = document.querySelector("#deleteForm");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const deleteUrl = event.target.getAttribute("data-url");
            modal.action = deleteUrl;
        });
    });
});
