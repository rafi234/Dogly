const mobileNav = document.querySelector('#navigation-list');
const navToggle = document.querySelector('.mobile-nav-toggle');

navToggle.addEventListener('click', () => {
    const visibility = mobileNav.getAttribute('data-visible');
    if(visibility === "false") {
        setValues(true)
    } else if (visibility === "true") {
        setValues(false)
    }
});

function setValues($value) {
    mobileNav.setAttribute('data-visible', $value);
    navToggle.setAttribute('aria-expended', $value);
}