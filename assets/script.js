// 
// CONFIRMATION OF PASSWORD MATCH
// 
function confirmPwd() {
  var password = document.getElementById("pwd").value;
  var confirmPassword = document.getElementById("confirmation-pwd").value;
  var modalContainer = document.getElementById("modal-container");

  if (confirmPassword) {
    if (password !== confirmPassword) {
      modalContainer.style.display = "block";

      return false;
    }
    return true;
  }
}

// OPEN NAVBAR ON SMALL SCREEN

const bodyContainer = document.querySelector("body");
const openNav = document.querySelector(".open-nav");
const closeNav = document.querySelector(".close-nav");

function openNavBar() {
  bodyContainer.classList.add("open");
}
function closeNavBar() {
  bodyContainer.classList.remove("open");
}

openNav.addEventListener("click", openNavBar);
closeNav.addEventListener("click", closeNavBar);

// DISPLAY SELECT DROPDOWN FILTER
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

    dropdownBtn.addEventListener("click", optionsOpen);

    document.addEventListener("click", function (event) {
      const isClickInsideSelection =
        selectContainer.contains(event.target) ||
        dropdownBtn.contains(event.target);
      if (!isClickInsideSelection) {
        selectContainer.classList.remove("open-options");
      }
    });

    const selectedOptions = document.querySelectorAll(
      `.${optionsClass} .options`
    );

    selectedOptions.forEach(function (input) {
      input.addEventListener("click", function (event) {
        const selectedValue = event.target.getAttribute("value");
        console.log(selectedValue);

        selectContainer.classList.remove("open-options");
      });
    });
  }
}
selectOpen("filter-species", "species-filter");

// FILTER FOR SPECIES

const dogsFilter = document.getElementById("dogs-filter");
const catsFilter = document.getElementById("cats-filter");
const dogsContent = document.querySelectorAll(".chien-content");
const catsContent = document.querySelectorAll(".chat-content");
const noAdoptionMessage = document.querySelector(".no-adoptions-message"); 

if (dogsFilter) {
  dogsFilter.addEventListener("change", () => {
    dogsContent.forEach(function (dog) {
      dog.style.display = dogsFilter.checked ? "block" : "none";
    });
    catsContent.forEach(function (cat) {
      cat.style.display = "none";
    });

    // Show or hide the "No dogs for adoption" message
    if (dogsContent.length === 0) {
      
         noAdoptionMessage.style.display = "block";
    } else {
      noAdoptionMessage.style.display = "none";
    }
      
     
  });
}

if (catsFilter) {
  catsFilter.addEventListener("change", () => {
    catsContent.forEach(function (cat) {
      cat.style.display = catsFilter.checked ? "block" : "none";
    });
    dogsContent.forEach(function (dog) {
      dog.style.display = "none";
    });

     // Show or hide the "No dogs for adoption" message
     if (catsContent.length === 0 && catsFilter.checked) {
      noAdoptionMessage.style.display = "block";
    } else {
      noAdoptionMessage.style.display = "none";
    }
  });
}

// IMAGE PREVIEW

function previewFile() {
  const imageContainer = document.querySelector(".img-container");
  const previewImg = document.getElementById("previewImage");
  const fileInput = document.getElementById("image-upload");
  const files = fileInput.files;

  if (files.length > 0) {
    var reader = new FileReader();
    reader.onload = function (e) {
      previewImg.src = e.target.result;
    };
    imageContainer.style.display = "block";
    reader.readAsDataURL(files[0]);
  }
}

// LINK VALIDATION FOR EVENTS PAGE
function validateLinkFormat(input) {
  // Regex pattern for valid links (http, https, ftp)
  var linkFormat = /^(ftp|http|https):\/\/[^ "]+$/;

  // Get the error message element
  var errorMessage = document.getElementById('link-error-message');
  
  // Check if the input value matches the link format
  if (linkFormat.test(input.value)) {
      errorMessage.textContent = '';
  } else {
      errorMessage.textContent = 'Merci de renseigner un lien valide';
  }
}


jQuery(function($) {
  
  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
    $animatables.each(function(i) {
       var $animatable = $(this);
      if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
      }
    });

  };
  
  // Hook doAnimations on scroll, and trigger a scroll
  $(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

});