@extends('layouts.backend')
@section('content')
    <style>
        div.dataTables_wrapper div.dataTables_length select {

            height: 33px;
        }

        div.dataTables_wrapper div.dataTables_filter input {

            height: 25px;
        }

        select.form-control.form-select {
            padding: 7px;
        }
    </style>

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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">All Subjects Candidates</h1>
                    <!--end::Title-->
                </div>

            </div>
            <!--end::Container-->
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5 row">

                                <form class="col-md-12" action="{{ url('admin/all-series-candidates') }}" method="post">
                                    <div class="col-md-3">
                                        <label for="inputPassword2" class="visually-hidden">Series</label>
                                        @csrf
                                        <select class="form-select form-control" name="series">
                                            @foreach ($allSeries as $series)
                                                <option value="{{ $series->id }}"
                                                    {{ request('series') == $series->id ? 'selected' : '' }}>
                                                    {{ $series->exam_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                                    </div>
                                </form>

                            </div>
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">All NEA Candidates</span>
                                </h3>
                            </div>

                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">


                                    @php
                                        $subjects = App\Models\Subject::orderBy('subject_name', 'ASC')->get();
                                    @endphp

                                    @foreach ($subjects as $sub)
                                        @php
                                            $subjectRequests = $alldata->filter(function ($data) use ($sub) {
                                                $examInfo = json_decode($data->exam_information);
                                                foreach ($examInfo as $info) {
                                                    if (isset($info->subject) && $info->subject == $sub->id) {
                                                        return true;
                                                    }
                                                }
                                                return false;
                                            });
                                        @endphp

                                        @if ($subjectRequests->count() > 0)
                                            <h4 class="mt-5 text-primary fw-bold">{{ $sub->exam_type }}
                                                {{ $sub->exam_board }} {{ $sub->subject_name }} ({{ $sub->unit_code }})</h4>
                                            <table id="dataTableExample1"
                                                class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3"
                                                style="width:100%;font-size:12px">
                                                <thead class="text-center">
                                                    <tr class="fw-bolder text-muted">
                                                        <th>#</th>
                                                        <th>Booking ID</th>
                                                        <th>Student Name</th>
                                                        <th>Exam Board</th>
                                                        <th>Subject Details</th>
                                                        <th>Series</th>
                                                        <th>Email</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach ($subjectRequests as $key => $data)
                                                        @foreach (json_decode($data->exam_information) as $subjects)
                                                            @if (isset($subjects->subject) && $subjects->subject == $sub->id)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $data->booking_id }}</td>
                                                                    <td>{{ $data->first_name }}</td>
                                                                    <td>{{ $subjects->exam_board ?? '' }}</td>
                                                                    <td>{{ $subjects->exam_board ?? '' }} -
                                                                        {{ $data->main_exam_type ?? '' }} -
                                                                        {{ $data->mainseries->exam_name ?? '' }} -
                                                                        {{ $sub->unit_code ?? '' }} -
                                                                        {{ $sub->subject_name ?? '' }}</td>
                                                                    <td>{{ $data->mainseries->exam_name ?? '' }}</td>
                                                                    <td>{{ $data->email }}</td>
                                                                    <td>
                                                                        <a class="btn btn-primary"
                                                                            href="{{ url('admin/exambooking/maindetails/' . $data->id) }}">View</a>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    @endforeach

                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--begin::Body-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>



    <script>
        function insertupdate(el) {
            var id = el.id;
            var val = el.value;

            alaert(val);

            $.ajax({
                url: "{{ url('admin/update/examnotes') }}",
                type: "GET",
                data: {
                    "val": val,
                    "id": id,

                },
                success: function(data) {

                    if (data == 'success') {
                        iziToast.success({
                            message: 'Notes add Success',
                            'position': 'topRight'
                        });
                    } else if (data == 'faild') {
                        iziToast.warning({
                            message: 'Notes add faild',
                            'position': 'topRight'
                        });
                    }



                }
            });
        }
    </script>
@endsection
