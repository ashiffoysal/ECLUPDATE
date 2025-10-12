@extends('layouts.backend')
@section('content')
    <link rel="stylesheet" href="{{ asset('frontend') }}/datepicker/mc-calendar.min.css" />
    <script src="{{ asset('frontend') }}/datepicker/mc-calendar.min.js"></script>
    <script>
        const myDatePicker = MCDatepicker.create({
            el: '#date_of_birth',
            dateFormat: 'DD-MMM-YYYY',
        });
    </script>
    <style>
        tbody {
            font-size: 12px !important;
        }

        .form-control.form-control-solid {
            background-color: #ffffff;
            border-color: #afafaf;
            color: #5e6278;
            transition: color .2s ease, background-color .2s ease;
            margin: 1px -5px;
            border-radius: 10px;
        }

        .form-select.form-select-solid {
            background-color: #ffffff;
            border-color: #272828 !important;
            color: #5e6278;
            transition: color .2s ease, background-color .2s ease;
            border-radius: 7px;
        }
    </style>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog mw-650px">

            <div class="modal-content">

                <form class="form" action="{{ url('admin/get/update/basicinformation_update') }}">
                    @csrf

                    <div class="modal-header">
                        <h2 class="fw-bolder">Candidate Basic Information Update</h2>
                    </div>

                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_update_customer_scroll" data-kt-scroll-offset="300px">

                            <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                                href="#kt_modal_update_customer_user_info" role="button" aria-expanded="false"
                                aria-controls="kt_modal_update_customer_user_info">Candidate Information
                                <span class="ms-2 rotate-180">

                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::User toggle-->
                            <!--begin::User form-->
                            <div id="kt_modal_update_customer_user_info" class="collapse show">
                                <div class="fv-row mb-4">

                                    <label class="fs-6 fw-bold mb-2">Candidate Number</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="Candidate_number" value="{{ $data->Candidate_number }}" />

                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-4">

                                    <label class="fs-6 fw-bold mb-2">First Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="first_name" value="{{ $data->first_name }}" required />
                                    <input type="hidden" name="id" value="{{ $data->id }}" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-4">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Middle Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="middle_name" value="{{ $data->middle_name }}" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-4">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Last Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="last_name" value="{{ $data->last_name }}" required />
                                    <!--end::Input-->
                                </div>

                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-4">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span>Email</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Email address must be active"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" placeholder=""
                                        name="email" value="{{ $data->email }}" required />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-4">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Phone</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="phone" value="{{ $data->phone }}" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-4">
                                    <label class="fs-6 fw-bold mb-2">Home Phone</label>
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="emergency_contact_number" value="{{ $data->emergency_contact_number }}"
                                        required />
                                </div>
                                <div class="fv-row mb-4">
                                    <label class="fs-6 fw-bold mb-2">Date of Birth</label>
                                    <input type="text" id="date_of_birth" class="form-control form-control-solid"
                                        placeholder="" name="date_of_birth" value="{{ $data->date_of_birth }}"
                                        required />
                                </div>
                                <div class="fv-row mb-4">
                                    <label class="fs-6 fw-bold mb-2">Gender</label>
                                    <select class="form-select form-control form-control-solid" name="gender"
                                        style="padding: 8px !important;">
                                        <option value="Male" @if ($data->gender == 'Male') selected @endif>Male
                                        </option>
                                        <option value="Female" @if ($data->gender == 'Female') selected @endif>Female
                                        </option>
                                    </select>

                                </div>
                            </div>
                            <!--end::User form-->
                            <!--begin::Billing toggle-->
                            <div class="fw-bolder fs-3 rotate collapsible collapsed mb-7" data-bs-toggle="collapse"
                                href="#kt_modal_update_customer_billing_info" role="button" aria-expanded="false"
                                aria-controls="kt_modal_update_customer_billing_info">Address Information
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                            </g>
                                        </svg>
                                    </span>

                                </span>
                            </div>


                            <div id="kt_modal_update_customer_billing_info" class="collapse">
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-4 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Address Line 1</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="address_line_1"
                                        value="{{ $data->address_line_1 }}" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-4 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">Address Line 2</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="address_line_2"
                                        value="{{ $data->address_line_2 }}" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-column mb-4 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">City</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="" name="city"
                                        value="{{ $data->city }}" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row g-9 mb-4">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">Post Code</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input class="form-control form-control-solid" placeholder="" name="postcode"
                                            value="{{ $data->postcode }}" />
                                        <!--end::Input-->
                                    </div>
                                </div>

                                <!--end::Input group-->
                            </div>
                            <!--end::Billing form-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <!-- <button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-white me-3">Discard</button> -->
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>




    <div class="modal fade" id="PhotoIDModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Uploads Photo ID</h5>
                </div>

                <form action="{{ url('/admin/photo-id/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Photo ID</label>
                            <input type="file" class="form-control" name="photo_id"
                                accept="image/jpeg,image/png,application/pdf" required>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Uploads</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="recentPhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Uploads Recent Photo</h5>
                </div>

                <form action="{{ url('/admin/recent-photo/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Recent Photo</label>
                            <input type="file" class="form-control" name="recent_photo"
                                accept="image/jpeg,image/png,application/pdf" required>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Uploads</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
                </div>

                <form action="{{ url('/admin-add/coupon/insert') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Enter Coupon Code</label>
                            <input type="text" class="form-control" name="cupon_code" placeholder="Enter Coupon Code"
                                required>
                            <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="UpdatediscountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Discount</h5>
                </div>

                <form action="{{ url('/admin-discount/update/coupon') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Enter Coupon Code</label>
                            <input type="text" class="form-control" name="discount_amount"
                                value="{{ $data->discount_amount }}" placeholder="Enter Coupon Code" required>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Discount</button>
                    </div>
                </form>

            </div>
        </div>
    </div>





    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                </div>
                @if ($data->due_amount == 0)
                    <p>No Due Amount Here!</p>
                @else
                    <form action="{{ url('admin/mainpayment/update') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Due Amount</label>
                                <input type="text" class="form-control" placeholder="Due Amount"
                                    value="{{ $data->due_amount + $data->ucas_reference_fee }}">
                                <input type="hidden" name="booking_id" value="{{ $data->booking_id }}">
                                <input type="hidden" name="total_amount" value="{{ $data->total_amount }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Paid Amount</label>
                                <input type="text" class="form-control" name="paid_amount" placeholder="Paid Amount">
                                @error('paid_amount')
                                    <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Paid By</label>
                                <select class="form-select form-select-lg form-select-solid" name="paid_by">
                                    <option value="Cash">Cash Payment</option>
                                    <option value="Bank">Bank Transfer</option>
                                    <option value="Card">Stripe Payment</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Transection Id</label>
                                <input type="text" class="form-control" name="transection_id"
                                    placeholder="Transection Id">
                            </div>







                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Payment Submit</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="addcandidatenumber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Candidate ID Add</h5>
                </div>

                <form action="{{ url('admin/get/insert/candidatenumbers/') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Candidate ID</label>
                            <input type="text" class="form-control" name="main_candidate_number"
                                placeholder="Candidate ID" value="{{ $data->Candidate_number }}">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Candidate Number</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="UCINUMBERSECTION" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Candidate Basic Information</h5>
                </div>

                <form action="{{ url('admin/exam-booking/ucinumberInformation/') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">

                            <label for="recipient-name" class="col-form-label">Do you have a UCI Number ( 13 digits
                                )?</label><br>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="radio" value="no" name="uci" id="no"
                                @if ($data->uci == 'no') checked="checked" @endif> <label class="form-check-label"
                                for="No">No </label> <br>
                            <input type="radio" value="yes" name="uci" id="yes"
                                @if ($data->uci == 'yes') checked="checked" @endif> <label class="form-check-label"
                                for="yes">Yes </label>
                        </div>
                        <div id="uci_section"
                            @if ($data) @if ($data->uci == 'yes') @else style="display:none" @endif
                        @else style="display:none" @endif >
                            <label for="message-text" class="col-form-label">UCI Number:</label>
                            <input type="text" name="uci_number" class="form-control form-control-lg uci_number"
                                aria-describedby="passwordHelpBlock"
                                value="@if ($data) {{ $data->uci_number }} @endif">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Do you have a ULN Number ( 10 digits
                                )*?</label><br>
                            <input type="radio" id="uln_no" type="radio" checked="checked" name="uln"
                                value="no"
                                @if ($data) @if ($data->uln == 'no') checked="checked" @endif
                                @endif > <label class="form-check-label" for="uln_no">No </label>
                            <br>


                            <input type="radio" id="uln_yes" type="radio" name="uln" value="yes"
                                @if ($data) @if ($data->uln == 'yes') checked="checked" @endif
                                @endif > <label class="form-check-label" for="uln_yes">Yes </label>
                        </div>
                        <div id="uln_section"
                            @if ($data) @if ($data->uln == 'yes') @else style="display:none" @endif
                        @else style="display:none" @endif >
                            <label for="message-text" class="col-form-label">ULN Number:</label>
                            <input type="text" max="10" name="uln_number" id="uln"
                                class="form-control form-control-lg  uln_number" aria-describedby="passwordHelpBlock"
                                value=" @if ($data) {{ $data->uln_number }} @endif">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Are you retaking these exams?*</label><br>
                            <input id="retaking_exams_no" type="radio" name="retaking_exams" value="no"
                                @if ($data) @if ($data->retaking_exams == 'no') checked="checked" @endif
                            @else checked="checked" @endif/>
                            <label class="form-check-label" for="Learning_via"> No</label>
                            <br>
                            <input id="retaking_exams_yes" type="radio" name="retaking_exams" value="yes"
                                @if ($data) @if ($data->retaking_exams == 'yes') checked="checked" @endif
                                @endif/><label class="form-check-label" for="Private_Candidate"> Yes
                            </label>


                        </div>
                        <div class="mb-3" id="retaking_section"
                            @if ($data) @if ($data->retaking_exams == 'yes') @else  style="display:none" @endif
                        @else style="display:none" @endif>
                            <label for="retaking_exams" class="form-label">Please specify which exams you are
                                retaking?</label>
                            <input type="text" name="retaking_exams_name" id="retaking_exams_name"
                                class="form-control form-control-lg " aria-describedby="passwordHelpBlock"
                                value="@if ($data) {{ $data->retaking_exams_name }} @endif">
                        </div>


                        <div class="mb-3">
                            <label>Are you carring forward your practical endorsement /course work/ spoken/ or any other
                                assessment?</label>

                            <input id="caring_forwad_no" type="radio" checked="checked" name="caring_forwad"
                                value="no"
                                @if ($data) @if ($data->caring_forwad == 'no') checked="checked" @endif
                            @else checked="checked" @endif/>
                            <label class="form-check-label" for="caring_forwad_no">
                                No
                            </label><br>

                            <input id="caring_forwad_yes" type="radio" name="caring_forwad" value="yes"
                                @if ($data) @if ($data->caring_forwad == 'yes') checked="checked" @endif
                                @endif/>
                            <label class="form-check-label" for="caring_forwad_yes">
                                Yes
                            </label>
                        </div>
                        <div class="mb-3" id="caring_forwad_section"
                            @if ($data) @if ($data->caring_forwad == 'yes') @else style="display:none" @endif
                        @else style="display:none" @endif >
                            <label for="UCI">Please Specify the details including exam board & grade*
                            </label>
                            <input type="text" name="caring_forwad_details" id="caring_forwad_details"
                                class="form-control form-control-lg " aria-describedby="passwordHelpBlock"
                                value="@if ($data) {{ $data->caring_forwad_details }} @endif">
                            <br>

                        </div>








                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- candidate -->



    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-place="true" data-kt-place-mode="prepend"
                    data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Candidate Exam Details</h1>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start mx-4"></span>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->

                    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Candidate</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">Exam Booking Details</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center py-1">
                    <!--begin::Wrapper-->

                    <!--end::Wrapper-->
                    <!--begin::Button-->
                    <a href="{{ url('/admin/exam/allbooking') }}" class="btn btn-sm btn-primary">Back</a>
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
            <div id="kt_content_container" class="container">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        @php
                                            $user = App\Models\User::where('id', $data->user_id)->first();
                                        @endphp

                                        @if ($user->photo == null)
                                            <img src="{{ asset('uploads') }}/istockphoto-1300845620-612x612.jpg"
                                                alt="image" />
                                        @else
                                            <img src="{{ asset('/' . Auth::user()->photo) }}" alt="profile">
                                        @endif
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a href="#"
                                        class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $data->first_name }}</a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="fs-5 fw-bold text-gray-400 mb-6 text-center ">
                                        <span class="badge badge-light-info">{{ $data->main_exam_type }}
                                            Candidate</span><br>

                                        @if ($data->is_paid == 0)
                                            <span class="badge badge-warning">Unpaid</span>
                                        @elseif($data->is_paid == 1)
                                            <span class="badge badge-success">Paid</span>
                                        @endif
                                    </div>
                                    <!--end::Position-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap flex-center">
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span
                                                    class="w-75px">{{ $data->total_amount - $data->discount_amount + $data->admin_specialaccess_amount + $data->Installment_fee + $data->special_access_initial_fees }}</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                                width="2" height="14" rx="1" />
                                                            <path
                                                                d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-bold text-gray-400">Total Fees</div>
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-50px">{{ $data->due_amount }}</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                                width="2" height="14" rx="1" />
                                                            <path
                                                                d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-bold text-gray-400">Unpaid</div>
                                        </div>
                                        <!--end::Stats-->
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700">
                                                <span class="w-50px">{{ $data->paid_amount }}</span>
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <rect fill="#000000" opacity="0.5" x="11" y="5"
                                                                width="2" height="14" rx="1" />
                                                            <path
                                                                d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <div class="fw-bold text-gray-400">Paid</div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                        href="#kt_customer_view_details" role="button" aria-expanded="false"
                                        aria-controls="kt_customer_view_details">Details
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Edit Candidate details">
                                        <a href="#" class="btn-sm btn-primary" data-toggle="modal"
                                            data-target="#exampleModal" style="color:#fff">Edit</a>
                                        @if (
                                            $data->main_exam_type == 'GCSE' ||
                                                $data->main_exam_type == 'A Level' ||
                                                $data->main_exam_type == 'AS Level' ||
                                                $data->main_exam_type == 'IGCSE')
                                            <a href="#" class="btn-sm btn-primary" data-toggle="modal"
                                                data-target="#addcandidatenumber" style="color:#fff">Add Candidate ID</a>
                                        @endif
                                    </span>
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--begin::Details content-->
                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-5 fs-6">
                                        <!--begin::Badge-->
                                        @if ($data->is_apps_booking == 1)
                                            <div class="badge badge-light-info d-inline">Mobile Apps user</div>
                                        @else
                                            <div class="badge badge-light-danger d-inline">Website user</div>
                                        @endif
                                        <!--begin::Badge-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Booking ID</div>
                                        <div class="text-gray-600">{{ $data->booking_id }}</div>

                                        @if (
                                            $data->main_exam_type == 'GCSE' ||
                                                $data->main_exam_type == 'A Level' ||
                                                $data->main_exam_type == 'AS Level' ||
                                                $data->main_exam_type == 'IGCSE')
                                            <div class="fw-bolder mt-5">Candidate ID</div>
                                            <div class="text-gray-600">
                                                <span
                                                    class="badge badge-light-danger">{{ $data->Candidate_number ?? 'Booking Not Yet' }}
                                                </span>
                                            </div>

                                        @endif

                                        @if ($data->main_exam_type == 'AAT')
                                            <div class="fw-bolder mt-5">AAT Registration Number</div>
                                            <div class="text-gray-600"> <span
                                                    class="badge badge-light-danger">{{ $data->acca_registration_num ?? 'Null' }}
                                                </span></div>
                                        @endif

                                        @if ($data->main_exam_type == 'ACCA')
                                            <div class="fw-bolder mt-5">ACCA Registration Number</div>
                                            <div class="text-gray-600"> <span
                                                    class="badge badge-light-danger">{{ $data->acca_registration_num ?? 'Null' }}
                                                </span></div>
                                        @endif


                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">First Name</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">{{ $data->first_name }}</a>
                                        </div>
                                        <div class="fw-bolder mt-5">Middle Name</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">{{ $data->middle_name }}</a>
                                        </div>
                                        <div class="fw-bolder mt-5">Last Name</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">{{ $data->last_name }}</a>
                                        </div>
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Candidate Email</div>
                                        <div class="text-gray-600">
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary">{{ $data->email }}</a>
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->

                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Phone</div>
                                        <div class="text-gray-600">{{ $data->phone }}</div>
                                        <div class="fw-bolder mt-5">Home Phone</div>
                                        <div class="text-gray-600">{{ $data->emergency_contact_number }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Gender</div>
                                        <div class="text-gray-600">{{ $data->gender }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Date of Birth</div>
                                        <div class="text-gray-600">{{ $data->date_of_birth }}</div>
                                        <!--begin::Details item-->
                                        <div class="fw-bolder mt-5">Address</div>
                                        <div class="text-gray-600">{{ $data->address_line_1 }}</div>
                                        <div class="fw-bolder mt-5">City</div>
                                        <div class="text-gray-600">{{ $data->city }}</div>
                                        <div class="fw-bolder mt-5">Post Code</div>
                                        <div class="text-gray-600">{{ $data->postcode }}</div>
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Connected Accounts-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h3 class="fw-bolder m-0">Accounts & Login Information</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2">
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">

                                </div>
                                <!--end::Notice-->
                                <!--begin::Items-->
                                <div class="py-2">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex">

                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-5 text-dark text-hover-primary fw-bolder">Email</a>
                                                <div class="fs-6 fw-bold text-gray-400">{{ $data->email }}</div>
                                            </div>
                                        </div>


                                    </div>
                                    <!--end::Item-->
                                    <div class="separator separator-dashed my-5"></div>
                                    <div class="d-flex flex-stack">

                                        <div class="d-flex">

                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-5 text-dark text-hover-primary fw-bolder">Booking Date</a>
                                                <div class="fs-6 fw-bold text-gray-400">
                                                    {{ $data->created_at->format('d-M-Y') }} </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--begin::Item-->

                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <!--<div class="card-footer border-0 d-flex justify-content-center pt-0">-->
                            <!--	<button class="btn btn-sm btn-light-primary">Update</button>-->
                            <!--</div>-->
                            <!--end::Card footer-->
                        </div>
                        <!--end::Connected Accounts-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    {{--
									<div class="flex-lg-row-fluid ms-lg-15">
										<!--begin:::Tabs-->
										<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">Overview</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab">Events &amp; Logs</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Statements</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item ms-auto">
												<!--begin::Action menu-->
												<a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">Actions
												<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
												<span class="svg-icon svg-icon-2 me-0">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24" />
															<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
														</g>
													</svg>
												</span>
												<!--end::Svg Icon--></a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6" data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<a href="#" class="menu-link px-5">Create invoice</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<a href="#" class="menu-link flex-stack px-5">Create payments
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
														<a href="#" class="menu-link px-5">
															<span class="menu-title">Subscription</span>
															<span class="menu-arrow"></span>
														</a>
														<!--begin::Menu sub-->
														<div class="menu-sub menu-sub-dropdown w-175px py-4">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-5">Apps</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-5">Billing</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-5">Statements</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu separator-->
															<div class="separator my-2"></div>
															<!--end::Menu separator-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<div class="menu-content px-3">
																	<label class="form-check form-switch form-check-custom form-check-solid">
																		<input class="form-check-input w-30px h-20px" type="checkbox" value="" name="notifications" checked="checked" id="kt_user_menu_notifications" />
																		<span class="form-check-label text-muted fs-6" for="kt_user_menu_notifications">Notifications</span>
																	</label>
																</div>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu sub-->
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator my-3"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<a href="#" class="menu-link px-5">Reports</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-5 my-1">
														<a href="#" class="menu-link px-5">Account Settings</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<a href="#" class="menu-link text-danger px-5">Delete customer</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												<!--end::Menu-->
											</li>
											<!--end:::Tab item-->
										</ul>
										<!--end:::Tabs-->
										<!--begin:::Tab content-->
										<div class="tab-content active" id="myTabContent">
											<!--begin:::Tab pane-->
											<div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Payment Records</h2>
														</div>
														
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0 pb-5">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
															<!--begin::Table head-->
															<thead class="border-bottom border-gray-200 fs-7 fw-bolder">
																<!--begin::Table row-->
																<tr class="text-start text-gray-400 text-uppercase gs-0">
																	<th class="min-w-100px">Invoice No.</th>
																	<th>Status</th>
																	<th>Amount</th>
																	<th class="min-w-125px">Date</th>
																	<th class="text-end min-w-70px pe-4">Actions</th>
																</tr>
																<!--end::Table row-->
															</thead>
															<!--end::Table head-->
															<!--begin::Table body-->
															<tbody class="fs-6 fw-bold text-gray-600">
																<!--begin::Table row-->
																<tr>
																	<!--begin::Invoice=-->
																	<td>
																		<a href="#" class="text-gray-600 text-hover-primary mb-1">1066-4274</a>
																	</td>
																	<!--end::Invoice=-->
																	<!--begin::Status=-->
																	<td>
																		<span class="badge badge-light-success">Successful</span>
																	</td>
																	<!--end::Status=-->
																	<!--begin::Amount=-->
																	<td>$1,200.00</td>
																	<!--end::Amount=-->
																	<!--begin::Date=-->
																	<td>14 Dec 2020, 8:43 pm</td>
																	<!--end::Date=-->
																	<!--begin::Action=-->
																	<td class="pe-0 text-end">
																		<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Actions
																		<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
																		<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon--></a>
																		<!--begin::Menu-->
																		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
																			<!--begin::Menu item-->
																			<div class="menu-item px-3">
																				<a href="apps/customers/view.html" class="menu-link px-3">View</a>
																			</div>
																			<!--end::Menu item-->
																			<!--begin::Menu item-->
																			<div class="menu-item px-3">
																				<a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
																			</div>
																			<!--end::Menu item-->
																		</div>
																		<!--end::Menu-->
																	</td>
																	<!--end::Action=-->
																</tr>
																<!--end::Table row-->
															
															
																<!--end::Table row-->
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
												<!--begin::Card-->
												
												
												
												
												
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h5 class="">Payment Methods</h5>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
															<!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A" />
																	<path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A" />
																</svg>
															</span>
															<!--end::Svg Icon-->Add new method</a>
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div id="kt_customer_view_payment_method" class="card-body pt-0">
														<!--begin::Option-->
														<div class="py-0" data-kt-customer-payment-method="row">
															<!--begin::Header-->
															<div class="py-3 d-flex flex-stack flex-wrap">
																<!--begin::Toggle-->
																<div class="d-flex align-items-center collapsible rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_1">
																	<!--begin::Arrow-->
																	<div class="me-3 rotate-90">
																		<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<!--end::Arrow-->
																	<!--begin::Icon-->
																	<div class="symbol symbol-40px me-3">
																		<div class="symbol-label bg-light">
																			<img src="{{asset('backend')}}/assets/media/svg/card-logos/mastercard.svg" class="w-35px" alt="" />
																		</div>
																	</div>
																	<!--end::Icon-->
																	<!--begin::Summary-->
																	<div class="me-3">
																		<div class="d-flex align-items-center">
																			<div class="text-gray-800 fw-bolder">Mastercard</div>
																			<div class="badge badge-light-primary ms-5">Primary</div>
																		</div>
																		<div class="text-gray-400">Expires Dec 2024</div>
																	</div>
																	<!--end::Summary-->
																</div>
																<!--end::Toggle-->
																<!--begin::Toolbar-->
																<div class="d-flex my-3 ms-9">
																	<!--begin::Edit-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
																		<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
																			<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<!--end::Edit-->
																	<!--begin::Delete-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
																		<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
																		<span class="svg-icon svg-icon-3 mt-n1">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<!--end::Delete-->
																	<!--begin::More-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
																		<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<!--begin::Menu-->
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu-->
																	<!--end::More-->
																</div>
																<!--end::Toolbar-->
															</div>
															<!--end::Header-->
															<!--begin::Body-->
															<div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
																<!--begin::Row-->
																<div class="row py-5">
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Name</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Emma Smith</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Number</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">**** 3789</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Expires</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">12/2024</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Type</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Mastercard credit card</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Issuer</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">VICBANK</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">ID</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">id_4325df90sdf8</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Billing address</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">AU</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Phone</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">No phone provided</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Email</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">
																				<a href="#" class="text-gray-900 text-hover-primary">e.smith@kpmg.com.au</a>
																			</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Origin</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Australia
																			<div class="symbol symbol-20px symbol-circle ms-2">
																				<img src="{{asset('backend')}}/assets/media/flags/australia.svg" />
																			</div></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">CVC check</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Passed
																			<!--begin::Svg Icon | path: icons/duotone/Navigation/Double-check.svg-->
																			<span class="svg-icon svg-icon-2 svg-icon-success">
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																						<polygon points="0 0 24 0 24 24 0 24" />
																						<path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002)" />
																						<path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002)" />
																					</g>
																				</svg>
																			</span>
																			<!--end::Svg Icon--></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																</div>
																<!--end::Row-->
															</div>
															<!--end::Body-->
														</div>
														<!--end::Option-->
														<div class="separator separator-dashed"></div>
														<!--begin::Option-->
														<div class="py-0" data-kt-customer-payment-method="row">
															<!--begin::Header-->
															<div class="py-3 d-flex flex-stack flex-wrap">
																<!--begin::Toggle-->
																<div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_2" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_2">
																	<!--begin::Arrow-->
																	<div class="me-3 rotate-90">
																		<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<!--end::Arrow-->
																	<!--begin::Icon-->
																	<div class="symbol symbol-40px me-3">
																		<div class="symbol-label bg-light">
																			<img src="{{asset('backend')}}/assets/media/svg/card-logos/visa.svg" class="w-35px" alt="" />
																		</div>
																	</div>
																	<!--end::Icon-->
																	<!--begin::Summary-->
																	<div class="me-3">
																		<div class="d-flex align-items-center">
																			<div class="text-gray-800 fw-bolder">Visa</div>
																		</div>
																		<div class="text-gray-400">Expires Feb 2022</div>
																	</div>
																	<!--end::Summary-->
																</div>
																<!--end::Toggle-->
																<!--begin::Toolbar-->
																<div class="d-flex my-3 ms-9">
																	<!--begin::Edit-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
																		<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
																			<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<!--end::Edit-->
																	<!--begin::Delete-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
																		<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
																		<span class="svg-icon svg-icon-3 mt-n1">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<!--end::Delete-->
																	<!--begin::More-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
																		<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<!--begin::Menu-->
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu-->
																	<!--end::More-->
																</div>
																<!--end::Toolbar-->
															</div>
															<!--end::Header-->
															<!--begin::Body-->
															<div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
																<!--begin::Row-->
																<div class="row py-5">
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Name</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Melody Macy</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Number</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">**** 4404</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Expires</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">02/2022</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Type</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Visa credit card</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Issuer</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">ENBANK</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">ID</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">id_w2r84jdy723</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Billing address</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">UK</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Phone</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">No phone provided</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Email</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">
																				<a href="#" class="text-gray-900 text-hover-primary">melody@altbox.com</a>
																			</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Origin</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">United Kingdom
																			<div class="symbol symbol-20px symbol-circle ms-2">
																				<img src="{{asset('backend')}}/assets/media/flags/united-kingdom.svg" />
																			</div></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">CVC check</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Passed
																			<!--begin::Svg Icon | path: icons/duotone/Navigation/Double-check.svg-->
																			<span class="svg-icon svg-icon-2 svg-icon-success">
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																						<polygon points="0 0 24 0 24 24 0 24" />
																						<path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002)" />
																						<path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002)" />
																					</g>
																				</svg>
																			</span>
																			<!--end::Svg Icon--></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																</div>
																<!--end::Row-->
															</div>
															<!--end::Body-->
														</div>
														<!--end::Option-->
														<div class="separator separator-dashed"></div>
														<!--begin::Option-->
														<div class="py-0" data-kt-customer-payment-method="row">
															<!--begin::Header-->
															<div class="py-3 d-flex flex-stack flex-wrap">
																<!--begin::Toggle-->
																<div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_3" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_3">
																	<!--begin::Arrow-->
																	<div class="me-3 rotate-90">
																		<!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</div>
																	<!--end::Arrow-->
																	<!--begin::Icon-->
																	<div class="symbol symbol-40px me-3">
																		<div class="symbol-label bg-light">
																			<img src="{{asset('backend')}}/assets/media/svg/card-logos/american-express.svg" class="w-35px" alt="" />
																		</div>
																	</div>
																	<!--end::Icon-->
																	<!--begin::Summary-->
																	<div class="me-3">
																		<div class="d-flex align-items-center">
																			<div class="text-gray-800 fw-bolder">American Express</div>
																			<div class="badge badge-light-danger ms-5">Expired</div>
																		</div>
																		<div class="text-gray-400">Expires Aug 2021</div>
																	</div>
																	<!--end::Summary-->
																</div>
																<!--end::Toggle-->
																<!--begin::Toolbar-->
																<div class="d-flex my-3 ms-9">
																	<!--begin::Edit-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
																		<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
																			<!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<!--end::Edit-->
																	<!--begin::Delete-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
																		<!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
																		<span class="svg-icon svg-icon-3 mt-n1">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<!--end::Delete-->
																	<!--begin::More-->
																	<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
																		<!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24" />
																					<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
																					<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
																	<!--begin::Menu-->
																	<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
																		<!--begin::Menu item-->
																		<div class="menu-item px-3">
																			<a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
																		</div>
																		<!--end::Menu item-->
																	</div>
																	<!--end::Menu-->
																	<!--end::More-->
																</div>
																<!--end::Toolbar-->
															</div>
															<!--end::Header-->
															<!--begin::Body-->
															<div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
																<!--begin::Row-->
																<div class="row py-5">
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Name</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Max Smith</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Number</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">**** 4439</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Expires</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">08/2021</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Type</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">American express credit card</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Issuer</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">USABANK</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">ID</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">id_89457jcje63</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																	<!--begin::Row-->
																	<div class="col-md-6">
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Billing address</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">US</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Phone</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">No phone provided</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Email</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">
																				<a href="#" class="text-gray-900 text-hover-primary">max@kt.com</a>
																			</div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex mb-3">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">Origin</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">United States of America
																			<div class="symbol symbol-20px symbol-circle ms-2">
																				<img src="{{asset('backend')}}/assets/media/flags/united-states.svg" />
																			</div></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																		<!--begin::Item-->
																		<div class="d-flex">
																			<!--begin::Label-->
																			<div class="text-gray-400 fw-bold w-125px">CVC check</div>
																			<!--end::Label-->
																			<!--begin::Value-->
																			<div class="text-gray-800 fw-bold">Failed
																			<!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
																			<span class="svg-icon svg-icon-2 svg-icon-danger">
																				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																					<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
																						<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
																						<rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
																					</g>
																				</svg>
																			</span>
																			<!--end::Svg Icon--></div>
																			<!--end::Value-->
																		</div>
																		<!--end::Item-->
																	</div>
																	<!--end::Row-->
																</div>
																<!--end::Row-->
															</div>
															<!--end::Body-->
														</div>
														<!--end::Option-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2 class="fw-bolder">Credit Balance</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_adjust_balance">
															<!--begin::Svg Icon | path: icons/duotone/General/Edit.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M7.10343995,21.9419885 L6.71653855,8.03551821 C6.70507204,7.62337518 6.86375628,7.22468355 7.15529818,6.93314165 L10.2341093,3.85433055 C10.8198957,3.26854411 11.7696432,3.26854411 12.3554296,3.85433055 L15.4614112,6.9603121 C15.7369117,7.23581259 15.8944065,7.6076995 15.9005637,7.99726737 L16.1199293,21.8765672 C16.1330212,22.7048909 15.4721452,23.3869929 14.6438216,23.4000848 C14.6359205,23.4002097 14.6280187,23.4002721 14.6201167,23.4002721 L8.60285976,23.4002721 C7.79067946,23.4002721 7.12602744,22.7538546 7.10343995,21.9419885 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.418039, 13.407631) rotate(-135.000000) translate(-11.418039, -13.407631)" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->Adjust Balance</a>
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<div class="fw-bolder fs-2">$32,487.57
														<span class="text-gray-400 fs-4 fw-bold">USD</span>
														<div class="fs-7 fw-normal text-gray-400">Balance will increase the amount due on the customer's next invoice.</div></div>
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
												<!--begin::Card-->
												<div class="card pt-2 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Invoices</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Toolbar-->
														<div class="card-toolbar m-0">
															<!--begin::Tab nav-->
															<ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
																<li class="nav-item" role="presentation">
																	<a id="kt_referrals_year_tab" class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_1">This Year</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_2">2020</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_3">2019</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a id="kt_referrals_2017_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_4">2018</a>
																</li>
															</ul>
															<!--end::Tab nav-->
														</div>
														<!--end::Toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<!--begin::Tab Content-->
														<div id="kt_referred_users_tab_content" class="tab-content">
															<!--begin::Tab panel-->
															<div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
																	<!--begin::Thead-->
																	<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
																		<tr class="text-start text-gray-400 gs-0">
																			<th class="min-w-100px">Order ID</th>
																			<th class="min-w-100px">Amount</th>
																			<th class="min-w-100px">Status</th>
																			<th class="min-w-125px">Date</th>
																			<th class="min-w-100px text-end pe-7">Invoice</th>
																		</tr>
																	</thead>
																	<!--end::Thead-->
																	<!--begin::Tbody-->
																	<tbody class="fs-6 fw-bold text-gray-600">
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td class="text-success">$38.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td class="text-danger">$-2.60</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Oct 24, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$76.00</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Oct 08, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$5.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Sep 15, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td class="text-danger">$-1.30</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>May 30, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td class="text-success">$204.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Apr 22, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td class="text-success">$31.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Feb 09, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td class="text-success">$52.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td class="text-danger">$-0.80</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Jan 04, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Tbody-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
															<!--begin::Tab panel-->
															<div id="kt_customer_details_invoices_2" class="py-0 tab-pane fade" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_details_invoices_table_2" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
																	<!--begin::Thead-->
																	<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
																		<tr class="text-start text-gray-400 gs-0">
																			<th class="min-w-100px">Order ID</th>
																			<th class="min-w-100px">Amount</th>
																			<th class="min-w-100px">Status</th>
																			<th class="min-w-125px">Date</th>
																			<th class="min-w-100px text-end pe-7">Invoice</th>
																		</tr>
																	</thead>
																	<!--end::Thead-->
																	<!--begin::Tbody-->
																	<tbody class="fs-6 fw-bold text-gray-600">
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td class="text-danger">$-1.30</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>May 30, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td class="text-success">$204.00</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Apr 22, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td class="text-success">$31.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Feb 09, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td class="text-success">$52.00</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td class="text-danger">$-0.80</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Jan 04, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td class="text-success">$38.00</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td class="text-danger">$-2.60</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Oct 24, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$76.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Oct 08, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$5.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Sep 15, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Tbody-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
															<!--begin::Tab panel-->
															<div id="kt_customer_details_invoices_3" class="py-0 tab-pane fade" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_details_invoices_table_3" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
																	<!--begin::Thead-->
																	<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
																		<tr class="text-start text-gray-400 gs-0">
																			<th class="min-w-100px">Order ID</th>
																			<th class="min-w-100px">Amount</th>
																			<th class="min-w-100px">Status</th>
																			<th class="min-w-125px">Date</th>
																			<th class="min-w-100px text-end pe-7">Invoice</th>
																		</tr>
																	</thead>
																	<!--end::Thead-->
																	<!--begin::Tbody-->
																	<tbody class="fs-6 fw-bold text-gray-600">
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td class="text-success">$31.00</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Feb 09, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td class="text-success">$52.00</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td class="text-danger">$-0.80</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Jan 04, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$5.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Sep 15, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td class="text-success">$38.00</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td class="text-danger">$-2.60</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Oct 24, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$76.00</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Oct 08, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td class="text-danger">$-1.30</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>May 30, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td class="text-success">$204.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Apr 22, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Tbody-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
															<!--begin::Tab panel-->
															<div id="kt_customer_details_invoices_4" class="py-0 tab-pane fade" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_details_invoices_table_4" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
																	<!--begin::Thead-->
																	<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
																		<tr class="text-start text-gray-400 gs-0">
																			<th class="min-w-100px">Order ID</th>
																			<th class="min-w-100px">Amount</th>
																			<th class="min-w-100px">Status</th>
																			<th class="min-w-125px">Date</th>
																			<th class="min-w-100px text-end pe-7">Invoice</th>
																		</tr>
																	</thead>
																	<!--end::Thead-->
																	<!--begin::Tbody-->
																	<tbody class="fs-6 fw-bold text-gray-600">
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td class="text-success">$38.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td class="text-danger">$-2.60</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Oct 24, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td class="text-success">$38.00</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td class="text-danger">$-2.60</td>
																			<td>
																				<span class="badge badge-light-info">In progress</span>
																			</td>
																			<td>Oct 24, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td class="text-success">$31.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Feb 09, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td class="text-success">$52.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Nov 01, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td class="text-danger">$-0.80</td>
																			<td>
																				<span class="badge badge-light-warning">Pending</span>
																			</td>
																			<td>Jan 04, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$76.00</td>
																			<td>
																				<span class="badge badge-light-success">Approved</span>
																			</td>
																			<td>Oct 08, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td class="text-success">$76.00</td>
																			<td>
																				<span class="badge badge-light-danger">Rejected</span>
																			</td>
																			<td>Oct 08, 2020</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Tbody-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
														</div>
														<!--end::Tab Content-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end:::Tab pane-->
											<!--begin:::Tab pane-->
											<div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Logs</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<!--begin::Button-->
															<button type="button" class="btn btn-sm btn-light-primary">
															<!--begin::Svg Icon | path: icons/duotone/Files/Download.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="1" width="2" height="14" rx="1" />
																		<path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999)" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->Download Report</button>
															<!--end::Button-->
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body py-0">
														<!--begin::Table wrapper-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
																<!--begin::Table body-->
																<tbody>
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-warning">404 WRN</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/customer/c_60a3947ac134f/not_found</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">05 May 2021, 11:05 am</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_4988_3611/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">20 Dec 2021, 5:30 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_4988_3611/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">10 Nov 2021, 5:30 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-warning">404 WRN</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/customer/c_60a3947ac134f/not_found</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">19 Aug 2021, 6:05 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-danger">500 ERR</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoice/in_7538_3123/invalid</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">20 Jun 2021, 8:43 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-danger">500 ERR</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoice/in_8231_3123/invalid</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">21 Feb 2021, 2:40 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_5853_4374/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">24 Jun 2021, 11:30 am</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-warning">404 WRN</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/customer/c_60a3947ac1350/not_found</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">25 Jul 2021, 10:10 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_4988_3611/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">15 Apr 2021, 2:40 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_5853_4374/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">22 Sep 2021, 10:30 am</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																</tbody>
																<!--end::Table body-->
															</table>
															<!--end::Table-->
														</div>
														<!--end::Table wrapper-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Events</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<!--begin::Button-->
															<button type="button" class="btn btn-sm btn-light-primary">
															<!--begin::Svg Icon | path: icons/duotone/Files/Download.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="1" width="2" height="14" rx="1" />
																		<path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999)" />
																	</g>
																</svg>
															</span>
															<!--end::Svg Icon-->Download Report</button>
															<!--end::Button-->
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body py-0">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="kt_table_customers_events">
															<!--begin::Table body-->
															<tbody>
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Max Smith</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#SDK-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">20 Dec 2021, 5:20 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#DER-45645</a>status has changed from
																	<span class="badge badge-light-info me-1">In Progress</span>to
																	<span class="badge badge-light-primary">In Transit</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2021, 6:43 am</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Sean Bean</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">15 Apr 2021, 9:23 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
																	<span class="badge badge-light-info">In Progress</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">10 Nov 2021, 5:20 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Sean Bean</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">22 Sep 2021, 6:05 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
																	<span class="badge badge-light-succees me-1">In Transit</span>to
																	<span class="badge badge-light-success">Approved</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2021, 6:43 am</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#DER-45645</a>status has changed from
																	<span class="badge badge-light-info me-1">In Progress</span>to
																	<span class="badge badge-light-primary">In Transit</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2021, 8:43 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Max Smith</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#SDK-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2021, 2:40 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
																	<span class="badge badge-light-succees me-1">In Transit</span>to
																	<span class="badge badge-light-success">Approved</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">15 Apr 2021, 10:10 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Emma Smith</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">20 Dec 2021, 6:05 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
											</div>
											<!--end:::Tab pane-->
											<!--begin:::Tab pane-->
											<div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
												<!--begin::Earnings-->
												<div class="card mb-6 mb-xl-9">
													<!--begin::Header-->
													<div class="card-header border-0">
														<div class="card-title">
															<h2>Earnings</h2>
														</div>
													</div>
													<!--end::Header-->
													<!--begin::Body-->
													<div class="card-body py-0">
														<div class="fs-5 fw-bold text-gray-500 mb-4">Last 30 day earnings calculated. Apart from arranging the order of topics.</div>
														<!--begin::Left Section-->
														<div class="d-flex flex-wrap flex-stack mb-5">
															<!--begin::Row-->
															<div class="d-flex flex-wrap">
																<!--begin::Col-->
																<div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
																	<span class="fs-1 fw-bolder text-gray-800 lh-1">
																		<span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">0</span>
																		<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
																		<span class="svg-icon svg-icon-1 svg-icon-success">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
																				</g>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</span>
																	<span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Net Earnings</span>
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
																	<span class="fs-1 fw-bolder text-gray-800 lh-1">
																	<span class="" data-kt-countup="true" data-kt-countup-value="16">0</span>%
																	<!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
																	<span class="svg-icon svg-icon-1 svg-icon-danger">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24" />
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
																				<path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
																			</g>
																		</svg>
																	</span>
																	<!--end::Svg Icon--></span>
																	<span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Change</span>
																</div>
																<!--end::Col-->
																<!--begin::Col-->
																<div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
																	<span class="fs-1 fw-bolder text-gray-800 lh-1">
																		<span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$">0</span>
																		<span class="text-primary">--</span>
																	</span>
																	<span class="fs-6 fw-bold text-gray-400 d-block lh-1 pt-2">Fees</span>
																</div>
																<!--end::Col-->
															</div>
															<!--end::Row-->
															<a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw Earnings</a>
														</div>
														<!--end::Left Section-->
													</div>
													<!--end::Body-->
												</div>
												<!--end::Earnings-->
												<!--begin::Statements-->
												<div class="card mb-6 mb-xl-9">
													<!--begin::Header-->
													<div class="card-header">
														<!--begin::Title-->
														<div class="card-title">
															<h2>Statement</h2>
														</div>
														<!--end::Title-->
														<!--begin::Toolbar-->
														<div class="card-toolbar">
															<!--begin::Tab nav-->
															<ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
																<li class="nav-item" role="presentation">
																	<a class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_1">This Year</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_2">2020</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_3">2019</a>
																</li>
																<li class="nav-item" role="presentation">
																	<a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_4">2018</a>
																</li>
															</ul>
															<!--end::Tab nav-->
														</div>
														<!--end::Toolbar-->
													</div>
													<!--end::Header-->
													<!--begin::Card body-->
													<div class="card-body pb-5">
														<!--begin::Tab Content-->
														<div id="kt_customer_view_statement_tab_content" class="tab-content">
															<!--begin::Tab panel-->
															<div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
																	<!--begin::Table head-->
																	<thead class="border-bottom border-gray-200">
																		<!--begin::Table row-->
																		<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
																			<th class="w-125px">Date</th>
																			<th class="w-100px">Order ID</th>
																			<th class="w-300px">Details</th>
																			<th class="w-100px">Amount</th>
																			<th class="w-100px text-end pe-7">Invoice</th>
																		</tr>
																		<!--end::Table row-->
																	</thead>
																	<!--end::Table head-->
																	<!--begin::Table body-->
																	<tbody>
																		<tr>
																			<td>Nov 01, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Sep 15, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Iphone 12 Pro Mockup Mega Bundle</td>
																			<td class="text-success">$5.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>May 30, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-1.30</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Apr 22, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td>Parcel Shipping / Delivery Service App</td>
																			<td class="text-success">$204.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Feb 09, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td>Visual Design Illustration</td>
																			<td class="text-success">$31.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td>Abstract Vusial Pack</td>
																			<td class="text-success">$52.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Jan 04, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-0.80</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Sep 15, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Iphone 12 Pro Mockup Mega Bundle</td>
																			<td class="text-success">$5.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>May 30, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-1.30</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Apr 22, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td>Parcel Shipping / Delivery Service App</td>
																			<td class="text-success">$204.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Feb 09, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td>Visual Design Illustration</td>
																			<td class="text-success">$31.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td>Abstract Vusial Pack</td>
																			<td class="text-success">$52.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Jan 04, 2021</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-0.80</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Table body-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
															<!--begin::Tab panel-->
															<div id="kt_customer_view_statement_2" class="py-0 tab-pane fade" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_view_statement_table_2" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
																	<!--begin::Table head-->
																	<thead class="border-bottom border-gray-200">
																		<!--begin::Table row-->
																		<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
																			<th class="w-125px">Date</th>
																			<th class="w-100px">Order ID</th>
																			<th class="w-300px">Details</th>
																			<th class="w-100px">Amount</th>
																			<th class="w-100px text-end pe-7">Invoice</th>
																		</tr>
																		<!--end::Table row-->
																	</thead>
																	<!--end::Table head-->
																	<!--begin::Table body-->
																	<tbody>
																		<tr>
																			<td>May 30, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-1.30</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Apr 22, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td>Parcel Shipping / Delivery Service App</td>
																			<td class="text-success">$204.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Feb 09, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td>Visual Design Illustration</td>
																			<td class="text-success">$31.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td>Abstract Vusial Pack</td>
																			<td class="text-success">$52.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Jan 04, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-0.80</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Sep 15, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Iphone 12 Pro Mockup Mega Bundle</td>
																			<td class="text-success">$5.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>May 30, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-1.30</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Apr 22, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td>Parcel Shipping / Delivery Service App</td>
																			<td class="text-success">$204.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Feb 09, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td>Visual Design Illustration</td>
																			<td class="text-success">$31.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td>Abstract Vusial Pack</td>
																			<td class="text-success">$52.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Jan 04, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-0.80</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Sep 15, 2020</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Iphone 12 Pro Mockup Mega Bundle</td>
																			<td class="text-success">$5.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Table body-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
															<!--begin::Tab panel-->
															<div id="kt_customer_view_statement_3" class="py-0 tab-pane fade" role="tabpanel">
																<!--begin::Table-->



																<!--Acca End  -->
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
															<!--begin::Tab panel-->
															<div id="kt_customer_view_statement_4" class="py-0 tab-pane fade" role="tabpanel">
																<!--begin::Table-->
																<table id="kt_customer_view_statement_table_4" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
																	<!--begin::Table head-->
																	<thead class="border-bottom border-gray-200">
																		<!--begin::Table row-->
																		<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
																			<th class="w-125px">Date</th>
																			<th class="w-100px">Order ID</th>
																			<th class="w-300px">Details</th>
																			<th class="w-100px">Amount</th>
																			<th class="w-100px text-end pe-7">Invoice</th>
																		</tr>
																		<!--end::Table row-->
																	</thead>
																	<!--end::Table head-->
																	<!--begin::Table body-->
																	<tbody>
																		<tr>
																			<td>Nov 01, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Feb 09, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td>Visual Design Illustration</td>
																			<td class="text-success">$31.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td>Abstract Vusial Pack</td>
																			<td class="text-success">$52.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Jan 04, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-0.80</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2018</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Feb 09, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
																			</td>
																			<td>Visual Design Illustration</td>
																			<td class="text-success">$31.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
																			</td>
																			<td>Abstract Vusial Pack</td>
																			<td class="text-success">$52.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Jan 04, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-0.80</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Sep 15, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Iphone 12 Pro Mockup Mega Bundle</td>
																			<td class="text-success">$5.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Nov 01, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
																			</td>
																			<td>Darknight transparency 36 Icons Pack</td>
																			<td class="text-success">$38.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 24, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-2.60</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Oct 08, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
																			</td>
																			<td>Cartoon Mobile Emoji Phone Pack</td>
																			<td class="text-success">$76.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>May 30, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
																			</td>
																			<td>Seller Fee</td>
																			<td class="text-danger">$-1.30</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																		<tr>
																			<td>Apr 22, 2019</td>
																			<td>
																				<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
																			</td>
																			<td>Parcel Shipping / Delivery Service App</td>
																			<td class="text-success">$204.00</td>
																			<td class="text-end">
																				<button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
																			</td>
																		</tr>
																	</tbody>
																	<!--end::Table body-->
																</table>
																<!--end::Table-->
															</div>
															<!--end::Tab panel-->
														</div>
														<!--end::Tab Content-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Statements-->
											</div>
											<!--end:::Tab pane-->
										</div>
										<!--end:::Tab content-->
									</div>

									--}}
                    <div class="container">
                        <a href="#" target="_blank">
                            <h1> Candidate Booking Details </h1>
                        </a>
                        <p class="lead">

                            @if ($data->main_exam_type == 'AAT' || $data->main_exam_type == 'ACCA' || $data->main_exam_type == 'Functional Skills')
                                <a href="{{ url('admin/candidate-confirm-exam/booking/' . $data->id) }}"
                                    class="btn btn-sm btn-flex btn-light-success">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                fill="#12131A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                fill="#12131A" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Exam Confirmation</a>
                            @else
                                <a href="{{ url('admin/candidate-gcse-alevel-igcse-confirmation/exambooking/' . $data->id) }}"
                                    class="btn btn-sm btn-flex btn-light-success">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                fill="#12131A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                fill="#12131A" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Exam Confirmation</a>


                                <a href="{{ url('admin/candidate-gcse-alevel-igcse-assesment/uploads/' . $data->id) }}"
                                    class="btn btn-sm btn-flex btn-light-danger">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                fill="#12131A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                fill="#12131A" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Assesment Uploads</a>


                                <a href="{{ url('admin/candidate-result-uploads/index/' . $data->id) }}"
                                    class="btn btn-sm btn-flex btn-light-warning">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                fill="#12131A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                fill="#12131A" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Result Uploads</a>

                            @endif

                            @if ($data->main_exam_type == 'Functional Skills')
                                <a href="{{ url('admin/functional-skills/result/' . $data->id) }}"
                                    class="btn btn-sm btn-flex btn-light-warning">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                fill="#12131A" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                fill="#12131A" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Result Uploads</a>

                            @endif




                            <!--begin::Filter-->
                            <a href="{{ url('candidate/details/exports/' . $data->booking_id) }}"
                                class="btn btn-sm btn-flex btn-light-primary">
                                <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                            fill="#12131A" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                            fill="#12131A" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Export PDF</a>

                        </p>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#info" role="tab" data-toggle="tab" class="nav-link active">Exam Subject
                                    List </a>
                            </li>
                            <li class="nav-item">
                                <a href="#ratings" role="tab" data-toggle="tab" class="nav-link"> Others Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#special_access" role="tab" data-toggle="tab" class="nav-link"> Special
                                    Access </a>
                            </li>
                            <li class="nav-item">
                                <a href="#mock_exam" role="tab" data-toggle="tab" class="nav-link"> Mock Exam </a>
                            </li>
                            <li class="nav-item">
                                <a href="#payment_history" role="tab" data-toggle="tab" class="nav-link"> Payments
                                    History</a>
                            </li>
                            <li class="nav-item">
                                <a href="#photo_id" role="tab" data-toggle="tab" class="nav-link">Photo ID</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="info">




                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h5>Subject Information</h5>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">

                                            <!--end::Filter-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">

                                        @if ($data->exam_information != null)
                                            @if (
                                                $data->main_exam_type == 'GCSE' ||
                                                    $data->main_exam_type == 'A Level' ||
                                                    $data->main_exam_type == 'AS Level' ||
                                                    $data->main_exam_type == 'IGCSE')
                                                <table id="kt_customer_view_statement_table_3"
                                                    class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                                    <!--begin::Table head-->
                                                    <thead class="border-bottom border-gray-200">
                                                        <!--begin::Table row-->
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>Exam Board</th>
                                                            <th>Exam Series</th>
                                                            <th>Subject</th>
                                                            <th>Unit Code</th>
                                                            <th>Option Code</th>
                                                            <th>Fees</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        @if ($data->exam_information != null)
                                                            @foreach (json_decode($data->exam_information) as $exam)
                                                                <tr>
                                                                    <td>{{ $exam->exam_board }}</td>
                                                                    <td>
                                                                        <a href="#"
                                                                            class="text-gray-600 text-hover-primary">{{ $data->mainseries->exam_name ?? '' }}</a>
                                                                    </td>
                                                                    @php
                                                                        $subject = App\Models\Subject::where(
                                                                            'id',
                                                                            $exam->subject,
                                                                        )
                                                                            ->select(['subject_name', 'unit_code'])
                                                                            ->first();
                                                                    @endphp
                                                                    <td>{{ $subject->subject_name ?? '' }}</td>
                                                                    <td class="text-danger">
                                                                        {{ $subject->unit_code ?? '' }}</td>
                                                                    <td class="text-success">
                                                                        {{ $exam->option_code ?? '' }}</td>
                                                                    <td class="text-end">
                                                                        <button
                                                                            class="btn btn-sm btn-light-success btn-active-light-success">£
                                                                            {{ $exam->fees }}</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <button type="button" onclick="aatSubjectUpdate()"
                                                    class="btn btn-primary">Update</button>
                                            @endif
                                            <!-- Acca  -->
                                            @if ($data->main_exam_type == 'ACCA')
                                                <table id="kt_customer_view_statement_table_3"
                                                    class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                                    <!--begin::Table head-->
                                                    <thead class="border-bottom border-gray-200">
                                                        <!--begin::Table row-->
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>Exam Board</th>
                                                            <th>Exam Branch</th>
                                                            <th>Subject</th>
                                                            <th>Fees</th>
                                                            <th>Date </th>
                                                            <th>Time</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        @if ($data->exam_information != null)
                                                            @foreach (json_decode($data->exam_information) as $exam)
                                                                <tr>
                                                                    <td>{{ $exam->exam_board }}</td>
                                                                    <td>{{ $exam->type }}</td>
                                                                    @php
                                                                        $subject = App\Models\Subject::where(
                                                                            'id',
                                                                            $exam->subject,
                                                                        )->first();
                                                                    @endphp
                                                                    <td class="text-danger">
                                                                        {{ $subject->subject_name ?? '' }}</td>

                                                                    <td>£ {{ $exam->fees }}</td>


                                                                    <td> {{ $exam->exam_date }}</td>
                                                                    <td>{{ $exam->start_exam_time }}</td>

                                                                </tr>
                                                            @endforeach
                                                        @endif

                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <button type="button" onclick="aatSubjectUpdate()"
                                                    class="btn btn-primary">Update</button>
                                            @endif


                                            @if ($data->main_exam_type == 'AAT')
                                                <table id="kt_customer_view_statement_table_3"
                                                    class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                                    <!--begin::Table head-->
                                                    <thead class="border-bottom border-gray-200">
                                                        <!--begin::Table row-->
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th> Board</th>
                                                            <th> Branch</th>
                                                            <th> Level</th>
                                                            <th>Subject</th>
                                                            <th> Type</th>
                                                            <th>Fees</th>
                                                            <th>Date </th>
                                                            <th>Time</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        @if ($data->exam_information != null)
                                                            @foreach (json_decode($data->exam_information) as $exam)
                                                                <tr>
                                                                    <td>{{ $exam->exam_board }}</td>
                                                                    <td>{{ $exam->exam_series }}</td>
                                                                    <td>{{ $exam->type }}</td>
                                                                    @php
                                                                        $subject = App\Models\Subject::where(
                                                                            'id',
                                                                            $exam->subject,
                                                                        )->first();
                                                                    @endphp
                                                                    <td class="text-danger">
                                                                        @if ($subject)
                                                                            {{ $subject->subject_name }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-danger">{{ $exam->option_code }}</td>

                                                                    <td>£ {{ $exam->fees }}</td>
                                                                    <td> {{ \Carbon\Carbon::parse($exam->exam_date)->format('d-m-Y') }}

                                                                    </td>
                                                                    <td>{{ $exam->start_exam_time }}</td>

                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>

                                                <button type="button" onclick="aatSubjectUpdate()"
                                                    class="btn btn-primary">Update</button>
                                            @endif



                                            @if ($data->main_exam_type == 'Functional Skills')
                                                <table id="kt_customer_view_statement_table_3"
                                                    class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                                    <!--begin::Table head-->
                                                    <thead class="border-bottom border-gray-200">
                                                        <!--begin::Table row-->
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>Exam Board</th>
                                                            <th>Exam Branch</th>
                                                            <th>Exam Level</th>
                                                            <th>Subject</th>
                                                            <th>Exam Type</th>
                                                            <th>Fees</th>
                                                            <th>Date </th>
                                                            <th>Time</th>
                                                        </tr>
                                                        <!--end::Table row-->
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        @if ($data->exam_information != null)
                                                            @foreach (json_decode($data->exam_information) as $exam)
                                                                <tr>
                                                                    <td>{{ $exam->exam_board }}</td>
                                                                    <td>{{ $exam->exam_series }}</td>
                                                                    <td>{{ $exam->type }}</td>
                                                                    @php
                                                                        $subject = App\Models\Subject::where(
                                                                            'id',
                                                                            $exam->subject,
                                                                        )->first();
                                                                    @endphp
                                                                    <td class="text-danger">
                                                                        @if ($subject)
                                                                            {{ $subject->subject_name }}
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-danger">{{ $exam->option_code }}</td>

                                                                    <td>£ {{ $exam->fees }}</td>
                                                                    <td> {{ \Carbon\Carbon::parse($exam->exam_date)->format('d-m-Y') }}
                                                                    </td>
                                                                    <td>{{ $exam->start_exam_time }}</td>

                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                                <button type="button" onclick="aatSubjectUpdate()"
                                                    class="btn btn-primary">Update</button>
                                            @endif
                                        @else
                                            <p>Subject not included</p>
                                        @endif





                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <div class="card pt-4 mb-6 mb-xl-9" id="aatsubjectupdateID" style="display:none">
                                    <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                        <div class="" id="subjectupdate_section">
                                            <!--begin::Body-->
                                            <div class="card-body pb-0">
                                                <!--begin::Header-->
                                                <div class="d-flex align-items-center mb-5">

                                                </div>
                                                <form action="{{ url('admin/get/updatesubject/') }}" method="post">
                                                    @csrf

                                                    @if ($data->main_exam_type == 'GCSE')
                                                        @if ($data->exam_information == null)
                                                        @else
                                                            <div class="col-md-12 grid-margin stretch-card">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title text-warning">Subject Details
                                                                        </h4>
                                                                        <div class="row">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $data->id }}">
                                                                            <div
                                                                                class="col-md-12 grid-margin stretch-card">

                                                                                @php
                                                                                    $count = json_decode(
                                                                                        $data->exam_information,
                                                                                        true,
                                                                                    );
                                                                                    $maincount = sizeof($count);
                                                                                @endphp
                                                                                @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                    @php
                                                                                        $allsub = App\Models\Subject::where(
                                                                                            'exam_type',
                                                                                            'GCSE',
                                                                                        )
                                                                                            ->where(
                                                                                                'exam_board',
                                                                                                $random->exam_board,
                                                                                            )
                                                                                            ->get();
                                                                                    @endphp
                                                                                    <div class="mb-10 fv-row row">
                                                                                        <div class="col-md-4"
                                                                                            style="margin-bottom:8px">
                                                                                            <label
                                                                                                class="form-label mb-3">EXAM
                                                                                                BOARD </label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="exam_board[]"
                                                                                                onchange="typecheangegcse(this)"
                                                                                                id="type_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid">
                                                                                                <option value="Edexcel"
                                                                                                    @if ($random->exam_board == 'Edexcel') selected @endif>
                                                                                                    Edexcel</option>
                                                                                                <option value="AQA"
                                                                                                    @if ($random->exam_board == 'AQA') selected @endif>
                                                                                                    AQA</option>
                                                                                                <option value="OCR"
                                                                                                    @if ($random->exam_board == 'OCR') selected @endif>
                                                                                                    OCR</option>
                                                                                                <option
                                                                                                    value="Cambridge CIE"
                                                                                                    @if ($random->exam_board == 'Cambridge CIE') selected @endif>
                                                                                                    Cambridge(CIE)</option>
                                                                                                <option value="WJEC"
                                                                                                    @if ($random->exam_board == 'WJEC') selected @endif>
                                                                                                    WJEC</option>
                                                                                            </select>

                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">EXAM
                                                                                                SERIES</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="exam_series[]"
                                                                                                id="exam_series_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid">

                                                                                                <option>Select</option>
                                                                                                @foreach ($exam_series as $myseries)
                                                                                                    <option
                                                                                                        value="{{ $myseries->id }}"
                                                                                                        @if ($random->exam_series == $myseries->id) selected @endif>
                                                                                                        {{ $myseries->exam_name }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">TYPE</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="type[]"
                                                                                                class="form-select form-select-lg form-select-solid type">
                                                                                                <option value="GCSE">GCSE
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">SUBJECT</label>
                                                                                            <select name="subject[]"
                                                                                                onchange="subjectcheange(this)"
                                                                                                id="subject_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid subject">
                                                                                                <option disabled>Select
                                                                                                </option>
                                                                                                @foreach ($allsub as $sub)
                                                                                                    <option
                                                                                                        value="{{ $sub->id }}"
                                                                                                        @if ($sub->id == $random->subject) selected @endif>
                                                                                                        {{ $sub->subject_name }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">UNIT
                                                                                                CODE</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <input type="text"
                                                                                                class="form-control form-control-lg"
                                                                                                value="{{ $random->unit_code }}"
                                                                                                name="unit_code[]"
                                                                                                id="unit_code_{{ $yes }}" />
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">OPTION
                                                                                                CODE</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <input type="text"
                                                                                                class="form-control form-control-lg "
                                                                                                name="option_code[]"
                                                                                                id="option_code_{{ $yes }}"
                                                                                                value="{{ $random->option_code }}" />
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">FEES</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->

                                                                                            <input type="text"
                                                                                                class="fees form-control form-control-lg"
                                                                                                name="fees[]"
                                                                                                id="fees_{{ $yes }}"
                                                                                                value="{{ $random->fees }}" />

                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                                <div class="mb-10 fv-row row"
                                                                                    id="add_more">

                                                                                </div>
                                                                                <div class="mb-10 fv-row row">
                                                                                    <div class="col-md-12 text-end">
                                                                                        <button type="button"
                                                                                            onclick="addmore()"
                                                                                            class="btn-sm btn-danger"
                                                                                            style="color: #fff; border-radius:31px">Add
                                                                                            Subjects</button>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                    @if ($data->main_exam_type == 'A Level')

                                                        <div class="col-md-12 grid-margin stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title text-warning">Subject Details
                                                                    </h4>
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <div class="col-md-12 grid-margin stretch-card">
                                                                            @if ($data->exam_information != null)
                                                                                @php
                                                                                    $count = json_decode(
                                                                                        $data->exam_information,
                                                                                        true,
                                                                                    );
                                                                                    $maincount = sizeof($count);
                                                                                @endphp
                                                                                @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                    @php
                                                                                        $allsub = App\Models\Subject::where(
                                                                                            'exam_type',
                                                                                            'A Level',
                                                                                        )
                                                                                            ->where(
                                                                                                'exam_board',
                                                                                                $random->exam_board,
                                                                                            )
                                                                                            ->get();
                                                                                    @endphp
                                                                                    <div class="mb-10 fv-row row">
                                                                                        <div class="col-md-4"
                                                                                            style="margin-bottom:8px">
                                                                                            <label
                                                                                                class="form-label mb-3">EXAM
                                                                                                BOARD </label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="exam_board[]"
                                                                                                onchange="typecheangealevel(this)"
                                                                                                id="type_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid">
                                                                                                <option value="Edexcel"
                                                                                                    @if ($random->exam_board == 'Edexcel') selected @endif>
                                                                                                    Edexcel</option>
                                                                                                <option value="AQA"
                                                                                                    @if ($random->exam_board == 'AQA') selected @endif>
                                                                                                    AQA</option>
                                                                                                <option value="OCR"
                                                                                                    @if ($random->exam_board == 'OCR') selected @endif>
                                                                                                    OCR</option>
                                                                                                <option
                                                                                                    value="Cambridge CIE"
                                                                                                    @if ($random->exam_board == 'Cambridge CIE') selected @endif>
                                                                                                    Cambridge(CIE)</option>
                                                                                                <option value="WJEC"
                                                                                                    @if ($random->exam_board == 'WJEC') selected @endif>
                                                                                                    WJEC</option>
                                                                                            </select>

                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">EXAM
                                                                                                SERIES</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="exam_series[]"
                                                                                                id="exam_series_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid">
                                                                                                <option>Select</option>
                                                                                                @foreach ($exam_series as $myseries)
                                                                                                    <option
                                                                                                        value="{{ $myseries->id }}"
                                                                                                        @if ($random->exam_series == $myseries->id) selected @endif>
                                                                                                        {{ $myseries->exam_name }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">TYPE</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="type[]"
                                                                                                class="form-select form-select-lg form-select-solid type">
                                                                                                <option value="A Level">A
                                                                                                    Level</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">SUBJECT</label>
                                                                                            <select name="subject[]"
                                                                                                onchange="subjectcheange(this)"
                                                                                                id="subject_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid subject">
                                                                                                <option disabled>Select
                                                                                                </option>
                                                                                                @foreach ($allsub as $sub)
                                                                                                    <option
                                                                                                        value="{{ $sub->id }}"
                                                                                                        @if ($sub->id == $random->subject) selected @endif>
                                                                                                        {{ $sub->subject_name }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">UNIT
                                                                                                CODE</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <input type="text"
                                                                                                class="form-control form-control-lg"
                                                                                                value="{{ $random->unit_code }}"
                                                                                                name="unit_code[]"
                                                                                                id="unit_code_{{ $yes }}" />
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">OPTION
                                                                                                CODE</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <input type="text"
                                                                                                class="form-control form-control-lg "
                                                                                                name="option_code[]"
                                                                                                id="option_code_{{ $yes }}"
                                                                                                value="{{ $random->option_code }}" />
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">FEES</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <input type="text"
                                                                                                class="form-control form-control-lg "
                                                                                                id="fees_demo_{{ $yes }}"
                                                                                                value="{{ $random->fees }}"
                                                                                                disabled />
                                                                                            <input type="hidden"
                                                                                                class="fees"
                                                                                                name="fees[]"
                                                                                                id="fees_{{ $yes }}"
                                                                                                value="{{ $random->fees }}" />
                                                                                            <a style="cursor:pointer;color:red;padding:5px 4px"
                                                                                                onclick="deleterow(this)">Remove</a>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif


                                                                            <div class="mb-10 fv-row row"
                                                                                id="add_more">

                                                                            </div>
                                                                            <div class="mb-10 fv-row row">
                                                                                <div class="col-md-12 text-end">
                                                                                    <button type="button"
                                                                                        onclick="addmore()"
                                                                                        class="btn-sm btn-danger"
                                                                                        style="color: #fff; border-radius:31px">Add
                                                                                        Subjects</button>
                                                                                </div>
                                                                            </div>
                                                                            @if ($data->main_exam_type == 'GCSE' || $data->main_exam_type == 'A Level' || $data->main_exam_type == 'IGCSE')

                                                                            @endif

                                                                            @if ($data->main_exam_type == 'AAT')

                                                                            @endif

                                                                            @if ($data->main_exam_type == 'ACCA')

                                                                            @endif

                                                                            @if ($data->main_exam_type == 'Functional Skills')

                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if ($data->main_exam_type == 'AS Level')

                                                        <div class="col-md-12 grid-margin stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title text-warning">Subject Details
                                                                    </h4>
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <div class="col-md-12 grid-margin stretch-card">

                                                                            @php
                                                                                $count = json_decode(
                                                                                    $data->exam_information,
                                                                                    true,
                                                                                );
                                                                                $maincount = sizeof($count);
                                                                            @endphp
                                                                            @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                @php
                                                                                    $allsub = App\Models\Subject::where(
                                                                                        'exam_type',
                                                                                        'AS Level',
                                                                                    )
                                                                                        ->where(
                                                                                            'exam_board',
                                                                                            $random->exam_board,
                                                                                        )
                                                                                        ->get();
                                                                                @endphp
                                                                                <div class="mb-10 fv-row row">
                                                                                    <div class="col-md-12"
                                                                                        style="margin-bottom:8px">
                                                                                        <label
                                                                                            class="form-label mb-3">EXAM
                                                                                            BOARD </label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_board[]"
                                                                                            onchange="typecheangeaslevel(this)"
                                                                                            id="type_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            <option value="Edexcel"
                                                                                                @if ($random->exam_board == 'Edexcel') selected @endif>
                                                                                                Edexcel</option>
                                                                                            <option value="AQA"
                                                                                                @if ($random->exam_board == 'AQA') selected @endif>
                                                                                                AQA</option>
                                                                                            <option value="OCR"
                                                                                                @if ($random->exam_board == 'OCR') selected @endif>
                                                                                                OCR</option>
                                                                                            <option value="Cambridge CIE"
                                                                                                @if ($random->exam_board == 'Cambridge CIE') selected @endif>
                                                                                                Cambridge(CIE)</option>
                                                                                            <option value="WJEC"
                                                                                                @if ($random->exam_board == 'WJEC') selected @endif>
                                                                                                WJEC</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">EXAM
                                                                                            SERIES</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_series[]"
                                                                                            id="exam_series_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            <option>--Select--</option>
                                                                                            <option value="November 2023"
                                                                                                @if ($random->exam_series == 'November 2023') selected @endif>
                                                                                                November 2023</option>
                                                                                            <option value="January 2023"
                                                                                                @if ($random->exam_series == 'January 2023') selected @endif>
                                                                                                January 2023</option>
                                                                                            <option value="June 2023"
                                                                                                @if ($random->exam_series == 'June 2023') selected @endif>
                                                                                                June 2023</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">TYPE</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="type[]"
                                                                                            class="form-select form-select-lg form-select-solid type">
                                                                                            <option value="AS Level">AS
                                                                                                Level</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">SUBJECT</label>
                                                                                        <select name="subject[]"
                                                                                            onchange="subjectcheange(this)"
                                                                                            id="subject_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid subject">
                                                                                            <option disabled>Select</option>
                                                                                            @foreach ($allsub as $sub)
                                                                                                <option
                                                                                                    value="{{ $sub->id }}"
                                                                                                    @if ($sub->id == $random->subject) selected @endif>
                                                                                                    {{ $sub->subject_name }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">UNIT
                                                                                            CODE</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg"
                                                                                            value="{{ $random->unit_code }}"
                                                                                            name="unit_code[]"
                                                                                            id="unit_code_{{ $yes }}" />
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">OPTION
                                                                                            CODE</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg "
                                                                                            name="option_code[]"
                                                                                            id="option_code_{{ $yes }}"
                                                                                            value="{{ $random->option_code }}" />
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">FEES</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg "
                                                                                            id="fees_demo_{{ $yes }}"
                                                                                            value="{{ $random->fees }}"
                                                                                            disabled />
                                                                                        <input type="hidden"
                                                                                            class="fees"
                                                                                            name="fees[]"
                                                                                            id="fees_{{ $yes }}"
                                                                                            value="{{ $random->fees }}" />
                                                                                        <a style="cursor:pointer;color:red;padding:5px 4px"
                                                                                            onclick="deleterow(this)">Remove</a>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="mb-10 fv-row row"
                                                                                id="add_more">

                                                                            </div>
                                                                            <div class="mb-10 fv-row row">
                                                                                <div class="col-md-12 text-end">
                                                                                    <button type="button"
                                                                                        onclick="addmore()"
                                                                                        class="btn-sm btn-danger"
                                                                                        style="color: #fff; border-radius:31px">Add
                                                                                        Subjects</button>
                                                                                </div>
                                                                            </div>
                                                                            @if ($data->main_exam_type == 'GCSE' || $data->main_exam_type == 'A Level' || $data->main_exam_type == 'IGCSE')

                                                                            @endif

                                                                            @if ($data->main_exam_type == 'AAT')

                                                                            @endif

                                                                            @if ($data->main_exam_type == 'ACCA')

                                                                            @endif

                                                                            @if ($data->main_exam_type == 'Functional Skills')

                                                                            @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if ($data->main_exam_type == 'IGCSE')

                                                        <div class="col-md-12 grid-margin  stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title text-warning">Subject Details
                                                                    </h4>
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <div class="col-md-12 grid-margin stretch-card">

                                                                            @php
                                                                                $count = json_decode(
                                                                                    $data->exam_information,
                                                                                    true,
                                                                                );
                                                                                $maincount = sizeof($count);
                                                                            @endphp
                                                                            @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                @php
                                                                                    $allsub = App\Models\Subject::where(
                                                                                        'exam_type',
                                                                                        'IGCSE',
                                                                                    )
                                                                                        ->where(
                                                                                            'exam_board',
                                                                                            $random->exam_board,
                                                                                        )
                                                                                        ->get();
                                                                                @endphp
                                                                                <div class="mb-10 fv-row row">
                                                                                    <div class="col-md-4"
                                                                                        style="margin-bottom:8px">
                                                                                        <label
                                                                                            class="form-label mb-3">EXAM
                                                                                            BOARD </label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_board[]"
                                                                                            onchange="typecheangeigcse(this)"
                                                                                            id="type_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            <option value="Edexcel"
                                                                                                @if ($random->exam_board == 'Edexcel') selected @endif>
                                                                                                Edexcel</option>
                                                                                            <option value="AQA"
                                                                                                @if ($random->exam_board == 'AQA') selected @endif>
                                                                                                AQA</option>
                                                                                            <option value="OCR"
                                                                                                @if ($random->exam_board == 'OCR') selected @endif>
                                                                                                OCR</option>
                                                                                            <option value="Cambridge CIE"
                                                                                                @if ($random->exam_board == 'Cambridge CIE') selected @endif>
                                                                                                Cambridge(CIE)</option>
                                                                                            <option value="WJEC"
                                                                                                @if ($random->exam_board == 'WJEC') selected @endif>
                                                                                                WJEC</option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">EXAM
                                                                                            SERIES</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_series[]"
                                                                                            id="exam_series_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            @foreach ($exam_series as $myseries)
                                                                                                <option
                                                                                                    value="{{ $myseries->id }}"
                                                                                                    @if ($random->exam_series == $myseries->id) selected @endif>
                                                                                                    {{ $myseries->exam_name }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">TYPE</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="type[]"
                                                                                            class="form-select form-select-lg form-select-solid type">
                                                                                            <option value="IGCSE">IGCSE
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">SUBJECT</label>
                                                                                        <select name="subject[]"
                                                                                            onchange="subjectcheange(this)"
                                                                                            id="subject_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid subject">
                                                                                            <option disabled>Select</option>
                                                                                            @foreach ($allsub as $sub)
                                                                                                <option
                                                                                                    value="{{ $sub->id }}"
                                                                                                    @if ($sub->id == $random->subject) selected @endif>
                                                                                                    {{ $sub->subject_name }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">UNIT
                                                                                            CODE</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg"
                                                                                            value="{{ $random->unit_code }}"
                                                                                            name="unit_code[]"
                                                                                            id="unit_code_{{ $yes }}" />
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">OPTION
                                                                                            CODE</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg "
                                                                                            name="option_code[]"
                                                                                            id="option_code_{{ $yes }}"
                                                                                            value="{{ $random->option_code }}" />
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">FEES</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg "
                                                                                            id="fees_demo_{{ $yes }}"
                                                                                            value="{{ $random->fees }}"
                                                                                            disabled />
                                                                                        <input type="hidden"
                                                                                            class="fees"
                                                                                            name="fees[]"
                                                                                            id="fees_{{ $yes }}"
                                                                                            value="{{ $random->fees }}" />

                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="mb-10 fv-row row"
                                                                                id="add_more">

                                                                            </div>
                                                                            <div class="mb-10 fv-row row">
                                                                                <div class="col-md-12 text-end">
                                                                                    <button type="button"
                                                                                        onclick="addmore()"
                                                                                        class="btn-sm btn-danger"
                                                                                        style="color: #fff; border-radius:31px">Add
                                                                                        Subjects</button>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($data->main_exam_type == 'Functional Skills')
                                                        @php
                                                            $allsub = App\Models\Subject::where(
                                                                'exam_type',
                                                                'Functional Skills',
                                                            )->get();
                                                        @endphp
                                                        <div class="col-md-12 grid-margin  stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title text-warning">Subject Details
                                                                    </h4>
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <div class="col-md-12 grid-margin stretch-card">
                                                                            @if ($data->exam_information != null)
                                                                                @php
                                                                                    $count = json_decode(
                                                                                        $data->exam_information,
                                                                                        true,
                                                                                    );
                                                                                    $maincount = sizeof($count);
                                                                                @endphp
                                                                                @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                    <div class="mb-10 fv-row row">
                                                                                        <div class="col-md-4"
                                                                                            style="">
                                                                                            <label
                                                                                                class="form-label mb-3">EXAM
                                                                                                BOARD</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="exam_board[]"
                                                                                                class="form-select form-select-lg form-select-solid">
                                                                                                <option value="Edexcel"
                                                                                                    @if ($random->exam_board == 'Edexcel') selected @endif>
                                                                                                    Edexcel</option>
                                                                                                <option value="AQA"
                                                                                                    @if ($random->exam_board == 'AQA') selected @endif>
                                                                                                    AQA</option>
                                                                                                <option value="OCR"
                                                                                                    @if ($random->exam_board == 'OCR') selected @endif>
                                                                                                    OCR</option>
                                                                                                <option
                                                                                                    value="Cambridge(CIE)"
                                                                                                    @if ($random->exam_board == 'Cambridge(CIE)') selected @endif>
                                                                                                    Cambridge(CIE)</option>
                                                                                                <option value="WJEC"
                                                                                                    @if ($random->exam_board == 'WJEC') selected @endif>
                                                                                                    WJEC</option>
                                                                                            </select>

                                                                                        </div>
                                                                                        <div class="col-md-4"
                                                                                            style="">
                                                                                            <div class="mb-0 fv-row">
                                                                                                <!--begin::Label-->
                                                                                                <label
                                                                                                    class="form-label mb-3">Time
                                                                                                </label>
                                                                                                <!--end::Label-->
                                                                                                <!--begin::Options-->
                                                                                                <div class="mb-0 row">

                                                                                                    <select
                                                                                                        class="form-select form-select-lg form-select-solid"
                                                                                                        name="start_exam_time[]">
                                                                                                        <option
                                                                                                            value="11 am"
                                                                                                            @if ($random->start_exam_time == '11 am') selected @endif>
                                                                                                            11 am</option>
                                                                                                        <option
                                                                                                            value="2 pm"
                                                                                                            @if ($random->start_exam_time == '2 pm') selected @endif>
                                                                                                            2 pm</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <!--end::Options-->
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3"
                                                                                            style="margin: 0px 5px;">

                                                                                            <div class="mb-0 fv-row">
                                                                                                <!--begin::Label-->
                                                                                                <label
                                                                                                    class="form-label mb-3">
                                                                                                    Choose the dates*
                                                                                                </label>
                                                                                                <!--end::Label-->
                                                                                                <!--begin::Options-->
                                                                                                <div class="mb-0 row">

                                                                                                    <input type="date"
                                                                                                        name="exam_date[]"
                                                                                                        class="form-select form-select-lg form-select-solid"
                                                                                                        value="{{ $random->exam_date }}">

                                                                                                </div>
                                                                                                <!--end::Options-->
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-2 mt-2">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">Branch</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="exam_series[]"
                                                                                                id="exam_series_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid">
                                                                                                <option>--Select--</option>
                                                                                                <option
                                                                                                    value="Forest Gate"
                                                                                                    @if ($random->exam_series == 'Forest Gate') selected @endif>
                                                                                                    FOREST GATE</option>
                                                                                                <option value="ILFORD"
                                                                                                    @if ($random->exam_series == 'ILFORD') selected @endif>
                                                                                                    ILFORD</option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-2 mt-2">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">Exam
                                                                                                Level</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <select name="type[]"
                                                                                                id="type_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid type">
                                                                                                <option>--Select--</option>
                                                                                                <option
                                                                                                    value="Entry Level 1"
                                                                                                    @if ($random->type == 'Entry Level 1') selected @endif>
                                                                                                    Entry Level 1</option>
                                                                                                <option
                                                                                                    value="Entry Level 2"
                                                                                                    @if ($random->type == 'Entry Level 2') selected @endif>
                                                                                                    Entry Level 2</option>
                                                                                                <option
                                                                                                    value="Entry Level 3"
                                                                                                    @if ($random->type == 'Entry Level 3') selected @endif>
                                                                                                    Entry Level 3</option>
                                                                                                <option value="Level 1"
                                                                                                    @if ($random->type == 'Level 1') selected @endif>
                                                                                                    Level 1</option>
                                                                                                <option value="Level 2"
                                                                                                    @if ($random->type == 'Level 2') selected @endif>
                                                                                                    Level 2</option>
                                                                                                <option
                                                                                                    value="Level 2 Resources"
                                                                                                    @if ($random->type == 'Level 2 Resources') selected @endif>
                                                                                                    Level 2 Resources
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-2 mt-2">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">SUBJECT</label>
                                                                                            <select name="subject[]"
                                                                                                onchange="subjectcheange(this)"
                                                                                                id="subject_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid subject">
                                                                                                <option>--Select--</option>
                                                                                                @foreach ($allsub as $sub)
                                                                                                    <option
                                                                                                        value="{{ $sub->id }}"
                                                                                                        @if ($random->subject == $sub->id) selected @endif>
                                                                                                        {{ $sub->subject_name }}
                                                                                                    </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-md-3 mt-2">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">Exam
                                                                                                Type</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <!--  <input type="text" class="form-control form-control-lg form-control-solid" name="option_code[]" id="option_code_0" /> -->
                                                                                            <select name="option_code[]"
                                                                                                id="option_code_{{ $yes }}"
                                                                                                class="form-select form-select-lg form-select-solid type">
                                                                                                <option>--Select--</option>
                                                                                                <option value="On Paper"
                                                                                                    @if ($random->option_code == 'On Paper') selected @endif>
                                                                                                    On Paper</option>
                                                                                                <option value="On Screen"
                                                                                                    @if ($random->option_code == 'On Screen') selected @endif>
                                                                                                    On Screen</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-2 mt-2">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">FEES</label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Input-->
                                                                                            <input type="text"
                                                                                                class="fees form-control form-control-lg form-control-solid"
                                                                                                name="fees[]"
                                                                                                id="fees_{{ $yes }}"
                                                                                                value="{{ $random->fees }}" />
                                                                                            <input type="hidden"
                                                                                                id="totalmain_amount"
                                                                                                class="totalmain_amount"
                                                                                                value="0" />
                                                                                            <a style="color:red;padding:0px 4px"
                                                                                                onclick="deleterow(this)"
                                                                                                style="cursor:pointer;color:red">Delete</a>
                                                                                        </div>
                                                                                        <!--end::Input-->
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                            <div class="mb-10 fv-row row"
                                                                                id="add_more">

                                                                            </div>
                                                                            <div class="mb-10 fv-row row">
                                                                                <div class="col-md-12 text-end">
                                                                                    <button type="button"
                                                                                        onclick="addmore()"
                                                                                        class="btn-sm btn-danger"
                                                                                        style="color: #fff; border-radius:31px">Add
                                                                                        Subjects</button>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    @if ($data->main_exam_type == 'ACCA')
                                                        @php
                                                            $allsub = App\Models\Subject::where(
                                                                'exam_type',
                                                                'ACCA',
                                                            )->get();
                                                        @endphp
                                                        <div class="col-md-12 grid-margin  stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title text-warning">Subject Details
                                                                    </h4>
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <div class="col-md-12 grid-margin stretch-card">

                                                                            @php
                                                                                $count = json_decode(
                                                                                    $data->exam_information,
                                                                                    true,
                                                                                );
                                                                                $maincount = sizeof($count);
                                                                            @endphp
                                                                            @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                <div class="mb-10 fv-row row">
                                                                                    <div class="col-md-4"
                                                                                        style="">
                                                                                        <label
                                                                                            class="form-label mb-3">EXAM
                                                                                            BOARD</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_board[]"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            <option value="ACCA">ACCA
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-md-4"
                                                                                        style="">
                                                                                        <div class="mb-0 fv-row">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">Time
                                                                                            </label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Options-->
                                                                                            <div class="mb-0 row">

                                                                                                <select
                                                                                                    class="form-select form-select-lg form-select-solid"
                                                                                                    name="start_exam_time[]">
                                                                                                    <option value="11 am"
                                                                                                        @if ($random->start_exam_time == '11 am') selected @endif>
                                                                                                        11 am</option>
                                                                                                    <option value="2 pm"
                                                                                                        @if ($random->start_exam_time == '2 pm') selected @endif>
                                                                                                        2 pm</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <!--end::Options-->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3"
                                                                                        style="margin: 0px 5px;">

                                                                                        <div class="mb-0 fv-row">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">
                                                                                                Choose the dates*
                                                                                            </label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Options-->
                                                                                            <div class="mb-0 row">

                                                                                                <input type="date"
                                                                                                    name="exam_date[]"
                                                                                                    class="form-select form-select-lg form-select-solid"
                                                                                                    value="{{ $random->exam_date }}">

                                                                                            </div>
                                                                                            <!--end::Options-->
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">Exam
                                                                                            Level</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="type[]"
                                                                                            onchange="typecheange(this)"
                                                                                            id="type_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid type">
                                                                                            <option>--Select--</option>
                                                                                            <option
                                                                                                value="Applied Knowledge"@if ($random->type == 'Applied Knowledge') selected @endif>
                                                                                                Applied Knowledge</option>
                                                                                            <option
                                                                                                value="Applied Skills"@if ($random->type == 'Applied Skills') selected @endif>
                                                                                                Applied Skills</option>
                                                                                            <option
                                                                                                value="Foundation in Accountancy"@if ($random->type == 'Foundation in Accountancy') selected @endif>
                                                                                                Foundation In Accountancy
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">SUBJECT</label>
                                                                                        <select name="subject[]"
                                                                                            onchange="subjectcheange(this)"
                                                                                            id="subject_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid subject">

                                                                                            <option>--Select--</option>

                                                                                            @foreach ($allsub as $sub)
                                                                                                <option
                                                                                                    value="{{ $sub->id }}"
                                                                                                    @if ($random->subject == $sub->id) selected @endif>
                                                                                                    {{ $sub->subject_name }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">Exam
                                                                                            Type</label>

                                                                                        <select name="option_code[]"
                                                                                            id="option_code_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid type">
                                                                                            <option>--Select--</option>
                                                                                            <option value="On Screen"
                                                                                                @if ($random->option_code == 'On Screen') selected @endif>
                                                                                                On Screen</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">FEES</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg form-control-solid"
                                                                                            id="fees_demo_{{ $yes }}"
                                                                                            value="{{ $random->fees }}"
                                                                                            disabled />

                                                                                        <input type="hidden"
                                                                                            class="fees"
                                                                                            name="fees[]"
                                                                                            id="fees_{{ $yes }}"
                                                                                            value="{{ $random->fees }}" />
                                                                                        <a style="color:red;padding:0px 4px"
                                                                                            onclick="deleterow(this)"
                                                                                            style="cursor:pointer;color:red">Delete</a>
                                                                                    </div>
                                                                                    <!--end::Input-->
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="mb-10 fv-row row"
                                                                                id="add_more">

                                                                            </div>
                                                                            <div class="mb-10 fv-row row">
                                                                                <div class="col-md-12 text-end">
                                                                                    <button type="button"
                                                                                        onclick="addmore()"
                                                                                        class="btn-sm btn-danger"
                                                                                        style="color: #fff; border-radius:31px">Add
                                                                                        Subjects</button>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($data->main_exam_type == 'AAT')
                                                        @php
                                                            $allsub = App\Models\Subject::where(
                                                                'exam_type',
                                                                'AAT',
                                                            )->get();
                                                        @endphp
                                                        <div class="col-md-12 grid-margin  stretch-card">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title text-warning">Subject Details
                                                                    </h4>
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}">
                                                                        <div class="col-md-12 grid-margin stretch-card">

                                                                            @php
                                                                                $count = json_decode(
                                                                                    $data->exam_information,
                                                                                    true,
                                                                                );
                                                                                $maincount = sizeof($count);
                                                                            @endphp
                                                                            @foreach (json_decode($data->exam_information) as $yes => $random)
                                                                                <div class="mb-10 fv-row row">
                                                                                    <div class="col-md-3"
                                                                                        style="">
                                                                                        <label
                                                                                            class="form-label mb-3">EXAM
                                                                                            BOARD</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_board[]"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            <option value="AAT">AAT
                                                                                            </option>
                                                                                        </select>

                                                                                    </div>
                                                                                    <div class="col-md-2"
                                                                                        style="">
                                                                                        <div class="mb-0 fv-row">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">Time
                                                                                            </label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Options-->
                                                                                            <div class="mb-0 row">

                                                                                                <select
                                                                                                    class="form-select form-select-lg form-select-solid"
                                                                                                    name="start_exam_time[]">
                                                                                                    <option value="11 am"
                                                                                                        @if ($random->start_exam_time == '11 am') selected @endif>
                                                                                                        11 am</option>
                                                                                                    <option value="2 pm"
                                                                                                        @if ($random->start_exam_time == '2 pm') selected @endif>
                                                                                                        2 pm</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <!--end::Options-->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3"
                                                                                        style="margin: 0px 5px;">

                                                                                        <div class="mb-0 fv-row">
                                                                                            <!--begin::Label-->
                                                                                            <label
                                                                                                class="form-label mb-3">
                                                                                                Dates*
                                                                                            </label>
                                                                                            <!--end::Label-->
                                                                                            <!--begin::Options-->
                                                                                            <div class="mb-0 row">

                                                                                                <input type="date"
                                                                                                    name="exam_date[]"
                                                                                                    class="form-select form-select-lg form-select-solid"
                                                                                                    value="{{ $random->exam_date }}">

                                                                                            </div>
                                                                                            <!--end::Options-->
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-3">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">Branch</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="exam_series[]"
                                                                                            id="exam_series_0"
                                                                                            class="form-select form-select-lg form-select-solid">
                                                                                            <option>--Select--</option>
                                                                                            <option value="Forest Gate"
                                                                                                @if ($random->exam_series == 'Forest Gate') selected @endif>
                                                                                                FOREST GATE</option>
                                                                                            <option value="ILFORD"
                                                                                                @if ($random->exam_series == 'ILFORD') selected @endif>
                                                                                                ILFORD</option>

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-3 mt-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">Exam
                                                                                            Level</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <select name="type[]"
                                                                                            id="type_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid type">
                                                                                            <option>Select</option>
                                                                                            <option value="Level 1"
                                                                                                @if ($random->type == 'Level 1') selected @endif>
                                                                                                Level 1</option>
                                                                                            <option value="Level 2"
                                                                                                @if ($random->type == 'Level 2') selected @endif>
                                                                                                Level 2</option>
                                                                                            <option value="Level 3"
                                                                                                @if ($random->type == 'Level 3') selected @endif>
                                                                                                Level 3</option>
                                                                                            <option value="Level 4"
                                                                                                @if ($random->type == 'Level 4') selected @endif>
                                                                                                Level 4</option>

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-3 mt-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">SUBJECT</label>
                                                                                        <select name="subject[]"
                                                                                            onchange="subjectcheange(this)"
                                                                                            id="subject_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid subject">

                                                                                            <option>--Select--</option>

                                                                                            @foreach ($allsub as $sub)
                                                                                                <option
                                                                                                    value="{{ $sub->id }}"
                                                                                                    @if ($random->subject == $sub->id) selected @endif>
                                                                                                    {{ $sub->subject_name }}
                                                                                                </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-3 mt-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">Exam
                                                                                            Type</label>

                                                                                        <select name="option_code[]"
                                                                                            id="option_code_{{ $yes }}"
                                                                                            class="form-select form-select-lg form-select-solid type">
                                                                                            <option value="On Screen"
                                                                                                @if ($random->option_code == 'On Screen') selected @endif>
                                                                                                On Screen</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-2 mt-2">
                                                                                        <!--begin::Label-->
                                                                                        <label
                                                                                            class="form-label mb-3">FEES</label>
                                                                                        <!--end::Label-->
                                                                                        <!--begin::Input-->
                                                                                        <input type="text"
                                                                                            class="form-control form-control-lg form-control-solid fees"
                                                                                            name="fees[]"
                                                                                            id="fees_{{ $yes }}"
                                                                                            value="{{ $random->fees }}" />

                                                                                        <a style="color:red;padding:0px 4px"
                                                                                            onclick="deleterow(this)">Delete</a>
                                                                                    </div>
                                                                                    <!--end::Input-->
                                                                                </div>
                                                                            @endforeach
                                                                            <div class="mb-10 fv-row row"
                                                                                id="add_more">

                                                                            </div>
                                                                            <div class="mb-10 fv-row row">
                                                                                <div class="col-md-12 text-end">
                                                                                    <button type="button"
                                                                                        onclick="addmore()"
                                                                                        class="btn-sm btn-danger"
                                                                                        style="color: #fff; border-radius:31px">Add
                                                                                        Subjects</button>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif





                                                    <!--end::Post-->
                                                    <!--begin::Separator-->
                                                    <div class="separator mb-4"></div>
                                                    <div class="card-footer d-flex justify-content-end py-6">

                                                        <button type="submit" class="btn btn-success"
                                                            style="margin:0px 20px">Submit</button>
                                                        <button type="button" onclick="openeditsubject_cancel()"
                                                            class="btn btn-primary">Cancel</button>
                                                    </div>
                                                </form>

                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>

                                </div>



 <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title text-warning">Mock Subject & Paper Details</h4>
                                                    <div class="row">
                                                        <div class="col-md-12 grid-margin stretch-card">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Subject name</th>
                                                                        <th>Paper 1</th>
                                                                        <th>Paper 2</th>
                                                                        <th>Paper 3</th>
                                                                        <th>Paper 4</th>
                                                                        <th>Ucas Reference</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @if ($data->mock_test == 'mock_test_yes')
                                                                        @php
                                                                            $mymock = App\Models\MockTest::where(
                                                                                'booking_id',
                                                                                $data->booking_id,
                                                                            )->first();
                                                                        @endphp
                                                                        @if ($mymock && $mymock->exam_information == null)
                                                                            <p>Subject not included</p>
                                                                        @elseif($mymock)
                                                                            @foreach (json_decode($mymock->exam_information) as $mexam)
                                                                                @php
                                                                                    $subjectdetails = App\Models\Subject::where(
                                                                                        'id',
                                                                                        $mexam->mock_subject_id,
                                                                                    )
                                                                                        ->select(['unit_code'])
                                                                                        ->first();
                                                                                @endphp
                                                                                <tr>
                                                                                    <td>{{ $mexam->mock_subject_name }}
                                                                                        ({{ $subjectdetails->unit_code }})
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_1 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_1 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_2 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_2 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_3 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_3 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_4 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_4 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if($data->is_ucas_reference==1)
                                                                                        <span class="badge badge-success">Yes</span>
                                                                                          @endif
                                                                                        @if($data->is_ucas_reference==0)
                                                                                         <span class="badge badge-danger">No</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h5>Payment Methods</h5>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                data-toggle="modal" data-target="#discountModal">
                                                <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                            fill="#12131A" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                            fill="#12131A" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Add Coupon</a>

                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                data-toggle="modal" data-target="#UpdatediscountModal">
                                                <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                            fill="#12131A" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                            fill="#12131A" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Edit Discount</a>
                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                data-toggle="modal" data-target="#paymentModal">
                                                <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                            fill="#12131A" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                            fill="#12131A" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Add Payment</a>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                        <!--begin::Option-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Paid Status</th>
                                                        <th>Total Amount</th>
                                                        <th>Paid Amount</th>
                                                        <th>Due Amount</th>
                                                        <th>Discount Amount</th>
                                                        <th>Paid By</th>
                                                        <th>Transection ID</th>


                                                    </tr>
                                                </thead>
                                                @php
                                                    $allwallet = App\Models\Wallet::where(
                                                        'order_id',
                                                        $data->booking_id,
                                                    )->first();
                                                    $total_amount = 0;
                                                @endphp


                                                @if ($data->exam_information == null)
                                                @else
                                                    @foreach (json_decode($data->exam_information) as $yes => $price)
                                                        @php
                                                            $total_amount = $total_amount + $price->fees;
                                                        @endphp
                                                    @endforeach

                                                @endif


                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            @if ($data->is_paid == 0)
                                                                <span class="badge badge-warning">Unpaid</span>
                                                            @elseif($data->is_paid == 1)
                                                                <span class="badge badge-success">Paid</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            £
                                                            {{ $data->total_amount - $data->discount_amount + $data->admin_specialaccess_amount + $data->Installment_fee + $data->ucas_reference_fee }}

                                                        </td>
                                                        <td>
                                                            £{{ $data->paid_amount }}

                                                        </td>
                                                        <td>£ {{ $data->due_amount }}</td>
                                                        <td>£ {{ $data->discount_amount }}</td>

                                                        <td class="text-danger">
                                                            @if ($data->payment_option != null)
                                                                {{ $data->payment_option }}
                                                            @else
                                                                <span class="badge badge-danger"> Not Yet </span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($data->transection_id != null)
                                                                {{ Str::limit($data->transection_id, 10) }}
                                                            @else
                                                                <span class="badge badge-danger"> Not Yet </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                             <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Mock Fees Total</th>
                                                        <th>Ucas Status</th>
                                                        <th>Ucas Reference Fees</th>
                                                        <th>Paid Amount</th>
                                                        <th>Paid By</th>
                                                        <th>Transection ID</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                          
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <!--end::Option-->
                                        <div class="separator separator-dashed"></div>

                                        <!--end::Option-->
                                    </div>
                                    <!--end::Card body-->
                                </div>

                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <div class="col-md-12">
                                        <!--begin::Feeds Widget 1-->
                                        <div class="card mb-5 mb-xxl-8">
                                            <!--begin::Body-->
                                            <div class="card-body pb-0">
                                                <!--begin::Header-->
                                                <div class="d-flex align-items-center mb-5">

                                                </div>
                                                <div class="col-md-12 grid-margin stretch-card">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title text-warning"></h4>
                                                            <span id="success_message_paid_status_update"></span>
                                                            <div class="row">
                                                                <form>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Payment
                                                                                Status</label>
                                                                            <select id="paid_status"
                                                                                class="form-control form-select"
                                                                                style="padding: 6px !important;">
                                                                                <option value="0"
                                                                                    @if ($data->is_paid_verify == 0) selected @endif>
                                                                                    Pending</option>
                                                                                <option value="1"
                                                                                    @if ($data->is_paid_verify == 1) selected @endif>
                                                                                    Approve</option>
                                                                                <option value="2"
                                                                                    @if ($data->is_paid_verify == 2) selected @endif>
                                                                                    Reject</option>
                                                                                <option value="3"
                                                                                    @if ($data->is_paid_verify == 3) selected @endif>
                                                                                    Refund</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Notes</label>
                                                                            <textarea class="form-control" name="notes" id="notes" placeholder="Notes">{{ $data->notes }}</textarea>
                                                                            <input type="hidden" name="id"
                                                                                id="id"
                                                                                value="{{ $data->id }}">
                                                                            <span style="color:green;"
                                                                                id="paid_status_success"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 mt-5">
                                                                        <button onclick="paidstatusupdate()"
                                                                            type="button"
                                                                            class="btn btn-primary">update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Post-->
                                                <!--begin::Separator-->
                                                <div class="separator mb-4"></div>

                                            </div>
                                            <!--end::Body-->
                                        </div>
                                    </div>
                                </div>





                            </div>
                            <div class="tab-pane" role="tabpanel" id="ratings">



                                <div class="card" id="other_option_section">


                                    <div class="card-body">
                                        <h4 class="card-title text-warning">Others Information</h4>
                                        <div class="row">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div id="">
                                                    <table class="table table-hover" style="font-size: 16px !important">

                                                        <tbody>
                                                            @if ($data->main_exam_type == 'AAT' || $data->main_exam_type == 'ACCA' || $data->main_exam_type == 'Functional Skills')
                                                            @else
                                                                <tr>
                                                                    <td>Has the candidate sat exams with us before? </td>
                                                                    <td><span
                                                                            class="badge badge-danger">{{ $data->has_a_candidate }}</span>
                                                                    </td>
                                                                </tr>
                                                                @if ($data->has_a_candidate == 'yes')
                                                                    <tr>
                                                                        <td>Candidate Number: </td>
                                                                        <td>{{ $data->has_a_candidate_number }} </td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td>Do you have a UCI Number ( 13 digits )? </td>
                                                                    <td><span
                                                                            class="badge badge-danger">{{ $data->uci }}</span>
                                                                    </td>
                                                                </tr>
                                                                @if ($data->uci == 'yes')
                                                                    <tr>
                                                                        <td>UCI NUMBER:</td>
                                                                        <td>{{ $data->uci_number }}</td>
                                                                    </tr>
                                                                @endif
                                                                <tr>
                                                                    <td>Do you have a ULN number (10 Digits)?</td>
                                                                    <td><span
                                                                            class="badge badge-danger">{{ $data->uln }}</span>
                                                                    </td>
                                                                </tr>
                                                                @if ($data->uln == 'yes')
                                                                    <tr>
                                                                        <td>ULN NUMBER:</td>
                                                                        <td>{{ $data->uln_number }}</td>
                                                                    </tr>
                                                                @endif

                                                            @endif

                                                            <tr>
                                                                <td> Type of Learner:</td>
                                                                <td><span>{{ $data->type_of_learner }}</span></td>
                                                            </tr>
                                                            @if ($data->main_exam_type == 'AAT' || $data->main_exam_type == 'ACCA' || $data->main_exam_type == 'Functional Skills')
                                                            @else
                                                                <tr>
                                                                    <td>Are you retaking these exams?</td>
                                                                    <td><span
                                                                            class="badge badge-danger">{{ $data->retaking_exams }}</span>
                                                                    </td>
                                                                </tr>
                                                                @if ($data->retaking_exams == 'yes')
                                                                    <tr>
                                                                        <td>Please specify which exams you are retaking.
                                                                        </td>
                                                                        <td>{{ $data->retaking_exams_name }}</td>
                                                                    </tr>
                                                                @endif

                                                                <tr>
                                                                    <td>Are you caring forward your practical endorsement
                                                                        /course work/ spoken/ or any other assessment?</td>
                                                                    <td><span
                                                                            class="badge badge-danger">{{ $data->caring_forwad }}</span>
                                                                    </td>
                                                                </tr>
                                                                @if ($data->caring_forwad == 'yes')
                                                                    <tr>
                                                                        <td>Caring forwad Details:</td>
                                                                        <td>{{ $data->caring_forwad_details }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Caring forwad Proof:</td>
                                                                        <td>
                                                                            <a target="__blank"
                                                                                href="{{ asset('updatecore/public/' . $data->proof_of_carring) }}"
                                                                                class="btn btn-primary">Check File</a><br>

                                                                            <img src="{{ asset('updatecore/public/' . $data->proof_of_carring) }}"
                                                                                style="height: 250px !important;
    width: 100% !important;">





                                                                            <a class="badge badge-danger mt-2"
                                                                                href="{{ asset('updatecore/public/' . $data->proof_of_carring) }}"
                                                                                target="_blank" download>Download
                                                                                Image</a>
                                                                        </td>
                                                                    </tr>
                                                                    @if ($data->carring_forward_image != null)
                                                                        @foreach (json_decode($data->carring_forward_image) as $kesy => $cphotos)
                                                                            <tr>
                                                                                <td>Caring Forwad Documents
                                                                                    {{ ++$kesy }}:</td>

                                                                                <td>


                                                                                    <img src="{{ asset('uploads/student/exambooking/' . $cphotos) }}"
                                                                                        style="height: 250px !important;
    width: 100% !important;">
                                                                                    <a class="badge badge-danger"
                                                                                        href="{{ asset('uploads/student/exambooking/' . $cphotos) }}"
                                                                                        target="_blank" download>Download
                                                                                        Image</a>


                                                                                </td>


                                                                            </tr>
                                                                        @endforeach
                                                                    @endif

                                                                @endif
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-end py-6">

                                        <a href="#" class="btn-sm btn-primary" data-toggle="modal"
                                            data-target="#UCINUMBERSECTION" style="color:#fff">Update</a>
                                    </div>


                                </div>



                            </div>
                            <div class="tab-pane" role="tabpanel" id="special_access">
                                <div class="card-body">
                                    <h4 class="card-title text-warning">Special Access</h4>
                                    <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div id="">

                                                @if ($data->main_exam_type == 'AAT' || $data->main_exam_type == 'ACCA' || $data->main_exam_type == 'Functional Skills')
                                                     <table class="table table-hover" style="font-size: 16px !important">
                                                        <tbody>


                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Do you require
                                                                    special access requirements during your exam?* </td>

                                                            </tr>

                                                            <tr>

                                                                <td>


                                                                    {{ $data->special_access_requirements ?? 'Not Yet' }}


                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Please select all
                                                                    that apply to the candidates current way of working.
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{ $data->update_special_acces ?? 'NULL' }}</td>
                                                            </tr>






                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Please Provide any
                                                                    further details about the candidates current way of
                                                                    working*</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $data->special_acces_evidence ?? 'NOT YET' }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Documents* <a
                                                                        target="_blank"
                                                                        href="{{ url('updatecore/public/' . $data->special_evidents_documents) }}">Click
                                                                        Here</a></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                            </tr>











                                                        </tbody>
                                                    </table>
                                                @else
                                                    <table class="table table-hover" style="font-size: 16px !important">
                                                        <tbody>


                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Do you require
                                                                    special access requirements during your exam?* </td>

                                                            </tr>

                                                            <tr>

                                                                <td>


                                                                    {{ $data->special_access_requirements ?? 'Not Yet' }}


                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Please select all
                                                                    that apply to the candidates current way of working.
                                                                </td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{ $data->update_special_acces ?? 'NULL' }}</td>
                                                            </tr>






                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Please Provide any
                                                                    further details about the candidates current way of
                                                                    working*</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ $data->special_acces_evidence ?? 'NOT YET' }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td style="font-weight:700;color:#000">Documents* <a
                                                                        target="_blank"
                                                                        href="{{ url('updatecore/public/' . $data->special_evidents_documents) }}">Click
                                                                        Here</a></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                            </tr>











                                                        </tbody>
                                                    </table>


                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form action="{{ url('add/special/access/invoice') }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-4" style="margin: 25px 0px;">
                                                                        <!--<a class="btn-sm btn-success" style="color:#fff;cursor:pointer">Create Special Access</a>-->
                                                                    </div>

                                                                </div>
                                                                <div class="row col-md-12 mt-5">
                                                                    <div id="kt_modal_update_customer_user_info mt-5"
                                                                        class="collapse show">


                                                                        <input type="hidden" name="id"
                                                                            value="{{ $data->id }}" />
                                                                        @if ($data->is_admin_special_acc == 1)
                                                                            @if ($data->admin_special_details != null)
                                                                                @foreach (json_decode($data->admin_special_details) as $accad)
                                                                                    <div class="row mb-4">
                                                                                        <div class="col-md-12">
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="fs-6 fw-bold mb-2">Special
                                                                                                    Access Name</label>
                                                                                                <input type="text"
                                                                                                    class="form-control form-control-solid"
                                                                                                    placeholder=""
                                                                                                    value="{{ $accad->access_name }}"
                                                                                                    name="access_name[]"
                                                                                                    required />
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="fs-6 fw-bold mb-2">Fees</label>
                                                                                                <input type="number"
                                                                                                    class="form-control form-control-solid"
                                                                                                    value="{{ $accad->fees }}"
                                                                                                    name="fees[]"
                                                                                                    required />
                                                                                                <a onclick="deletecol(this)"
                                                                                                    styele="color:red !important;margin-top:5px;cursor:pointer">Delete</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                        @else
                                                                            <div class="row mb-4">
                                                                                <div class="col-md-12">
                                                                                    <div class="col-md-6">
                                                                                        <label
                                                                                            class="fs-6 fw-bold mb-2">Special
                                                                                            Access Name</label>
                                                                                        <input type="text"
                                                                                            class="form-control form-control-solid"
                                                                                            placeholder=""
                                                                                            name="access_name[]"
                                                                                            required />
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label
                                                                                            class="fs-6 fw-bold mb-2">Fees</label>
                                                                                        <input type="number"
                                                                                            class="form-control form-control-solid"
                                                                                            name="fees[]" required />
                                                                                    </div>
                                                                                    <a onclick="deletecol()"
                                                                                        styele="color:red !important;margin-top:5px;cursor:pointer">Delete</a>
                                                                                </div>
                                                                            </div>

                                                                        @endif


                                                                        <div class="row mb-4" id="add_more_as">

                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <div class="col-md-12 text-end">
                                                                                <div class="col-md-8"></div>
                                                                                <div class="col-md-4">
                                                                                    <a onclick="addmorespecialaccess()"
                                                                                        class="btn-sm btn-danger">Add
                                                                                        More</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>




                                                                        <div class="row mb-4">
                                                                            <div class="col-md-6">
                                                                                <button type="submit"
                                                                                    class="btn btn-success">Submit</button>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </form>
                                                        </div>


                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <table id="kt_customer_view_statement_table_3"
                                                                    class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">

                                                                    <thead class="border-bottom border-gray-200">
                                                                        <!--begin::Table row-->
                                                                        <tr
                                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                                            <th>Special Access Name</th>
                                                                            <th>Fees</th>
                                                                            <th class="text-end">More</th>
                                                                        </tr>
                                                                        <!--end::Table row-->
                                                                    </thead>
                                                                    <!--end::Table head-->
                                                                    <!--begin::Table body-->
                                                                    <tbody>
                                                                        @if ($data->is_admin_special_acc == 1)
                                                                            @foreach (json_decode($data->admin_special_details) as $myaccessdetails)
                                                                                <tr>
                                                                                    <td>{{ $myaccessdetails->access_name }}
                                                                                    </td>
                                                                                    <td>{{ $myaccessdetails->fees }}</td>
                                                                                    <td class="text-end">
                                                                                        <button
                                                                                            class="btn btn-sm btn-light-success btn-active-light-success"></button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif


                                                                    </tbody>
                                                                    <!--end::Table body-->
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="tab-pane" role="tabpanel" id="mock_exam">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title text-warning">Subject & Paper Details</h4>
                                                    <div class="row">
                                                        <div class="col-md-12 grid-margin stretch-card">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Subject name</th>

                                                                        <th>Paper 1</th>
                                                                        <th>Paper 2</th>
                                                                        <th>Paper 3</th>
                                                                        <th>Paper 4</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @if ($data->mock_test == 'mock_test_yes')
                                                                        @php
                                                                            $mymock = App\Models\MockTest::where(
                                                                                'booking_id',
                                                                                $data->booking_id,
                                                                            )->first();
                                                                        @endphp
                                                                        @if ($mymock && $mymock->exam_information == null)
                                                                            <p>Subject not included</p>
                                                                        @elseif($mymock)
                                                                            @foreach (json_decode($mymock->exam_information) as $mexam)
                                                                                @php
                                                                                    $subjectdetails = App\Models\Subject::where(
                                                                                        'id',
                                                                                        $mexam->mock_subject_id,
                                                                                    )
                                                                                        ->select(['unit_code'])
                                                                                        ->first();
                                                                                @endphp
                                                                                <tr>
                                                                                    <td>{{ $mexam->mock_subject_name }}
                                                                                        ({{ $subjectdetails->unit_code }})
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_1 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_1 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_2 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_2 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_3 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_3 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($mexam->mock_test_paper_4 == '')
                                                                                            <span
                                                                                                class="badge badge-primary">Not
                                                                                                yet</span>
                                                                                        @else
                                                                                            {{ $mexam->mock_test_paper_4 ?? 'Not yet' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                    {{-- 
								                                  @if ($data->mock_test == 'mock_test_yes')
								                                  @php
								                                    $mymock=App\Models\MockTest::where('booking_id',$data->booking_id)->first();
								                                  @endphp
								                                  @if ($mymock->exam_information == null)
								                                  
    								                                    <p>Subject not included</p>
								                                  @else
    								                                  @foreach (json_decode($mymock->exam_information) as $mexam)
    								                                    @php
    								                                        $subjectdetails=App\Models\Subject::where('id',$mexam->mock_subject_id)->select(['unit_code'])->first();
    								                                    @endphp
    								                                  <tr>
    								                                      <td>{{ $mexam->mock_subject_name }} ({{ $subjectdetails->unit_code }})</td>
    								                                      <td>@if ($mexam->mock_test_paper_1 == '') <span class="badge badge-prinmary">Not yet</span> @else {{ $mexam->mock_test_paper_1 ?? 'Not yet' }} @endif</td>
    								                                      <td>@if ($mexam->mock_test_paper_2 == '') <span class="badge badge-prinmary">Not yet</span> @else {{ $mexam->mock_test_paper_2 ?? 'Not yet' }} @endif</td>
    								                                      <td>@if ($mexam->mock_test_paper_3 == '') <span class="badge badge-prinmary">Not yet</span> @else {{ $mexam->mock_test_paper_3 ?? 'Not yet' }} @endif</td>
    								                                      <td>@if ($mexam->mock_test_paper_4 == '') <span class="badge badge-prinmary">Not yet</span> @else {{ $mexam->mock_test_paper_4 ?? 'Not yet' }} @endif</td>
    								                                      <td></td>
    								                                     
    								                                  </tr>
    								                                  @endforeach
    								                                  
    								                              
    								                                 @endif
								                                  @endif
								                                  --}}

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="photo_id">
                                <div class="card-body pb-0">
                                    <!--begin::Header-->
                                    <div class="d-flex align-items-center mb-5">
                                    </div>
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title text-warning">Candidate Identification</h4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!--begin::Feeds Widget 1-->
                                                        <div class="card mb-5 mb-xxl-8">
                                                            <!--begin::Body-->
                                                            <div class="card-body pb-0">
                                                                <!--begin::Header-->
                                                                <div class="d-flex align-items-center mb-5">
                                                                    <!--begin::User-->
                                                                    <div class="d-flex align-items-center flex-grow-1">
                                                                        <!--begin::Avatar-->

                                                                        <!--end::Avatar-->
                                                                        <!--begin::Info-->
                                                                        <div class="d-flex flex-column">
                                                                            <a href="#"
                                                                                class="text-gray-800 text-hover-primary fs-6 fw-bolder">Photo
                                                                                ID</a>
                                                                        </div>
                                                                        <!--end::Info-->
                                                                    </div>
                                                                    <!--end::User-->
                                                                    <!--begin::Menu-->
                                                                    <div class="my-0">
                                                                    </div>
                                                                    <!--end::Menu-->
                                                                </div>
                                                                <!--end::Header-->
                                                                <!--begin::Post-->
                                                                <div class="mb-7">
                                                                    <!--begin::Text-->
                                                                    <div class="text-gray-800 mb-5">
                                                                        @php

                                                                            $myimage = pathinfo(
                                                                                $data->photo_id,
                                                                                PATHINFO_EXTENSION,
                                                                            );
                                                                            $myrecent = pathinfo(
                                                                                $data->recent_photo,
                                                                                PATHINFO_EXTENSION,
                                                                            );

                                                                        @endphp
                                                                        @if ($myimage == 'pdf')
                                                                            <p>PDF file upload.Please click here.</p>
                                                                            <a target="__blank"
                                                                                href="{{ url('updatecore/public/' . $data->photo_id) }}"
                                                                                class="btn btn-warning">View</a>
                                                                        @else
                                                                            <img class="mainimg"
                                                                                src="{{ asset('updatecore/public/' . $data->photo_id) }}"
                                                                                style="height: 250px !important;
    width: 100% !important;">

                                                                        @endif


                                                                    </div>
                                                                    <!--end::Toolbar-->
                                                                </div>
                                                                <!--end::Post-->
                                                                <!--begin::Separator-->
                                                                @if ($myimage != 'pdf')
                                                                    <a class="badge badge-danger"
                                                                        href="{{ asset('updatecore/public/' . $data->photo_id) }}"
                                                                        target="_blank" download>Download Image</a>
                                                                @endif
                                                                <br>
                                                                <br>


                                                                <a href="#"
                                                                    class="btn btn-sm btn-flex btn-light-primary"
                                                                    data-toggle="modal" data-target="#PhotoIDModal">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.25" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                                                fill="#12131A" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                                                fill="#12131A" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->Uploads</a>



                                                                <div class="separator mb-4"></div>


                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!--begin::Feeds Widget 1-->
                                                        <div class="card mb-5 mb-xxl-8">
                                                            <!--begin::Body-->
                                                            <div class="card-body pb-0">
                                                                <!--begin::Header-->
                                                                <div class="d-flex align-items-center mb-5">
                                                                    <!--begin::User-->
                                                                    <div class="d-flex align-items-center flex-grow-1">
                                                                        <!--begin::Avatar-->

                                                                        <!--end::Avatar-->
                                                                        <!--begin::Info-->
                                                                        <div class="d-flex flex-column">
                                                                            <a href="#"
                                                                                class="text-gray-800 text-hover-primary fs-6 fw-bolder">Recent
                                                                                Photo</a>
                                                                        </div>
                                                                        <!--end::Info-->
                                                                    </div>
                                                                    <!--end::User-->
                                                                    <!--begin::Menu-->
                                                                    <div class="my-0">
                                                                    </div>
                                                                    <!--end::Menu-->
                                                                </div>
                                                                <!--end::Header-->
                                                                <!--begin::Post-->
                                                                <div class="mb-7">
                                                                    <!--begin::Text-->
                                                                    <div class="text-gray-800 mb-5">
                                                                        @if ($myrecent == 'pdf')

                                                                            <p>PDF file upload.Please click here.</p>
                                                                            <a target="__blank"
                                                                                href="{{ url('updatecore/public/' . $data->recent_photo) }}"
                                                                                class="btn btn-warning">View</a>
                                                                        @else
                                                                            <img class="mainimg"
                                                                                src="{{ asset('updatecore/public/' . $data->recent_photo) }}"
                                                                                style="height: 250px !important;
    width: 100% !important;">
                                                                        @endif
                                                                    </div>
                                                                    <!--end::Toolbar-->
                                                                </div>
                                                                <!--end::Post-->
                                                                <!--begin::Separator-->
                                                                @if ($myrecent != 'pdf')
                                                                    <a class="badge badge-danger"
                                                                        href="{{ asset('updatecore/public/' . $data->recent_photo) }}"
                                                                        target="_blank" download>Download Image</a>
                                                                @endif


                                                                <br>
                                                                <br>


                                                                <a href="#"
                                                                    class="btn btn-sm btn-flex btn-light-primary"
                                                                    data-toggle="modal" data-target="#recentPhotoModal">
                                                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path opacity="0.25" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                                                fill="#12131A" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                                                fill="#12131A" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->Uploads</a>
                                                                <div class="separator mb-4"></div>

                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!--begin::Feeds Widget 1-->
                                                        <div class="card mb-5 mb-xxl-8">
                                                            <!--begin::Body-->
                                                            <div class="card-body pb-0">
                                                                <!--begin::Header-->
                                                                <div class="d-flex align-items-center mb-5">
                                                                    <!--begin::User-->
                                                                    <div class="d-flex align-items-center flex-grow-1">
                                                                        <!--begin::Avatar-->

                                                                        <!--end::Avatar-->
                                                                        <!--begin::Info-->
                                                                        <div class="d-flex flex-column">
                                                                            <a href="#"
                                                                                class="text-gray-800 text-hover-primary fs-6 fw-bolder">Signature</a>
                                                                        </div>
                                                                        <!--end::Info-->
                                                                    </div>
                                                                    <!--end::User-->
                                                                    <!--begin::Menu-->
                                                                    <div class="my-0">
                                                                    </div>
                                                                    <!--end::Menu-->
                                                                </div>
                                                                <!--end::Header-->
                                                                <!--begin::Post-->
                                                                <div class="mb-7">
                                                                    <!--begin::Text-->
                                                                    <div class="text-gray-800 mb-5">
                                                                        <img class="mainimg"
                                                                            src="{{ asset('updatecore/public/' .$data->signed) }}"
                                                                            style="height: 250px !important;
    width: 100% !important;">
                                                                    </div>
                                                                    <!--end::Toolbar-->
                                                                </div>
                                                                <!--end::Post-->
                                                                <!--begin::Separator-->
                                                                <div class="separator mb-4"></div>

                                                            </div>
                                                            <!--end::Body-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane" role="tabpanel" id="payment_history">



                                <div class="card-body pb-0">
                                    <!--begin::Header-->
                                    <div class="d-flex align-items-center mb-5">
                                    </div>
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title text-warning">Transection History</h4>
                                                <div class="row">
                                                    <div class="col-md-12 grid-margin stretch-card">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Booking ID</th>
                                                                    <th>Paid Amount</th>
                                                                    <th>Date & Time</th>
                                                                    <th>Transection ID</th>
                                                                    <th>Paid By</th>
                                                                    <th>Payment Proof</th>
                                                                </tr>
                                                            </thead>
                                                            @php
                                                                $allwallets = App\Models\Wallet::where(
                                                                    'order_id',
                                                                    $data->booking_id,
                                                                )
                                                                    ->where('is_deleted', 0)
                                                                    ->get();
                                                            @endphp
                                                            <tbody>
                                                                @foreach ($allwallets as $mainwallets)
                                                                    <tr>
                                                                        <td>{{ $mainwallets->order_id }}</td>
                                                                        <td>£{{ $mainwallets->amount }}</td>
                                                                        <td>{{ $mainwallets->date }}</td>
                                                                        <td>{{ Str::limit($mainwallets->transection_id, 15) }}
                                                                        </td>
                                                                        <td>{{ $mainwallets->paid_by }}</td>
                                                                        <td><a target="__blank" href="{{ asset('/'.$data->transection_image) }}">Click here</a></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Post-->
                                    <!--begin::Separator-->
                                    <div class="separator mb-4"></div>

                                </div>


                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                    </script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
                    </script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
                    </script>


                    <!--end::Content-->
                </div>
                <!--end::Layout-->
                <!--begin::Modals-->
                <!--begin::Modal - Add Payment-->
                <div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Add a Payment Record</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_add_payment_close"
                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                fill="#000000">
                                                <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                    rx="1" />
                                                <rect fill="#000000" opacity="0.5"
                                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                    x="0" y="7" width="16" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_payment_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">
                                            <span class="required">Invoice Number</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="The invoice number must be unique."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="invoice"
                                            value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Status</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-select-solid fw-bolder" name="status"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-hide-search="true">
                                            <option></option>
                                            <option value="0">Approved</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Rejected</option>
                                            <option value="3">In progress</option>
                                            <option value="4">Completed</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Invoice Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" name="amount"
                                            value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-15">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">
                                            <span class="required">Additional Information</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Information such as description of invoice or product purchased."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_add_payment_cancel"
                                            class="btn btn-white me-3">Discard</button>
                                        <button type="submit" id="kt_modal_add_payment_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - Adjust Balance-->
                <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bolder">Adjust Balance</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_adjust_balance_close"
                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                fill="#000000">
                                                <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                    rx="1" />
                                                <rect fill="#000000" opacity="0.5"
                                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                    x="0" y="7" width="16" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Balance preview-->
                                <div class="d-flex text-center mb-9">
                                    <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                        <div class="fs-6 fw-bold mb-2 text-gray-400">Current Balance</div>
                                        <div class="fs-2 fw-bolder" kt-modal-adjust-balance="current_balance">US$
                                            32,487.57</div>
                                    </div>
                                    <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                        <div class="fs-6 fw-bold mb-2 text-gray-400">New Balance
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter an amount to preview the new balance."></i>
                                        </div>
                                        <div class="fs-2 fw-bolder" kt-modal-adjust-balance="new_balance">--</div>
                                    </div>
                                </div>
                                <!--end::Balance preview-->
                                <!--begin::Form-->
                                <form id="kt_modal_adjust_balance_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Adjustment type</label>
                                        <!--end::Label-->
                                        <!--begin::Dropdown-->
                                        <select class="form-select form-select-solid fw-bolder" name="adjustment"
                                            aria-label="Select an option" data-control="select2"
                                            data-dropdown-parent="#kt_modal_adjust_balance"
                                            data-placeholder="Select an option" data-hide-search="true">
                                            <option></option>
                                            <option value="1">Credit</option>
                                            <option value="2">Debit</option>
                                        </select>
                                        <!--end::Dropdown-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input id="kt_modal_inputmask" type="text"
                                            class="form-control form-control-solid" name="amount" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mb-2">Add adjustment note</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Disclaimer-->
                                    <div class="fs-7 text-gray-400 mb-15">Please be aware that all manual balance changes
                                        will be audited by the financial team every fortnight. Please maintain your invoices
                                        and receipts until then. Thank you.</div>
                                    <!--end::Disclaimer-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_adjust_balance_cancel"
                                            class="btn btn-white me-3">Discard</button>
                                        <button type="submit" id="kt_modal_adjust_balance_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - New Address-->
                <div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" action="#" id="kt_modal_update_customer_form">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_update_customer_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bolder">Update Customer</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_modal_update_customer_close"
                                        class="btn btn-icon btn-sm btn-active-icon-primary">
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                        <span class="svg-icon svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                    fill="#000000">
                                                    <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                        rx="1" />
                                                    <rect fill="#000000" opacity="0.5"
                                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                        x="0" y="7" width="16" height="2" rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                        id="kt_modal_update_customer_scroll" data-kt-scroll="true"
                                        data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                                        data-kt-scroll-wrappers="#kt_modal_update_customer_scroll"
                                        data-kt-scroll-offset="300px">
                                        <!--begin::Notice-->
                                        <!--begin::Notice-->
                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <circle fill="#000000" opacity="0.3" cx="12"
                                                        cy="12" r="10" />
                                                    <rect fill="#000000" x="11" y="7" width="2" height="8"
                                                        rx="1" />
                                                    <rect fill="#000000" x="11" y="16" width="2" height="2"
                                                        rx="1" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-bold">
                                                    <div class="fs-6 text-gray-600">Updating customer details will receive
                                                        a privacy audit. For more info, please read our
                                                        <a href="#">Privacy Policy</a>
                                                    </div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--end::Notice-->
                                        <!--begin::User toggle-->
                                        <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                                            href="#kt_modal_update_customer_user_info" role="button"
                                            aria-expanded="false" aria-controls="kt_modal_update_customer_user_info">
                                            User Information
                                            <span class="ms-2 rotate-180">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::User toggle-->
                                        <!--begin::User form-->
                                        <div id="kt_modal_update_customer_user_info" class="collapse show">
                                            <!--begin::Input group-->
                                            <div class="mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Update Avatar</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Allowed file types: png, jpg, jpeg."></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url({{ asset('backend') }}/assets/media/avatars/blank.png)">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url({{ asset('backend') }}/assets/media/avatars/150-2.jpg)">
                                                        </div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="avatar"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Edit-->
                                                        <!--begin::Cancel-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                                <!--end::Image input wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="" name="name" value="Sean Bean" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Email</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                        data-bs-toggle="tooltip"
                                                        title="Email address must be active"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    placeholder="" name="email" value="sean@dellito.com" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-15">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="" name="description" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::User form-->
                                        <!--begin::Billing toggle-->
                                        <div class="fw-bolder fs-3 rotate collapsible collapsed mb-7"
                                            data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info"
                                            role="button" aria-expanded="false"
                                            aria-controls="kt_modal_update_customer_billing_info">Shipping Information
                                            <span class="ms-2 rotate-180">
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Billing toggle-->
                                        <!--begin::Billing form-->
                                        <div id="kt_modal_update_customer_billing_info" class="collapse">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Address Line 1</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="address1" value="101, Collins Street" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Address Line 2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="address2" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">Town</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="city" value="Melbourne" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">State / Province</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="state" value="Victoria" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold mb-2">Post Code</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="postcode" value="3000" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-bold mb-2">
                                                    <span>Country</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                        data-bs-toggle="tooltip" title="Country of origination"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="country" aria-label="Select a Country"
                                                    data-control="select2" data-placeholder="Select a Country..."
                                                    data-dropdown-parent="#kt_modal_update_customer"
                                                    class="form-select form-select-solid fw-bolder">
                                                    <option value="">Select a Country...</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Aland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia, the former Yugoslav Republic of
                                                    </option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha
                                                    </option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South Sandwich Islands
                                                    </option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-bold">Use as a billing adderess?</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div class="fs-7 fw-bold text-gray-400">If you need more info,
                                                            please check budget planning</div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <label
                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input" name="billing" type="checkbox"
                                                            value="1" id="kt_modal_update_customer_billing"
                                                            checked="checked" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="form-check-label fw-bold text-gray-400"
                                                            for="kt_modal_update_customer_billing">Yes</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--begin::Wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Billing form-->
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="reset" id="kt_modal_update_customer_cancel"
                                        class="btn btn-white me-3">Discard</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_modal_update_customer_submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - New Address-->
                <!--begin::Modal - New Card-->
                <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2>Add New Card</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                fill="#000000">
                                                <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                    rx="1" />
                                                <rect fill="#000000" opacity="0.5"
                                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                    x="0" y="7" width="16" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_new_card_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Name On Card</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="Specify a card holder's name"></i>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid" placeholder=""
                                            name="card_name" value="Max Doe" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter card number" name="card_number"
                                                value="4111 1111 1111 1111" />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                <img src="{{ asset('backend') }}/assets/media/svg/card-logos/visa.svg"
                                                    alt="" class="h-25px" />
                                                <img src="{{ asset('backend') }}/assets/media/svg/card-logos/mastercard.svg"
                                                    alt="" class="h-25px" />
                                                <img src="{{ asset('backend') }}/assets/media/svg/card-logos/american-express.svg"
                                                    alt="" class="h-25px" />
                                            </div>
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-10">
                                        <!--begin::Col-->
                                        <div class="col-md-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row">
                                                <!--begin::Col-->
                                                <div class="col-6">
                                                    <select name="card_expiry_month"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-hide-search="true" data-placeholder="Month">
                                                        <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-6">
                                                    <select name="card_expiry_year"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-hide-search="true" data-placeholder="Year">
                                                        <option></option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">CVV</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Enter a card CVV code"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    minlength="3" maxlength="4" placeholder="CVV"
                                                    name="card_cvv" />
                                                <!--end::Input-->
                                                <!--begin::CVV icon-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                    <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                                    <span class="svg-icon svg-icon-2hx">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <rect fill="#000000" opacity="0.3" x="2" y="5"
                                                                    width="20" height="14" rx="2" />
                                                                <rect fill="#000000" x="2" y="8" width="20"
                                                                    height="3" />
                                                                <rect fill="#000000" opacity="0.3" x="16" y="14"
                                                                    width="4" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::CVV icon-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
                                            <div class="fs-7 fw-bold text-gray-400">If you need more info, please check
                                                budget planning</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                checked="checked" />
                                            <span class="form-check-label fw-bold text-gray-400">Save Card</span>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" id="kt_modal_new_card_cancel"
                                            class="btn btn-white me-3">Discard</button>
                                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>

    </div>
    <div id="kt_activities" class="bg-white" data-kt-drawer="true" data-kt-drawer-name="activities"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'lg': '900px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_activities_toggle" data-kt-drawer-close="#kt_activities_close">
        <div class="card shadow-none">
            <!--begin::Header-->
            <div class="card-header" id="kt_activities_header">
                <h3 class="card-title fw-bolder text-dark">Activity Logs</h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary me-n5"
                        id="kt_activities_close">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->

            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer py-5 text-center" id="kt_activities_footer">
                <a href="pages/profile/activity.html" class="btn btn-bg-white text-primary">View All Activities
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <rect fill="#000000" opacity="0.5"
                                    transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                    x="7.5" y="7.5" width="2" height="9" rx="1" />
                                <path
                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon--></a>
            </div>
            <!--end::Footer-->
        </div>
    </div>

    <div id="kt_drawer_chat" class="bg-white" data-kt-drawer="true" data-kt-drawer-name="chat"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
        <!--begin::Messenger-->
        <div class="card w-100" id="kt_drawer_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1">Brian
                            Cox</a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-bold text-gray-400">Active</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <div class="me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                            <i class="bi bi-three-dots fs-3"></i>
                        </button>
                        <!--begin::Menu 3-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Heading-->
                            <div class="menu-item px-3">
                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Contacts</div>
                            </div>
                            <!--end::Heading-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_users_search">Add Contact</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link flex-stack px-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_invite_friends">Invite Contacts
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a contact email to send an invitation"></i></a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                data-kt-menu-placement="right-start" data-kt-menu-flip="left, center, top">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">Groups</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Create Group</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Invite Members</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                            title="Coming soon">Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-1">
                                <a href="#" class="menu-link px-3" data-bs-toggle="tooltip"
                                    title="Coming soon">Settings</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu 3-->
                    </div>
                    <!--end::Menu-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <!--begin::Messages-->
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic"
                                        src="{{ asset('backend') }}/assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">2 mins</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">How likely are you to recommend our company to your friends
                                and family ?</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">5 mins</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{ asset('backend') }}/assets/media/avatars/150-2.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">Hey there, we’re just writing to let you know that you’ve
                                been subscribed to a repository on GitHub.</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic"
                                        src="{{ asset('backend') }}/assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">1 Hour</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Ok, Understood!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">2 Hours</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{ asset('backend') }}/assets/media/avatars/150-2.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">You’ll receive notifications for all issues, pull requests!
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic"
                                        src="{{ asset('backend') }}/assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">3 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">You can unwatch this repository immediately by clicking
                                here:
                                <a href="https://keenthemes.com">Keenthemes.com</a>
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(out)-->
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">4 Hours</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{ asset('backend') }}/assets/media/avatars/150-2.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text">Most purchased Business courses during this sale!</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(out)-->
                    <!--begin::Message(in)-->
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic"
                                        src="{{ asset('backend') }}/assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">5 Hours</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Company BBQ to celebrate the last quater achievements and
                                goals. Food and drinks provided</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(in)-->
                    <!--begin::Message(template for out)-->
                    <div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                    <a href="#"
                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">You</a>
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{ asset('backend') }}/assets/media/avatars/150-2.jpg" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end"
                                data-kt-element="message-text"></div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for out)-->
                    <!--begin::Message(template for in)-->
                    <div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic"
                                        src="{{ asset('backend') }}/assets/media/avatars/150-15.jpg" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">Brian
                                        Cox</a>
                                    <span class="text-muted fs-7 mb-1">Just now</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start"
                                data-kt-element="message-text">Right before vacation season we have the next Big Deal for
                                you.</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Message(template for in)-->
                </div>
                <!--end::Messages-->
            </div>
            <!--end::Card body-->
            <!--begin::Card footer-->
            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <!--begin::Input-->
                <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                    placeholder="Type a message"></textarea>
                <!--end::Input-->
                <!--begin:Toolbar-->
                <div class="d-flex flex-stack">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center me-2">
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-paperclip fs-3"></i>
                        </button>
                        <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                            data-bs-toggle="tooltip" title="Coming soon">
                            <i class="bi bi-upload fs-3"></i>
                        </button>
                    </div>
                    <!--end::Actions-->
                    <!--begin::Send-->
                    <button class="btn btn-primary" type="button" data-kt-element="send">Send</button>
                    <!--end::Send-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card footer-->
        </div>
        <!--end::Messenger-->
    </div>


    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10"
                        rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>



    <script src="https://code.jquery.com/jquery-migrate-3.4.1.js"
        integrity="sha256-CfQXwuZDtzbBnpa5nhZmga8QAumxkrhOToWweU52T38=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('backend') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/view/add-payment.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/view/adjust-balance.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/view/invoices.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/view/payment-method.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/view/payment-table.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/view/statement.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/customers/update.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/modals/new-card.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/widgets.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/apps/chat/chat.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/modals/create-app.js"></script>
    <script src="{{ asset('backend') }}/assets/js/custom/modals/upgrade-plan.js"></script>
    <!--end::Page Custom Javascript-->

    <script>
        function paidstatusupdate() {
            var id = $("#id").val();
            var paid_status = $("#paid_status").val();
            var notes = $("#notes").val();
            $("#paid_status_success").empty();
            $.ajax({
                url: "{{ url('admin/get/exmabooking/updateapaymentstatus/') }}",
                type: "GET",
                data: {
                    'id': id,
                    'paid_status': paid_status,
                    'notes': notes,
                },
                success: function(data) {
                    $("#paid_status_success").html("update success");
                }
            });

        }
    </script>
    <script>
        function addmorespecialaccess() {

            $("#add_more_as").append(
                '<div class="col-md-12"><div class="col-md-6"><label class="fs-6 fw-bold mb-2">Special Access Name</label><input type="text" class="form-control form-control-solid" placeholder="" name="access_name[]" required /></div><div class="col-md-6"><label class="fs-6 fw-bold mb-2">Fees</label><input type="number" class="form-control form-control-solid" placeholder="" name="fees[]" required /></div></div>'
                )
        }

        function deletecol(em) {
            $(em).closest(".col-md-12").remove();
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#yes").click(function() {
                $("#uci_section").show();
            });

            $("#no").click(function() {
                $("#uci_section").hide();
            });


            $("#uln_yes").click(function() {
                $("#uln_section").show();
            });

            $("#uln_no").click(function() {
                $("#uln_section").hide();
            });


            // retaking exam
            $("#retaking_exams_yes").click(function() {
                $("#retaking_section").show();
            });

            $("#retaking_exams_no").click(function() {
                $("#retaking_section").hide();
            });

            // caring forwad exam
            $("#caring_forwad_yes").click(function() {
                $("#caring_forwad_section").show();
            });

            $("#caring_forwad_no").click(function() {
                $("#caring_forwad_section").hide();
            });

        });
    </script>
    <script>
        function aatSubjectUpdate() {

            $("#aatsubjectupdateID").show();
        }


        function openeditsubject_cancel() {

            $("#aatsubjectupdateID").hide();
        }
    </script>
    @if ($data->main_exam_type == 'AAT')
        @php
            $count = json_decode($data->exam_information, true);
            $maincount = sizeof($count);
        @endphp
        <script>
            @if ($maincount)
                var i = {{ $maincount }};
            @else
                var i = 1;
            @endif
            function addmore() {
                $("#add_more").append(
                    '<div class="mb-10 fv-row row"><div class="col-md-3" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="AAT">AAT</option></select></div><div class="col-md-2" style=""><div class="mb-0 fv-row"><label class="form-label mb-3">Time</label><div class="mb-0 row"><select class="form-select form-select-lg form-select-solid" name="start_exam_time[]"><option value="11 am">11 am</option><option value="2 pm">2 pm</option></select></div></div></div><div class="col-md-3" style="margin: 0px 5px;"><div class="mb-0 fv-row"><label class="form-label mb-3">Dates*</label><div class="mb-0 row"><input type="date" name="exam_date[]" class="form-select form-select-lg form-select-solid"></div></div></div><div class="col-md-3"><label class="form-label mb-3">Branch</label><select name="exam_series[]" class="form-select form-select-lg form-select-solid"><option>--Select--</option><option value="Forest Gate">FOREST GATE</option><option value="ILFORD">ILFORD</option></select></div><div class="col-md-3"><label class="form-label mb-3">Exam Level</label><select name="type[]" id="type_' +
                    i + '" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid type"><option value="Level 1">Level 1</option><option value="Level 2">Level 2</option><option value="Level 3">Level 3</option><option value="Level 3">Level 3</option></select></div><div class="col-md-3"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                    i + '" onchange="subjectcheange(this)" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid subject"><option>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">Exam Type</label> <select name="option_code[]" id="option_code_' +
                    i +
                    '"  class="form-select form-select-lg form-select-solid type"><option value="On Screen">On Screen</option></select></div><div class="col-md-2"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg form-control-solid" name="fees[]" id="fees_' +
                    i +
                    '"/><a style="color:red;padding:0px 4px" onclick="deleterow(this)" style="color:red !important; cursor:pointer">Delete</a></div></div>'
                    );
                i++
            }
        </script>
    @endif



    @if ($data->main_exam_type == 'ACCA')
        @php
            $count = json_decode($data->exam_information, true);
            $maincount = sizeof($count);
        @endphp
        <script>
            @if ($maincount)
                var i = {{ $maincount }};
            @else
                var i = 1;
            @endif
            function addmore() {
                $("#add_more").append(
                    '<div class="mb-10 fv-row row"><div class="col-md-4" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="ACCA">ACCA</option></select></div>  <div class="col-md-4" style=""><div class="mb-0 fv-row"><label class="form-label mb-3">Time</label><div class="mb-0 row"><select class="form-select form-select-lg form-select-solid" name="start_exam_time[]"><option value="11 am">11 am</option><option value="2 pm">2 pm</option></select></div></div></div><div class="col-md-3" style="margin: 0px 5px;"><div class="mb-0 fv-row"><label class="form-label mb-3">Choose the dates*</label><div class="mb-0 row"><input type="date" name="exam_date[]" class="form-select form-select-lg form-select-solid"></div></div></div><div class="col-md-3"><label class="form-label mb-3">Exam Level</label><select onchange="typecheange(this)" name="type[]" id="type_' +
                    i + '" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid type"><option value="Applied Knowledge">Applied Knowledge</option><option value="Applied Skills">Applied Skills</option><option value="Foundation in Accountancy">Foundation In Accountancy</option></select></div><div class="col-md-3"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                    i + '" onchange="subjectcheange(this)" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid subject"><option>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">Exam Type</label> <select name="option_code[]" id="option_code_' +
                    i +
                    '"  class="form-select form-select-lg form-select-solid type"><option value="On Screen">On Screen</option></select></div><div class="col-md-2"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg form-control-solid amount_fees" name="fees[]" id="fees_' +
                    i +
                    '"/><a style="color:red;padding:0px 4px" onclick="deleterow(this)" style="cursor:pointer; color:red" >Delete</a></div></div>'
                    );
                i++
            }
        </script>
    @endif

    @if ($data->main_exam_type == 'Functional Skills')
        @php
            $count = json_decode($data->exam_information, true);
            $maincount = sizeof($count);
        @endphp
        <script>
            @if ($maincount)
                var i = {{ $maincount }};
            @else
                var i = 1;
            @endif
            function addmore() {
                $("#add_more").append(
                    '<div class="mb-10 fv-row row"><div class="col-md-4" style=""><label class="form-label mb-3">EXAM BOARD</label><select name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="Edexcel">Edexcel</option><option value="AQA">AQA</option><option value="OCR">OCR</option><option value="Cambridge(CIE)">Cambridge(CIE)</option><option value="WJEC">WJEC</option></select></div><div class="col-md-4" style=""><div class="mb-0 fv-row"><label class="form-label mb-3">Time</label><div class="mb-0 row"><select class="form-select form-select-lg form-select-solid" name="start_exam_time[]"><option value="11 am">11 am</option><option value="2 pm">2 pm</option></select></div></div></div><div class="col-md-3" style="margin: 0px 5px;"><div class="mb-0 fv-row"><label class="form-label mb-3">Choose the dates*</label><div class="mb-0 row"><input type="date" name="exam_date[]" class="form-select form-select-lg form-select-solid"></div></div></div><div class="col-md-2"><label class="form-label mb-3">Branch</label><select name="exam_series[]" id="exam_series_' +
                    i +
                    '" class="form-select form-select-lg form-select-solid"><option>--Select--</option><option value="Forest Gate">FOREST GATE</option><option value="ILFORD">ILFORD</option></select></div><div class="col-md-2"><label class="form-label mb-3">Exam Level</label><select name="type[]" id="type_' +
                    i + '" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid type"><option value="Entry Level 1">Entry Level 1</option><option value="Entry Level 2">Entry Level 2</option><option value="Entry Level 3">Entry Level 3</option><option value="Level 1">Level 1</option><option value="Level 2">Level 2</option><option value="Level 2 Resources">Level 2 Resources</option></select></div><div class="col-md-2"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                    i + '" onchange="subjectcheange(this)" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid subject"><option>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">Exam Type</label> <select name="option_code[]" id="option_code_' +
                    i +
                    '"  class="form-select form-select-lg form-select-solid type"><option>--Select--</option><option value="On Paper">On Paper</option><option value="On Screen">On Screen</option></select></div><div class="col-md-2"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg form-control-solid" id="fees_demo_' +
                    i + '" disabled/><input type="hidden" class="amount_fees" name="fees[]" id="fees_' + i +
                    '"/><a style="color:red;padding:0px 4px" onclick="deleterow(this)" style="cursor:pointer;color:red">Delete</a></div></div>'
                    );
                i++
            }
        </script>
    @endif


    @if ($data->main_exam_type == 'GCSE')
        @php
            $count = json_decode($data->exam_information, true);
            $maincount = sizeof($count);
        @endphp
        <script>
            @if ($maincount)
                var i = {{ $maincount }};
            @else
                var i = 1;
            @endif


            function addmore() {
                $("#add_more").append(
                    '<div class="mb-10 fv-row row"><div class="col-md-4" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select id="type_' +
                    i + '" onchange="typecheangegcse(this)" data-id="' + i +
                    '" name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="Edexcel">Edexcel</option><option value="AQA">AQA</option><option value="OCR">OCR</option><option value="Cambridge CIE">Cambridge(CIE)</option><option value="WJEC">WJEC</option></select></div><div class="col-md-4"><label class="form-label mb-3">EXAM SERIES</label><select name="exam_series[]" id="exam_series_' +
                    i +
                    '" class="form-select form-select-lg form-select-solid">@foreach ($exam_series as $myseries) <option value="{{ $myseries->exam_name }}">{{ $myseries->exam_name }}</option> @endforeach</select></div><div class="col-md-4"><label class="form-label mb-3">TYPE</label><select name="type[]"  class="form-select form-select-lg form-select-solid type"><option value="GCSE">GCSE</option></select></div><div class="col-md-3"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                    i + '" onchange="subjectcheange(this)" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid subject"><option selected disabled>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">UNIT CODE</label><input type="text" class="form-control form-control-lg " name="unit_code[]" id="unit_code_' +
                    i +
                    '" /></div><div class="col-md-3"><label class="form-label mb-3">OPTION CODE</label><input type="text" class="form-control form-control-lg " name="option_code[]"  id="option_code_' +
                    i +
                    '" /></div><div class="col-md-3"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg amount_fees" name="fees[]" id="fees_' +
                    i +
                    '"/><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)">Remove</a></div></div>'
                    );
                i++
            }
        </script>
    @endif


    @if ($data->main_exam_type == 'A Level')
        @if ($data->exam_information != null)
            @php
                $count = json_decode($data->exam_information, true);
                $maincount = sizeof($count);
            @endphp
            <script>
                @if ($maincount)
                    var i = {{ $maincount }};
                @else
                    var i = 1;
                @endif
                function addmore() {
                    $("#add_more").append(
                        '<div class="mb-10 fv-row row"><div class="col-md-4" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select id="type_' +
                        i + '" onchange="typecheangealevel(this)" data-id="' + i +
                        '" name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="Edexcel">Edexcel</option><option value="AQA">AQA</option><option value="OCR">OCR</option><option value="Cambridge CIE">Cambridge(CIE)</option><option value="WJEC">WJEC</option></select></div><div class="col-md-4"><label class="form-label mb-3">EXAM SERIES</label><select name="exam_series[]" id="exam_series_' +
                        i +
                        '" class="form-select form-select-lg form-select-solid"><option>--Select--</option> @foreach ($exam_series as $myseries) <option value="{{ $myseries->id }}">{{ $myseries->exam_name }}</option> @endforeach</select></div><div class="col-md-4"><label class="form-label mb-3">TYPE</label><select name="type[]"  class="form-select form-select-lg form-select-solid type"><option value="A Level">A Level</option></select></div><div class="col-md-3"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                        i + '" onchange="subjectcheange(this)" data-id="' + i +
                        '" class="form-select form-select-lg form-select-solid subject"><option selected disabled>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">UNIT CODE</label><input type="text" class="form-control form-control-lg form-control-solid" name="unit_code[]" id="unit_code_' +
                        i +
                        '" /></div><div class="col-md-3"><label class="form-label mb-3">OPTION CODE</label><input type="text" class="form-control form-control-lg form-control-solid" name="option_code[]"  id="option_code_' +
                        i +
                        '" /></div><div class="col-md-2"><label class="form-label mb-3">FEES</label> <input class="form-control form-control-lg form-control-solid" type="text" class="amount_fees" name="fees[]" id="fees_' +
                        i +
                        '"/><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)">Remove</a></div></div>'
                        );
                    i++
                }
            </script>
        @endif
    @endif
    @if ($data->main_exam_type == 'AS Level')
        @php
            $count = json_decode($data->exam_information, true);
            $maincount = sizeof($count);
        @endphp
        <script>
            @if ($maincount)
                var i = {{ $maincount }};
            @else
                var i = 1;
            @endif
            function addmore() {
                $("#add_more").append(
                    '<div class="mb-10 fv-row row"><div class="col-md-12" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select id="type_' +
                    i + '" onchange="typecheangeaslevel(this)" data-id="' + i +
                    '" name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="Edexcel">Edexcel</option><option value="AQA">AQA</option><option value="OCR">OCR</option><option value="Cambridge(CIE)">Cambridge(CIE)</option><option value="WJEC">WJEC</option></select></div><div class="col-md-2"><label class="form-label mb-3">EXAM SERIES</label><select name="exam_series[]" id="exam_series_' +
                    i +
                    '" class="form-select form-select-lg form-select-solid"><option>--Select--</option><option value="November 2023">November 2023</option><option value="January 2023">January 2023</option><option value="June 2023">June 2023</option></select></div><div class="col-md-2"><label class="form-label mb-3">TYPE</label><select name="type[]"  class="form-select form-select-lg form-select-solid type"><option value="AS Level">AS Level</option></select></div><div class="col-md-2"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                    i + '" onchange="subjectcheange(this)" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid subject"><option selected disabled>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-2"><label class="form-label mb-3">UNIT CODE</label><input type="text" class="form-control form-control-lg form-control-solid" name="unit_code[]" id="unit_code_' +
                    i +
                    '" /></div><div class="col-md-2"><label class="form-label mb-3">OPTION CODE</label><input type="text" class="form-control form-control-lg form-control-solid" name="option_code[]"  id="option_code_' +
                    i +
                    '" /></div><div class="col-md-2"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg form-control-solid" id="fees_demo_' +
                    i + '" disabled/><input type="hidden" class="amount_fees" name="fees[]" id="fees_' + i +
                    '"/><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)">Remove</a></div></div>'
                    );
                i++
            }
        </script>
    @endif
    @if ($data->main_exam_type == 'IGCSE')
        @php
            $count = json_decode($data->exam_information, true);
            $maincount = sizeof($count);
        @endphp
        <script>
            @if ($maincount)
                var i = {{ $maincount }};
            @else
                var i = 1;
            @endif

            function addmore() {
                $("#add_more").append(
                    '<div class="mb-10 fv-row row"><div class="col-md-4" style="margin-bottom:8px"><label class="form-label mb-3">EXAM BOARD</label><select id="type_' +
                    i + '" onchange="typecheangeigcse(this)" data-id="' + i +
                    '" name="exam_board[]" class="form-select form-select-lg form-select-solid"><option value="Edexcel">Edexcel</option><option value="AQA">AQA</option><option value="OCR">OCR</option><option value="Cambridge CIE">Cambridge(CIE)</option><option value="WJEC">WJEC</option></select></div><div class="col-md-4"><label class="form-label mb-3">EXAM SERIES</label><select name="exam_series[]" id="exam_series_' +
                    i +
                    '" class="form-select form-select-lg form-select-solid">   @foreach ($exam_series as $myseries)<option value="{{ $myseries->id }}" @if ($random->exam_series == $myseries->id) selected @endif >{{ $myseries->exam_name }}</option>@endforeach</select></div><div class="col-md-4"><label class="form-label mb-3">TYPE</label><select name="type[]" class="form-select form-select-lg form-select-solid type"><option value="IGCSE">IGCSE</option></select></div><div class="col-md-3"><label class="form-label mb-3">SUBJECT</label><select name="subject[]" id="subject_' +
                    i + '" onchange="subjectcheange(this)" data-id="' + i +
                    '" class="form-select form-select-lg form-select-solid subject"><option selected disabled>--Select--</option>@foreach ($allsub as $sub)<option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label mb-3">UNIT CODE</label><input type="text" class="form-control form-control-lg form-control-solid" name="unit_code[]" id="unit_code_' +
                    i +
                    '" /></div><div class="col-md-3"><label class="form-label mb-3">OPTION CODE</label><input type="text" class="form-control form-control-lg form-control-solid" name="option_code[]"  id="option_code_' +
                    i +
                    '" /></div><div class="col-md-3"><label class="form-label mb-3">FEES</label><input type="text" class="form-control form-control-lg form-control-solid amount_fees" name="fees[]" id="fees_' +
                    i +
                    '"/><a style="cursor:pointer;color:red;padding:5px 4px" onclick="deleterow(this)">Remove</a></div></div>'
                    );
                i++
            }
        </script>
    @endif
    <script>
        function deleterow(em) {

            $(em).closest(".row").remove();

        }



        function subjectcheange(el) {

            var s_id = el.value;
            var index_id = el.id;
            var total_amount = $("#total_amount").val();
            var arr = index_id.split('_');
            var mainid = arr[1];
            if (s_id) {
                $.ajax({
                    url: "{{ url('/get/subject/details/') }}/" + s_id,
                    type: "GET",
                    success: function(data) {

                        $('#unit_code_' + mainid).val(data.unit_code);
                        $('#fees_demo_' + mainid).val(data.exam_fees);
                        $('#fees_' + mainid).val(data.exam_fees);
                        // $('#option_code_'+mainid).val(data.exam_fees);

                        var amou = parseInt(data.exam_fees);
                        $("#total_amount").val(Number(total_amount) + Number(amou));
                        addmockexam(s_id);

                    }
                });
            } else {
                alert('sorry data not found');
            }
        }
    </script>
@endsection
