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
function setupDropdown(btnId, optionsClass) {
    const dropdownBtn = document.getElementById(btnId);
    const selectedOptions = document.querySelectorAll(`.${optionsClass} .options`);
    const selectContainer = document.querySelector(`.${optionsClass}`);

    function toggleOptions(event) {
        if (selectContainer.classList.contains("open-options")) {
            selectContainer.classList.remove("open-options");
        } else {
            selectContainer.classList.add("open-options");
        }
    }

    selectedOptions.forEach(function (input) {
        input.addEventListener('click', function (event) {
            const selectedValue = event.target.getAttribute('value');
            console.log(selectedValue);
            selectContainer.classList.remove("open-options");
        });
    });

    dropdownBtn.addEventListener('click', toggleOptions);

    document.addEventListener('click', function (event) {
        const isClickInsideSelection = selectContainer.contains(event.target) || dropdownBtn.contains(event.target);
        if (!isClickInsideSelection) {
            selectContainer.classList.remove("open-options");
        }
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();
        });
    });
}

setupDropdown('filter-species', 'species-filter');
setupDropdown('select-animal-gender', 'select-gender');
setupDropdown('select-animal-specie', 'select-specie');
