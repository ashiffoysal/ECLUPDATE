@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
@php
$totalexambooking=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)->count();
$gcseIgcseCount=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('main_exam_type','GCSE')->Orwhere('main_exam_type','IGCSE')->where('is_deleted',1)->where('is_paid',1)->count();
$ConfirmedgcseIgcseCount=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('main_exam_type','GCSE')->Orwhere('main_exam_type','IGCSE')->where('is_deleted',1)->where('is_confirm_booking',1)->count();
$ConfirmedAlevelAslevelCount=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('main_exam_type','AS Level')->Orwhere('main_exam_type','A Level')->where('is_deleted',1)->where('is_confirm_booking',1)->count();
@endphp
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                                            
<!--begin::Toolbar-->
<div id="kt_app_toolbar" class="app-toolbar  pt-7 pt-lg-10 ">

            <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
            <!--begin::Toolbar wrapper-->
<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            

<!--begin::Page title-->
<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    <a href="/metronic8/demo38/../demo38/index.html" class="text-muted text-hover-primary">
                                Home                            </a>
                                            </li>
                                <!--end::Item-->
                                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                                        
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                                    Dashboards                                            </li>
                                <!--end::Item-->
                                        
                    </ul>
        <!--end::Breadcrumb-->
    </div>
<!--end::Page title-->    
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ url('/admin/exam/allbooking') }}" class="btn btn-flex btn-danger h-40px fs-7 fw-bold">
            All Exam Booking 
        </a>           

        <a href="{{ url('admin/payment/receive') }}" class="btn btn-flex btn-primary h-40px fs-7 fw-bold">
            Receive Payment 
        </a>
    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar wrapper-->        </div>
        <!--end::Toolbar container-->
    </div>
<!--end::Toolbar-->                                        
                    
<!--begin::Content-->
<div id="kt_app_content" class="app-content  flex-column-fluid ">
    
           
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10"> 
    <!--begin::Col-->
    <div class="col-xl-3">
        <!--begin::Card widget 3-->
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #F1416C;background-image:url('/metronic8/demo38/assets/media/svg/shapes/wave-bg-red.svg')">
    <!--begin::Header-->
    <div class="card-header pt-5 mb-3">
        <!--begin::Icon-->
        <div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C"> 
            <i class="ki-outline ki-call text-white fs-2qx lh-0"></i>             
        </div>
        <!--end::Icon-->         
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end mb-3">
        <!--begin::Info-->
        <div class="d-flex align-items-center">
            <span class="fs-4hx text-white fw-bold me-6">{{$ConfirmedgcseIgcseCount}}</span>

            <div class="fw-bold fs-6 text-white">
                <span class="d-block">Confirmed</span>
                <span class="">Exam Booking</span>
            </div>            
        </div>
        <!--end::Info-->
    </div>
    <!--end::Card body-->

    <!--begin::Card footer-->
    <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
        <!--begin::Progress-->
        <div class="fw-bold text-white py-2">
            <span class="fs-1 d-block">{{ $gcseIgcseCount }}</span>
            <span class="opacity-50">GCSE IGCSE EXAM BOOKING</span>
        </div>          
        <!--end::Progress-->
    </div>
    <!--end::Card footer-->
</div>
<!--end::Card widget 3-->    </div>
    <!--end::Col-->  

    <!--begin::Col-->
    <div class="col-xl-3">
        <!--begin::Card widget 3-->
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #7239EA;background-image:url('/metronic8/demo38/assets/media/svg/shapes/wave-bg-purple.svg')">
    <!--begin::Header-->
    <div class="card-header pt-5 mb-3">
        <!--begin::Icon-->
        <div class="d-flex flex-center rounded-circle h-80px w-80px" style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA"> 
            <i class="ki-outline ki-call text-white fs-2qx lh-0"></i>             
        </div>
        <!--end::Icon-->         
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end mb-3">
        <!--begin::Info-->
        <div class="d-flex align-items-center">
            <span class="fs-4hx text-white fw-bold me-6">{{ $ConfirmedAlevelAslevelCount }}</span>

            <div class="fw-bold fs-6 text-white">
                  <span class="d-block">Confirmed</span>
                <span class="">Exam Booking</span>
            </div>            
        </div>
        <!--end::Info-->
    </div>
    <!--end::Card body-->

    <!--begin::Card footer-->
    <div class="card-footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
        <!--begin::Progress-->
        <div class="fw-bold text-white py-2">
            <span class="fs-1 d-block">386</span>
            <span class="opacity-50">A Level AS Level Exam Booking</span>
        </div>          
        <!--end::Progress-->
    </div>
    <!--end::Card footer-->
</div>
<!--end::Card widget 3-->    </div>
    <!--end::Col-->   
    
    <!--begin::Col-->
    <div class="col-xl-6">
        <!--begin::Chart widget 36-->
