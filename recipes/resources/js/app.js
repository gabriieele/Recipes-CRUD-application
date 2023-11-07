import "./bootstrap";

setTimeout(function () {
    var successMessage = document.getElementById("message");
    if (successMessage) {
        successMessage.style.display = "none";
    }
}, 2500);

document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".del");
    const modal = document.querySelector("#deleteForm");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const deleteUrl = button.getAttribute("data-url");
            modal.action = deleteUrl;
        });
    });
});

$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        dots: true,
        items: 6,
        margin: 10,
        responsive: {
            0: {
                items: 4,
            },
            480: {
                items: 3,
            },
            768: {
                items: 4,
            },
            901: {
                items: 6,
            },
        },
    });
});

$("#ratingForm").change(".star", function (e) {
    $(this).submit();
});
