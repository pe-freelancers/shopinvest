function changeImage(element) {
    var newSrc = element.getAttribute("src");
    var mainImage = document.getElementById("mainImage");

    mainImage.setAttribute("src", newSrc);
}

function addToCard() {
    var amount = +document.getElementById("inputAmount").value;
    var total = +document.getElementById("total-item").textContent;
    document.getElementById("total-item").textContent = amount + total;

    mainImage.setAttribute("src", newSrc);
}

window.onload = (event) => {
    var inputElement = document.getElementById("inputAmount");

    inputElement.addEventListener("input", function () {
        var inputValue = inputElement.value;
        var cleanedValue = inputValue.replace(/[^0-9]/g, "");
        console.log(inputValue);
        if (!/^[1-9]\d*$/.test(inputValue)) {
            inputElement.value = cleanedValue || 1;
        }
    });
};

function decreaseItem() {
    var inputElement = document.getElementById("inputAmount");
    var currentValue = parseInt(inputElement.value, 10);
    if (currentValue > 1) {
        inputElement.value = currentValue - 1;
    }
}

function increaseItem() {
    var inputElement = document.getElementById("inputAmount");
    var currentValue = parseInt(inputElement.value, 10);
    inputElement.value = currentValue + 1;
}
