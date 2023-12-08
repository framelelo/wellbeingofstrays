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


const radioButtons = document.querySelectorAll('.options');
const contentItems = document.querySelectorAll('.card');

radioButtons.forEach(button => {
  button.addEventListener('change', filterContent);
});

function filterContent() {
  const selectedValue = document.querySelector('input[name="species"]:checked').value;

  contentItems.forEach(item => {
    item.style.display = 'block';
  });

  const filteredItems = document.querySelectorAll(`.card:not(.${selectedValue})`);
  filteredItems.forEach(item => {
    item.style.display = 'none';
  });
}

function triggerClick() {
    document.getElementById('image-upload').click();
}

function previewFile() {
    var preview = document.querySelector('.img-container img');
    var image = document.querySelector('.img-preview');
    var fileInput = document.getElementById('image-upload');
    var files = fileInput.files;

    if (files.length > 0) {
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        image.style.display = 'block';
        reader.readAsDataURL(files[0]);
    } else {
        // If no file is selected, you can set a default image or leave it blank
        preview.src = "uploads/default-image.jpg";
    }
}