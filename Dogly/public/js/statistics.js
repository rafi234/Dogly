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


    fetch(`/interested/${id}`).then(function () {
        elementToIncrement.innerHTML = newValue + '<br>Interested';
    });
}

function incrementColumn(columnName) {
    const interested = this;
    const container = interested.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");
    const whatToIncrement = columnName === 'going' ? 0 : 1;
    const elementToIncrement = container.children.item(1).children.item(2).children.item(1).children.item(whatToIncrement);
    const interestedAmount = elementToIncrement.innerHTML.split('<br>');
    const newValue = parseInt(interestedAmount[0]) + 1;

    const restOfString = whatToIncrement === 0 ? '<br>Going' : '<br>Interested';
    fetch(`/interested/${id}`).then(function () {
        elementToIncrement.innerHTML = newValue + restOfString;
    });

}


goingButton.forEach(button => button.addEventListener("click", going));
interestedButton.forEach(button => button.addEventListener("click", interested));