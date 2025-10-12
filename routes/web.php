<?php

use Illuminate\Support\Facades\Route;

use App\Models\ExamRequest;
use App\Models\User;
use App\Models\UcasRequest;
use App\Models\Subject;

Auth::routes();

Route::get('/testing-payment', function () {
    $data=User::where('email',"dashabatista8@gmail.com")->first();
    dd($data);
    // return view('frontend.testingPayment.newpayment',compact('data'));
});



Route::get('/admin/address-print', function () {
    
    return view('backend.addressInvelop.index');
});

Route::get('/my-user-data', function () {
    $data=Subject::where('name','1168879109')->orderBy('id','DESC')->first();
    dd($data);
   
});

Route::get('/email-check', function () {
    
    $data=User::where('email','childsalana@gmail.com')->first();
   
     dd($data);
   
});






Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});



Route::get('/is_not_completed', function () {
    dd(ExamRequest::where('is_completed_from',0)->get());
});

Route::get('/is_not_completed/delete', function () {
    // $delete=ExamRequest::where('is_completed_from',0)->delete();
    // if($delete){
    //     return "ok delete";
    // }else{
    //     return "not yet";
    // }
});

Route::get('/forget-password', [App\Http\Controllers\Frontend\UserLoginController::class, 'forgetpass'])
->name('login.forgetpass');

Route::post('/forget-password', [App\Http\Controllers\Frontend\UserLoginController::class, 'forgetpasssubmit'])
->name('login.forgetpass');


Route::get('forget/password-update/{email}/{id}', [App\Http\Controllers\Frontend\UserLoginController::class, 'forgetpasssupdate'])
->name('login.forgetpassupdate');

Route::post('forget/password-update/{email}/{id}', [App\Http\Controllers\Frontend\UserLoginController::class, 'forgetpasssupdatesubmit']);

// 


Route::get('/step-maths-exam-centre', [App\Http\Controllers\Frontend\FrontendController::class, 'stepExams']);

// 

Route::get('/reviews', [App\Http\Controllers\Frontend\FrontendController::class, 'reviews']);
Route::get('/venue-hire', [App\Http\Controllers\Frontend\FrontendController::class, 'vanueHire']);
//new url
Route::get('/support-inquery/{support_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'supportsInquery']);

Route::post('/support-inquery/{support_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'supportsInqueryStore']);
// new url

Route::get('/courses', [App\Http\Controllers\Frontend\FrontendController::class, 'course']);

Route::get('/courses/details/{slug}/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'courseDetails']);


Route::get('/alevel-courses', [App\Http\Controllers\Frontend\FrontendController::class, 'alevelcourse']);

Route::get('/gcse-courses', [App\Http\Controllers\Frontend\FrontendController::class, 'gcsecourse']);



Route::get('/proctor-exam-details', [App\Http\Controllers\Frontend\FrontendController::class, 'proctoringServices']);

Route::get('/exam-timetables', [App\Http\Controllers\Frontend\FrontendController::class, 'examTimetable']);


Route::get('/refund-policy', [App\Http\Controllers\Frontend\FrontendController::class, 'refundpolicy']);
// 
Route::get('/ilstallment-refund-policy', [App\Http\Controllers\Frontend\FrontendController::class, 'ilstallmentrefundpolicy']);

//

Route::get('/terms-condition-update', [App\Http\Controllers\Frontend\FrontendController::class, 'termsConditionUpdatepage']);


Route::get('/june-24/candidate-verification', [App\Http\Controllers\Frontend\FrontendController::class, 'candidateVerification']);

Route::get('/cat4-practice-test', [App\Http\Controllers\Frontend\FrontendController::class, 'carFourTest']);

Route::get('/work-for-examcentrelondon', [App\Http\Controllers\Frontend\FrontendController::class, 'workforexamcentre']);
Route::get('/non-exam-assesment', [App\Http\Controllers\Frontend\FrontendController::class, 'nonexamassesment']);

Route::post('/blog/comment', [App\Http\Controllers\Frontend\FrontendController::class, 'BlogComment']);
// 
Route::get('/category/{cate_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'categoryBlog']);



Route::get('/exam-seating-plan', [App\Http\Controllers\Frontend\FrontendController::class, 'examSeatingPlan']);
Route::get('/our-tutoring-centre', [App\Http\Controllers\Frontend\FrontendController::class, 'tutoringCentre']);
Route::get('/revision-course', [App\Http\Controllers\Frontend\FrontendController::class, 'revisionCourse']);
Route::get('/gcse-revision-course', [App\Http\Controllers\Frontend\FrontendController::class, 'gcseRevisionCourse']);
Route::get('/alevel-revision-course', [App\Http\Controllers\Frontend\FrontendController::class, 'alevelRevisionCourse']);

// new url endappslanding
Route::get('/examcentrelondon-apps-information', [App\Http\Controllers\Frontend\FrontendController::class, 'appsInformation']);



Route::post('admin/main-iesb-payment/update', [App\Http\Controllers\Admin\AboutUsController::class, 'mainisebPayments']);
Route::get('admin/iesb-payment/update/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isebPayments']);

Route::get('admin/iesb/index', [App\Http\Controllers\Admin\AboutUsController::class, 'isebIndex'])->name('admin.iesb.index');
Route::get('admin/iesb/details/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isebDetails']);
Route::get('admin/iesb/export/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isebexport']);
Route::get('admin/iesb/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isebdelete']);
Route::get('admin/iesb/examconfirmation/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isebConfirmation']);
Route::post('admin/iseb-test/confirmation/submit', [App\Http\Controllers\Admin\AboutUsController::class, 'isebConfirmationSubmit']);




Route::get('admin/exam-all-topic/index', [App\Http\Controllers\Admin\AboutUsController::class, 'topicIndex']);
Route::get('admin/exam-all-topic/create', [App\Http\Controllers\Admin\AboutUsController::class, 'topicCreate']);
Route::post('admin/exam-all-topic/create', [App\Http\Controllers\Admin\AboutUsController::class, 'topicStore']);

Route::get('admin/delete/topics/{id}', [App\Http\Controllers\Admin\AssesmentController::class, 'ExamtopicDelete']);
 Route::get('admin/edit/topics/{id}', [App\Http\Controllers\Admin\AssesmentController::class, 'topicEdit']);

 Route::post('admin/update/topics', [App\Http\Controllers\Admin\AssesmentController::class, 'topicUpdate']);



Route::get('admin/exam-equipment/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentDelete']);

Route::get('admin/exam-equipment/edit/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentEdit']);