<div class="card card-flush overflow-hidden h-lg-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">            
            <span class="card-label fw-bold text-dark">Performance</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $totalexambooking }} Total Exam Booking</span>
        </h3>
        <!--end::Title-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">   
            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" data-kt-daterangepicker-range="today" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">           
                <!--begin::Display range-->
                <div class="text-gray-600 fw-bold">3 Jul 2023</div>
                <!--end::Display range-->

                <i class="ki-outline ki-calendar-8 fs-1 ms-2 me-0"></i>          
            </div>  
            <!--end::Daterangepicker-->     
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end p-0">  
        <!--begin::Chart-->
        <div id="kt_charts_widget_36" class="min-h-auto w-100 ps-4 pe-6" style="height: 300px; min-height: 315px;"><div id="apexcharts808geco0h" class="apexcharts-canvas apexcharts808geco0h apexcharts-theme-light" style="width: 453.5px; height: 300px;"><svg id="SvgjsSvg1719" width="453.5" height="300" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1721" class="apexcharts-inner apexcharts-graphical" transform="translate(47.835205078125, 30)"><defs id="SvgjsDefs1720"><clipPath id="gridRectMask808geco0h"><rect id="SvgjsRect1726" width="402.664794921875" height="224.82" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask808geco0h"></clipPath><clipPath id="nonForecastMask808geco0h"></clipPath><clipPath id="gridRectMarkerMask808geco0h"><rect id="SvgjsRect1727" width="399.664794921875" height="225.82" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1732" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1733" stop-opacity="0.4" stop-color="rgba(80,205,137,0.4)" offset="0.15"></stop><stop id="SvgjsStop1734" stop-opacity="0.2" stop-color="rgba(255,255,255,0.2)" offset="1.2"></stop><stop id="SvgjsStop1735" stop-opacity="0.2" stop-color="rgba(255,255,255,0.2)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1741" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1742" stop-opacity="0.4" stop-color="rgba(62,151,255,0.4)" offset="0.15"></stop><stop id="SvgjsStop1743" stop-opacity="0.2" stop-color="rgba(255,255,255,0.2)" offset="1.2"></stop><stop id="SvgjsStop1744" stop-opacity="0.2" stop-color="rgba(255,255,255,0.2)" offset="1"></stop></linearGradient></defs><g id="SvgjsG1747" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1748" class="apexcharts-xaxis-texts-g" transform="translate(0, -10)"><text id="SvgjsText1750" font-family="inherit" x="0" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1751"></tspan><title></title></text><text id="SvgjsText1753" font-family="inherit" x="21.981377495659718" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1754"></tspan><title></title></text><text id="SvgjsText1756" font-family="inherit" x="43.96275499131944" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1757"></tspan><title></title></text><text id="SvgjsText1759" font-family="inherit" x="65.94413248697916" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 66.94412994384766 239.32000732421875)"><tspan id="SvgjsTspan1760">9 AM</tspan><title>9 AM</title></text><text id="SvgjsText1762" font-family="inherit" x="87.92550998263889" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1763"></tspan><title></title></text><text id="SvgjsText1765" font-family="inherit" x="109.90688747829861" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1766"></tspan><title></title></text><text id="SvgjsText1768" font-family="inherit" x="131.88826497395834" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 132.8882598876953 239.32000732421875)"><tspan id="SvgjsTspan1769">12 PM</tspan><title>12 PM</title></text><text id="SvgjsText1771" font-family="inherit" x="153.86964246961807" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1772"></tspan><title></title></text><text id="SvgjsText1774" font-family="inherit" x="175.8510199652778" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1775"></tspan><title></title></text><text id="SvgjsText1777" font-family="inherit" x="197.83239746093753" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 198.8323974609375 239.32000732421875)"><tspan id="SvgjsTspan1778">15 PM</tspan><title>15 PM</title></text><text id="SvgjsText1780" font-family="inherit" x="219.81377495659726" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1781"></tspan><title></title></text><text id="SvgjsText1783" font-family="inherit" x="241.79515245225699" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1784"></tspan><title></title></text><text id="SvgjsText1786" font-family="inherit" x="263.77652994791674" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 264.7765197753906 239.32000732421875)"><tspan id="SvgjsTspan1787">18 PM</tspan><title>18 PM</title></text><text id="SvgjsText1789" font-family="inherit" x="285.75790744357647" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1790"></tspan><title></title></text><text id="SvgjsText1792" font-family="inherit" x="307.7392849392362" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1793"></tspan><title></title></text><text id="SvgjsText1795" font-family="inherit" x="329.7206624348959" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 330.7206726074219 239.32000732421875)"><tspan id="SvgjsTspan1796">19 PM</tspan><title>19 PM</title></text><text id="SvgjsText1798" font-family="inherit" x="351.70203993055566" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1799"></tspan><title></title></text><text id="SvgjsText1801" font-family="inherit" x="373.6834174262154" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1802"></tspan><title></title></text><text id="SvgjsText1804" font-family="inherit" x="395.6647949218751" y="244.82" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-xaxis-label " style="font-family: inherit;" transform="rotate(0 1 -1)"><tspan id="SvgjsTspan1805"></tspan><title></title></text></g></g><g id="SvgjsG1829" class="apexcharts-grid"><g id="SvgjsG1830" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1832" x1="0" y1="0" x2="395.664794921875" y2="0" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1833" x1="0" y1="36.97" x2="395.664794921875" y2="36.97" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1834" x1="0" y1="73.94" x2="395.664794921875" y2="73.94" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1835" x1="0" y1="110.91" x2="395.664794921875" y2="110.91" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1836" x1="0" y1="147.88" x2="395.664794921875" y2="147.88" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1837" x1="0" y1="184.85" x2="395.664794921875" y2="184.85" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1838" x1="0" y1="221.82" x2="395.664794921875" y2="221.82" stroke="#e1e3ea" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1831" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1840" x1="0" y1="221.82" x2="395.664794921875" y2="221.82" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1839" x1="0" y1="1" x2="0" y2="221.82" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1728" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1729" class="apexcharts-series" seriesName="InboundxCalls" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1736" d="M 0 221.82L 0 135.55666666666667C 7.693482123480902 135.55666666666667 14.28789537217882 98.58666666666667 21.98137749565972 98.58666666666667C 29.674859619140623 98.58666666666667 36.26927286783854 98.58666666666667 43.96275499131944 98.58666666666667C 51.65623711480035 98.58666666666667 58.250650363498266 147.88 65.94413248697917 147.88C 73.63761461046008 147.88 80.23202785915798 147.88 87.92550998263889 147.88C 95.61899210611979 147.88 102.21340535481771 184.85 109.90688747829861 184.85C 117.60036960177952 184.85 124.19478285047744 184.85 131.88826497395834 184.85C 139.58174709743923 184.85 146.17616034613718 98.58666666666667 153.86964246961807 98.58666666666667C 161.56312459309896 98.58666666666667 168.15753784179688 98.58666666666667 175.85101996527777 98.58666666666667C 183.54450208875866 98.58666666666667 190.1389153374566 123.23333333333335 197.8323974609375 123.23333333333335C 205.5258795844184 123.23333333333335 212.12029283311634 123.23333333333335 219.81377495659723 123.23333333333335C 227.50725708007812 123.23333333333335 234.10167032877607 73.94 241.79515245225696 73.94C 249.48863457573785 73.94 256.08304782443577 73.94 263.7765299479167 73.94C 271.4700120713976 73.94 278.0644253200955 98.58666666666667 285.7579074435764 98.58666666666667C 293.45138956705733 98.58666666666667 300.0458028157552 98.58666666666667 307.73928493923614 98.58666666666667C 315.43276706271706 98.58666666666667 322.02718031141495 98.58666666666667 329.72066243489587 98.58666666666667C 337.41414455837673 98.58666666666667 344.0085578070747 147.88 351.70203993055554 147.88C 359.39552205403646 147.88 365.98993530273435 147.88 373.68341742621527 147.88C 381.3768995496962 147.88 387.9713127983941 172.52666666666667 395.664794921875 172.52666666666667C 395.664794921875 172.52666666666667 395.664794921875 172.52666666666667 395.664794921875 221.82M 395.664794921875 172.52666666666667z" fill="url(#SvgjsLinearGradient1732)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask808geco0h)" pathTo="M 0 221.82L 0 135.55666666666667C 7.693482123480902 135.55666666666667 14.28789537217882 98.58666666666667 21.98137749565972 98.58666666666667C 29.674859619140623 98.58666666666667 36.26927286783854 98.58666666666667 43.96275499131944 98.58666666666667C 51.65623711480035 98.58666666666667 58.250650363498266 147.88 65.94413248697917 147.88C 73.63761461046008 147.88 80.23202785915798 147.88 87.92550998263889 147.88C 95.61899210611979 147.88 102.21340535481771 184.85 109.90688747829861 184.85C 117.60036960177952 184.85 124.19478285047744 184.85 131.88826497395834 184.85C 139.58174709743923 184.85 146.17616034613718 98.58666666666667 153.86964246961807 98.58666666666667C 161.56312459309896 98.58666666666667 168.15753784179688 98.58666666666667 175.85101996527777 98.58666666666667C 183.54450208875866 98.58666666666667 190.1389153374566 123.23333333333335 197.8323974609375 123.23333333333335C 205.5258795844184 123.23333333333335 212.12029283311634 123.23333333333335 219.81377495659723 123.23333333333335C 227.50725708007812 123.23333333333335 234.10167032877607 73.94 241.79515245225696 73.94C 249.48863457573785 73.94 256.08304782443577 73.94 263.7765299479167 73.94C 271.4700120713976 73.94 278.0644253200955 98.58666666666667 285.7579074435764 98.58666666666667C 293.45138956705733 98.58666666666667 300.0458028157552 98.58666666666667 307.73928493923614 98.58666666666667C 315.43276706271706 98.58666666666667 322.02718031141495 98.58666666666667 329.72066243489587 98.58666666666667C 337.41414455837673 98.58666666666667 344.0085578070747 147.88 351.70203993055554 147.88C 359.39552205403646 147.88 365.98993530273435 147.88 373.68341742621527 147.88C 381.3768995496962 147.88 387.9713127983941 172.52666666666667 395.664794921875 172.52666666666667C 395.664794921875 172.52666666666667 395.664794921875 172.52666666666667 395.664794921875 221.82M 395.664794921875 172.52666666666667z" pathFrom="M -1 295.76L -1 295.76L 21.98137749565972 295.76L 43.96275499131944 295.76L 65.94413248697917 295.76L 87.92550998263889 295.76L 109.90688747829861 295.76L 131.88826497395834 295.76L 153.86964246961807 295.76L 175.85101996527777 295.76L 197.8323974609375 295.76L 219.81377495659723 295.76L 241.79515245225696 295.76L 263.7765299479167 295.76L 285.7579074435764 295.76L 307.73928493923614 295.76L 329.72066243489587 295.76L 351.70203993055554 295.76L 373.68341742621527 295.76L 395.664794921875 295.76"></path><path id="SvgjsPath1737" d="M 0 135.55666666666667C 7.693482123480902 135.55666666666667 14.28789537217882 98.58666666666667 21.98137749565972 98.58666666666667C 29.674859619140623 98.58666666666667 36.26927286783854 98.58666666666667 43.96275499131944 98.58666666666667C 51.65623711480035 98.58666666666667 58.250650363498266 147.88 65.94413248697917 147.88C 73.63761461046008 147.88 80.23202785915798 147.88 87.92550998263889 147.88C 95.61899210611979 147.88 102.21340535481771 184.85 109.90688747829861 184.85C 117.60036960177952 184.85 124.19478285047744 184.85 131.88826497395834 184.85C 139.58174709743923 184.85 146.17616034613718 98.58666666666667 153.86964246961807 98.58666666666667C 161.56312459309896 98.58666666666667 168.15753784179688 98.58666666666667 175.85101996527777 98.58666666666667C 183.54450208875866 98.58666666666667 190.1389153374566 123.23333333333335 197.8323974609375 123.23333333333335C 205.5258795844184 123.23333333333335 212.12029283311634 123.23333333333335 219.81377495659723 123.23333333333335C 227.50725708007812 123.23333333333335 234.10167032877607 73.94 241.79515245225696 73.94C 249.48863457573785 73.94 256.08304782443577 73.94 263.7765299479167 73.94C 271.4700120713976 73.94 278.0644253200955 98.58666666666667 285.7579074435764 98.58666666666667C 293.45138956705733 98.58666666666667 300.0458028157552 98.58666666666667 307.73928493923614 98.58666666666667C 315.43276706271706 98.58666666666667 322.02718031141495 98.58666666666667 329.72066243489587 98.58666666666667C 337.41414455837673 98.58666666666667 344.0085578070747 147.88 351.70203993055554 147.88C 359.39552205403646 147.88 365.98993530273435 147.88 373.68341742621527 147.88C 381.3768995496962 147.88 387.9713127983941 172.52666666666667 395.664794921875 172.52666666666667" fill="none" fill-opacity="1" stroke="#50cd89" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask808geco0h)" pathTo="M 0 135.55666666666667C 7.693482123480902 135.55666666666667 14.28789537217882 98.58666666666667 21.98137749565972 98.58666666666667C 29.674859619140623 98.58666666666667 36.26927286783854 98.58666666666667 43.96275499131944 98.58666666666667C 51.65623711480035 98.58666666666667 58.250650363498266 147.88 65.94413248697917 147.88C 73.63761461046008 147.88 80.23202785915798 147.88 87.92550998263889 147.88C 95.61899210611979 147.88 102.21340535481771 184.85 109.90688747829861 184.85C 117.60036960177952 184.85 124.19478285047744 184.85 131.88826497395834 184.85C 139.58174709743923 184.85 146.17616034613718 98.58666666666667 153.86964246961807 98.58666666666667C 161.56312459309896 98.58666666666667 168.15753784179688 98.58666666666667 175.85101996527777 98.58666666666667C 183.54450208875866 98.58666666666667 190.1389153374566 123.23333333333335 197.8323974609375 123.23333333333335C 205.5258795844184 123.23333333333335 212.12029283311634 123.23333333333335 219.81377495659723 123.23333333333335C 227.50725708007812 123.23333333333335 234.10167032877607 73.94 241.79515245225696 73.94C 249.48863457573785 73.94 256.08304782443577 73.94 263.7765299479167 73.94C 271.4700120713976 73.94 278.0644253200955 98.58666666666667 285.7579074435764 98.58666666666667C 293.45138956705733 98.58666666666667 300.0458028157552 98.58666666666667 307.73928493923614 98.58666666666667C 315.43276706271706 98.58666666666667 322.02718031141495 98.58666666666667 329.72066243489587 98.58666666666667C 337.41414455837673 98.58666666666667 344.0085578070747 147.88 351.70203993055554 147.88C 359.39552205403646 147.88 365.98993530273435 147.88 373.68341742621527 147.88C 381.3768995496962 147.88 387.9713127983941 172.52666666666667 395.664794921875 172.52666666666667" pathFrom="M -1 295.76L -1 295.76L 21.98137749565972 295.76L 43.96275499131944 295.76L 65.94413248697917 295.76L 87.92550998263889 295.76L 109.90688747829861 295.76L 131.88826497395834 295.76L 153.86964246961807 295.76L 175.85101996527777 295.76L 197.8323974609375 295.76L 219.81377495659723 295.76L 241.79515245225696 295.76L 263.7765299479167 295.76L 285.7579074435764 295.76L 307.73928493923614 295.76L 329.72066243489587 295.76L 351.70203993055554 295.76L 373.68341742621527 295.76L 395.664794921875 295.76" fill-rule="evenodd"></path><g id="SvgjsG1730" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1848" r="0" cx="0" cy="0" class="apexcharts-marker woel6hodb no-pointer-events" stroke="#50cd89" fill="#50cd89" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1738" class="apexcharts-series" seriesName="OutboundxCalls" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath1745" d="M 0 221.82L 0 73.94C 7.693482123480902 73.94 14.28789537217882 24.646666666666704 21.98137749565972 24.646666666666704C 29.674859619140623 24.646666666666704 36.26927286783854 24.646666666666704 43.96275499131944 24.646666666666704C 51.65623711480035 24.646666666666704 58.250650363498266 61.616666666666674 65.94413248697917 61.616666666666674C 73.63761461046008 61.616666666666674 80.23202785915798 61.616666666666674 87.92550998263889 61.616666666666674C 95.61899210611979 61.616666666666674 102.21340535481771 86.26333333333335 109.90688747829861 86.26333333333335C 117.60036960177952 86.26333333333335 124.19478285047744 86.26333333333335 131.88826497395834 86.26333333333335C 139.58174709743923 86.26333333333335 146.17616034613718 61.616666666666674 153.86964246961807 61.616666666666674C 161.56312459309896 61.616666666666674 168.15753784179688 61.616666666666674 175.85101996527777 61.616666666666674C 183.54450208875866 61.616666666666674 190.1389153374566 12.323333333333323 197.8323974609375 12.323333333333323C 205.5258795844184 12.323333333333323 212.12029283311634 12.323333333333323 219.81377495659723 12.323333333333323C 227.50725708007812 12.323333333333323 234.10167032877607 49.29333333333335 241.79515245225696 49.29333333333335C 249.48863457573785 49.29333333333335 256.08304782443577 49.29333333333335 263.7765299479167 49.29333333333335C 271.4700120713976 49.29333333333335 278.0644253200955 12.323333333333323 285.7579074435764 12.323333333333323C 293.45138956705733 12.323333333333323 300.0458028157552 12.323333333333323 307.73928493923614 12.323333333333323C 315.43276706271706 12.323333333333323 322.02718031141495 61.616666666666674 329.72066243489587 61.616666666666674C 337.41414455837673 61.616666666666674 344.0085578070747 61.616666666666674 351.70203993055554 61.616666666666674C 359.39552205403646 61.616666666666674 365.98993530273435 86.26333333333335 373.68341742621527 86.26333333333335C 381.3768995496962 86.26333333333335 387.9713127983941 86.26333333333335 395.664794921875 86.26333333333335C 395.664794921875 86.26333333333335 395.664794921875 86.26333333333335 395.664794921875 221.82M 395.664794921875 86.26333333333335z" fill="url(#SvgjsLinearGradient1741)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMask808geco0h)" pathTo="M 0 221.82L 0 73.94C 7.693482123480902 73.94 14.28789537217882 24.646666666666704 21.98137749565972 24.646666666666704C 29.674859619140623 24.646666666666704 36.26927286783854 24.646666666666704 43.96275499131944 24.646666666666704C 51.65623711480035 24.646666666666704 58.250650363498266 61.616666666666674 65.94413248697917 61.616666666666674C 73.63761461046008 61.616666666666674 80.23202785915798 61.616666666666674 87.92550998263889 61.616666666666674C 95.61899210611979 61.616666666666674 102.21340535481771 86.26333333333335 109.90688747829861 86.26333333333335C 117.60036960177952 86.26333333333335 124.19478285047744 86.26333333333335 131.88826497395834 86.26333333333335C 139.58174709743923 86.26333333333335 146.17616034613718 61.616666666666674 153.86964246961807 61.616666666666674C 161.56312459309896 61.616666666666674 168.15753784179688 61.616666666666674 175.85101996527777 61.616666666666674C 183.54450208875866 61.616666666666674 190.1389153374566 12.323333333333323 197.8323974609375 12.323333333333323C 205.5258795844184 12.323333333333323 212.12029283311634 12.323333333333323 219.81377495659723 12.323333333333323C 227.50725708007812 12.323333333333323 234.10167032877607 49.29333333333335 241.79515245225696 49.29333333333335C 249.48863457573785 49.29333333333335 256.08304782443577 49.29333333333335 263.7765299479167 49.29333333333335C 271.4700120713976 49.29333333333335 278.0644253200955 12.323333333333323 285.7579074435764 12.323333333333323C 293.45138956705733 12.323333333333323 300.0458028157552 12.323333333333323 307.73928493923614 12.323333333333323C 315.43276706271706 12.323333333333323 322.02718031141495 61.616666666666674 329.72066243489587 61.616666666666674C 337.41414455837673 61.616666666666674 344.0085578070747 61.616666666666674 351.70203993055554 61.616666666666674C 359.39552205403646 61.616666666666674 365.98993530273435 86.26333333333335 373.68341742621527 86.26333333333335C 381.3768995496962 86.26333333333335 387.9713127983941 86.26333333333335 395.664794921875 86.26333333333335C 395.664794921875 86.26333333333335 395.664794921875 86.26333333333335 395.664794921875 221.82M 395.664794921875 86.26333333333335z" pathFrom="M -1 295.76L -1 295.76L 21.98137749565972 295.76L 43.96275499131944 295.76L 65.94413248697917 295.76L 87.92550998263889 295.76L 109.90688747829861 295.76L 131.88826497395834 295.76L 153.86964246961807 295.76L 175.85101996527777 295.76L 197.8323974609375 295.76L 219.81377495659723 295.76L 241.79515245225696 295.76L 263.7765299479167 295.76L 285.7579074435764 295.76L 307.73928493923614 295.76L 329.72066243489587 295.76L 351.70203993055554 295.76L 373.68341742621527 295.76L 395.664794921875 295.76"></path><path id="SvgjsPath1746" d="M 0 73.94C 7.693482123480902 73.94 14.28789537217882 24.646666666666704 21.98137749565972 24.646666666666704C 29.674859619140623 24.646666666666704 36.26927286783854 24.646666666666704 43.96275499131944 24.646666666666704C 51.65623711480035 24.646666666666704 58.250650363498266 61.616666666666674 65.94413248697917 61.616666666666674C 73.63761461046008 61.616666666666674 80.23202785915798 61.616666666666674 87.92550998263889 61.616666666666674C 95.61899210611979 61.616666666666674 102.21340535481771 86.26333333333335 109.90688747829861 86.26333333333335C 117.60036960177952 86.26333333333335 124.19478285047744 86.26333333333335 131.88826497395834 86.26333333333335C 139.58174709743923 86.26333333333335 146.17616034613718 61.616666666666674 153.86964246961807 61.616666666666674C 161.56312459309896 61.616666666666674 168.15753784179688 61.616666666666674 175.85101996527777 61.616666666666674C 183.54450208875866 61.616666666666674 190.1389153374566 12.323333333333323 197.8323974609375 12.323333333333323C 205.5258795844184 12.323333333333323 212.12029283311634 12.323333333333323 219.81377495659723 12.323333333333323C 227.50725708007812 12.323333333333323 234.10167032877607 49.29333333333335 241.79515245225696 49.29333333333335C 249.48863457573785 49.29333333333335 256.08304782443577 49.29333333333335 263.7765299479167 49.29333333333335C 271.4700120713976 49.29333333333335 278.0644253200955 12.323333333333323 285.7579074435764 12.323333333333323C 293.45138956705733 12.323333333333323 300.0458028157552 12.323333333333323 307.73928493923614 12.323333333333323C 315.43276706271706 12.323333333333323 322.02718031141495 61.616666666666674 329.72066243489587 61.616666666666674C 337.41414455837673 61.616666666666674 344.0085578070747 61.616666666666674 351.70203993055554 61.616666666666674C 359.39552205403646 61.616666666666674 365.98993530273435 86.26333333333335 373.68341742621527 86.26333333333335C 381.3768995496962 86.26333333333335 387.9713127983941 86.26333333333335 395.664794921875 86.26333333333335" fill="none" fill-opacity="1" stroke="#3e97ff" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMask808geco0h)" pathTo="M 0 73.94C 7.693482123480902 73.94 14.28789537217882 24.646666666666704 21.98137749565972 24.646666666666704C 29.674859619140623 24.646666666666704 36.26927286783854 24.646666666666704 43.96275499131944 24.646666666666704C 51.65623711480035 24.646666666666704 58.250650363498266 61.616666666666674 65.94413248697917 61.616666666666674C 73.63761461046008 61.616666666666674 80.23202785915798 61.616666666666674 87.92550998263889 61.616666666666674C 95.61899210611979 61.616666666666674 102.21340535481771 86.26333333333335 109.90688747829861 86.26333333333335C 117.60036960177952 86.26333333333335 124.19478285047744 86.26333333333335 131.88826497395834 86.26333333333335C 139.58174709743923 86.26333333333335 146.17616034613718 61.616666666666674 153.86964246961807 61.616666666666674C 161.56312459309896 61.616666666666674 168.15753784179688 61.616666666666674 175.85101996527777 61.616666666666674C 183.54450208875866 61.616666666666674 190.1389153374566 12.323333333333323 197.8323974609375 12.323333333333323C 205.5258795844184 12.323333333333323 212.12029283311634 12.323333333333323 219.81377495659723 12.323333333333323C 227.50725708007812 12.323333333333323 234.10167032877607 49.29333333333335 241.79515245225696 49.29333333333335C 249.48863457573785 49.29333333333335 256.08304782443577 49.29333333333335 263.7765299479167 49.29333333333335C 271.4700120713976 49.29333333333335 278.0644253200955 12.323333333333323 285.7579074435764 12.323333333333323C 293.45138956705733 12.323333333333323 300.0458028157552 12.323333333333323 307.73928493923614 12.323333333333323C 315.43276706271706 12.323333333333323 322.02718031141495 61.616666666666674 329.72066243489587 61.616666666666674C 337.41414455837673 61.616666666666674 344.0085578070747 61.616666666666674 351.70203993055554 61.616666666666674C 359.39552205403646 61.616666666666674 365.98993530273435 86.26333333333335 373.68341742621527 86.26333333333335C 381.3768995496962 86.26333333333335 387.9713127983941 86.26333333333335 395.664794921875 86.26333333333335" pathFrom="M -1 295.76L -1 295.76L 21.98137749565972 295.76L 43.96275499131944 295.76L 65.94413248697917 295.76L 87.92550998263889 295.76L 109.90688747829861 295.76L 131.88826497395834 295.76L 153.86964246961807 295.76L 175.85101996527777 295.76L 197.8323974609375 295.76L 219.81377495659723 295.76L 241.79515245225696 295.76L 263.7765299479167 295.76L 285.7579074435764 295.76L 307.73928493923614 295.76L 329.72066243489587 295.76L 351.70203993055554 295.76L 373.68341742621527 295.76L 395.664794921875 295.76" fill-rule="evenodd"></path><g id="SvgjsG1739" class="apexcharts-series-markers-wrap" data:realIndex="1"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1849" r="0" cx="0" cy="0" class="apexcharts-marker wx5289i21 no-pointer-events" stroke="#3e97ff" fill="#3e97ff" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1731" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1740" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1842" x1="0" y1="0" x2="0" y2="221.82" stroke="#50cd89 #3E97FF" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="221.82" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><line id="SvgjsLine1843" x1="0" y1="0" x2="395.664794921875" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1844" x1="0" y1="0" x2="395.664794921875" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1845" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1846" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1847" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1850" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1851" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><g id="SvgjsG1806" class="apexcharts-yaxis" rel="0" transform="translate(17.835205078125, 0)"><g id="SvgjsG1807" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1809" font-family="inherit" x="20" y="31.6" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1810">120</tspan><title>120</title></text><text id="SvgjsText1812" font-family="inherit" x="20" y="68.57" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1813">105</tspan><title>105</title></text><text id="SvgjsText1815" font-family="inherit" x="20" y="105.53999999999999" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1816">90</tspan><title>90</title></text><text id="SvgjsText1818" font-family="inherit" x="20" y="142.51" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1819">75</tspan><title>75</title></text><text id="SvgjsText1821" font-family="inherit" x="20" y="179.48" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1822">60</tspan><title>60</title></text><text id="SvgjsText1824" font-family="inherit" x="20" y="216.45" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1825">45</tspan><title>45</title></text><text id="SvgjsText1827" font-family="inherit" x="20" y="253.42" text-anchor="end" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#a1a5b7" class="apexcharts-text apexcharts-yaxis-label " style="font-family: inherit;"><tspan id="SvgjsTspan1828">30</tspan><title>30</title></text></g></g><rect id="SvgjsRect1841" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1722" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 150px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(80, 205, 137);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(62, 151, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
        <!--end::Chart--> 
    </div>
    <!--end::Card body-->
