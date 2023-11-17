const navBar = document.querySelector('body');
const openNav = document.querySelector('.open-nav');
const closeNav = document.querySelector('.close-nav');

function openNavBar() {
    navBar.classList.add("open");
}
function closeNavBar() {
    navBar.classList.remove("open");
}


openNav.addEventListener('click', openNavBar);
closeNav.addEventListener('click', closeNavBar);