const bodyContainer = document.querySelector('body');
const openNav = document.querySelector('.open-nav');
const closeNav = document.querySelector('.close-nav');

function openNavBar() {
    bodyContainer.classList.add("open");
}
function closeNavBar() {
    bodyContainer.classList.remove("open");
}


openNav.addEventListener('click', openNavBar);
closeNav.addEventListener('click', closeNavBar);


const selectBtn = document.querySelector('.filter');
const selectedInput= document.querySelectorAll('.options');
const selectOptions = document.querySelector('.select-dropdown');

function toggleSelectOptions() {
    if (selectOptions.classList.contains("open-options")) {
        selectOptions.classList.remove("open-options");
    } else {
        selectOptions.classList.add("open-options");
    }
}

selectedInput.forEach(function (input) {
    input.addEventListener('click', toggleSelectOptions);
});

selectBtn.addEventListener('click', toggleSelectOptions);

document.addEventListener('click', function (event) {
    const isClickInsideFilter = selectOptions.contains(event.target) || selectBtn.contains(event.target);
    if (!isClickInsideFilter) {
        selectOptions.classList.remove("open-options");
    }
});