</div>
<!--end::Chart widget 36-->    </div>
    <!--end::Col-->  
</div>
<!--end::Row-->

<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">    
    <!--begin::Col-->
    <div class="col-xl-6">
        
<!--begin::Card widget 19-->
   <div class="card card-flush h-lg-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">            
            <span class="card-label fw-bold text-dark">Performance</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">1,046 Inbound Calls today</span>
        </h3>
        <!--end::Title-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">   
            <!--begin::Label-->  
            <span class="badge badge-light-danger fs-base mt-n3">                                
                <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i> 
                7.4%
            </span> 
            <!--end::Label-->    
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end pt-6">
        <!--begin::Row-->
        <div class="row align-items-center mx-0 w-100">            
            <!--begin::Col-->
            <div class="col-7 px-0">
                <!--begin::Labels-->
                <div class="d-flex flex-column content-justify-center">
                    <!--begin::Label-->
                    <div class="d-flex fs-6 fw-semibold align-items-center">
                        <!--begin::Bullet-->
                        <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                        <!--end::Bullet-->

                        <!--begin::Label-->
                        <div class="fs-5 fw-bold text-gray-600 me-5">CRM Team Performance:</div>
                        <!--end::Label-->

                        <!--begin::Stats-->
                        <div class="ms-auto fw-bolder text-gray-700 text-end">72.56%</div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Label-->

                    <!--begin::Label-->
                    <div class="d-flex fs-6 fw-semibold align-items-center my-4">
                        <!--begin::Bullet-->
                        <div class="bullet bg-primary me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                        <!--end::Bullet-->

                        <!--begin::Label-->
                        <div class="fs-5 fw-bold text-gray-600 me-5">Recurring Calls:</div>
                        <!--end::Label-->                  

                        <!--begin::Stats-->
                        <div class="ms-auto fw-bolder text-gray-700 text-end">29.34%</div>
                        <!--end::Stats-->                    
                    </div>
                    <!--end::Label-->

                    <!--begin::Label-->
                    <div class="d-flex fs-6 fw-semibold align-items-center">
                        <!--begin::Bullet-->
                        <div class="bullet me-3" style="border-radius: 3px;background-color: #E4E6EF;width: 12px;height: 12px"></div>
                        <!--end::Bullet-->

                        <!--begin::Label-->
                        <div class="fs-5 fw-bold text-gray-600 me-5">Tickets Raised:</div>
                        <!--end::Label-->                   

                        <!--begin::Stats-->
                        <div class="ms-auto fw-bolder text-gray-700 text-end">17.83%</div>
                        <!--end::Stats-->                      
                    </div>
                    <!--end::Label-->
                </div>
                <!--end::Labels-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->           
            <div class="col-5 d-flex justify-content-end px-0">
                <!--begin::Chart-->           
                <div id="kt_card_widget_19_chart" class="min-h-auto h-150px w-150px" data-kt-size="150" data-kt-line="25">
                <span></span><canvas height="150" width="150"></canvas></div>           
                <!--end::Chart-->
            </div>           
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 19-->    </div>
    <!--end::Col--> 
    
    <!--begin::Col-->
    <div class="col-xl-6">
                                <div class="col-xl-12">
        <!--begin::Card widget 3-->
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100" style="background-color: #F1416C;background-image:url('/metronic8/demo38/assets/media/svg/shapes/wave-bg-red.svg')">
    <!--begin::Header-->
 
   <div class="clock">
        <div class="hourHand"></div>
        <div class="minuteHand"></div>
        <div class="secondHand"></div>
        <div class="center"></div>
        <div class="time"></div>
        <ul>
            <li><span>1</span></li>
            <li><span>2</span></li>
            <li><span>3</span></li>
            <li><span>4</span></li>
            <li><span>5</span></li>
            <li><span>6</span></li>
            <li><span>7</span></li>
            <li><span>8</span></li>
            <li><span>9</span></li>
            <li><span>10</span></li>
            <li><span>11</span></li>
            <li><span>12</span></li>
        </ul>
    </div>

    <audio src="" class="audio"   ></audio>

               

     </div>
    <!--end::Col--> 
