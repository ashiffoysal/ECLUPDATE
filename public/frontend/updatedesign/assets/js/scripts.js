$(document).ready(function(){
	// Mobile Menu
	$('.menu_icon').click(function(){
		$('.fixed_overlay').show();
		$('.dropdown_menu_main').addClass('dropdown_menu_main_show');
		// $('body').addClass('header_fixed');
		$('.header_main').addClass('header_inherit');

		return false
	});
	$('.menu_close_icon, .fixed_overlay').click(function(){
		$('.fixed_overlay').hide();
		$('.dropdown_menu_main').removeClass('dropdown_menu_main_show');
		// $('body').removeClass('header_fixed');
		$('.header_main').removeClass('header_inherit');

		return false
	});


	// Dashboard Mobile Menu
	$('.dashboard_mobile_menu_bar').click(function(){
		$('.dashboard_design').addClass('dashboard_design_overley');
		$('.dashboard_left_main').fadeIn(100);

		return false
	});
	$('.dashboard_mobile_menu_close').click(function(){
		$('.dashboard_design').removeClass('dashboard_design_overley');
		$('.dashboard_left_main').fadeOut(100);

		return false
	});



	// mobile menu dropdown
	$('.dropdown_toggle').click(function(event) {
	    // Prevent the default action of the link
	    event.preventDefault();

	    // Get the current dropdown menu related to the clicked link
	    let currentDropdown = $(this).next('.dropdown_menu');

	    // Slide up all other dropdown menus except the current one
	    $('.dropdown_menu').not(currentDropdown).slideUp(500);

	    // Toggle the current dropdown menu
	    currentDropdown.slideToggle(500);
	});

	// Header fixed after 300px Scroll::
	$(window).scroll(function(){
		var scrollValue = $(this).scrollTop();

		if(scrollValue>300){
			$('.header_main').addClass('fixedheader')
		}
		else{
			$('.header_main').removeClass('fixedheader')
		}
	});


	// Home Page Carousel
	$('.exam_board_items_carousel ul').owlCarousel({
		items:6,
		loop:true,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:2000,
		responsive : {
		    0 : {
		        items:2,
		    },
		    480 : {
		        items:3,
		    },
		    768 : {
		        items:4,
		    },
		    992 : {
		        items:5,
		    },
		    1200 : {
		        items:6,
		    }
		}
	});

	// A Lavel Exam Carousel
	$('.a_lavel_exam_bodies_items ul').owlCarousel({
		items:4,
		loop:true,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:2000,
		responsive : {
		    0 : {
		        items:2,
		    },
		    480 : {
		        items:3,
		    },
		    768 : {
		        items:4,
		    },
		    992 : {
		        items:4,
		    },
		    1200 : {
		        items:4,
		    }
		}
	});

	// A Lavel Exam Carousel
	$('.login_page_carousel ul').owlCarousel({
		items:4,
		loop:true,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:2000,
		responsive : {
		    0 : {
		        items:3,
		    },
		    480 : {
		        items:3,
		    },
		    768 : {
		        items:4,
		    },
		    992 : {
		        items:4,
		    },
		    1200 : {
		        items:4,
		    }
		}
	});
	// $( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
	// $( ".owl-next").html('<i class="fa fa-chevron-right"></i>');



	// Flag changes with select
	const countryCodeSelect = document.getElementById("country-code");
	const flagIcon = document.getElementById("flag-icon");

	countryCodeSelect.addEventListener("change", function () {
	  const selectedOption = this.options[this.selectedIndex];
	  const flagUrl = selectedOption.getAttribute("data-flag");
	  
	  // Update the flag icon dynamically
	  flagIcon.src = flagUrl;
	});



});

	// Dashboard Left/Right site width
	// document.addEventListener("DOMContentLoaded", function () {
	//     const menuToggle = document.querySelector(".dashboard_left_menu_bar a");
	//     const dashboard = document.querySelector(".dashboard_design");

	//     menuToggle.addEventListener("click", function (e) {
	//         e.preventDefault();
	//         dashboard.classList.toggle("collapsed");
	//     });
	// });






	// 5-Step Form
const steps = document.querySelectorAll(".step");
const dividers = document.querySelectorAll(".divider");
const formSteps = document.querySelectorAll(".form-step");
const nextBtns = document.querySelectorAll(".next-btn");
const prevBtns = document.querySelectorAll(".prev-btn");
const form = document.getElementById("multiStepForm");

let currentStep = 0;

// Update the step indicator
function updateStepIndicator() {
  steps.forEach((step, index) => {
    if (index < currentStep) {
      step.classList.add("completed");
      step.classList.remove("active");
    } else if (index === currentStep) {
      step.classList.add("active");
      step.classList.remove("completed");
    } else {
      step.classList.remove("completed", "active");
    }
  });

  dividers.forEach((divider, index) => {
    if (index < currentStep) {
      divider.classList.add("completed");
    } else {
      divider.classList.remove("completed");
    }
  });
}

// Show the current step
function showStep() {
  formSteps.forEach((formStep, index) => {
    formStep.classList.toggle("active", index === currentStep);
    const errorMsg = formStep.querySelector(".error-message");
    if (errorMsg) errorMsg.style.display = "none"; // Hide error message initially
  });
}

