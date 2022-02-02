const logOutButton = document.querySelector('.fa-sign-out-alt');

logOutButton.addEventListener('click', function () {
    document.cookie = "id_user=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
});