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
							first_name:{
								validators:{
									notEmpty:{
										message:"First Name is required"
									},
									stringLength: {
										max: 25,
										
										message: 'Please enter no more than 25 digits'
									},
								}
							},
							last_name:{validators:{
										notEmpty:{
													message:"Last Name is required"
												},
										stringLength: {
											max: 25,
											
											message: 'Please enter no more than 25 digits'
										},

									}
							},

							middle_name:{validators:{
									
									stringLength: {
										max: 25,
										
										message: 'Please enter no more than 25 digits'
									},

								}
							},
							has_a_candidate:{validators:{notEmpty:{message:"This field is required"}}},
							gender:{validators:{notEmpty:{message:"This field is required"}}},
							uci:{validators:{notEmpty:{message:"This field is required"}}},
							uln:{validators:{notEmpty:{message:"This field is required"}}},
							email:{validators:{notEmpty:{message:"Email is required"}}},
							phone:{validators:{notEmpty:{message:"Phone is required"}}},
							date_of_birth:{validators:{notEmpty:{message:"Date Of Birth is required"}}},
							emergency_contact_number:{validators:{notEmpty:{message:"Emergency Contact Number is required"}}},
							postcode:{validators:{notEmpty:{message:"Post code is required"}}},
							address_line_1:{validators:{notEmpty:{message:"Address line 1 is required"}}},
							'has_a_candidate_number': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var hasAcandidate = document.querySelector('[name="has_a_candidate"]:checked');
											if (hasAcandidate && hasAcandidate.value === 'yes') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
									},
									integer: {
										message: 'Please enter a valid integer'
									},
									stringLength: {
										max: 4,
										min: 4,
										message: 'Please enter no more than 4 digits'
									},
								}
							},


							'uci_number': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var hasAcandidate = document.querySelector('[name="uci"]:checked');
											if (hasAcandidate && hasAcandidate.value === 'yes') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
									},
									stringLength: {
										max: 13,
										message: 'Please enter no more than 13 digits'
									},
									
								}
							},

							'uln_number': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											
											var hasAcandidate = document.querySelector('[name="uln"]:checked');
											if (hasAcandidate && hasAcandidate.value === 'yes') {
												
												return input.value.trim() !== '';
											}
											
											return true;
										}
									},
									stringLength: {
										max: 10,
										min: 10,
										message: 'Please enter no more than 10 digits'
									},
								}
							},


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
							
							
						
							
						
					},
						plugins:{trigger:new FormValidation.plugins.Trigger,
							bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",
								eleValidClass:""})}})),

					a.push(FormValidation.formValidation(o,
						{
							
							fields:{

								mock_test:{validators:{notEmpty:{message:"This field is required"}}},
								type_of_learner:{validators:{notEmpty:{message:"This field is required"}}},
								retaking_exams_name:{validators:{notEmpty:{message:"This field is required"}}},
								caring_forwad:{validators:{notEmpty:{message:"This field is required"}}},
								retaking_exams:{validators:{notEmpty:{message:"This field is required"}}},
								
								
								'subject[]': {
									validators: {
										notEmpty: {
											message: 'Subject is required'
										},
										// Add any other validators you need for the 'subject[]' field
									}
								},
								'unit_code[]': {
									validators: {
										notEmpty: {
											message: "This field is required",
											callback: function (input) {
											
												return input.length > 0;
											}
										}
									}
								},


								'retaking_exams_name': {
									validators: {
										callback: {
											message: 'This Field is required',
											callback: function (input) {
												// Check if "Yes" is selected
												var retakingExamsCheckbox = document.querySelector('[name="retaking_exams"]:checked');
												if (retakingExamsCheckbox && retakingExamsCheckbox.value === 'yes') {
													// Return false if "Yes" is selected and retaking_exams_name is empty
													return input.value.trim() !== '';
												}
												// Return true if "Yes" is not selected
												return true;
											}
										}
									}
								},

								'caring_forwad_details':{
									validators: {
										callback: {
											message: 'This Field is required',
											callback: function (input) {
												// Check if "Yes" is selected
												var retakingExamsCheckbox = document.querySelector('[name="caring_forwad"]:checked');
												if (retakingExamsCheckbox && retakingExamsCheckbox.value === 'yes') {
													// Return false if "Yes" is selected and retaking_exams_name is empty
													return input.value.trim() !== '';
												}
												// Return true if "Yes" is not selected
												return true;
											}
										}
									}
								},

								'proof_of_evidence':{
									validators: {
									
										file: {
											extension: 'pdf,jpg,jpeg,png',
											type: 'image/jpeg,image/png,application/pdf',
											maxSize: 5 * 1024 * 1024, // 5 MB
											message: 'Please choose a valid PDF or image file (max size: 5MB)'
											// message: Swal.fire({text:"Please choose a valid PDF or image file (max size: 5MB)",icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",customClass:{confirmButton:"btn btn-light"}})
										}
									}
								}


							
							},

						plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}})),

					a.push(FormValidation.formValidation(o,
					{
						
						fields:{
						
			
							need_special_access:{validators:{notEmpty:{message:"This field is required"}}},
							relationship_identification:{validators:{notEmpty:{message:"This field is required"}}},
							relation_name:{validators:{notEmpty:{message:"This field is required"}}},
							signed:{validators:{notEmpty:{message:"This field is required"}}},
							'special_access_requirements[]': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var retakingExamsCheckbox = document.querySelector('[name="need_special_access"]:checked');
											if (retakingExamsCheckbox && retakingExamsCheckbox.value === '1') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
									}
								}
							},
							'special_acces[]': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var retakingExamsCheckbox = document.querySelector('[name="need_special_access"]:checked');
											if (retakingExamsCheckbox && retakingExamsCheckbox.value === '1') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
									}
								}
							},

							'special_acces_evidence': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var retakingExamsCheckbox = document.querySelector('[name="need_special_access"]:checked');
											if (retakingExamsCheckbox && retakingExamsCheckbox.value === '1') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
									}
								}
							},
							'evidence_documents': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var retakingExamsCheckbox = document.querySelector('[name="need_special_access"]:checked');
											if (retakingExamsCheckbox && retakingExamsCheckbox.value === '1') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
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

							'relationship': {
								validators: {
									callback: {
										message: 'This Field is required',
										callback: function (input) {
											// Check if "Yes" is selected
											var retakingExamsCheckbox = document.querySelector('[name="relationship_identification"]:checked');
											if (retakingExamsCheckbox && retakingExamsCheckbox.value === 'Someone else') {
												// Return false if "Yes" is selected and retaking_exams_name is empty
												return input.value.trim() !== '';
											}
											// Return true if "Yes" is not selected
											return true;
										}
									}
								}
							},
							
						

			
					}
					
					
					,plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}})),
								a.push(FormValidation.formValidation(o,{fields:{

									 aggre_condition:{validators:{notEmpty:{message:"This field is required"}}},
							
								},
									plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row",eleInvalidClass:"",eleValidClass:""})}})),
							
								$(o.querySelector('[name="card_expiry_month"]')).on("change",(function(){a[3].revalidateField("card_expiry_month")})),
								$(o.querySelector('[name="card_expiry_year"]')).on("change",(function(){a[3].revalidateField("card_expiry_year")})),
								$(o.querySelector('[name="business_type"]')).on("change",(function(){a[2].revalidateField("business_type")}))}}}();KTUtil.onDOMContentLoaded((function(){KTCreateAccount.init()}));