</div>
</div>
</div>
{{-- 
                    <div class="card-body py-3">
                           <span class="badge badge-danger">AAT PAID CANDIDATE</span> 
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">#</th>
                                            <th class="min-w-140px"> Booking ID </th>
                                            <th class="min-w-140px"> Exam Type </th>
                                         
                                            <th class="min-w-100px"> Name </th>
                                            <th class="min-w-100px">Email</th>
                                            <th class="min-w-100px">Notes</th>
                                            
                                            
                                            <th class="min-w-140px">Booking Date</th>
                                        
                                            <th class="min-w-140px">Payment Method</th>
                                            
                                            <th class="min-w-100px text-end">More</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   	@php
                                   	$allmydata=$pidcoint=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)
                                   	->where('is_refunded',0)
                                   	->where('is_confirm_booking',0)
                                   	->where('main_exam_type','AAT')
                                   	->get();
                                   	@endphp
                                    @foreach($allmydata as $key => $data)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $data->booking_id }}
                                            
                                             <br> @if( $data->is_seen==0)
                                         <a href="{{url('admin/exambooking/maindetails/'.$data->id)}}">
                                             <span class="badge badge-danger">unseen</span> </a>
                                             
                                             @endif
                                            </td>
                                            <td> 
                                            <a style="color:black" href="{{url('admin/exambooking/maindetails/'.$data->id)}}"> {{ $data->main_exam_type }} </a><br>
                                            @if($data->is_confirm_booking==1)
                                            <span class="badge badge-success">Booking Confirmed</span>
                                            @endif
                                            </td>
                                         
                                            <td> {{ $data->first_name}} {{ $data->last_name}}</td>
                                            <td><a style="color:black" href="{{url('admin/exambooking/maindetails/'.$data->id)}}">  {{ $data->email }}<br> @if($data->phone) {{ $data->phone  }} @else 'Doesn't have a number' @endif </a> </td>
                                            <td>
                                                <textarea id="{{ $data->id }}" name="mynots" onchange="insertupdate(this)">{{ $data->notes }}</textarea>
                                            </td>
                                            <td> {{ $data->created_at->format('d-M-Y') }} </td>
                                            <td> @if($data->payment_option ==null) <span class="badge badge-danger">unpaid</span> @else <span class="badge badge-success"> {{  $data->payment_option  }} </span> @endif</td>
                                         
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Manage
                                                
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{url('admin/exambooking/maindetails/'.$data->id)}}" class="menu-link px-3">View</a>
                                                    </div>
                                                   <div class="menu-item px-3">
                                                        <a href=" {{ url('candidate/details/exports/'.$data->booking_id) }}" class="menu-link px-3">Export Pdf</a>
                                                    </div>
                                                    
                                                    <div class="menu-item px-3">
                                                        <a href=" {{ url('admin/export/exam-booking-details/'.$data->booking_id) }}" class="menu-link px-3">All Export Pdf</a>
                                                    </div>
                                                    
                                                    @if($data->is_paid==0)
                                                     <div class="menu-item px-3">
                                                        <a href=" {{ url('admin/exambooking/sendduepaymemt/'.$data->id) }}" class="menu-link px-3">Due Payment Alert</a>
                                                    </div>
                                                    
                                                    @endif
                                                    
                                                    
                                                     <div class="menu-item px-3">
                                                        <a href=" {{ url('/admin/user/notify/'.$data->user_id) }}" class="menu-link px-3">Notify Chats</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a id="delete" href="{{url('admin/exambooking/delete/'.$data->id)}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                                    </div>
                                                       
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                	
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                      
                    </div>


                        <div class="card-body py-3">
                           <span class="badge badge-primary">ACCA PAID CANDIDATE</span> 
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">#</th>
                                            <th class="min-w-140px"> Booking ID </th>
                                            <th class="min-w-140px"> Exam Type </th>
                                         
                                            <th class="min-w-100px"> Name </th>
                                            <th class="min-w-100px">Email</th>
                                            <th class="min-w-100px">Notes</th>
                                            
                                            
                                            <th class="min-w-140px">Booking Date</th>
                                        
                                            <th class="min-w-140px">Payment Method</th>
                                            
                                            <th class="min-w-100px text-end">More</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   	@php
                                   	$allmydata=$pidcoint=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)
                                   	->where('is_refunded',0)
                                   	->where('is_confirm_booking',0)
                                   	->where('main_exam_type','ACCA')
                                   	->get();
                                   	@endphp
                                    @foreach($allmydata as $key => $data)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $data->booking_id }}
                                            
                                             <br> @if( $data->is_seen==0)
                                         <a href="{{url('admin/exambooking/maindetails/'.$data->id)}}">
                                             <span class="badge badge-danger">unseen</span> </a>
                                             
                                             @endif
                                            </td>
                                            <td> 
                                            <a style="color:black" href="{{url('admin/exambooking/maindetails/'.$data->id)}}"> {{ $data->main_exam_type }} </a><br>
                                            @if($data->is_confirm_booking==1)
                                            <span class="badge badge-success">Booking Confirmed</span>
                                            @endif
                                            </td>
                                         
                                            <td> {{ $data->first_name}} {{ $data->last_name}}</td>
                                            <td><a style="color:black" href="{{url('admin/exambooking/maindetails/'.$data->id)}}">  {{ $data->email }}<br> @if($data->phone) {{ $data->phone  }} @else 'Doesn't have a number' @endif </a> </td>
                                            <td>
                                                <textarea id="{{ $data->id }}" name="mynots" onchange="insertupdate(this)">{{ $data->notes }}</textarea>
                                            </td>
                                            <td> {{ $data->created_at->format('d-M-Y') }} </td>
                                            <td> @if($data->payment_option ==null) <span class="badge badge-danger">unpaid</span> @else <span class="badge badge-success"> {{  $data->payment_option  }} </span> @endif</td>
                                         
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Manage
                                                
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{url('admin/exambooking/maindetails/'.$data->id)}}" class="menu-link px-3">View</a>
                                                    </div>
                                                   <div class="menu-item px-3">
                                                        <a href=" {{ url('candidate/details/exports/'.$data->booking_id) }}" class="menu-link px-3">Export Pdf</a>
                                                    </div>
                                                    
                                                    <div class="menu-item px-3">
                                                        <a href=" {{ url('admin/export/exam-booking-details/'.$data->booking_id) }}" class="menu-link px-3">All Export Pdf</a>
                                                    </div>
                                                    
                                                    @if($data->is_paid==0)
                                                     <div class="menu-item px-3">
                                                        <a href=" {{ url('admin/exambooking/sendduepaymemt/'.$data->id) }}" class="menu-link px-3">Due Payment Alert</a>
                                                    </div>
                                                    
                                                    @endif
                                                    
                                                    
                                                     <div class="menu-item px-3">
                                                        <a href=" {{ url('/admin/user/notify/'.$data->user_id) }}" class="menu-link px-3">Notify Chats</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a id="delete" href="{{url('admin/exambooking/delete/'.$data->id)}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                                    </div>
                                                       
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                	
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <div class="card-body py-3">
                           <span class="badge badge-warning">Functional Skills PAID CANDIDATE</span> 
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" id="dataTableExample1" class="data-table" style="width:100%;font-size:12px" >
                                    <!--begin::Table head-->
                                    <thead class="text-center">
                                        <tr class="fw-bolder text-muted">
                                            <th class="">#</th>
                                            <th class="min-w-140px"> Booking ID </th>
                                            <th class="min-w-140px"> Exam Type </th>
                                         
                                            <th class="min-w-100px"> Name </th>
                                            <th class="min-w-100px">Email</th>
                                            <th class="min-w-100px">Notes</th>
                                            
                                            
                                            <th class="min-w-140px">Booking Date</th>
                                        
                                            <th class="min-w-140px">Payment Method</th>
                                            
                                            <th class="min-w-100px text-end">More</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                   	@php
                                   	$allmydata=$pidcoint=App\Models\ExamRequest::orderBy('id','DESC')->where('is_completed_from',1)->where('is_deleted',1)->where('is_paid',1)
                                   	->where('is_refunded',0)
                                   	->where('is_confirm_booking',0)
                                   	->where('main_exam_type','Functional Skills')
                                   	->get();
                                   	@endphp
                                    @foreach($allmydata as $key => $data)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td> {{ $data->booking_id }}
                                            
                                             <br> @if( $data->is_seen==0)
                                         <a href="{{url('admin/exambooking/maindetails/'.$data->id)}}">
                                             <span class="badge badge-danger">unseen</span> </a>
                                             
                                             @endif
                                            </td>
                                            <td> 
                                            <a style="color:black" href="{{url('admin/exambooking/maindetails/'.$data->id)}}"> {{ $data->main_exam_type }} </a><br>
                                            @if($data->is_confirm_booking==1)
                                            <span class="badge badge-success">Booking Confirmed</span>
                                            @endif
                                            </td>
                                         
                                            <td> {{ $data->first_name}} {{ $data->last_name}}</td>
                                            <td><a style="color:black" href="{{url('admin/exambooking/maindetails/'.$data->id)}}">  {{ $data->email }}<br> @if($data->phone) {{ $data->phone  }} @else 'Doesn't have a number' @endif </a> </td>
                                            <td>
                                                <textarea id="{{ $data->id }}" name="mynots" onchange="insertupdate(this)">{{ $data->notes }}</textarea>
                                            </td>
                                            <td> {{ $data->created_at->format('d-M-Y') }} </td>
                                            <td> @if($data->payment_option ==null) <span class="badge badge-danger">unpaid</span> @else <span class="badge badge-success"> {{  $data->payment_option  }} </span> @endif</td>
                                         
                                            <td class="text-end">
                                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Manage
                                                
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true" style="">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{url('admin/exambooking/maindetails/'.$data->id)}}" class="menu-link px-3">View</a>
                                                    </div>
                                                   <div class="menu-item px-3">
                                                        <a href=" {{ url('candidate/details/exports/'.$data->booking_id) }}" class="menu-link px-3">Export Pdf</a>
                                                    </div>
                                                    
                                                    <div class="menu-item px-3">
                                                        <a href=" {{ url('admin/export/exam-booking-details/'.$data->booking_id) }}" class="menu-link px-3">All Export Pdf</a>
                                                    </div>
                                                    
                                                    @if($data->is_paid==0)
                                                     <div class="menu-item px-3">
                                                        <a href=" {{ url('admin/exambooking/sendduepaymemt/'.$data->id) }}" class="menu-link px-3">Due Payment Alert</a>
                                                    </div>
                                                    
                                                    @endif
                                                    
                                                    
                                                     <div class="menu-item px-3">
                                                        <a href=" {{ url('/admin/user/notify/'.$data->user_id) }}" class="menu-link px-3">Notify Chats</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a id="delete" href="{{url('admin/exambooking/delete/'.$data->id)}}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                                    </div>
                                                       
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                	
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
 --}}
