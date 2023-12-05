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

function selectOpen(button, optionsClass) {
    const dropdownBtn = document.getElementById(button);
    const selectContainer = document.querySelector(`.${optionsClass}`);

    // Check if elements exist before attaching event listeners
    if (dropdownBtn && selectContainer) {
        function optionsOpen() {
            if (selectContainer.classList.contains("open-options")) {
                selectContainer.classList.remove("open-options");
            } else {
                selectContainer.classList.add("open-options");
            }
        }

        dropdownBtn.addEventListener('click', optionsOpen);

        document.addEventListener('click', function (event) {
            const isClickInsideSelection = selectContainer.contains(event.target) || dropdownBtn.contains(event.target);
            if (!isClickInsideSelection) {
                selectContainer.classList.remove("open-options");
            }
        });

        const selectedOptions = document.querySelectorAll(`.${optionsClass} .options`);
        selectedOptions.forEach(function (input) {
            input.addEventListener('click', function (event) {
                const selectedValue = event.target.getAttribute('value');
                console.log(selectedValue);
                
                selectContainer.classList.remove("open-options");
            });
        });

    }
}
selectOpen('filter-species', 'species-filter');
