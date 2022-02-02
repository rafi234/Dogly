const goingButton = document.querySelectorAll('#goingButton');
const interestedButton = document.querySelectorAll('#interestedButton');


function going() {
    const interested = this;
    const container = interested.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    const elementToIncrement = container.children.item(1).children.item(2).children.item(1).children.item(0);
    const interestedAmount = elementToIncrement.innerHTML.split('<br>');
    const newValue = parseInt(interestedAmount[0]) + 1

    fetch(`/going/${id}`).then(function () {
        elementToIncrement.innerHTML = newValue + '<br>Going';
    })
}

function interested() {
    const interested = this;
    const container = interested.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    const elementToIncrement = container.children.item(1).children.item(2).children.item(1).children.item(1);
    const interestedAmount = elementToIncrement.innerHTML.split('<br>');
    const newValue = parseInt(interestedAmount[0]) + 1;

    fetch(`/interested/${id}`).then(function () {
        elementToIncrement.innerHTML = newValue + '<br>Interested';
    });
}

goingButton.forEach(button => button.addEventListener("click", going));
interestedButton.forEach(button => button.addEventListener("click", interested));