// Validate the current step
function validateStep() {
  const inputs = formSteps[currentStep].querySelectorAll("input, select, textarea");
  let isValid = true;
  const errorMsg = formSteps[currentStep].querySelector(".error-message");
  let firstInvalidField = null;

  // যদি errorMsg থাকে তাহলে আগের মেসেজ ক্লিয়ার করবে
  if (errorMsg) {
    errorMsg.innerText = "";
  }

//   inputs.forEach((input) => {
//     const isFile = input.type === "file";

//     if (!input.checkValidity()) {
//       isValid = false;

//       if (isFile) {
//         const button = input.closest('.form_file_upload_design')?.querySelector('button');
//         if (button) button.classList.add("error");
//       } else {
//         input.classList.add("error");
//       }

//       if (!firstInvalidField) {
//         firstInvalidField = input;
//       }
//     } else {
//       if (isFile) {
//         const button = input.closest('.form_file_upload_design')?.querySelector('button');
//         if (button) button.classList.remove("error");
//       } else {
//         input.classList.remove("error");
//       }
//     }
//   });

inputs.forEach((input) => {
  const isFile = input.type === "file";
  const maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

  if (!input.checkValidity()) {
    isValid = false;

    if (isFile) {
      const button = input.closest('.form_file_upload_design')?.querySelector('button');
      if (button) button.classList.add("error");
    } else {
      input.classList.add("error");
    }

    if (!firstInvalidField) {
      firstInvalidField = input;
    }

  } else {
    let fileTooLarge = false;

    if (isFile && input.files.length > 0) {
      const file = input.files[0];
      if (file.size > maxFileSize) {
        fileTooLarge = true;
        isValid = false;

        const button = input.closest('.form_file_upload_design')?.querySelector('button');
        if (button) button.classList.add("error");

        // Show error message
        let errorMsg = input.closest('.form_file_upload_design')?.querySelector('.file-size-error');
        if (!errorMsg) {
          errorMsg = document.createElement('div');
          errorMsg.className = 'file-size-error';
          errorMsg.style.color = 'red';
          errorMsg.textContent = 'File size must be less than 5MB.';
          input.closest('.form_file_upload_design')?.appendChild(errorMsg);
        }

        if (!firstInvalidField) {
          firstInvalidField = input;
        }
      }
    }

    if (!fileTooLarge) {
      // Valid file or not a file input
      if (isFile) {
        const button = input.closest('.form_file_upload_design')?.querySelector('button');
        if (button) button.classList.remove("error");

        // Remove old error message if exists
        const oldError = input.closest('.form_file_upload_design')?.querySelector('.file-size-error');
        if (oldError) oldError.remove();
      } else {
        input.classList.remove("error");
      }
    }
  }
});




  if (!isValid && firstInvalidField) {
    const label = formSteps[currentStep].querySelector(`label[for="${firstInvalidField.id}"]`);
    const fieldName = label ? label.textContent.replace(":", "") : firstInvalidField.name;

    if (errorMsg) {
      errorMsg.innerText = `Please fill the "${fieldName}" field before continuing.`;
      errorMsg.style.display = "block";
    }

    firstInvalidField.focus(); // invalid field এ ফোকাস দিবে
  } else if (isValid && errorMsg) {
    errorMsg.style.display = "none";
  }

  return isValid;
}

// function validateStep() {
//   const inputs = formSteps[currentStep].querySelectorAll("input, textarea, select");
//   let isValid = true;

//   for (let input of inputs) {
//     if (!input.checkValidity()) {
//       input.classList.add("error");
//       // Label খুঁজে বার করা
//       const label = formSteps[currentStep].querySelector(`label[for='${input.id}']`);
//       const labelText = label ? label.innerText.replace(":", "") : "This field";

//       alert(`Please fill: ${labelText}`);
//       input.focus();
//       isValid = false;
//       break; // প্রথম invalid input পেলে break করবে
//     } else {
//       input.classList.remove("error");
//     }
//   }
//   return isValid;
// }

// Handle next button
nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (validateStep()) {
      if (currentStep < formSteps.length - 1) {
        currentStep++;
        updateStepIndicator();
        showStep();
      }
    }
  });
});

// Handle previous button
prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    if (currentStep > 0) {
      currentStep--;
      updateStepIndicator();
      showStep();
    }
  });
});

// Handle Submit with Spinner
form.addEventListener("submit", function (e) {
  e.preventDefault();

  const submitBtn = form.querySelector("button[type='submit']");
  submitBtn.disabled = true;
  submitBtn.innerHTML = 'Submitting <span class="spinner"></span>';

  setTimeout(() => {
    submitBtn.innerHTML = "Submitted ✅";
    form.submit(); // Actual form submission
  }, 2000);
});

