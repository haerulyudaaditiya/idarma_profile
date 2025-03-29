(function () {
    "use strict";

    let forms = document.querySelectorAll(".php-email-form");

    forms.forEach(function (e) {
        e.addEventListener("submit", function (event) {
            let thisForm = this;

            // Tampilkan loading dan sembunyikan pesan
            thisForm.querySelector(".loading").classList.add("d-block");
            thisForm
                .querySelector(".error-message")
                .classList.remove("d-block");
            thisForm.querySelector(".sent-message").classList.remove("d-block");

            // Biarkan form tetap dikirim (jangan preventDefault!)
            // Tapi kita tambahkan delay kecil agar efek loading terlihat
            setTimeout(() => {
                thisForm.querySelector(".loading").classList.remove("d-block");
            }, 1000);
        });
    });
})();