<style>
    .clock{
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background-color: antiquewhite;
    margin: 100px auto 10px auto;
    position: relative;
    border:20px solid cornsilk;

}
.center{
    background-color: #000;
    position: absolute;
    left: calc(50% - 10px);
    top:  calc(50% - 10px);
    width: 20px;
    height: 20px;
    border-radius: 50%;
    z-index: 20;
}
.hourHand{
    width: 10px;
    height: 75px;
    background-color: #000;
    transform-origin: bottom center;
    border-radius: 4px;
    position: absolute;
    top: 64px;
    left: 125px;
    z-index: 10;
    transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
      transform: rotate(360deg);

}
.minuteHand{
    width: 5px;
    height: 120px;
    background-color: #000;
    transform-origin: bottom center;
    border-radius: 4px;
    position: absolute;
    top: 16px;
    left: 129px;
    z-index: 9;
    transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
      transform: rotate(90deg);

}
.secondHand{
    width: 2px;
    height: 120px;
    background-color:red;
    transform-origin: bottom center;
    border-radius: 4px;
    position: absolute;
   top: 16px;
    left: 129px;
    transition: all 0.06s;
    transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
    z-index: 8;  
      transform: rotate(360deg);

}
.time{
    position: absolute;
    top: 45%;
    left: 10%;
    border: 1px solid #fff8dc;
    background-color: #fff;
    padding: 5px;
    display: block;
    box-shadow: inset 0px 2px 5px rgba(0,0,0,.4);
    border-radius: 5px;
    min-width: 70px;
    height: 15px;

}
.time small{
    color:red;
    transition: all 0.05s;
    transition-timing-function: cubic-bezier(0.1, 2.7, 0.58, 1);
}

