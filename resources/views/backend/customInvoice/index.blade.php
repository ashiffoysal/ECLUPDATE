@extends('layouts.backend')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Create</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-4"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">Invoice Manager</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item">
											<span class="bullet bg-gray-200 w-5px h-2px"></span>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="breadcrumb-item text-dark">Create Invoice</li>
										<!--end::Item-->
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center py-1">
									<!--begin::Wrapper-->
									<div class="me-4">
										<!--begin::Menu-->
										<a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
										<!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
										<span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->Filter</a>
										<!--begin::Menu 1-->
										<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
											<!--begin::Header-->
											<div class="px-7 py-5">
												<div class="fs-5 text-dark fw-bolder">Filter Options</div>
											</div>
											<!--end::Header-->
											<!--begin::Menu separator-->
											<div class="separator border-gray-200"></div>
											<!--end::Menu separator-->
											<!--begin::Form-->
											<div class="px-7 py-5">
												<!--begin::Input group-->
												<div class="mb-10">
													<!--begin::Label-->
													<label class="form-label fw-bold">Status:</label>
													<!--end::Label-->
													<!--begin::Input-->
													<div>
														<select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
															<option></option>
															<option value="1">Approved</option>
															<option value="2">Pending</option>
															<option value="2">In Process</option>
															<option value="2">Rejected</option>
														</select>
													</div>
													<!--end::Input-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="mb-10">
													<!--begin::Label-->
													<label class="form-label fw-bold">Member Type:</label>
													<!--end::Label-->
													<!--begin::Options-->
													<div class="d-flex">
														<!--begin::Options-->
														<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
															<input class="form-check-input" type="checkbox" value="1" />
															<span class="form-check-label">Author</span>
														</label>
														<!--end::Options-->
														<!--begin::Options-->
														<label class="form-check form-check-sm form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" value="2" checked="checked" />
															<span class="form-check-label">Customer</span>
														</label>
														<!--end::Options-->
													</div>
													<!--end::Options-->
												</div>
												<!--end::Input group-->
												<!--begin::Input group-->
												<div class="mb-10">
													<!--begin::Label-->
													<label class="form-label fw-bold">Notifications:</label>
													<!--end::Label-->
													<!--begin::Switch-->
													<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
														<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
														<label class="form-check-label">Enabled</label>
													</div>
													<!--end::Switch-->
												</div>
												<!--end::Input group-->
												<!--begin::Actions-->
												<div class="d-flex justify-content-end">
													<button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
													<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
												</div>
												<!--end::Actions-->
											</div>
											<!--end::Form-->
										</div>
										<!--end::Menu 1-->
										<!--end::Menu-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Button-->
									<a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
									<!--end::Button-->
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
								<form action="{{url('admin/custom-invoice/create')}}" id="kt_invoice_form" method="post">
								    @csrf
							<div id="kt_content_container" class="container">
								<!--begin::Layout-->
								<div class="d-flex flex-column flex-lg-row">
									<!--begin::Content-->
									<div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
										<!--begin::Card-->
										<div class="card">
											<!--begin::Card body-->
											<div class="card-body p-12">
												<!--begin::Form-->
											
													<!--begin::Wrapper-->
													<div class="d-flex flex-column align-items-start flex-xxl-row">
														<!--begin::Input group-->
															<div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice date">
															<!--begin::Date-->
															<div class="fs-6 fw-bolder text-gray-700 text-nowrap">Invoice For:</div>
															<!--end::Date-->
															<!--begin::Input-->
															<div class="position-relative d-flex align-items-center w-150px">
																<!--begin::Datepicker-->
																<select class="form-select form-select-solid" name="service">
																    
																    <option value="2">Exam Centre London</option>
																</select>
															
															</div>
															<!--end::Input-->
														</div>
															<div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Enter invoice number">
															<span class="fs-2x fw-bolder text-gray-800">Invoice #</span>
															<input type="text" class="form-control form-control-flush fw-bolder text-gray-400 fs-3 w-125px" name="invoice_id" value="{{rand(33333,99999)}}" placehoder="..." />
														</div>
														
														<div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice date">
															<!--begin::Date-->
															<div class="fs-6 fw-bolder text-gray-700 text-nowrap">Date:</div>
															<!--end::Date-->
															<!--begin::Input-->
															<div class="position-relative d-flex align-items-center w-150px">
																<!--begin::Datepicker-->
																<input class="form-control form-control-white fw-bolder pe-5" placeholder="Select date" name="from_date" required value="{{ Carbon\Carbon::today()->format('d,M-Y') }}"/>
																<!--end::Datepicker-->
																<!--begin::Icon-->
																<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
																<span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24" />
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
																		</g>
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<!--end::Icon-->
															</div>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
													
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify invoice due date">
															<!--begin::Date-->
															<div class="fs-6 fw-bolder text-gray-700 text-nowrap">Due Date:</div>
															<!--end::Date-->
															<!--begin::Input-->
															<div class="position-relative d-flex align-items-center w-150px">
																<!--begin::Datepicker-->
																<input class="form-control form-control-white fw-bolder pe-5" placeholder="Select date" name="invoice_due_date" />
																<!--end::Datepicker-->
																<!--begin::Icon-->
																<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
																<span class="svg-icon svg-icon-2 position-absolute end-0 ms-4">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24" />
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
																		</g>
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<!--end::Icon-->
															</div>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
													</div>
													<!--end::Top-->
													<!--begin::Separator-->
													<div class="separator separator-dashed my-10"></div>
													<!--end::Separator-->
													<!--begin::Wrapper-->
													<div class="mb-0">
														<!--begin::Row-->
														<div class="row gx-10 mb-5">
															<!--begin::Col-->
															<div class="col-lg-6">
																<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">INVOICE FOR</label>
																<!--begin::Input group-->
																<div class="mb-5">
																	<input type="text" name="invoice_for_name" class="form-control form-control-solid" placeholder="Name" required/>
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<input type="text" name="invoice_for_email"  class="form-control form-control-solid" placeholder="Email" required/>
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<textarea name="invoice_for_address"  class="form-control form-control-solid" rows="3" placeholder="Address" required></textarea>
																</div>
																<!--end::Input group-->
															</div>
															<!--end::Col-->
															<!--begin::Col-->
															<div class="col-lg-6">
																<label class="form-label fs-6 fw-bolder text-gray-700 mb-3">INVOICE TO</label>
																<!--begin::Input group-->
																<div class="mb-5">
																	<input type="text" name="invoice_to_name" class="form-control form-control-solid" required value="EXAM CNETRE LONDON" placeholder="EXAM CNETRE LONDON" />
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<input type="text"  name="invoice_to_email" class="form-control form-control-solid" required value="info@examcentrelondon.co.uk" placeholder="Email" />
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div class="mb-5">
																	<textarea name="invoice_to_address" class="form-control form-control-solid" rows="3" required placeholder="Address">54 Upton Lane, London E7 9LN </textarea>
																</div>
																<!--end::Input group-->
															</div>
															<!--end::Col-->
														</div>
														<!--end::Row-->
														<!--begin::Table wrapper-->
														<div class="table-responsive mb-10">
															<!--begin::Table-->
															<table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
																<!--begin::Table head-->
																<thead>
																	<tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
																		<th class="min-w-300px w-475px">Item</th>
																		<th class="min-w-100px w-100px">QTY</th>
																		<th class="min-w-150px w-150px">Price</th>
																		<th class="min-w-100px w-150px text-end">Total</th>
																		<th class="min-w-75px w-75px text-end">Action</th>
																	</tr>
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody>
																	<tr class="border-bottom border-bottom-dashed" data-kt-element="item">
																		<td class="pe-7">
																			<input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" />
																			<input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" />
																		</td>
																		<td class="ps-0">
																			<input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" value="1" data-kt-element="quantity" />
																		</td>
																		<td>
																			<input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" value="0.00" data-kt-element="price" />
																		</td>
																		<td class="pt-8 text-end text-nowrap">£
																		<span data-kt-element="total">0.00</span></td>
																		<td class="pt-5 text-end">
																			<button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
																				<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																							<rect x="0" y="0" width="24" height="24" />
																							<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																							<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																						</g>
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</button>
																		</td>
																	</tr>
																</tbody>
																<!--end::Table body-->
																<!--begin::Table foot-->
																<tfoot>
																	<tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
																		<th class="text-primary">
																			<button class="btn btn-link py-1" data-kt-element="add-item">Add item</button>
																		</th>
																		<th colspan="2" class="border-bottom border-bottom-dashed ps-0">
																			<div class="d-flex flex-column align-items-start">
																				<div class="fs-5">Subtotal</div>
																		
																			</div>
																		</th>
																		<th colspan="2" class="border-bottom border-bottom-dashed text-end">£
																		<span data-kt-element="sub-total">0.00</span></th>
																	</tr>
																	<tr class="align-top fw-bolder text-gray-700">
																		<th></th>
																		<th colspan="2" class="fs-4 ps-0">Total</th>
																		<th colspan="2" class="text-end fs-4 text-nowrap">
																		    £<span data-kt-element="grand-total">0.00</span>
																		    
																		    </th>
																	</tr>
																	<tr class="align-top fw-bolder text-gray-700">
																		<th></th>
																		<th colspan="2" class="fs-4 ps-0">Paid Total</th>
																		<th colspan="2" class="text-end fs-4 text-nowrap">
																		    £<span data-kt-element="paid-total"><input type="number" name="paid_total" value="0.00"></span>
																		    
																		    </th>
																	</tr>
																</tfoot>
																<!--end::Table foot-->
															</table>
														</div>
														<!--end::Table-->
														<!--begin::Item template-->
														<table class="table d-none" data-kt-element="item-template">
															<tr class="border-bottom border-bottom-dashed" data-kt-element="item">
																<td class="pe-7">
																	<input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" />
																	<input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" />
																</td>
																<td class="ps-0">
																	<input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" data-kt-element="quantity" />
																</td>
																<td>
																	<input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" data-kt-element="price" />
																</td>
																<td class="pt-8 text-end">£
																<span data-kt-element="total">0.00</span></td>
																<td class="pt-5 text-end">
																	<button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
																		<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</button>
																</td>
															</tr>
														</table>
														<table class="table d-none" data-kt-element="empty-template">
															<tr data-kt-element="empty">
																<th colspan="5" class="text-muted text-center py-10">No items</th>
															</tr>
														</table>
														<!--end::Item template-->
														<!--begin::Notes-->
														<div class="mb-0">
															<label class="form-label fs-6 fw-bolder text-gray-700">Notes</label>
															<textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Thanks for contact us."></textarea>
														</div>
														
														<div class="mb-0">
															<label class="form-label fs-6 fw-bolder text-gray-700">Stripe Payment Link</label>
															<textarea name="payment_link" class="form-control form-control-solid" rows="3" placeholder="Stripe Payment Link"></textarea>
														</div>
														<!--end::Notes-->
													</div>
													<!--end::Wrapper-->
												
												<!--end::Form-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Content-->
									<!--begin::Sidebar-->
									<div class="flex-lg-auto min-w-lg-300px">
										<!--begin::Card-->
										<div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
											<!--begin::Card body-->
											<div class="card-body p-10">
												<!--begin::Input group-->
												<div class="mb-10">
													<!--begin::Label-->
													<label class="form-label fw-bolder fs-6 text-gray-700">Currency</label>
													<!--end::Label-->
													<!--begin::Select-->
													<select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid">
												
														<option data-kt-flag="flags/united-kingdom.svg" value="GBP">
														<b>GBP</b>&#160;-&#160;British pound</option>
													
													</select>
													<!--end::Select-->
												</div>
												<!--end::Input group-->
												<!--begin::Separator-->
												<div class="separator separator-dashed mb-8"></div>
												<!--end::Separator-->
												<!--begin::Input group-->
												<div class="mb-8">
													<!--begin::Option-->
													<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
														<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Local Payment method</span>
														<input class="form-check-input" name="payment_method" type="radio"  value="1" />
													</label>
													
													<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
														<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Global Payment method</span>
														<input class="form-check-input" name="payment_method" type="radio"  value="2" />
													</label>
													
													<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
														<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Card Payment Link</span>
														<input class="form-check-input" name="payment_link" type="radio"  value="1" />
													</label>
													
													<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
														<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Is Paid</span>
														<input class="form-check-input" name="is_paid" type="radio"  value="1" />
													</label>
													<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
														<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Notes</span>
														<input class="form-check-input" name="notes_add" type="checkbox" value="1" />
													</label>
													
													<!--end::Option-->
												</div>
												<!--end::Input group-->
												<!--begin::Separator-->
												<div class="separator separator-dashed mb-8"></div>
												<!--end::Separator-->
												<!--begin::Actions-->
												<div class="mb-0">
													<!--begin::Row-->
													<div class="row mb-5">
													
													</div>
													<!--end::Row-->
													<button type="submit" href="#" class="btn btn-primary w-100" id="kt_invoice_submit_button">
													<!--begin::Svg Icon | path: icons/duotone/Map/Direction2.svg-->
													<span class="svg-icon svg-icon-3">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034)" />
															</g>
														</svg>
													</span>
													<!--end::Svg Icon-->Send Invoice</button>
												</div>
												<!--end::Actions-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::Sidebar-->
								</div>
								<!--end::Layout-->
							</div>
							<!--end::Container-->
							</form>
						</div>
						<!--end::Post-->
					</div>
		<script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('backend')}}/assets/js/custom/apps/invoices/create.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/widgets.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/apps/chat/chat.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/create-app.js"></script>
		<script src="{{asset('backend')}}/assets/js/custom/modals/upgrade-plan.js"></script>
@endsection