<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/index',[
    'uses'=>'App\Http\Controllers\APIController@index',
    'as'=>'/index'
]);

Route::any('/site-info',[
    'uses'=>'App\Http\Controllers\APIController@siteInfo',
    'as'=>'/site-info'
]);

Route::any('/slider-images',[
    'uses'=>'App\Http\Controllers\APIController@sliderImages',
    'as'=>'/slider-images'
]);

Route::any('/get-gallery-image',[
    'uses'=>'App\Http\Controllers\APIController@getGalleryImage',
    'as'=>'/get-gallery-image'
]);

Route::any('/get-gallery-video',[
    'uses'=>'App\Http\Controllers\APIController@getGalleryVideo',
    'as'=>'/get-gallery-video'
]);

Route::any('/get-partners-logo',[
    'uses'=>'App\Http\Controllers\APIController@getPartnersLogo',
    'as'=>'/get-partners-logo'
]);

Route::any('/syllabus',[
    'uses'=>'App\Http\Controllers\APIController@syllabus',
    'as'=>'/syllabus'
]);

Route::any('/active-notice',[
    'uses'=>'App\Http\Controllers\APIController@activeNotice',
    'as'=>'/active-notice'
]);

Route::get('/get-divisions',[
    'uses'=>'App\Http\Controllers\APIController@getDivisions',
    'as'=>'get-divisions'
]);

Route::get('/get-districts/{id}',[
    'uses'=>'App\Http\Controllers\APIController@getDistricts',
    'as'=>'get-districts'
]);

Route::get('/get-categories',[
    'uses'=>'App\Http\Controllers\APIController@getCategories',
    'as'=>'get-categories'
]);

Route::get('/get-classes/{id}',[
    'uses'=>'App\Http\Controllers\APIController@getClasses',
    'as'=>'get-classes'
]);

Route::get('/get-all-classes',[
    'uses'=>'App\Http\Controllers\APIController@getAllClasses',
    'as'=>'get-all-classes'
]);

Route::any('/registration-status',[
    'uses'=>'App\Http\Controllers\APIController@registrationStatus',
    'as'=>'/registration-status'
]);

Route::any('/get-event-code',[
    'uses'=>'App\Http\Controllers\APIController@getEventCode',
    'as'=>'/get-event-code'
]);

Route::any('/avatar/upload',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@avatarUpload',
    'as'=>'/avatar/upload'
]);

Route::any('/avatar/edit',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@avatarEdit',
    'as'=>'/avatar/edit'
]);

Route::post('/participant-registration',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantRegistration',
    'as'=>'/participant-registration'
]);

Route::post('/participant-info-update',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantInfoUpdate',
    'as'=>'/participant-info-update'
]);

Route::post('/participant-login',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantLogin',
    'as'=>'/participant-login'
]);

Route::post('/participant-logout',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantLogout',
    'as'=>'/participant-logout'
]);

Route::any('/get-participant/{id}',[
    'uses'=>'App\Http\Controllers\ParticipantManagementController@getParticipant',
    'as'=>'/get-participant'
]);

Route::any('/get-participant-list/{divisionId}',[
    'uses'=>'App\Http\Controllers\APIController@getParticipantList',
    'as'=>'/get-participant-list'
]);

Route::any('/get-category-participant-list/{divisionId}/{categoryId}',[
    'uses'=>'App\Http\Controllers\APIController@getCategoryParticipantList',
    'as'=>'/get-category-participant-list'
]);

Route::any('/get-organizers',[
    'uses'=>'App\Http\Controllers\OrganizerManagementController@getOrganizers',
    'as'=>'/get-organizers'
]);

Route::any('/get-central-members',[
    'uses'=>'App\Http\Controllers\CentralCommitteeManagementController@getCentralMembers',
    'as'=>'/get-central-members'
]);

//Exam Question
Route::any('/get-question/{id}',[
    'uses'=>'App\Http\Controllers\APIQuestionManagementController@getQuestion',
    'as'=>'/get-question'
]);

Route::any('/get-question-paper',[
    'uses'=>'App\Http\Controllers\APIQuestionManagementController@getQuestionPaper',
    'as'=>'/get-question-paper'
]);

Route::any('/start-exam',[
    'uses'=>'App\Http\Controllers\APIQuestionManagementController@startExam',
    'as'=>'/start-exam'
]);

Route::any('/put-answer',[
    'uses'=>'App\Http\Controllers\APIQuestionManagementController@putAnswer',
    'as'=>'/put-answer'
]);

Route::any('/finish-exam',[
    'uses'=>'App\Http\Controllers\APIQuestionManagementController@finishExam',
    'as'=>'/finish-exam'
]);

Route::any('/get-student-answers',[
    'uses'=>'App\Http\Controllers\APIQuestionManagementController@getStudentAnswers',
    'as'=>'/get-student-answers'
]);

//Results


Route::any('/get-results',[
    'uses'=>'App\Http\Controllers\ResultManagementController@getPublishedResults',
    'as'=>'/get-results'
]);


// http://127.0.0.1:8000/api/get-featured-product
// http://127.0.0.1:8000/api/get-best-seller-product
// http://127.0.0.1:8000/api/get-all-category
// http://127.0.0.1:8000/api/get-all-category-product/{id}
// http://127.0.0.1:8000/api/get-all-sub-category-product/{id}
// http://127.0.0.1:8000/api/get-bread-crumb/{id}/{type}
// http://127.0.0.1:8000/api/product-image-gallery/{id}