.clock ul{
    list-style: none;
    padding: 0;

}
.clock ul li{
    position: absolute;
    width:20px;
    height:20px;
    text-align: center;
    line-height: 20px;
    font-size: 10px;
    color:red;
}
.clock ul li:nth-child(1){
    right: 22%;
    top:6.5%;
}
.clock ul li:nth-child(2){
    right: 6%;
    top:25%;
}
.clock ul li:nth-child(3){
    right: 1%;
    top:calc(50% - 10px);
    color:#000;
    font-size: 20px;
    font-weight: bold;
}
.clock ul li:nth-child(4){
    right: 6%;
    top:69%;
}
.clock ul li:nth-child(5){
    right: 22%;
    top:84%;
}
.clock ul li:nth-child(6){
    right: calc(50% - 10px);
    top:calc(99% - 20px);
    color:#000;
    font-size: 20px;
    font-weight: bold;
}
.clock ul li:nth-child(7){
    left: 22%;
    top:84%;
}
.clock ul li:nth-child(8){
    left: 6%;
    top:69%;
}
.clock ul li:nth-child(9){
    left: 1%;
    top:calc(50% - 10px);
    color:#000;
    font-size: 20px;
    font-weight: bold;
}
.clock ul li:nth-child(10){
    left: 6%;
    top:25%;
}
.clock ul li:nth-child(11){
    left: 22%;
    top:6.5%;
}
.clock ul li:nth-child(12){
    right: calc(50% - 10px);
    top:1%;
    color:#000;
    font-size: 20px;
    font-weight: bold;
}




