
document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");
    deleteForms.forEach(form => {
        form.addEventListener("submit", function (e) {
            if (!confirm("Es-tu sûr de vouloir supprimer cet élément ?")) {
                e.preventDefault();
            }
        });
    });


    const flash = document.querySelector(".flash-message");
    if (flash) {
        setTimeout(() => {
            flash.style.display = "none";
        }, 3000);
    }


    const firstInput = document.querySelector("input, textarea");
    if (firstInput) {
        firstInput.focus();
    }
});
