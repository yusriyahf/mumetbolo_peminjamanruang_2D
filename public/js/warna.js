function setCardClasses() {
    var ruangCards = document.querySelectorAll(".ruang-card");

    ruangCards.forEach(function(card) {
        var status = card.getAttribute("data-status");

        switch (status) {
            case "tersedia":
                card.classList.add("bg-success");
                break;
            case "dipakai":
                card.classList.add("bg-danger");
                break;
            case "dibooking":
                card.classList.add("bg-secondary");
                break;
            case "diacc":
                card.style.backgroundColor = "rgb(52, 52, 52)";                
                // card.classList.add("bg-dark");
                break;
            default:
                card.classList.add("bg-primary");
                break;
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    setCardClasses();
});