/*  footer   */
footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida  Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
footer .fa-heart{
    color: red;
}
footer .fa-dev{
    color: #fff;
}
footer .fa-twitter-square{
  color:#1da0f1;
}
footer .fa-instagram{
  color: #f0007c;
}
fotter .fa-linkedin{
  color:#0073b1;
}
footer .fa-codepen{
  color:#fff
}
footer a {
    color: #3c97bf;
    text-decoration: none;
  margin-right:5px;
}
.youtubeBtn{
    position: fixed;
    left: 50%;
  transform:translatex(-50%);
    bottom: 45px;
    cursor: pointer;
    transition: all .3s;
    vertical-align: middle;
    text-align: center;
    display: inline-block;
}
.youtubeBtn i{
   font-size:20px;
  float:left;
}
.youtubeBtn a{
    color:#ff0000;
    animation: youtubeAnim 1000ms linear infinite;
  float:right;
}
.youtubeBtn a:hover{
  color:#c9110f;
  transition:all .3s ease-in-out;
}
.youtubeBtn i:active{
  transform:scale(.9);
  transition:all .3s ease-in-out;
}
.youtubeBtn span{
    font-family: 'Lato';
    font-weight: bold;
    color: #fff;
    display: block;
    font-size: 12px;
    float: right;
    line-height: 20px;
    padding-left: 5px;
  
}