Route::get('admin/exam-equipment/index', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentIndex'])->name('admin.exam-equipment.index');

Route::get('admin/exam-equipment/create', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentCreate']);



Route::post('admin/exam-equipment/create', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentStore']);

Route::post('admin/exam-equipment/update', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentUpdate']);


Route::get('get/subject-equipemt/all/{type_id}/{exam_board}', [App\Http\Controllers\Admin\AboutUsController::class, 'equipmentGetSubject']);



// EXAMTIMETABLES
Route::get('admin/exam-timetables/create', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesCreate']);


Route::get('admin/exam-timetables/active/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesActive']);

Route::get('admin/exam-timetables/deactive/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesDeactive']);

Route::get('admin/exam-timetables/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesDelete']);


Route::get('admin/exam-timetables/edit/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesEdit']);


Route::get('admin/exam-timetables/index', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesIndex'])->name('admin.exam-timetables.index');






Route::post('admin/exam-timetables/create', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesSubmit']);


Route::post('admin/exam-timetables/update', [App\Http\Controllers\Admin\AboutUsController::class, 'examtimetablesUpdate']);





Route::post('admin/unvisible-update/data', [App\Http\Controllers\Admin\AboutUsController::class, 'unvisibleUpdate']);

Route::get('admin/for-checking/data', [App\Http\Controllers\Admin\AboutUsController::class, 'forchecking'])->name('admin.forrecheck.subjects');

Route::get('admin/date-wise/candidates', [App\Http\Controllers\Admin\AboutUsController::class, 'dateWiseCandidates'])->name('admin.dateWiseCandidates.subjects');
Route::post('admin/date-wise/candidates', [App\Http\Controllers\Admin\AboutUsController::class, 'dateWiseCandidatessubmit']);



Route::get('/admin/exam-booking/iscompleted/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'iscompleteddemo']);


Route::get('get/supports/board/all/{type_id}', [App\Http\Controllers\Admin\AboutUsController::class, 'examboard']);


Route::get('get/supports/allsubject/all/{type_id}/{series_id}/{series_main}', [App\Http\Controllers\Admin\AboutUsController::class, 'getSubjectexamboard']);

Route::get('get/supports/individual-subject/all/{type_id}/{series_main}', [App\Http\Controllers\Admin\AboutUsController::class, 'getIndividualSubjectexamboard']);



Route::get('get/exam-series/alldate/{series_id}', [App\Http\Controllers\Admin\AboutUsController::class, 'GetSeriesdate']);






Route::get('/get/mydate/service/{mydate}', [App\Http\Controllers\Frontend\FrontendController::class, 'myExamdateService']);


Route::get('admin/get/unused-data', [App\Http\Controllers\Admin\ExamRequestController::class, 'deleteunUseddata']);
Route::post('add/special/access/invoice', [App\Http\Controllers\Admin\ExamRequestController::class, 'SpecialAccessInvoice']);



Route::get('admin/candidate/payment/enable/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'enablePayment']);


Route::get('admin/centre/result-delete/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'centreresultDelete']);
Route::get('admin/centre/result-print/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'centreresultPrint']);
Route::get('admin/centre/result/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'centreresult']);
Route::post('admin/centre/result/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'centreresultSubmit']);





// 

Route::get('admin/mockupdate/examnotes', [App\Http\Controllers\Admin\MockexamRequestController::class, 'Mocknotes']);


Route::get('admin/mock-test/index', [App\Http\Controllers\Admin\MockexamRequestController::class, 'index'])->name('admin.mock.test-request');



Route::get('admin/special-access/candidate', [App\Http\Controllers\Admin\AboutUsController::class, 'specialAccess'])->name('admin.SpecialAccess.list');


Route::get('admin/Installments-candidate/payment/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'paymentDetails']);
Route::post('admin/Installments-candidate/payment/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'UpdatePaymentDetails']);

Route::get('admin/Installments-candidate/verified/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'paymentVerified']);
Route::get('admin/Installments-candidate/unverified/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'paymentUnverified']);
Route::get('admin/Installments-candidate/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'paymentDelete']);


Route::get('admin/functional-skills/result/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'fsresult']);





Route::get('admin/Installments-candidate/index', [App\Http\Controllers\Admin\AboutUsController::class, 'Installments'])->name('admin.candidate.Installments');

// fs tuition

Route::get('admin/functional-skill-tuition/index', [App\Http\Controllers\Admin\AboutUsController::class, 'fsIndex']);
Route::get('admin/functional-skill-tuition/details/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'fsdetails']);

Route::get('admin/functional-skill-tuition/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'fsdelete']);
Route::get('admin/series-exam/booking/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'SeriesAllBooking']);

Route::get('admin/functional-skill-tuition/export/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'fsdexport']);
Route::get('admin/get/fs-booking-notes', [App\Http\Controllers\Admin\AboutUsController::class, 'fsNotes']);
// seating plan

Route::get('admin/skill-exam/seating-plan/index', [App\Http\Controllers\Admin\AboutUsController::class, 'seatingPlanIndex']);
Route::post('admin/skill-exam/seating-plan/index', [App\Http\Controllers\Admin\AboutUsController::class, 'seatingPlanSearch']);
// 
Route::get('admin/custom-invoice/create', [App\Http\Controllers\Admin\AboutUsController::class, 'invoiceCreate']);
Route::post('admin/custom-invoice/create', [App\Http\Controllers\Admin\AboutUsController::class, 'invoiceCreateSubmit']);


Route::get('admin/merit-custom-invoice/create', [App\Http\Controllers\Admin\AboutUsController::class, 'meritinvoiceCreate']);
Route::post('admin/merit-custom-invoice/create', [App\Http\Controllers\Admin\AboutUsController::class, 'meritinvoiceCreateSubmit']);
Route::get('admin/merit-custom-invoice/print/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'meritinvoicePrint']);


Route::get('admin/merit-custom-invoice/index', [App\Http\Controllers\Admin\AboutUsController::class, 'meritinvoiceIndex']);
Route::get('admin/merit-custom-invoice/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'meritinvoiceDelete']);
Route::get('admin/merit-custom-invoice/edit/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'meritinvoiceEdit']);


// supports
Route::get('admin/candidate-certificate/index', [App\Http\Controllers\Admin\AboutUsController::class, 'certificateIndex']);
Route::get('admin/candidate-certificate-list/create', [App\Http\Controllers\Admin\AboutUsController::class, 'certificateCreate']);


// 
Route::post('admin/supports/message-reply/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'messageListSubmit']);
Route::get('admin/supports/message-reply/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'messageList']);
Route::get('admin/supports/exam-booking/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'examBookingList']);

Route::get('admin/supports/mail/export/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'mailExport']);
Route::get('admin/supports/draft-index', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsSaveDraftIndex']);


Route::get('admin/supports/index', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsIndex']);
Route::get('admin/update/supportsnotes', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsNotesUpdate']);





Route::get('admin/supports-first-booking/alert', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsFirstPaymentalert']);
Route::get('admin/supports-second-booking/alert', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsSecondPaymentalert']);


Route::get('admin/supports/create', [App\Http\Controllers\Admin\AboutUsController::class, 'supportscreate']);
Route::get('admin/supports/create', [App\Http\Controllers\Admin\AboutUsController::class, 'supportscreate']);
Route::post('admin/supports/create', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsStore']);
Route::get('admin/supports/edit/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsEdit']);
Route::post('admin/supports/update', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsUpdate']);
Route::get('admin/supports/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsDelete']);
Route::get('admin/supports/export/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsExport']);


Route::get('admin/supports-topic/search', [App\Http\Controllers\Admin\AboutUsController::class, 'supportsTopicSearch']);
// supports end


Route::get('admin/branch/index', [App\Http\Controllers\Admin\AboutUsController::class, 'branchIndex']);
Route::get('admin/branch-exam-time/deactive/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'branchTimeDeactive']);
Route::get('admin/branch-exam-time/active/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'branchTimeactive']);

Route::post('admin/branch-exam-time/create', [App\Http\Controllers\Admin\AboutUsController::class, 'branchTimeCreate']);

Route::get('admin/branch-exam-time/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'branchTimeDelete']);

Route::post('admin/forest-branch-exam-day-off/create', [App\Http\Controllers\Admin\AboutUsController::class, 'ForestgatebranchDayoff']);
Route::post('admin/ilford-branch-exam-day-off/create', [App\Http\Controllers\Admin\AboutUsController::class, 'IlfordLanebranchDayoff']);

Route::get('admin/ilford-branch-exam-day-off/delete/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'IlfordLanebranchDelete']);




Route::get('admin/mock-test/delete/{id}', [App\Http\Controllers\Admin\MockexamRequestController::class, 'delete']);
Route::get('admin/mock-test/completed/{id}', [App\Http\Controllers\Admin\MockexamRequestController::class, 'completed']);
Route::get('admin/mock-test/details/{id}', [App\Http\Controllers\Admin\MockexamRequestController::class, 'details']);
Route::get('admin/mock-test/export/{id}', [App\Http\Controllers\Admin\MockexamRequestController::class, 'export']);
Route::get('admin/mock-test/confirmation/{id}', [App\Http\Controllers\Admin\MockexamRequestController::class, 'mockConfirmation']);
Route::post('admin/mock-test/confirmation/submit', [App\Http\Controllers\Admin\MockexamRequestController::class, 'mockConfirmationSubmit']);
Route::get('admin/mock-test/canceled/{id}', [App\Http\Controllers\Admin\MockexamRequestController::class, 'canceled']);
Route::get('admin/get/mock-exam-notes/', [App\Http\Controllers\Admin\MockexamRequestController::class, 'addNotes']);



// installment

Route::get('/ilstallment-due-payment/exambooking/{booking_id}', [App\Http\Controllers\Frontend\InstallmentController::class, 'IlstallmentDuepayment']);
Route::post('/bankpayment-installment/session', [App\Http\Controllers\Frontend\InstallmentController::class, 'bankpaymentIns']);
Route::post('/cardpayment-installment/session', [App\Http\Controllers\Frontend\InstallmentController::class, 'cardPaymentIns']);
Route::get('/ilstallment-mybooked/{Installment_fee}/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\InstallmentController::class, 'success']);

// installment
Route::post('bankpayment-duepayment/session', [App\Http\Controllers\Frontend\InstallmentController::class, 'bankDuePaymentIns']);
Route::post('cardpayment-duepayment/session', [App\Http\Controllers\Frontend\InstallmentController::class, 'cardDuePaymentIns']);
Route::get('/due-payment-ilstallment-mybooked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\InstallmentController::class, 'Duepaymentsuccess']);


// due payment



Route::post('/myonlinepayment/session', [App\Http\Controllers\Frontend\PaymentController::class, 'session'])->name('myonlinepayment.session');
Route::get('/mybooked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\PaymentController::class, 'success'])->name('success');
Route::get('/checkout', [App\Http\Controllers\Frontend\PaymentController::class, 'checkout'])->name('checkout');


//custom login
Route::post('/userLogin', [App\Http\Controllers\Frontend\UserLoginController::class, 'customLogin'])
    ->name('login.custom');
Route::post('custom-registration', [App\Http\Controllers\Frontend\UserLoginController::class, 'customRegistration'])->name('register.custom');
Route::get('/email/verify/{email}/{id}', [App\Http\Controllers\Frontend\UserLoginController::class, 'email_verify']);
Route::post('/verifyCode', [App\Http\Controllers\Frontend\UserLoginController::class, 'verify_code'])
    ->name('verify.code');

// google Login
Route::get('auth/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);
//facebook login
Route::get('auth/facebook', [App\Http\Controllers\FacebookSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/facebook', [App\Http\Controllers\FacebookSocialiteController::class, 'handleCallback']);


Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'home']);


Route::get('/iseb-details
', [App\Http\Controllers\Frontend\FrontendController::class, 'isebDetails']);

Route::get('/special-access
', [App\Http\Controllers\Frontend\FrontendController::class, 'specialAccessPage']);



Route::get('/application-form', [App\Http\Controllers\Frontend\FrontendController::class, 'applicationform']);

Route::get('/filter-shop', [App\Http\Controllers\Frontend\FrontendController::class, 'filter_shop']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('admin/student-first-payment-all-send/send', [App\Http\Controllers\Admin\DashboardController::class, 'StudentFirstallEmailSend']);
Route::get('admin/student-second-payment-all-send/send', [App\Http\Controllers\Admin\DashboardController::class, 'StudentSecondallEmailSend']);


Route::get('admin/bulk-email-send/create', [App\Http\Controllers\Admin\DashboardController::class, 'bulkEmailSend'])->name('admin.bulk-email-send.create');
Route::post('admin/bulk-email-send/create', [App\Http\Controllers\Admin\DashboardController::class, 'bulkEmailSendStore']);



Route::get('/payment-receipt/print/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'paymentReceivedPrint']);

Route::get('/payment-receipt/index', [App\Http\Controllers\Admin\DashboardController::class, 'paymentReceivedIndex']);

Route::get('/payment-receipt/create', [App\Http\Controllers\Admin\DashboardController::class, 'paymentReceivedCreate']);

Route::get('/payment-receipt/edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'paymentReceivedEdit']);

Route::post('/payment-receipt/update', [App\Http\Controllers\Admin\DashboardController::class, 'paymentReceivedUpdate']);

Route::post('/payment-receipt/create', [App\Http\Controllers\Admin\DashboardController::class, 'paymentReceivedStore']);


Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');


Route::get('/admin/profile', [App\Http\Controllers\Admin\DashboardController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile-update', [App\Http\Controllers\Admin\DashboardController::class, 'adminProfileUpdate'])->name('admin.ProfileUpdate');
Route::post('/admin/profile-update', [App\Http\Controllers\Admin\DashboardController::class, 'adminProfileUpdateSubmit'])->name('admin.ProfileUpdate');

// 


// ucas
Route::get('/ucas-application', [App\Http\Controllers\Frontend\UcasController::class, 'create']);


Route::post('/ucas-application', [App\Http\Controllers\Frontend\UcasController::class, 'store']);

Route::get('/make-payment/ucas-booking/{ucas_booking_id}', [App\Http\Controllers\Frontend\UcasController::class, 'payment']);

Route::post('/make-payment/onlinepayment/ucas-booking/', [App\Http\Controllers\Frontend\UcasController::class, 'onlinepayment']);
Route::post('/make-payment/bankpayment/ucas-booking/', [App\Http\Controllers\Frontend\UcasController::class, 'bankpayment']);




Route::get('/myucasbooked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\UcasController::class, 'success'])->name('ucas.success');
Route::get('/ucas/checkout', [App\Http\Controllers\Frontend\UcasController::class, 'checkout'])->name('ucas.checkout');


// ucas

Route::get('/admin/candidate-exam-date/index', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'candidateExamDate']);




Route::get('admin/ucas-confirmation/delete/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'ucasConfirmationDelete']);
Route::get('/admin/ucas/notes', [App\Http\Controllers\Admin\UcasManageController::class, 'notesUpdate']);

Route::get('/admin/ucas/index', [App\Http\Controllers\Admin\UcasManageController::class, 'index'])->name('admin.ucas.index');
Route::get('admin/ucas-predicted-grades/index/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'indexPredicted'])->name('admin.ucas.indexPredicted');
Route::post('admin/ucas-grades/confirmation', [App\Http\Controllers\Admin\UcasManageController::class, 'indexPredictedConfirmation']);

Route::get('admin/ucas-grades/delete/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'indexPredictedDelete']);
Route::get('admin/send/predicted-grades/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'indexPredictedSend']);






Route::get('/admin/ucas/details/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'details']);

Route::get('/admin/ucas/delete/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'delete']);

Route::get('admin/get/ucasbooking/updateapaymentstatus/', [App\Http\Controllers\Admin\UcasManageController::class, 'updateapaymentstatus']);

Route::get('admin/ucasbooking/export/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'exportucas']);

Route::get('admin/ucasbooking/confirmexam/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'confirmexam']);

Route::get('admin/ucasbooking/iscompleted/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'iscompleted']);

Route::get('admin/ucasbooking/iscancel/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'iscancel']);



Route::post('admin/ucas-test/confirmation/submit', [App\Http\Controllers\Admin\UcasManageController::class, 'confirmexamSubmit']);





Route::get('/admin/ucas/basicinformation-update', [App\Http\Controllers\Admin\UcasManageController::class, 'basicInformationupdate']);

Route::post('/admin/ucas/payment-update', [App\Http\Controllers\Admin\UcasManageController::class, 'paymentUpdate']);


Route::get('/admin/ucas/exam-date-manage', [App\Http\Controllers\Admin\UcasManageController::class, 'ucasDateManage']);

Route::get('/admin/ucas/exam-date-manage/active/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'ucasDateactive']);



Route::get('/admin/ucas/exam-date-manage/deactive/{id}', [App\Http\Controllers\Admin\UcasManageController::class, 'ucasDatedeactive']);

// 


Route::get('/admin/notify/index', [App\Http\Controllers\Admin\MailSendController::class, 'mainindex'])->name('admin.notify.tutor');

Route::post('/admin/admin-update-password', [App\Http\Controllers\Admin\DashboardController::class, 'adminUpdatePassword'])->name('admin.adminUpdatePassword');

Route::post('/admin/email-update', [App\Http\Controllers\Admin\DashboardController::class, 'adminEmailUpdate'])->name('admin.email.update');

Route::get('/admin/logout', [App\Http\Controllers\Admin\DashboardController::class, 'logout'])->name('admin.logout');
// login controler
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'loginSubmit'])->name('admin.login');
// settings controller
Route::get('/admin/company-information', [App\Http\Controllers\Admin\SettingsController::class, 'companyInformation'])->name('admin.companyInformation');

Route::post('/admin/company-information', [App\Http\Controllers\Admin\SettingsController::class, 'companyInformationSubmit'])->name('admin.companyInformation');

Route::get('/admin/seo-information', [App\Http\Controllers\Admin\SettingsController::class, 'seoInformation'])->name('admin.seoInformation');
Route::post('/admin/seo-information', [App\Http\Controllers\Admin\SettingsController::class, 'seoInformationSubmit'])->name('admin.seoInformation');

Route::get('/admin/social-information', [App\Http\Controllers\Admin\SettingsController::class, 'socialInformation'])->name('admin.socialInformation');
Route::post('/admin/social-information', [App\Http\Controllers\Admin\SettingsController::class, 'socialInformationSubmit'])->name('admin.socialInformation');



Route::get('/admin/cupon/create', [App\Http\Controllers\Admin\SettingsController::class, 'cuponcreate'])->name('admin.cupon.create');
Route::post('/admin/cupon/create', [App\Http\Controllers\Admin\SettingsController::class, 'cuponstore'])->name('admin.cupon.create');
Route::get('/admin/cupon/index', [App\Http\Controllers\Admin\SettingsController::class, 'cuponindex'])->name('admin.cupon.index');


// exam series controller
Route::get('/admin/exam-series/index', [App\Http\Controllers\Admin\ExamSeriesController::class, 'index'])->name('admin.series.index');

Route::get('/admin/exam-series/create', [App\Http\Controllers\Admin\ExamSeriesController::class, 'create'])->name('admin.series.create');
Route::post('/admin/exam-series/create', [App\Http\Controllers\Admin\ExamSeriesController::class, 'store'])->name('admin.series.create');

Route::get('/admin/exam-series/edit/{id}', [App\Http\Controllers\Admin\ExamSeriesController::class, 'edit']);

Route::post('/admin/exam-series/update', [App\Http\Controllers\Admin\ExamSeriesController::class, 'update'])->name('admin.series.update');

Route::get('/admin/exam-series/active/{id}', [App\Http\Controllers\Admin\ExamSeriesController::class, 'active']);


Route::get('/admin/exam-series/deactive/{id}', [App\Http\Controllers\Admin\ExamSeriesController::class, 'deactive']);


Route::get('/admin/exam-series/delete/{id}', [App\Http\Controllers\Admin\ExamSeriesController::class, 'delete']);
//








// slider Create
Route::get('/admin/slider/create', [App\Http\Controllers\Admin\SliderController::class, 'create'])->name('admin.slider.create');
Route::post('/admin/slider/store', [App\Http\Controllers\Admin\SliderController::class, 'store'])->name('admin.slider.create');
Route::post('/admin/slider/update', [App\Http\Controllers\Admin\SliderController::class, 'update'])->name('admin.slider.update');
Route::get('/admin/slider/index', [App\Http\Controllers\Admin\SliderController::class, 'index'])->name('admin.slider.index');

Route::get('/admin/slider/active/{id}', [App\Http\Controllers\Admin\SliderController::class, 'active']);
Route::get('/admin/slider/deactive/{id}', [App\Http\Controllers\Admin\SliderController::class, 'deactive']);
Route::get('/admin/slider/edit/{id}', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
Route::get('/admin/slider/delete/{id}', [App\Http\Controllers\Admin\SliderController::class, 'delete']);

// about us
Route::get('/admin/about-us/update', [App\Http\Controllers\Admin\AboutUsController::class, 'update'])->name('admin.about-us.update');
Route::post('/admin/about-us/update', [App\Http\Controllers\Admin\AboutUsController::class, 'updateSubmit'])->name('admin.about-us.update');


Route::get('/admin/global-seating-plan/index', [App\Http\Controllers\Admin\AboutUsController::class, 'seatingPlanGlobal'])->name('admin.seatingPlanGlobal.index');

Route::get('/admin/global-seating-plan/print', [App\Http\Controllers\Admin\AboutUsController::class, 'printableseatingPlanGlobal'])->name('admin.seatingPlanGlobal.index');




Route::get('/privacy-policy', [App\Http\Controllers\Frontend\FrontendController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [App\Http\Controllers\Frontend\FrontendController::class, 'termsCondition']);
Route::get('/faq', [App\Http\Controllers\Frontend\FrontendController::class, 'faq']);




Route::get('/admin/privacy-policy/update', [App\Http\Controllers\Admin\AboutUsController::class, 'privacyPolicy'])->name('admin.privacy-policy.update');
// terms and conditions
Route::get('/admin/terms-conditions/update', [App\Http\Controllers\Admin\AboutUsController::class, 'termsCondition'])->name('admin.terms-conditions.update');





Route::get('/candidate/details/exports/{booking_id}', [App\Http\Controllers\Admin\CandidateDetailsExportController::class, 'exportcandidatedetails']);





// category
Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.category.create');
Route::post('/admin/category/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/index', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/active/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'active']);
Route::get('/admin/category/deactive/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deactive']);
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);


Route::get('/admin/contactmessage/index', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('admin.contactmessage.index');
Route::get('/admin/contactmessage/view/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'videmessage']);
Route::post('/admin/contactmessage/view/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'sendreply']);
Route::get('/admin/contactmessage/delete/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'delete']);
// blog controller

Route::get('/admin/blog-comment/index', [App\Http\Controllers\Admin\BlogController::class, 'blogComment'])->name('admin.blogComment.index');

Route::get('/admin/blog-comment/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'blogCommentDelete']);



Route::get('admin/update/blogcomments', [App\Http\Controllers\Admin\BlogController::class, 'UpdateblogComment']);

Route::get('admin/blog-comment/published/{id}', [App\Http\Controllers\Admin\BlogController::class, 'publishedblogComment']);
Route::get('admin/blog-comment/unpublished/{id}', [App\Http\Controllers\Admin\BlogController::class, 'unpublishedblogComment']);


Route::get('/admin/blog/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('admin.blog.create');

Route::post('/admin/blog/create', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('admin.blog.create');
Route::get('/admin/blog/index', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('admin.blog.index');
Route::get('/admin/blog/edit/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit']);
Route::get('/admin/blog/delete/{id}', [App\Http\Controllers\Admin\BlogController::class, 'delete']);
Route::post('/admin/blog/update', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('admin.blog.update');

// student fees
Route::get('/admin/fees/create', [App\Http\Controllers\Admin\StudentFeesController::class, 'create'])->name('admin.fees.create');
Route::post('/admin/fees/create', [App\Http\Controllers\Admin\StudentFeesController::class, 'store'])->name('admin.fees.create');
Route::get('/admin/fees/index', [App\Http\Controllers\Admin\StudentFeesController::class, 'index'])->name('admin.fees.index');
Route::get('/admin/fees/edit/{id}', [App\Http\Controllers\Admin\StudentFeesController::class, 'edit']);
Route::get('/admin/fees/delete/{id}', [App\Http\Controllers\Admin\StudentFeesController::class, 'delete']);
Route::post('/admin/fees/update', [App\Http\Controllers\Admin\StudentFeesController::class, 'update'])->name('admin.fees.update');

// event conterrolerr
Route::get('/admin/event/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.event.create');
Route::post('/admin/event/create', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.event.create');
Route::get('/admin/event/index', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.event.index');
Route::get('/admin/event/edit/{id}', [App\Http\Controllers\Admin\EventController::class, 'edit']);
Route::get('/admin/event/delete/{id}', [App\Http\Controllers\Admin\EventController::class, 'delete']);
Route::post('/admin/event/update', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.event.update');
// review controller
Route::get('/admin/review/create', [App\Http\Controllers\Admin\ReviewController::class, 'create'])->name('admin.review.create');
Route::post('/admin/review/create', [App\Http\Controllers\Admin\ReviewController::class, 'store'])->name('admin.review.create');
Route::get('/admin/review/index', [App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('admin.review.index');
Route::get('/admin/review/edit/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'edit']);
Route::get('/admin/review/delete/{id}', [App\Http\Controllers\Admin\ReviewController::class, 'delete']);
Route::post('/admin/review/update', [App\Http\Controllers\Admin\ReviewController::class, 'update'])->name('admin.review.update');



//proctor exam

Route::get('/admin/proctor-exam/index', [App\Http\Controllers\Admin\GalleryControlller::class, 'proctorIndex'])->name('admin.proctor-exam.index');

Route::get('/admin/proctor-exam/details/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'proctorDetails']);
Route::get('/admin/proctor-exam/delete/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'proctorDelete']);

Route::get('/admin/proctor-exam/exportpdf/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'proctorExportPdf']);
Route::get('admin/get/proctorexam-booking-notes/', [App\Http\Controllers\Admin\GalleryControlller::class, 'proctorExamNotes']);

// 
Route::get('/admin/gallery/create', [App\Http\Controllers\Admin\GalleryControlller::class, 'create'])->name('admin.gallery.create');
Route::post('/admin/gallery/create', [App\Http\Controllers\Admin\GalleryControlller::class, 'store'])->name('admin.gallery.create');
Route::get('/admin/gallery/index', [App\Http\Controllers\Admin\GalleryControlller::class, 'index'])->name('admin.gallery.index');
Route::get('/admin/gallery/edit/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'edit']);
Route::get('/admin/gallery/delete/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'delete']);
Route::post('/admin/gallery/update', [App\Http\Controllers\Admin\GalleryControlller::class, 'update'])->name('admin.gallery.update');
Route::get('/admin/gallery/active/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'active']);
Route::get('/admin/gallery/deactive/{id}', [App\Http\Controllers\Admin\GalleryControlller::class, 'deactive']);
// assesment list

Route::get('/admin/assesment/index', [App\Http\Controllers\Admin\AssesmentController::class, 'index'])->name('admin.assesment.index');
Route::get('/admin/assesment/active/{id}', [App\Http\Controllers\Admin\AssesmentController::class, 'active']);
Route::get('/admin/assesment/deactive/{id}', [App\Http\Controllers\Admin\AssesmentController::class, 'deactive']);
Route::get('/admin/assesment/details/{id}', [App\Http\Controllers\Admin\AssesmentController::class, 'details']);
// student request

Route::get('/admin/student-request/index', [App\Http\Controllers\Admin\StudentTutorRequestController::class, 'index'])->name('admin.student-request.index');
Route::get('/admin/student-request/delete/{id}', [App\Http\Controllers\Admin\StudentTutorRequestController::class, 'delete']);
Route::get('/admin/student-request/view/{id}', [App\Http\Controllers\Admin\StudentTutorRequestController::class, 'view']);
Route::post('/admin/student-request/approve', [App\Http\Controllers\Admin\StudentTutorRequestController::class, 'approve']);
Route::get('/admin/assign-tutor/index', [App\Http\Controllers\Admin\StudentTutorRequestController::class, 'assigntutor'])->name('admin.assign-tutor.index');


// bnner
Route::get('/admin/banner/update', [App\Http\Controllers\Admin\BannerController::class, 'bannerupdate'])->name('admin.banner.update');
Route::post('/admin/banner/update', [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('admin.banner.update');

// tutor manage


Route::get('/admin/tutor/list', [App\Http\Controllers\Admin\TuitorController::class, 'index'])->name('admin.tutor.list');
Route::get('/admin/branchtutor/list', [App\Http\Controllers\Admin\TuitorController::class, 'branchtutor'])->name('admin.branchtutor.list');
Route::get('/admin/tutor/details/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'details']);

Route::get('/admin/tutor/approve/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'approve']);
Route::get('/admin/tutor/reject/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'reject']);

Route::get('/admin/tutor/education-details/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'educationdetails']);
Route::post('/admin/tutor/education-details/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'educationdetailsstatus']);
Route::get('/admin/tutor/cv-details/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'cvdetails']);
Route::get('/admin/tutor/history-details/{id}', [App\Http\Controllers\Admin\TuitorController::class, 'history']);
// payment request
Route::get('/admin/tutor/payment-request', [App\Http\Controllers\Admin\TuitorController::class, 'paymentrequest'])->name('admin.tutior.paymentrequest');

Route::get('/admin/all-confirmation/bydate', [App\Http\Controllers\Admin\AboutUsController::class, 'allconfirmation']);

Route::get('get/admin/records', [App\Http\Controllers\Admin\AboutUsController::class, 'recordsConfirmation'])->name('get.admin.records');

Route::post('/admin/all-confirmation/bydate', [App\Http\Controllers\Admin\AboutUsController::class, 'searchallconfirmation']);

Route::post('/admin/all-confirmation/bydate/fileUploads', [App\Http\Controllers\Admin\AboutUsController::class, 'fileUploadsconfirmation']);
Route::post('admin/custom-candidate-confirm-exam/booking', [App\Http\Controllers\Admin\AboutUsController::class, 'addConfirmation']);

// student/Gurdian
// 

Route::get('/admin/student/list', [App\Http\Controllers\Admin\StudentManageController::class, 'index'])->name('admin.student.list');
Route::get('/admin/student/details/{id}', [App\Http\Controllers\Admin\StudentManageController::class, 'details']);
Route::post('/admin/student/details/{id}', [App\Http\Controllers\Admin\StudentManageController::class, 'detailsverified']);


Route::get('/admin/user-first-booking/alert/{id}', [App\Http\Controllers\Admin\StudentManageController::class, 'userFristBookingAlert']);
Route::get('/admin/user-second-booking/alert/{id}', [App\Http\Controllers\Admin\StudentManageController::class, 'userSecondBookingAlert']);

// agents
Route::get('/admin/agent/list', [App\Http\Controllers\Admin\StudentManageController::class, 'agentindex'])->name('admin.agentindex.list');
Route::get('/admin/agent/create', [App\Http\Controllers\Admin\StudentManageController::class, 'agentadd'])->name('admin.agentadd.list');

Route::post('/admin/agent/create', [App\Http\Controllers\Admin\StudentManageController::class, 'agentstore'])->name('admin.agentadd.list');
Route::get('/admin/agent/edit/{id}', [App\Http\Controllers\Admin\StudentManageController::class, 'agentedit']);
Route::post('/admin/agent/update', [App\Http\Controllers\Admin\StudentManageController::class, 'agentupdate'])->name('admin.agentadd.update');
Route::post('/admin/agent/passwordupdate', [App\Http\Controllers\Admin\StudentManageController::class, 'agentupdatePassword'])->name('admin.agentupdatePassword.update');

Route::get('/admin/agent/details/{id}', [App\Http\Controllers\Admin\StudentManageController::class, 'agentdetails']);

//paid candidate
Route::get('/admin/deleted-exambooking/index', [App\Http\Controllers\Admin\PaidCandidateController::class, 'deletedexambooking']);

Route::get('admin/deleted-exambooking/delete-Permanetly/{id}', [App\Http\Controllers\Admin\PaidCandidateController::class, 'deletedexambookingPermanetly']);


Route::get('/admin/unpaid-candidate/index', [App\Http\Controllers\Admin\PaidCandidateController::class, 'unpaid']);

Route::get('/admin/paid-candidate/index', [App\Http\Controllers\Admin\PaidCandidateController::class, 'index']);

Route::get('/admin/unverifiedcandidate/index', [App\Http\Controllers\Admin\PaidCandidateController::class, 'unverifiedcandidate']);








// receive payment

Route::get('/admin/payment/receive', [App\Http\Controllers\Admin\PaymentController::class, 'receiveindex'])->name('admin.receiveindex.list');
Route::get('/admin/payment/pay', [App\Http\Controllers\Admin\PaymentController::class, 'payindex'])->name('admin.payindex.list');
// mail send/notify
Route::get('/admin/user/notify/{id}', [App\Http\Controllers\Admin\MailSendController::class, 'create']);
Route::post('/admin/user/notify/{id}', [App\Http\Controllers\Admin\MailSendController::class, 'store']);


Route::get('/admin/admin-user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.adminuser.create');
Route::post('/admin/admin-user/create', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.adminuser.create');
Route::get('/admin/admin-user/index', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.adminuser.index');
Route::get('/admin/admin-user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
Route::get('/admin/admin-user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete']);
Route::get('/admin/admin-user/active/{id}', [App\Http\Controllers\Admin\UserController::class, 'active']);
Route::get('/admin/admin-user/deactive/{id}', [App\Http\Controllers\Admin\UserController::class, 'deactive']);
Route::post('/admin/admin-user/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.adminuser.update');


//Frontend Catagory wise product
Route::get('/category/{slug}/{id}', [App\Http\Controllers\Frontend\FrontendCatagoryController::class, 'catagoryView']);
Route::get('/products/{slug}/{id}', [App\Http\Controllers\Frontend\ProductController::class, 'details']);

//Subcategory wise product
Route::get('/subcategory/{slug}/{id}', [App\Http\Controllers\Frontend\FrontendSubCategoryController::class, 'subCatagoryView']);
//user dashboard 
Route::get('/logout', [App\Http\Controllers\Frontend\DashboardController::class, 'logout']);
// Route::get('/dashboard', [App\Http\Controllers\Frontend\DashboardController::class, 'dashboard']);
Route::get('/tutor/information', [App\Http\Controllers\Frontend\DashboardController::class, 'tutorinformation']);
Route::get('/tutor/student-request-list', [App\Http\Controllers\Frontend\DashboardController::class, 'studentrequestlist']);
Route::get('/tutor/student-request-list/view/{id}', [App\Http\Controllers\Frontend\DashboardController::class, 'studentrequestlistview']);
Route::get('/tutor/student-request-list/accept/{id}', [App\Http\Controllers\Frontend\DashboardController::class, 'studentrequestlistaccept']);
Route::get('get/tutor/studentrequestlist/reject/{id}', [App\Http\Controllers\Frontend\DashboardController::class, 'studentrequestlistreject']);
Route::post('/tutor/student-request-list/reject', [App\Http\Controllers\Frontend\DashboardController::class, 'studentrejectRequest']);

Route::post('/tutor/account', [App\Http\Controllers\Frontend\DashboardController::class, 'tutorprofileupdate']);
Route::get('/tutor/account', [App\Http\Controllers\Frontend\DashboardController::class, 'tutor_account']);
Route::get('/user/dbs-certification', [App\Http\Controllers\Frontend\DashboardController::class, 'dbscertification']);

Route::get('/user/proof-of-address', [App\Http\Controllers\Frontend\DashboardController::class, 'proofofaddress']);
Route::post('/user/proof-of-address', [App\Http\Controllers\Frontend\DashboardController::class, 'proofofaddresssubmit']);

Route::post('/user/dbs-certification', [App\Http\Controllers\Frontend\DashboardController::class, 'dbscertificationsubmit']);
Route::get('/user/verification', [App\Http\Controllers\Frontend\DashboardController::class, 'verification']);



Route::get('/user/profile-image', [App\Http\Controllers\Frontend\DashboardController::class, 'profileimage']);
Route::post('/user/profile-image', [App\Http\Controllers\Frontend\DashboardController::class, 'profileimagesubmit']);


Route::get('/user/cv', [App\Http\Controllers\Frontend\DashboardController::class, 'cvuploads']);
Route::post('/user/cv', [App\Http\Controllers\Frontend\DashboardController::class, 'cvuploadsubmit']);


//Course purchase

Route::get('course-purchase/{id}', [App\Http\Controllers\Frontend\DashboardController::class, 'coursePurchase']);

Route::get('purchase-course/payment/{booking_id}', [App\Http\Controllers\Frontend\DashboardController::class, 'coursePayment']);

Route::post('purchase-course/onlinepayment', [App\Http\Controllers\Frontend\DashboardController::class, 'courseOnlinePayment'])->name('courseonlinepayment.session');

Route::get('/coursepayment-mybooked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\DashboardController::class, 'courseOnlinePaymentSuccess']);


Route::get('/coursepayment-mybooked/cancel', [App\Http\Controllers\Frontend\DashboardController::class, 'courseOnlinePaymentCancel'])->name('cancel.payment');

Route::post('/course/bankpayment', [App\Http\Controllers\Frontend\DashboardController::class, 'coursebankpayment']);

//iseb text


Route::get('/iseb-booking', [App\Http\Controllers\Frontend\DashboardController::class, 'isebBooking']);
Route::post('/iseb-booking', [App\Http\Controllers\Frontend\DashboardController::class, 'isebStore']);
Route::get('iseb-exam/make-payment/{booking_id}', [App\Http\Controllers\Frontend\DashboardController::class, 'isebPayment']);


Route::post('iseb-exam/myonlinepayment/session', [App\Http\Controllers\Frontend\DashboardController::class, 'isebexamsOnlinepayment'])->name('iseb.myonlinepayment.session');
Route::get('/iseb-exam/booked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\DashboardController::class, 'Proctoresuccess']);
Route::post('iseb-exam/bank/payment', [App\Http\Controllers\Frontend\DashboardController::class, 'bankPaymentProctorexam']);

Route::get('iseb-exam/cancel/payment', [App\Http\Controllers\Frontend\DashboardController::class, 'cancelIseb'])->name('cancel.checkout');

// tutor wallet






//customer info update
Route::get('/student/message', [App\Http\Controllers\Frontend\StudentChatController::class, 'allmessage']);
Route::get('/student/message/view/{id}', [App\Http\Controllers\Frontend\StudentChatController::class, 'viewmessage']);
Route::post('/student/message/chat/submit', [App\Http\Controllers\Frontend\StudentChatController::class, 'tutormessagesubmit']);
Route::post('/student/message/chat', [App\Http\Controllers\Frontend\StudentChatController::class, 'messagechat']);
// 


Route::get('/student/due_amount/paid/{order_id}', [App\Http\Controllers\Frontend\PaymentController::class, 'due_amountpaid']);
Route::post('/student/due_amount/paid/{order_id}', [App\Http\Controllers\Frontend\PaymentController::class, 'due_amountpaidsubmit']);




Route::get('/user/notification', [App\Http\Controllers\Frontend\StudentChatController::class, 'studentnotification']);
Route::post('/user/notification', [App\Http\Controllers\Frontend\StudentChatController::class, 'studentnotificationsubmit']);


Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact']);
Route::post('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contactstore']);
Route::get('/gallery', [App\Http\Controllers\Frontend\FrontendController::class, 'gallary']);

Route::get('/ucas-registered-centre', [App\Http\Controllers\Frontend\FrontendController::class, 'ucasregistered']);



//filter product
Route::get('/filterproduct', [App\Http\Controllers\Frontend\FilterProductController::class, 'filter']);
Route::get('/filtersubcategoryproduct', [App\Http\Controllers\Frontend\FilterProductController::class, 'subCategoryfilter']);


//pages
Route::get('/exam-fees', [App\Http\Controllers\Frontend\FeesController::class, 'index']);

Route::get('/a-level-endorsment', [App\Http\Controllers\Frontend\PracticalController::class, 'alevelindex']);
Route::get('/gcse-endorsment', [App\Http\Controllers\Frontend\PracticalController::class, 'gcseindex']);
Route::get('/invigilation-services', [App\Http\Controllers\Frontend\PracticalController::class, 'invigilationservices']);
// practical


Route::get('/about-us', [App\Http\Controllers\Frontend\PagesController::class, 'aboutUs']);
Route::get('/result-day', [App\Http\Controllers\Frontend\PagesController::class, 'resultday']);
Route::get('/exam-day', [App\Http\Controllers\Frontend\PagesController::class, 'examday']);
Route::get('/exam-booking-procedure', [App\Http\Controllers\Frontend\PagesController::class, 'bookingprocedure']);
Route::get('/terms-condition', [App\Http\Controllers\Frontend\PagesController::class, 'termsCondition']);
Route::get('/privacy-policy', [App\Http\Controllers\Frontend\PagesController::class, 'privancyPolicy']);
Route::get('/payment-policy', [App\Http\Controllers\Frontend\PagesController::class, 'paymentPolicy']);
Route::get('/exam-tips', [App\Http\Controllers\Frontend\PagesController::class, 'examtips']);

//rivision-exam



Route::get('/revision-course-exam-booking', [App\Http\Controllers\Frontend\RevisionExamController::class, 'create']);






// 




// tutor hire controller




Route::post('/stripe-payment', [App\Http\Controllers\Frontend\PaymentController::class, 'handlePost'])->name('stripe.post');
Route::get('/blogs', [App\Http\Controllers\Frontend\FrontendController::class, 'blogs']);
Route::get('/details/{slug}/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'blogsdetails']);
Route::get('/events', [App\Http\Controllers\Frontend\EventController::class, 'index']);
Route::get('/event/details/{id}', [App\Http\Controllers\Frontend\EventController::class, 'eventdetails']);

// assesment controller

// allcourses



// 
Route::get('/register/type', [App\Http\Controllers\Frontend\StudentController::class, 'registertype']);
Route::get('/student/signup', [App\Http\Controllers\Frontend\StudentController::class, 'singup']);
Route::post('/student/signup', [App\Http\Controllers\Frontend\StudentController::class, 'singupstore']);

// 



Route::post('student/otheroption/update', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'otheroptionupdate']);
Route::post('/student/recentphoto/update', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'recentphotoUpdate']);
Route::post('/student/photoid/update', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'photoIdUpdate']);


// 





Route::get('/student/dashboard', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'dashboard']);
Route::get('/student/updatepassword', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'updatepassword']);
Route::post('/student/updatepassword', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'updatepasswordStore']);

Route::get('/student/savetutor', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'savetutor']);

Route::get('/student/updateprofile', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'updateprofile']);
Route::post('/student/updateprofile', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'updateprofileStore']);

// student payment 
Route::get('/student/payment', [App\Http\Controllers\Frontend\StudentPaymentController::class, 'index']);
Route::get('/student/payment-history', [App\Http\Controllers\Frontend\StudentPaymentController::class, 'paymentHistory']);




// save tutor routes


//Search
// ////////////////////////////////////////////////////////////////////////////exam center//////////////////////

// admin panel start

// course purchase request

Route::get('admin/course-purchase/index', [App\Http\Controllers\Admin\ExamCourceController::class, 'purchaseIndex'])->name('admin.course-purchase.index');

Route::get('admin/course-purchase/delete/{id}', [App\Http\Controllers\Admin\ExamCourceController::class, 'purchaseDelete']);

Route::get('admin/course-purchase/details/{id}', [App\Http\Controllers\Admin\ExamCourceController::class, 'purchaseDetails']);

Route::get('admin/get/course-purchase/updateapaymentstatus/', [App\Http\Controllers\Admin\ExamCourceController::class, 'purchasePaymentUpdate']);



// 



Route::get('admin/exam-course/index', [App\Http\Controllers\Admin\ExamCourceController::class, 'index'])->name('admin.exam-course.index');

Route::get('admin/exam-course/create', [App\Http\Controllers\Admin\ExamCourceController::class, 'create'])->name('admin.exam-course.create');
Route::post('admin/exam-course/create', [App\Http\Controllers\Admin\ExamCourceController::class, 'store'])->name('admin.exam-course.create');

Route::post('admin/exam-course/update', [App\Http\Controllers\Admin\ExamCourceController::class, 'update'])->name('admin.exam-course.update');

Route::get('admin/exam-course/edit/{id}', [App\Http\Controllers\Admin\ExamCourceController::class, 'edit']);

Route::get('admin/exam-course/delete/{id}', [App\Http\Controllers\Admin\ExamCourceController::class, 'delete']);

Route::get('admin/exam-course/active/{id}', [App\Http\Controllers\Admin\ExamCourceController::class, 'active']);
Route::get('admin/exam-course/deactive/{id}', [App\Http\Controllers\Admin\ExamCourceController::class, 'deactive']);




Route::get('admin/subject/create', [App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('admin.subject.create');
Route::post('admin/subject/create', [App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('admin.subject.create');
Route::post('admin/subject/update', [App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('admin.subject.update');

Route::get('admin/subject/index', [App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('admin.subject.index');

Route::get('admin/subject/all-gcse-subject', [App\Http\Controllers\Admin\SubjectController::class, 'gcsesubject'])->name('admin.gcsesubject.index');

Route::get('admin/subject/all-igcse-subject', [App\Http\Controllers\Admin\SubjectController::class, 'igcsesubject'])->name('admin.igcsesubject.index');

Route::get('admin/subject/all-alevel-subject', [App\Http\Controllers\Admin\SubjectController::class, 'alevelsubject'])->name('admin.alevelsubject.index');

Route::get('admin/subject/all-aslevel-subject', [App\Http\Controllers\Admin\SubjectController::class, 'aslevelsubject'])->name('admin.aslevelsubject.index');

Route::get('admin/subject/all-acca-subject', [App\Http\Controllers\Admin\SubjectController::class, 'accasubject'])->name('admin.accasubject.index');
Route::get('admin/subject/all-aat-subject', [App\Http\Controllers\Admin\SubjectController::class, 'aatsubject'])->name('admin.aatsubject.index');
Route::get('admin/subject/all-functionalskills-subject', [App\Http\Controllers\Admin\SubjectController::class, 'functionalskillssubject'])->name('admin.functionalskillssubject.index');


Route::get('admin/exam-booking-gcse/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingcreate'])->name('admin.exambooking.create');
Route::post('admin/exam-booking-gcse/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingStore'])->name('admin.exambooking.create');

// igcse

Route::get('admin/exam-booking-igcse/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingcreateigcse'])->name('admin.exambooking-igcse.create');
Route::post('admin/exam-booking-igcse/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingStoreigcse'])->name('admin.exambooking-igcse.create');

// alevel

Route::get('admin/exam-booking-alevel/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingcreatealevel'])->name('admin.exambookingalevel.create');
Route::post('admin/exam-booking-alevel/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingStorealevel'])->name('admin.exambookingalevel.create');
// AAT

Route::get('admin/exam-booking-aat/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingcreateaat'])->name('admin.exambookingaat.create');
Route::post('admin/exam-booking-aat/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingStoreaat'])->name('admin.exambookingaat.create');
// acca

Route::get('admin/exam-booking-acca/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingcreateacca'])->name('admin.exambookingacca.create');
Route::post('admin/exam-booking-acca/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingStoracca'])->name('admin.exambookingacca.create');
// functional

Route::get('admin/exam-booking-functionalskills/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingcreatefunctionalskills'])->name('admin.exambookingfunctionalskills.create');
Route::post('admin/exam-booking-functionalskills/create', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'exambookingStorefunctionalskills'])->name('admin.exambookingfunctionalskills.create');







Route::get('admin/make-payment/exambooking/{id}', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'makepayment']);

Route::post('admin/make-payment/update', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'paid_amount']);








Route::get('/get/admin-gcse/subject/all/{type_id}', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'gcsegetsubject']);
Route::get('/get/admin-igcse/subject/all/{type_id}', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'igcsegetsubject']);
Route::get('/get/admin-alevel/subject/all/{type_id}', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'alevelgetsubject']);
Route::get('/get/admin-subject/details/{subject_id}', [App\Http\Controllers\Admin\CustomExamBookingController::class, 'subjectdetails']);





Route::get('admin/subject/edit/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'edit']);


Route::get('admin/subject/active/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'active']);



Route::get('admin/subject/deactive/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'deactive']);

Route::get('admin/subject/delete/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'delete']);




// 


Route::get('admin/boardstatement-send/details/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'isboardstatementSend']);


Route::get('admin/apps-exam-booking/index', [App\Http\Controllers\Admin\ExamRequestController::class, 'appsBooking'])->name('admin.appBooking.index');



Route::get('admin/certificate-collection/mailsend/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'certificateCollectionMail']);
Route::get('admin/certificate-collection/update/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'certificateCollectionUpdate']);
Route::post('admin/certificate-collection/update/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'certificateCollectionUpdateStore']);




Route::get('admin/examconfirm-list/gcse', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistGcse'])->name('admin.examconfirmlist.gccse');

Route::get('admin/examconfirm-list/igcse', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistigcse'])->name('admin.examconfirmlist.igcse');

Route::get('admin/examconfirm-list/alevels', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistalevels'])->name('admin.examconfirmlist.alevels');


Route::get('admin/examconfirm-list/functional-skills', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistfunctionalskills'])->name('admin.examconfirmlist.functionalskills');


Route::get('admin/examconfirm-list/aat', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistaat'])->name('admin.examconfirmlist.aat');

Route::get('admin/examconfirm-list/acca', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistacca'])->name('admin.examconfirmlist.acca');


Route::get('admin/examconfirm-list/aslevels', [App\Http\Controllers\Admin\ExamRequestController::class, 'examconfirmlistaslevels'])->name('admin.examconfirmlist.aslevels');

Route::get('admin/exam-booking/aslevels', [App\Http\Controllers\Admin\ExamRequestController::class, 'aslevelsexambooking'])->name('admin.exambooking.aslevels');



// 

Route::get('admin/booking-first-payment-all-send/send', [App\Http\Controllers\Admin\ExamRequestController::class, 'bookingFirstEmailSend']);
Route::get('admin/booking-second-payment-all-send/send', [App\Http\Controllers\Admin\ExamRequestController::class, 'bookingSecondEmailSend']);


Route::get('admin/exam/allbooking', [App\Http\Controllers\Admin\ExamRequestController::class, 'allexambooking'])->name('admin.examrequest.allbooking');

Route::get('admin/update/examnotes', [App\Http\Controllers\Admin\ExamRequestController::class, 'insernotesupdate']);

Route::get('admin/forcheck/exam', [App\Http\Controllers\Admin\ExamRequestController::class, 'forcheck']);


Route::get('admin/exambooking-real/delete/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'realdeleteexambooking']);
Route::get('admin/exambooking/delete/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'deleteexambooking']);

Route::get('admin/exam/gcse', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcsemain'])->name('admin.examrequest.gcse');

Route::get('admin/exam/igcse', [App\Http\Controllers\Admin\ExamRequestController::class, 'igcse'])->name('admin.examrequest.igcse');

Route::get('admin/exam/alevel', [App\Http\Controllers\Admin\ExamRequestController::class, 'aLevel'])->name('admin.examrequest.alevel');

Route::get('admin/exam/functionalskills', [App\Http\Controllers\Admin\ExamRequestController::class, 'functionalskill'])->name('admin.examrequest.functionalskills');

Route::get('admin/exam/acca', [App\Http\Controllers\Admin\ExamRequestController::class, 'acca'])->name('admin.examrequest.acca');

Route::get('admin/exam/aat', [App\Http\Controllers\Admin\ExamRequestController::class, 'aat'])->name('admin.examrequest.aat');





Route::get('admin/exambooking/details/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'bookingdetails']);

Route::get('admin/exambooking/maindetails/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'mainbookingdetails']);

Route::get('admin/exambooking/sendduepaymemt/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'sendDuePaymemt']);


Route::get('admin/exambooking/send1stpaymemt-alert/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'sendFirstDuePaymemt']);

Route::get('admin/exambooking/send2ndpaymemt-alert/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'sendSecondDuePaymemt']);





Route::get('admin/get/exmabooking/updatedate/', [App\Http\Controllers\Admin\ExamRequestController::class, 'updatedateexmabooking']);

Route::get('admin/get/exmabooking/updateapaymentstatus/', [App\Http\Controllers\Admin\ExamRequestController::class, 'updateapaymentstatus']);

Route::post('admin/get/insert/candidatenumbers/', [App\Http\Controllers\Admin\ExamRequestController::class, 'insertCandidateNumbers']);

Route::any('admin/get/update/basicinformation_update/', [App\Http\Controllers\Admin\ExamRequestController::class, 'basicInformationupdate']);

Route::get('admin/get/update/other_formation_update', [App\Http\Controllers\Admin\ExamRequestController::class, 'other_formation_update']);

Route::get('admin/get/update/special_arrangements_update/', [App\Http\Controllers\Admin\ExamRequestController::class, 'special_arrangements_update']);

Route::get('admin/get/update/terms_and_conditon_update/', [App\Http\Controllers\Admin\ExamRequestController::class, 'terms_and_conditon_update']);

Route::get('admin/get/update/paid_status/', [App\Http\Controllers\Admin\ExamRequestController::class, 'paid_status_update']);

Route::post('admin/get/updatesubject/', [App\Http\Controllers\Admin\ExamRequestController::class, 'getupdatesubject']);

Route::get('admin/export/exam-booking-details/{bookig_id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'examBookingDetailsExport']);







Route::get('admin/exambooking/maindapprove/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'mainbookingapprove']);

Route::get('admin/exambooking/maindreject/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'mainbookingreject']);



Route::get('admin/alevel/exam', [App\Http\Controllers\Admin\ExamRequestController::class, 'alevel'])->name('admin.examrequest.alevel');
Route::get('admin/igcse/exam', [App\Http\Controllers\Admin\ExamRequestController::class, 'igcse'])->name('admin.examrequest.igcse');

Route::post('admin/mainpayment/update', [App\Http\Controllers\Admin\ExamRequestController::class, 'mainpaymentupdate']);

Route::get('admin/candidate-confirm-exam/booking/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'candidateconfirmExam']);

Route::post('admin/candidate-confirm-exam/booking/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'candidateconfirmExamStore']);


Route::get('admin/candidate-gcse-alevel-igcse-assesment/uploads/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'assesmentUploads']);
Route::post('admin/candidate-gcse-alevel-igcse-assesment/uploads/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'assesmentUploadsubmit']);

Route::get('admin/candidate-gcse-alevel-igcse-confirmation/exambooking/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelExamconfirmation']);


Route::post('admin/candidate-gcse-alevel-igcse-confirmation/exambooking/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelExamconfirmationStore']);

Route::get('admin/candidate-gcse-alevel-igcse-confirmation/delete-one-item/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelDeleteOneItem']);


Route::get('admin/candidate-gcse-alevel-igcse-confirmation/testing-statements/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelTestingStatements']);


Route::post('admin/candidate-gcse-alevel-igcse-confirmation/file-uploads', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelFileUploads']);

Route::get('admin/candidate-gcse-alevel-igcse-confirmation/file-uploads/delete/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelFileUploadsDelete']);


// real send exam entry

Route::get('admin/candidate-gcse-alevel-igcse-confirmation/send-exam-entry/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'gcseIgcseAlevelSendExamEntry']);




Route::post('admin/functionalskills-candidate-result-uploads/index/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'candidateResult']);

Route::get('admin/functionalskills-candidate-result-send/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'SendcandidateResult']);





Route::get('admin/exam-booking/isrefunded/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isrefunded']);
Route::get('admin/exam-booking/withdrawn/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'iswithdrawn']);


Route::get('admin/exam-booking/isbookabled/{id}', [App\Http\Controllers\Admin\AboutUsController::class, 'isbookabled']);
Route::get('admin/all-exam-booking/isbookabled/', [App\Http\Controllers\Admin\AboutUsController::class, 'Allisbookabled']);

Route::post('admin/exam-booking/ucinumberInformation/', [App\Http\Controllers\Admin\AboutUsController::class, 'ucinumberInformation']);



Route::get('admin/candidate-result-uploads/index/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'candidateResultUploads']);

Route::post('admin/candidate-result-uploads/index/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'candidateResultUploadSubmit']);

Route::get('admin/candidate-result-delete/index/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'candidateResultDelete']);

Route::get('admin/candidate-result-send/index/{id}', [App\Http\Controllers\Admin\ExamRequestController::class, 'candidateResultsend']);
// 




Route::get('admin/update/studentnotes', [App\Http\Controllers\Admin\ExamRequestController::class, 'notesUpdate']);





// exam date change
Route::get('admin/examdate/index', [App\Http\Controllers\Admin\ExamdateController::class, 'index'])->name('admin.examdate.index');

Route::get('admin/examdate/subject/{id}', [App\Http\Controllers\Admin\ExamdateController::class, 'subjectdate']);



Route::get('admin/examdate/update', [App\Http\Controllers\Admin\ExamdateController::class, 'update'])->name('admin.examdate.update');
// 
// main exam date manage
Route::get('admin/exam/essuedate/update', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'create'])->name('admin.essuedate.update');

Route::get('admin/getessuesfirst/update', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'getFirstupdate']);
Route::get('admin/getessuessecond/update', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'getSecondupdate']);
Route::get('admin/getessuesthird/update', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'getThirdupdate']);
Route::get('admin/getessuesfour/update', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'getFourthupdate']);
Route::get('admin/getessuesfive/update', [App\Http\Controllers\Admin\ExamdatemanageController::class, 'getFiveupdate']);











Route::get('/functional-skills-exams', [App\Http\Controllers\Frontend\PagesController::class, 'functionalskillsexams']);
Route::get('/a-level-exams', [App\Http\Controllers\Frontend\PagesController::class, 'alevelexams']);
Route::get('/as-level-exams', [App\Http\Controllers\Frontend\PagesController::class, 'aslevelexams']);
Route::get('/gcse-exams', [App\Http\Controllers\Frontend\PagesController::class, 'gcseexams']);
Route::get('/igcse-exams', [App\Http\Controllers\Frontend\PagesController::class, 'igcseexams']);
Route::get('/acca-exams', [App\Http\Controllers\Frontend\PagesController::class, 'accaexams']);
Route::get('/aat-exams', [App\Http\Controllers\Frontend\PagesController::class, 'attexams']);
Route::get('/functional-skills-tuition-details', [App\Http\Controllers\Frontend\PagesController::class, 'functionalSkillTuition']);

Route::get('/exam-booking-date-details', [App\Http\Controllers\Frontend\FrontendController::class, 'examdates']);

// student dashboard
Route::get('/exam-booking-list', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'exambookinglist']);


// ucas start

Route::get('/ucas-exam-booking-list', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'ucasexambookinglist']);

Route::get('/ucas-exam-booking-details/{ucas_booking_id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'ucasexambookingdetails']);

Route::get('/ucas-exam-booking/delete/main/{ucas_booking_id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'ucasexambookingdelete']);



Route::get('/ucas-exam-booking/details/invoice-download/{ucas_booking_id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'ucasexambookingInvoice']);



// ucas end
Route::get('get/insert-exam-type/update', [App\Http\Controllers\Frontend\ExambookingController::class, 'examtypeUpdateByuser']);



Route::get('/exam-booking/details/invoice-download/{id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'downloadsinvoice']);

Route::get('exam-booking/statement-of-entry/details/{id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'statementofentry']);

// exam booking 


Route::get('/proctor-exam', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'proctorexamsCreate']);


Route::post('/proctor-exam', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'proctorexamsStore']);

Route::get('/proctor-exam/make-payment/{booking_id}', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'proctorexamsMakePayment']);

Route::post('proctorexm/myonlinepayment/session', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'proctorexamsOnlinepayment'])->name('proctorexm.myonlinepayment.session');

Route::get('/proctorexam/booked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'Proctoresuccess']);

Route::post('proctor-exam/bank/payment', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'bankPaymentProctorexam']);





// noted





Route::get('/functional-skills-tuition', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'functionalSkillTuition']);
Route::post('/functional-skills-tuition', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'functionalSkillTuitionSubmit']);
Route::get('/make-payment/functional-skils-tuition/{booking_id}', [App\Http\Controllers\Frontend\PaymentController::class, 'makePaymentFs']);


Route::get('/cancelfs/payment', [App\Http\Controllers\Frontend\PaymentController::class, 'cancelpaymentfs'])->name('cancelfs.payment');

Route::post('/online-payment/functionalskilstuition', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'onlinePaymentFS'])->name('functionalskills.myonlinepayment.session');
Route::post('/funcional-skills/bank/payment', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'bankPaymentFS']);



Route::get('/iseb-exam/details/{booking_id}', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'iesbBookingDetails']);

Route::get('/iseb-booking-list', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'iesbBookingList']);
Route::get('/proctor-booking-list', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'proctorBookingList']);

Route::get('/proctor-exam-booking-details/{booking_id}', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'proctorBookingDetails']);


Route::get('/course-purchase-list', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'coursePurchaseList']);
Route::get('/functional-skill-tuition-booking-list', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'fsindex']);
Route::get('/functional-skill-tuition-booking-details/{booking_id}', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'fsdetails']);
Route::get('/functional-tuition-booked/{booking_id}/{amount}/success', [App\Http\Controllers\Frontend\FunctionalTuitonController::class, 'success'])->name('success');



Route::get('get/insertmybooking/all', [App\Http\Controllers\Frontend\ExambookingController::class, 'insertexambookingajax']);

Route::get('get/insertmycheckbooking/all', [App\Http\Controllers\Frontend\ExambookingController::class, 'insertCheckexambookingajax']);

Route::post('recentpgoto/uploads/exambooking', [App\Http\Controllers\Frontend\ExambookingController::class, 'photouploads']);

Route::get('get/address/via-postcode/', [App\Http\Controllers\Frontend\FrontendController::class, 'getAddress']);




Route::get('/step-maths-exam-application', [App\Http\Controllers\Frontend\ExambookingController::class, 'stepMathsApplication']);
Route::post('/step-maths-exam-application', [App\Http\Controllers\Frontend\ExambookingController::class, 'stepMathsApplicationSubmit']);
 



Route::get('/exam-booking-aslevel', [App\Http\Controllers\Frontend\ASlevelExamBookingController::class, 'exambookingaslevel']);
Route::post('/exam-booking-aslevel', [App\Http\Controllers\Frontend\ASlevelExamBookingController::class, 'exambookingaslevelstore']);


Route::get('/exam-booking-aat', [App\Http\Controllers\Frontend\AATExamBookingController::class, 'exambookingatt']);

Route::post('/exam-booking-aat', [App\Http\Controllers\Frontend\AATExamBookingController::class, 'exambookingattsubmit']);


Route::get('/get/subject-details/individual', [App\Http\Controllers\Frontend\ExambookingController::class, 'subjectdetailsindividual']);
Route::get('/get/mockexams/subject', [App\Http\Controllers\Frontend\ExambookingController::class, 'getMockSubject']);

Route::get('/get/gcse-mockexams/subject', [App\Http\Controllers\Frontend\ExambookingController::class, 'getGcseMockSubject']);


Route::get('/get/mockexams/price', [App\Http\Controllers\Frontend\ExambookingController::class, 'getPrice']);
Route::get('/get/gcse-mockexams/price', [App\Http\Controllers\Frontend\ExambookingController::class, 'getGCSEPrice']);




Route::get('/exam-booking-acca', [App\Http\Controllers\Frontend\ACCAExamBookingController::class, 'exambookingacca']);
Route::post('/exam-booking-acca', [App\Http\Controllers\Frontend\ACCAExamBookingController::class, 'accaexamsubmit']);



Route::get('/exam-booking-functional-skills', [App\Http\Controllers\Frontend\FunctionalSkillsExamBookingController::class, 'exambookingfuctionalskills']);

Route::post('/exam-booking-functional-skills', [App\Http\Controllers\Frontend\FunctionalSkillsExamBookingController::class, 'exambookingfuctionalskillssubmit']);

Route::get('/exam-booking', [App\Http\Controllers\Frontend\ExambookingController::class, 'exambooking']);


Route::post('/exam-booking', [App\Http\Controllers\Frontend\ExambookingController::class, 'exambookingstore']);


Route::get('/get/date-day/all/{mydate}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'dayinTime']);

Route::get('/get/ilford-date-day/all/{mydate}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'ilfordayinTime']);



Route::get('/get/subject/all/{type_id}', [App\Http\Controllers\Frontend\ExambookingController::class, 'getsubject']);

Route::get('/get/gcse/subject/all/{type_id}/{series_id}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'gcsegetsubject']);
Route::get('/get/igcse/subject/all/{type_id}/{series_id}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'igcsegetsubject']);
Route::get('/get/alevel/subject/all/{type_id}/{series_id}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'alevelgetsubject']);
Route::get('/get/aslevel/subject/all/{type_id}/{series_id}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'aslevelgetsubject']);
Route::get('get/getqualification/all/{program_id}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'getqualification']);
Route::get('get/getaatsubject/all/{qualification_id}', [App\Http\Controllers\Frontend\GetSubjectController::class, 'getaatsubject']);
Route::get('/get/subject/details/{subject_id}', [App\Http\Controllers\Frontend\ExambookingController::class, 'subjectdetails']);


Route::get('/get/fssubject/details/{subject_id}', [App\Http\Controllers\Frontend\ExambookingController::class, 'fssubjectdetails']);


Route::get('/exam-list', [App\Http\Controllers\Frontend\FrontendController::class, 'examlist']);
// Route::get('/supports', [App\Http\Controllers\Frontend\FrontendController::class, 'supports']);
Route::get('/exam-booking-main', [App\Http\Controllers\Frontend\ExambookingController::class, 'exambookingmain']);
Route::get('/exam-booking-gcse', [App\Http\Controllers\Frontend\GCSEExamBookingController::class, 'exambookinggcse']);
Route::post('/exam-booking-gcse', [App\Http\Controllers\Frontend\GCSEExamBookingController::class, 'exambookingstoregcse']);
// alvel
Route::get('/exam-booking-alevel', [App\Http\Controllers\Frontend\AlevelExamBookingController::class, 'exambookingalevel']);
Route::post('/exam-booking-alevel', [App\Http\Controllers\Frontend\AlevelExamBookingController::class, 'exambookingalevelstore']);
// igcse
Route::get('/exam-booking-igcse', [App\Http\Controllers\Frontend\IGCSEExamBookingController::class, 'exambookingigcse']);
Route::post('/exam-booking-igcse', [App\Http\Controllers\Frontend\IGCSEExamBookingController::class, 'exambookingigcsestore']);

Route::get('/make-special-access-payment/exambooking/{order_id}', [App\Http\Controllers\Frontend\PaymentController::class, 'specialAccessPayment']);
Route::get('/make-payment/exambooking/{order_id}', [App\Http\Controllers\Frontend\ExambookingController::class, 'makepayment']);
Route::post('online/payment', [App\Http\Controllers\Frontend\PaymentController::class, 'onlinepayment']);
Route::post('bank/payment', [App\Http\Controllers\Frontend\PaymentController::class, 'bankpayment']);
// 
Route::get('exam-booking/delete/main/{id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'exambookingdelete']);
Route::get('exam-booking/details/main/{booking_id}', [App\Http\Controllers\Frontend\StudentDashboardController::class, 'exambookingdetails']);











// agents
Route::get('/agent/payment', [App\Http\Controllers\Frontend\AgentController::class, 'exambookinglist']);
Route::get('agent-exam-booking-list', [App\Http\Controllers\Frontend\AgentController::class, 'exambookinglist']);
Route::get('agent/dashboard', [App\Http\Controllers\Frontend\AgentController::class, 'dashboard']);
Route::get('/agent/updateprofile', [App\Http\Controllers\Frontend\AgentController::class, 'updateprofile']);
Route::post('/agent/updateprofile', [App\Http\Controllers\Frontend\AgentController::class, 'updateprofileStore']);
Route::get('/agent/updatepassword', [App\Http\Controllers\Frontend\AgentController::class, 'updatepassword']);
Route::post('/agent/updatepassword', [App\Http\Controllers\Frontend\AgentController::class, 'updatepasswordStore']);
Route::get('/agent/notification', [App\Http\Controllers\Frontend\AgentController::class, 'studentnotification']);
Route::post('/agent/notification', [App\Http\Controllers\Frontend\AgentController::class, 'studentnotificationsubmit']);


Route::get('/add/coupon/insert', [App\Http\Controllers\Frontend\CouponUsedController::class, 'couponInsert']);

// next

Route::post('/admin-add/coupon/insert', [App\Http\Controllers\Admin\AboutUsController::class, 'couponInsert']);
Route::post('/admin-discount/update/coupon', [App\Http\Controllers\Admin\AboutUsController::class, 'discountUpdate']);


Route::post('/admin/photo-id/update', [App\Http\Controllers\Admin\AboutUsController::class, 'photoIdUpdate']);
Route::post('/admin/recent-photo/update', [App\Http\Controllers\Admin\AboutUsController::class, 'recentPhotoUpdate']);



Route::get('/admin/seating-plan', [App\Http\Controllers\Admin\SettingsController::class, 'generateSeatingPlan']);


// pastpaper


Route::get('/past-papers', [App\Http\Controllers\Frontend\FrontendController::class, 'pastPaper']);

Route::get('/past-papers/{exam_type}/{exam_board}', [App\Http\Controllers\Frontend\FrontendController::class, 'boardwisepastPaper']);

Route::get('/subject/past-papers/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'subjectPpaper']);


// university admission

Route::get('/university-admission', [App\Http\Controllers\Frontend\UniversityAdmissionController::class, 'index']);