// Initialize the form
updateStepIndicator();
showStep();










	// (Step-3) Signature Pad
	jQuery(document).ready(function($){
	    
	    var canvas = document.getElementById("signature");
	    var signaturePad = new SignaturePad(canvas);
	    
	    $('#clear-signature').on('click', function(){
	        signaturePad.clear();
	    });
	    
	});



	// File Upload
	// Sob elements ke class er maddhome select kora
	const realFileBtns = document.querySelectorAll(".real-file");
	const customBtns = document.querySelectorAll(".custom-button");
	const customTxts = document.querySelectorAll(".custom-text");

	// Loop diye prottek input file group-er upor kaj kora
	customBtns.forEach((customBtn, index) => {
	  customBtn.addEventListener("click", function () {
	    realFileBtns[index].click();
	  });

	  realFileBtns[index].addEventListener("change", function () {
	    if (realFileBtns[index].value) {
	      customTxts[index].innerHTML = realFileBtns[index].value.match(
	        /[\/\\]([\w\d\s\.\-\(\)]+)$/
	      )[1];
	    } else {
	      customTxts[index].innerHTML = "No file chosen, yet.";
	    }
	  });
	});



	// form input Yes/No Condition
	document.addEventListener('DOMContentLoaded', () => {
	    // Sob step ke select korbe
	    const steps = document.querySelectorAll('.single_form_step');

	    steps.forEach(step => {
	        const radios = step.querySelectorAll('input[type="radio"]');
	        const condition = step.querySelector('.form_step_condition');
	        const inputField = condition ? condition.querySelector('input') : null;

	        if (condition && inputField) {
	            radios.forEach(radio => {
	                radio.addEventListener('change', () => {
	                    if (radio.checked && radio.nextElementSibling.textContent.trim() === 'NO') {
	                        // Jokhon "NO" select kora hobe
	                        condition.style.display = 'none';
	                        inputField.removeAttribute('required'); // Required remove korche
	                    } else if (radio.checked && radio.nextElementSibling.textContent.trim() === 'YES') {
	                        // Jokhon "YES" select kora hobe
	                        condition.style.display = 'block';
	                        inputField.setAttribute('required', ''); // Required abar add korche
	                    }
	                });
	            });

	            // Default visibility set kora
	            const yesRadio = step.querySelector('input[type="radio"][id$="13"], input[type="radio"][id$="19"], input[type="radio"][id$="50"], input[type="radio"][id$="53"], input[type="radio"][id$="16"]');
	            if (yesRadio && yesRadio.checked) {
	                condition.style.display = 'block';
	                inputField.setAttribute('required', '');
	            } else {
	                condition.style.display = 'none';
	                inputField.removeAttribute('required');
	            }
	        }
	    });
	});



	document.querySelectorAll('.payment-section').forEach((section) => {
	  const radios = section.querySelectorAll('input[type="radio"]');
	  const contents = section.querySelectorAll('.payment-content');

	  radios.forEach((radio) => {
	    radio.addEventListener('change', () => {
	      contents.forEach((content) => content.classList.remove('active'));
	      const value = radio.value;
	      section.querySelector(`.${value}-content`).classList.add('active');
	    });
	  });

	  // Initial state
	  const checkedRadio = section.querySelector('input[type="radio"]:checked');
	  if (checkedRadio) {
	    section.querySelector(`.${checkedRadio.value}-content`).classList.add('active');
	  }
	});



	// Form Yes/No Condition step 3
	const specialAccessRadios = document.querySelectorAll('input[name="radio10"]');
	const specialAccessSection = document.querySelector('.sfp_special_access');

	function toggleSpecialAccess() {
	  const selected = document.querySelector('input[name="radio10"]:checked');
	  if (selected && selected.nextElementSibling.innerText.trim().toUpperCase() === "NO") {
	    specialAccessSection.style.display = "none";

	    // সব input/textarea/file disable করে দিবে
	    specialAccessSection.querySelectorAll('input, select, textarea, button').forEach(el => {
	      el.disabled = true;
	    });

	  } else {
	    specialAccessSection.style.display = "block";

	    // সব input/textarea/file enable করে দিবে
	    specialAccessSection.querySelectorAll('input, select, textarea, button').forEach(el => {
	      el.disabled = false;
	    });
	  }
	}

	// প্রথমে call করবো
	toggleSpecialAccess();

	// radio change হলে call হবে
	specialAccessRadios.forEach(radio => {
	  radio.addEventListener('change', toggleSpecialAccess);
	});



	// Hide/Show Password icon
	const eyeIcon = document.getElementById("eye");
	const passwordInput = document.getElementById("password");

	eyeIcon.addEventListener("click", () => {
	    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
	    passwordInput.setAttribute("type", type);

	    // আইকন পরিবর্তন করুন
	    eyeIcon.classList.toggle("fa-eye");
	    eyeIcon.classList.toggle("fa-eye-slash");
	});


	// Hide/Show Password icon
	const eyeIcon2 = document.getElementById("eye2");
	const confirmPasswordInput = document.getElementById("confirm_password");
	
	eyeIcon2.addEventListener("click", () => {
		const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
		confirmPasswordInput.setAttribute("type", type);
	
		// আইকন পরিবর্তন করুন
		eyeIcon2.classList.toggle("fa-eye");
		eyeIcon2.classList.toggle("fa-eye-slash");
	});













