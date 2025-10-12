"use strict";
var KTCreateAccount=function(){
	var e,t,i,o,r,s,a=[];return{
		init:function(){
			(t=document.querySelector("#kt_modal_create_account"))&&(e=new bootstrap.Modal(t)),
			i=document.querySelector("#kt_create_account_stepper"),
			o=i.querySelector("#kt_create_account_form"),
			r=i.querySelector('[data-kt-stepper-action="submit"]'),
			(s=new KTStepper(i)).on("kt.stepper.next",(function(e)
				{console.log("stepper.next");var t=a[e.getCurrentStepIndex()-1];t?t.validate().then((function(t){
					console.log("validated!"),"Valid"==t?(e.goNext(),KTUtil.scrollTop()):Swal.fire({text:"Some field are Required, please Check the form.",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-light"}}).then((function(){KTUtil.scrollTop()}))})):(e.goNext(),KTUtil.scrollTop())})),s.on("kt.stepper.previous",(function(e)
			{console.log("stepper.previous"),e.goPrevious(),KTUtil.scrollTop()})),
					a.push(FormValidation.formValidation(o,
						{fields:{
							acca_registration:{validators:{notEmpty:{message:"This field is required"}}},
							first_name:{validators:{notEmpty:{message:"First Name is required"}}},
							last_name:{validators:{notEmpty:{message:"Last Name is required"}}},
							email:{validators:{notEmpty:{message:"Email is required"}}},
							phone:{validators:{notEmpty:{message:"Phone is required"}}},
							gender:{validators:{notEmpty:{message:"This field is required"}}},
							thumbnail_img: {
								validators: {
									notEmpty: {
										message: 'This Field is required'
									},
									file: {
										extension: 'pdf,jpg,jpeg,png',
										type: 'image/jpeg,image/png,application/pdf',
										maxSize: 5 * 1024 * 1024, // 5 MB
										message: 'Please choose a valid PDF or image file (max size: 5MB)'
									
										
									}
								}
							},
							fileUpload: {
								validators: {
									notEmpty: {
										message: 'This Field is required'
									},
									file: {
										extension: 'pdf,jpg,jpeg,png',
										type: 'image/jpeg,image/png,application/pdf',
										maxSize: 5 * 1024 * 1024, // 5 MB
										message: 'Please choose a valid PDF or image file (max size: 5MB)'
										// message: Swal.fire({text:"Please choose a valid PDF or image file (max size: 5MB)",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-light"}})
									}
								}
							},
							
							date_of_birth:{validators:{notEmpty:{message:"Date Of Birth is required"}}},
					
							
							emergency_contact_number:{validators:{notEmpty:{message:"Emergency Contact Number is required"}}},
							postcode:{validators:{notEmpty:{message:"Post code is required"}}},
							address_line_1:{validators:{notEmpty:{message:"Address line 1 is required"}}},
					},plugins:{trigger:new FormValidation.plugins.Trigger,
						bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",
							eleValidClass:""})}})),

				a.push(FormValidation.formValidation(o,
					{
						
						fields:{

							

							type_of_learner:{validators:{notEmpty:{message:"This field is required"}}},
							
							
							'subject[]': {
								validators: {
									notEmpty: {
										message: 'Subject is required'
									},
									// Add any other validators you need for the 'subject[]' field
								}
							},
							'exam_date[]': {
								validators: {
									notEmpty: {
										message: 'This is required'
									},
									// Add any other validators you need for the 'subject[]' field
								}
							},
							


					
				


						
						},
						pugins:{trigger:new FormValidation.plugins.Trigger,
							bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",
								eleValidClass:""})}})),l

			

					a.push(FormValidation.formValidation(o,
						{fields:{account_team_size:{validators:{notEmpty:{message:"Time size is required"}}},
						account_plan:{validators:{notEmpty:{message:"Account name is required"}}},
						account_plan:{validators:{notEmpty:{message:"Account plan is required"}}}},
						plugins:{trigger:new FormValidation.plugins.Trigger,
							bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",
								eleInvalidClass:"",eleValidClass:""})}})),

					a.push(FormValidation.formValidation(o,
					{fields:{business_name:{validators:{notEmpty:{message:"Busines name is required"}}},
					
					relation_name:{validators:{notEmpty:{message:"This field is required"}}},
				
					
					business_email:{validators:{notEmpty:{message:"Busines email is required"},
			emailAddress:{message:"The value is not a valid email address"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}})),
								a.push(FormValidation.formValidation(o,{fields:{

									 aggre_condition:{validators:{notEmpty:{message:"This field is required"}}},
									// card_number:{validators:{notEmpty:{message:"Card member is required"},
									// creditCard:{message:"Card number is not valid"}}},

									// card_expiry_month:{validators:{notEmpty:{message:"Month is required"}}},
									// card_expiry_year:{validators:{notEmpty:{message:"Year is required"}}},
									// card_cvv:{validators:{notEmpty:{message:"CVV is required"},
									// digits:{message:"CVV must contain only digits"},
									// stringLength:{min:3,max:4,message:"CVV must contain 3 to 4 digits only"}}}
								},
									plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}})),
								// r.addEventListener("click",(function(t){
								// 	t.preventDefault(),
								// 	r.disabled=!0,
								// 	r.setAttribute("data-kt-indicator","on"),setTimeout((function(){
								// 		r.removeAttribute("data-kt-indicator"),
								// 		r.disabled=!1,
								// 		Swal.fire({text:"Form has been successfully submitted!",
								// 			icon:"success",buttonsStyling:!1,confirmButtonText:"Ok, got it!",
								// 			customClass:{confirmButton:"btn btn-primary"}}).then((function(t){t.isConfirmed&&e&&e.hide()}))}),2e3)}
								// 	)),
								$(o.querySelector('[name="card_expiry_month"]')).on("change",(function(){a[3].revalidateField("card_expiry_month")})),
								$(o.querySelector('[name="card_expiry_year"]')).on("change",(function(){a[3].revalidateField("card_expiry_year")})),
								$(o.querySelector('[name="business_type"]')).on("change",(function(){a[2].revalidateField("business_type")}))}}}();KTUtil.onDOMContentLoaded((function(){KTCreateAccount.init()}));