@keyframes youtubeAnim{
  0%,100%{
    color:#c9110f;
  }
  50%{
    color:#ff0000;
  }
}
/* footer  */
</style>
<script>
    window.onload = function() {

const hourHand = document.querySelector('.hourHand');
    const minuteHand = document.querySelector('.minuteHand');
    const secondHand = document.querySelector('.secondHand');
    const time = document.querySelector('.time');
    const clock = document.querySelector('.clock');
    const audio = document.querySelector('.audio');

    function setDate(){
        const today = new Date();
        
        const second = today.getSeconds();
        const secondDeg = ((second / 60) * 360) + 360; 
        secondHand.style.transform = `rotate(${secondDeg}deg)`;
      
        audio.play();
        
        const minute = today.getMinutes();
        const minuteDeg = ((minute / 60) * 360); 
        minuteHand.style.transform = `rotate(${minuteDeg}deg)`;

        const hour = today.getHours();
        const hourDeg = ((hour / 12 ) * 360 ); 
        hourHand.style.transform = `rotate(${hourDeg}deg)`;
        
        time.innerHTML = '<span>' + '<strong>' + hour + '</strong>' + ' : ' + minute + ' : ' + '<small>' + second +'</small>'+ '</span>';

        }
  
    setInterval(setDate, 1000);
 
}
</script>

<script>
    function insertupdate(el){
        var id=el.id;
        var val=el.value;
       
            $.ajax({
                 url: "{{  url('admin/update/examnotes') }}",
                 type:"GET",
                 data: { 
                     "val": val,
                     "id": id,
                     
                 } ,
                 success:function(data) {

                        if(data=='success'){
                            iziToast.success({
            					message: 'Notes add Success',
            					'position': 'topRight'
            				});
                        }else if(data=='faild'){
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