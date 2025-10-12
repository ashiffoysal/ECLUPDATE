<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/auth/login',[App\Http\Controllers\Api\UserLoginController::class, 'login']);
Route::post('/auth/register',[App\Http\Controllers\Api\UserLoginController::class, 'register']);
Route::post('/auth/forget-password',[App\Http\Controllers\Api\UserLoginController::class, 'forgetpasssubmit']);
Route::post('/auth/forget-password-update',[App\Http\Controllers\Api\UserLoginController::class, 'forgetpasssupdatesubmit']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/test',[App\Http\Controllers\Api\UserDashboardController::class, 'newlogin']);
    Route::get('/myexam-booking-list',[App\Http\Controllers\Api\UserDashboardController::class, 'exambookingList']);
    Route::get('/myexam-booking-details/{booking_id}',[App\Http\Controllers\Api\UserDashboardController::class, 'examBookingDetails']);
    Route::get('/myexam-booking-delete/{booking_id}',[App\Http\Controllers\Api\UserDashboardController::class, 'examBookingDelete']);
    
    Route::get('/myexam-booking-statement/{booking_id}',[App\Http\Controllers\Api\UserDashboardController::class, 'examBookingStatement']);
    
    Route::post('/exam-booking-image-uploads',[App\Http\Controllers\Api\UserExamBookingController::class, 'imageUploads']);
    
    
    // ucas
    Route::get('/myexam-statement-entry',[App\Http\Controllers\Api\UserDashboardController::class, 'statementOfEntry']);
    
    Route::get('/myucasexam-booking-list',[App\Http\Controllers\Api\UserDashboardController::class, 'ucasExambookingList']);
    Route::get('/myucasexam-booking-details/{booking_id}',[App\Http\Controllers\Api\UserDashboardController::class, 'ucasExambookingDetails']);
    // Exam Booking
    Route::post('/candidate-exam-booking',[App\Http\Controllers\Api\UserExamBookingController::class, 'examBooking']);
    // ucas
    Route::post('/candidate-ucas-exam-booking',[App\Http\Controllers\Api\UserExamBookingController::class, 'ucasBooking']);
    
    Route::get('/my-profile',[App\Http\Controllers\Api\UserDashboardController::class, 'myProfile']);
    Route::post('/profile-update',[App\Http\Controllers\Api\UserDashboardController::class, 'profileUpdate']);
    Route::post('/password-update',[App\Http\Controllers\Api\UserDashboardController::class, 'passwordUpdate']);
    Route::get('/my-payment-history',[App\Http\Controllers\Api\UserDashboardController::class, 'userPaymentHistory']);
    Route::post('/auth/logout',[App\Http\Controllers\Api\UserLoginController::class, 'logout']);
    
    
    Route::post('/create-payment-intent',[App\Http\Controllers\Api\UserExamBookingController::class, 'paymentSubmit']);
    Route::post('/success-payment-data',[App\Http\Controllers\Api\UserExamBookingController::class, 'successSubmit']);
    Route::post('/create-bank-payment',[App\Http\Controllers\Api\UserExamBookingController::class, 'bankPayment']);
    
    Route::post('/delete-candidate-data',[App\Http\Controllers\Api\UserDashboardController::class, 'deleteCandidateData']);
    Route::post('/delete-candidate-account',[App\Http\Controllers\Api\UserDashboardController::class, 'deleteAccount']);
    
    
    
    
    
    Route::post('/create-ucas-payment-intent',[App\Http\Controllers\Api\UserExamBookingController::class, 'ucasPaymentSubmit']);
    Route::post('/ucas-success-payment-data',[App\Http\Controllers\Api\UserExamBookingController::class, 'ucasSuccessSubmit']);
});



Route::get('/special-access-requirements',[App\Http\Controllers\Api\UserExamBookingController::class, 'specialAccessRequirements']);
Route::get('/special-access-details',[App\Http\Controllers\Api\UserExamBookingController::class, 'specialAccessDetails']);


Route::post('/subject-details',[App\Http\Controllers\Api\UserExamBookingController::class, 'getSubjectIndividual']);
Route::post('/subject-list',[App\Http\Controllers\Api\UserExamBookingController::class, 'getSubjectList']);
Route::get('/exam-series-list',[App\Http\Controllers\Api\UserExamBookingController::class, 'getExamSeriesList']);
Route::get('/exam-board-list',[App\Http\Controllers\Api\UserExamBookingController::class, 'getExamBoardList']);
Route::get('/exam-board-by-exam-type',[App\Http\Controllers\Api\UserExamBookingController::class, 'getExamBoardType']);





Route::post('/contact-message',[App\Http\Controllers\Api\FrontendController::class, 'contactstore']);
Route::get('/company-information',[App\Http\Controllers\Api\FrontendController::class, 'companyInformation']);
Route::get('/individual-subject/price/{id}',[App\Http\Controllers\Api\FrontendController::class, 'getIndividualSubjectPrice']);
Route::get('/exam-type',[App\Http\Controllers\Api\FrontendController::class, 'getAllmenu']);

Route::get('/faq',[App\Http\Controllers\Api\FrontendController::class, 'faq']);
Route::get('/exam-entry-date-details',[App\Http\Controllers\Api\FrontendController::class, 'examEntreDate']);
// Route::get('/subject-fees/{examname}',[App\Http\Controllers\Api\FrontendController::class, 'getSubjectFees']);
Route::get('/subject-fees/gcse',[App\Http\Controllers\Api\FrontendController::class, 'gcseSubjectFees']);
Route::get('/subject-fees/igcse',[App\Http\Controllers\Api\FrontendController::class, 'igcseSubjectFees']);
Route::get('/subject-fees/alevel',[App\Http\Controllers\Api\FrontendController::class, 'alevelSubjectFees']);
Route::get('/subject-fees/aslevel',[App\Http\Controllers\Api\FrontendController::class, 'aslevelSubjectFees']);
Route::get('/subject-fees/aat',[App\Http\Controllers\Api\FrontendController::class, 'aatSubjectFees']);
Route::get('/subject-fees/acca',[App\Http\Controllers\Api\FrontendController::class, 'accaSubjectFees']);
Route::get('/subject-fees/functionalskills',[App\Http\Controllers\Api\FrontendController::class, 'functionalSkillsSubjectFees']);


Route::post('/mock-subject-details',[App\Http\Controllers\Api\UserExamBookingController::class, 'getMockSubject']);
Route::post('/mock-paper-fees',[App\Http\Controllers\Api\UserExamBookingController::class, 'mockPrice']);






