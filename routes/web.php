<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ColorController;

Route::any('/', [
    'uses'=>'App\Http\Controllers\AdminLoginController@login',
    'as'=>'/',
    'middleware'=>['guest']
]);

Route::any('/dashboard', [
    'uses'=>'App\Http\Controllers\AdminDashboardController@index',
    'as'=>'dashboard',
    'middleware'=>['auth:sanctum', 'verified']
]);

//=================Participants Management Routes Start===================//
Route::any('/district-wise-participants', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@districtWiseParticipantsForm',
    'as'=>'district-wise-participants',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-and-category-wise-participant', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@districtAndCategoryWiseParticipant',
    'as'=>'district-and-category-wise-participant',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-wise-participants', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@divisionWiseParticipantsForm',
    'as'=>'division-wise-participants',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-and-category-wise-participant', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@divisionAndCategoryWiseParticipant',
    'as'=>'division-and-category-wise-participant',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/participants-reg-no-edit', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantsRegNoEditForm',
    'as'=>'participants-reg-no-edit',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/participant-reg-no-edit-form', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantRegNoEditForm',
    'as'=>'participant-reg-no-edit-form',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/participant-reg-no-update', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantRegNoUpdate',
    'as'=>'participant-reg-no-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/participant-info-edit/{id}', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantInfoEdit',
    'as'=>'participant-info-edit',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/participant-basic-info-update', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@participantBasicInfoUpdate',
    'as'=>'participant-basic-info-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-wise-participants', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@categoryWiseParticipantForm',
    'as'=>'category-wise-participants',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-wise-participant', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@categoryWiseParticipant',
    'as'=>'category-wise-participant',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Participants Management Routes Start===================//

//=================BdPhO Management Routes Start===================//
Route::any('/bdpho', [
    'uses'=>'App\Http\Controllers\BdPhOManagementController@index',
    'as'=>'bdpho',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/bdpho-add', [
    'uses'=>'App\Http\Controllers\BdPhOManagementController@store',
    'as'=>'bdpho-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/bdpho-update', [
    'uses'=>'App\Http\Controllers\BdPhOManagementController@update',
    'as'=>'bdpho-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/bdpho-delete/{id}', [
    'uses'=>'App\Http\Controllers\BdPhOManagementController@delete',
    'as'=>'bdpho-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-bdpho-status/{id}', [
    'uses'=>'App\Http\Controllers\BdPhOManagementController@updateStatus',
    'as'=>'update-bdpho-status',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-registration-status/{id}', [
    'uses'=>'App\Http\Controllers\BdPhOManagementController@updateRegistrationStatus',
    'as'=>'update-registration-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================BdPhO Management Routes End===================//

//=================Round Management Routes Start===================//
Route::any('/round', [
    'uses'=>'App\Http\Controllers\RoundManagementController@index',
    'as'=>'round',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/round-add', [
    'uses'=>'App\Http\Controllers\RoundManagementController@store',
    'as'=>'round-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/round-update', [
    'uses'=>'App\Http\Controllers\RoundManagementController@update',
    'as'=>'round-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/round-delete/{id}', [
    'uses'=>'App\Http\Controllers\RoundManagementController@delete',
    'as'=>'round-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-round-status/{id}', [
    'uses'=>'App\Http\Controllers\RoundManagementController@updateStatus',
    'as'=>'update-round-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Round Management Routes End===================//

//=================Division Management Routes Start===================//
Route::any('/division', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@index',
    'as'=>'division',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-add', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@store',
    'as'=>'division-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-update', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@update',
    'as'=>'division-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-delete/{id}', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@delete',
    'as'=>'division-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-division-status/{id}', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@updateStatus',
    'as'=>'update-division-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Division Management Routes End===================//

//=================District Management Routes Start===================//
Route::any('/district', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@index',
    'as'=>'district',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-add', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@store',
    'as'=>'district-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-update', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@update',
    'as'=>'district-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-delete/{id}', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@delete',
    'as'=>'district-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-district-status/{id}', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@updateStatus',
    'as'=>'update-district-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================District Management Routes End===================//

//=================Region Management Routes Start=================//
Route::any('/region', [
    'uses'=>'App\Http\Controllers\RegionManagementController@index',
    'as'=>'region',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/region-add', [
    'uses'=>'App\Http\Controllers\RegionManagementController@store',
    'as'=>'region-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/region-update', [
    'uses'=>'App\Http\Controllers\RegionManagementController@update',
    'as'=>'region-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/region-delete/{id}', [
    'uses'=>'App\Http\Controllers\RegionManagementController@delete',
    'as'=>'region-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-region-status/{id}', [
    'uses'=>'App\Http\Controllers\RegionManagementController@updateStatus',
    'as'=>'update-region-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Region Management Routes End===================//

//=================Class Management Routes Start=================//
Route::any('/class', [
    'uses'=>'App\Http\Controllers\ClassManagementController@index',
    'as'=>'class',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/class-add', [
    'uses'=>'App\Http\Controllers\ClassManagementController@store',
    'as'=>'class-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/class-update', [
    'uses'=>'App\Http\Controllers\ClassManagementController@update',
    'as'=>'class-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/class-delete/{id}', [
    'uses'=>'App\Http\Controllers\ClassManagementController@delete',
    'as'=>'class-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-class-status/{id}', [
    'uses'=>'App\Http\Controllers\ClassManagementController@updateStatus',
    'as'=>'update-class-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Class Management Routes End===================//

//=================Category Management Routes Start=================//
Route::any('/category', [
    'uses'=>'App\Http\Controllers\CategoryManagementController@index',
    'as'=>'category',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-add', [
    'uses'=>'App\Http\Controllers\CategoryManagementController@store',
    'as'=>'category-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-update', [
    'uses'=>'App\Http\Controllers\CategoryManagementController@update',
    'as'=>'category-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-delete/{id}', [
    'uses'=>'App\Http\Controllers\CategoryManagementController@delete',
    'as'=>'category-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-category-status/{id}', [
    'uses'=>'App\Http\Controllers\CategoryManagementController@updateStatus',
    'as'=>'update-category-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Category Management Routes End===================//

//=================Notice Management Routes Start=================//
Route::any('/notice', [
    'uses'=>'App\Http\Controllers\NoticeManagementController@index',
    'as'=>'notice',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/notice-add', [
    'uses'=>'App\Http\Controllers\NoticeManagementController@store',
    'as'=>'notice-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/notice-update', [
    'uses'=>'App\Http\Controllers\NoticeManagementController@update',
    'as'=>'notice-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/notice-delete/{id}', [
    'uses'=>'App\Http\Controllers\NoticeManagementController@delete',
    'as'=>'notice-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-notice-status/{id}', [
    'uses'=>'App\Http\Controllers\NoticeManagementController@updateStatus',
    'as'=>'update-notice-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Notice Management Routes End===================//

//=================Page Management Routes Start=================//
Route::any('/pages', [
    'uses'=>'App\Http\Controllers\PageManagementController@index',
    'as'=>'pages',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/page-add', [
    'uses'=>'App\Http\Controllers\PageManagementController@store',
    'as'=>'page-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/page-edit', [
    'uses'=>'App\Http\Controllers\PageManagementController@pageEdit',
    'as'=>'page-edit',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/page-update', [
    'uses'=>'App\Http\Controllers\PageManagementController@update',
    'as'=>'page-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/page-delete/{id}', [
    'uses'=>'App\Http\Controllers\PageManagementController@delete',
    'as'=>'page-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-page-status/{id}', [
    'uses'=>'App\Http\Controllers\PageManagementController@updateStatus',
    'as'=>'update-page-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Page Management Routes End===================//

//=================Syllabus Management Routes Start=================//
Route::any('/syllabus', [
    'uses'=>'App\Http\Controllers\SyllabusManagementController@index',
    'as'=>'syllabus',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/syllabus-add', [
    'uses'=>'App\Http\Controllers\SyllabusManagementController@store',
    'as'=>'syllabus-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/syllabus-update', [
    'uses'=>'App\Http\Controllers\SyllabusManagementController@update',
    'as'=>'syllabus-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/syllabus-delete/{id}', [
    'uses'=>'App\Http\Controllers\SyllabusManagementController@delete',
    'as'=>'syllabus-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-syllabus-status/{id}', [
    'uses'=>'App\Http\Controllers\SyllabusManagementController@updateStatus',
    'as'=>'update-syllabus-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Syllabus Management Routes End===================//

//=================Question Paper Management Routes Start=================//
Route::any('/question-paper', [
    'uses'=>'App\Http\Controllers\QuestionPaperManagementController@index',
    'as'=>'question-paper',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-paper-add', [
    'uses'=>'App\Http\Controllers\QuestionPaperManagementController@store',
    'as'=>'question-paper-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-paper-update', [
    'uses'=>'App\Http\Controllers\QuestionPaperManagementController@update',
    'as'=>'question-paper-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-paper-delete/{id}', [
    'uses'=>'App\Http\Controllers\QuestionPaperManagementController@delete',
    'as'=>'question-paper-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-question-paper-status/{id}', [
    'uses'=>'App\Http\Controllers\QuestionPaperManagementController@updateStatus',
    'as'=>'update-question-paper-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Question Paper Management Routes End===================//

//=================Question Management Routes Start===================//
Route::any('/questions/{id}', [
    'uses'=>'App\Http\Controllers\QuestionManagementController@index',
    'as'=>'questions',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-add', [
    'uses'=>'App\Http\Controllers\QuestionManagementController@store',
    'as'=>'question-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-update', [
    'uses'=>'App\Http\Controllers\QuestionManagementController@update',
    'as'=>'question-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-delete/{id}', [
    'uses'=>'App\Http\Controllers\QuestionManagementController@delete',
    'as'=>'question-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-question-status/{id}', [
    'uses'=>'App\Http\Controllers\QuestionManagementController@updateStatus',
    'as'=>'update-question-status',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-delete/{id}', [
    'uses'=>'App\Http\Controllers\QuestionManagementController@delete',
    'as'=>'question-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Question  Management Routes End===================//

//=================Option Management Routes Start===================//
Route::any('/options/{id}', [
    'uses'=>'App\Http\Controllers\OptionManagementController@index',
    'as'=>'options',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/option-add', [
    'uses'=>'App\Http\Controllers\OptionManagementController@store',
    'as'=>'option-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/option-update', [
    'uses'=>'App\Http\Controllers\OptionManagementController@update',
    'as'=>'option-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/option-delete/{id}', [
    'uses'=>'App\Http\Controllers\OptionManagementController@delete',
    'as'=>'option-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-option-status/{id}', [
    'uses'=>'App\Http\Controllers\OptionManagementController@updateStatus',
    'as'=>'update-option-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Option  Management Routes End===================//

//=================Question Management Routes Start===================//
Route::any('/question-images', [
    'uses'=>'App\Http\Controllers\QuestionImageManagementController@index',
    'as'=>'question-images',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-image-add', [
    'uses'=>'App\Http\Controllers\QuestionImageManagementController@store',
    'as'=>'question-image-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-image-update', [
    'uses'=>'App\Http\Controllers\QuestionImageManagementController@update',
    'as'=>'question-image-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/question-image-delete/{id}', [
    'uses'=>'App\Http\Controllers\QuestionImageManagementController@delete',
    'as'=>'question-image-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Question  Management Routes End===================//

//=================Exam Participant  Management Routes End===================//
Route::any('/exam-participant', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@examParticipant',
    'as'=>'exam-participant',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/exam-list', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@examList',
    'as'=>'exam-list',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-wise-exam-participant', [
    'uses'=>'App\Http\Controllers\ParticipantManagementController@categoryWiseExamParticipant',
    'as'=>'category-wise-exam-participant',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/delete-answer-script', [
    'uses'=>'App\Http\Controllers\ResultManagementController@deleteAnswerScript',
    'as'=>'delete-answer-script',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/open-script/{id}', [
    'uses'=>'App\Http\Controllers\ResultManagementController@openScript',
    'as'=>'open-script',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/answer-delete/{id}', [
    'uses'=>'App\Http\Controllers\ResultManagementController@answerDelete',
    'as'=>'answer-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/result-correction', [
    'uses'=>'App\Http\Controllers\ResultManagementController@resultCorrection',
    'as'=>'result-correction',
    'middleware'=>['auth:sanctum', 'verified']
]);




//=================Question  Management Routes End===================//

//=================Result  Management Routes Start===================//
Route::any('/division-wise-result', [
    'uses'=>'App\Http\Controllers\ResultManagementController@divisionWiseResultForm',
    'as'=>'division-wise-result',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/category-and-division-wise-result', [
    'uses'=>'App\Http\Controllers\ResultManagementController@categoryAndDivisionWiseResult',
    'as'=>'category-and-division-wise-result',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Result  Management Routes End===================//

//=================Participant Selection Routes Start===================//
Route::any('/participant-selection', [
    'uses'=>'App\Http\Controllers\ParticipantSelectionManagementController@index',
    'as'=>'participant-selection',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-wise-result-for-selection', [
    'uses'=>'App\Http\Controllers\ParticipantSelectionManagementController@divisionWiseResultForSelection',
    'as'=>'division-wise-result-for-selection',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/select-for-the-next-round', [
    'uses'=>'App\Http\Controllers\ParticipantSelectionManagementController@selectForTheNextRound',
    'as'=>'select-for-the-next-round',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/selected-participant', [
    'uses'=>'App\Http\Controllers\ParticipantSelectionManagementController@selectedParticipant',
    'as'=>'selected-participant',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/selected-participant-list', [
    'uses'=>'App\Http\Controllers\ParticipantSelectionManagementController@selectedParticipantList',
    'as'=>'selected-participant-list',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/selected-participant-download', [
    'uses'=>'App\Http\Controllers\ParticipantSelectionManagementController@selectedParticipantDownload',
    'as'=>'selected-participant-download',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Participant Selection Routes End===================//

//=================Past Paper Management Routes Start=================//
Route::any('/past-paper', [
    'uses'=>'App\Http\Controllers\PastPaperManagementController@index',
    'as'=>'past-paper',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/past-paper-add', [
    'uses'=>'App\Http\Controllers\PastPaperManagementController@store',
    'as'=>'past-paper-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/past-paper-update', [
    'uses'=>'App\Http\Controllers\PastPaperManagementController@update',
    'as'=>'past-paper-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/past-paper-delete/{id}', [
    'uses'=>'App\Http\Controllers\PastPaperManagementController@delete',
    'as'=>'past-paper-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-past-paper-status/{id}', [
    'uses'=>'App\Http\Controllers\PastPaperManagementController@updateStatus',
    'as'=>'update-past-paper-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Past Paper Management Routes End===================//

//=================Uploaded file Management Routes Start=================//
Route::any('/file-manager', [
    'uses'=>'App\Http\Controllers\FileManagerController@index',
    'as'=>'file-manager',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/file-add', [
    'uses'=>'App\Http\Controllers\FileManagerController@store',
    'as'=>'file-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/file-update', [
    'uses'=>'App\Http\Controllers\FileManagerController@update',
    'as'=>'file-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/file-delete/{id}', [
    'uses'=>'App\Http\Controllers\FileManagerController@delete',
    'as'=>'file-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-file-status/{id}', [
    'uses'=>'App\Http\Controllers\FileManagerController@updateStatus',
    'as'=>'update-file-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Uploaded file Management Routes End===================//

//=================Partner Management Routes Start=================//
Route::any('/partner', [
    'uses'=>'App\Http\Controllers\PartnerManagementController@index',
    'as'=>'partner',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/partner-add', [
    'uses'=>'App\Http\Controllers\PartnerManagementController@store',
    'as'=>'partner-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/partner-update', [
    'uses'=>'App\Http\Controllers\PartnerManagementController@update',
    'as'=>'partner-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/partner-delete/{id}', [
    'uses'=>'App\Http\Controllers\PartnerManagementController@delete',
    'as'=>'partner-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-partner-status/{id}', [
    'uses'=>'App\Http\Controllers\PartnerManagementController@updateStatus',
    'as'=>'update-partner-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Partner Management Routes End===================//

//=================Slider Management Routes Start=================//
Route::any('/slider', [
    'uses'=>'App\Http\Controllers\SliderManagementController@index',
    'as'=>'slider',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/slider-add', [
    'uses'=>'App\Http\Controllers\SliderManagementController@store',
    'as'=>'slider-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/slider-update', [
    'uses'=>'App\Http\Controllers\SliderManagementController@update',
    'as'=>'slider-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/slider-delete/{id}', [
    'uses'=>'App\Http\Controllers\SliderManagementController@delete',
    'as'=>'slider-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-slider-status/{id}', [
    'uses'=>'App\Http\Controllers\SliderManagementController@updateStatus',
    'as'=>'update-slider-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Slider Management Routes End===================//

//=================Organizer Management Routes Start=================//
Route::any('/organizer', [
    'uses'=>'App\Http\Controllers\OrganizerManagementController@index',
    'as'=>'organizer',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/organizer-add', [
    'uses'=>'App\Http\Controllers\OrganizerManagementController@store',
    'as'=>'organizer-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/organizer-update', [
    'uses'=>'App\Http\Controllers\OrganizerManagementController@update',
    'as'=>'organizer-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/organizer-delete/{id}', [
    'uses'=>'App\Http\Controllers\OrganizerManagementController@delete',
    'as'=>'organizer-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-organizer-status/{id}', [
    'uses'=>'App\Http\Controllers\OrganizerManagementController@updateStatus',
    'as'=>'update-organizer-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Organizer Management Routes End===================//

//=================Central Committee Management Routes Start=================//
Route::any('/central-member', [
    'uses'=>'App\Http\Controllers\CentralCommitteeManagementController@index',
    'as'=>'central-member',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/central-member-add', [
    'uses'=>'App\Http\Controllers\CentralCommitteeManagementController@store',
    'as'=>'central-member-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/central-member-update', [
    'uses'=>'App\Http\Controllers\CentralCommitteeManagementController@update',
    'as'=>'central-member-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/central-member-delete/{id}', [
    'uses'=>'App\Http\Controllers\CentralCommitteeManagementController@delete',
    'as'=>'central-member-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-central-member-status/{id}', [
    'uses'=>'App\Http\Controllers\CentralCommitteeManagementController@updateStatus',
    'as'=>'update-central-member-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Central Committee Management Routes End===================//

//=================Gallery Management Routes Start=================//
Route::any('/gallery', [
    'uses'=>'App\Http\Controllers\GalleryManagementController@index',
    'as'=>'gallery',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/gallery-add', [
    'uses'=>'App\Http\Controllers\GalleryManagementController@store',
    'as'=>'gallery-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/gallery-update', [
    'uses'=>'App\Http\Controllers\GalleryManagementController@update',
    'as'=>'gallery-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/gallery-delete/{id}', [
    'uses'=>'App\Http\Controllers\GalleryManagementController@delete',
    'as'=>'gallery-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-gallery-status/{id}', [
    'uses'=>'App\Http\Controllers\GalleryManagementController@updateStatus',
    'as'=>'update-gallery-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Gallery Management Routes End===================//

//=================Site Basic Info Management Routes Start===================//
Route::any('/district-wise-sms', [
    'uses'=>'App\Http\Controllers\SMSManagementController@districtWiseSMS',
    'as'=>'district-wise-sms',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-wise-sms-form', [
    'uses'=>'App\Http\Controllers\SMSManagementController@districtWiseSMSForm',
    'as'=>'district-wise-sms-form',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-wise-sms', [
    'uses'=>'App\Http\Controllers\SMSManagementController@divisionWiseSMS',
    'as'=>'division-wise-sms',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-wise-sms-form', [
    'uses'=>'App\Http\Controllers\SMSManagementController@divisionWiseSMSForm',
    'as'=>'division-wise-sms-form',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-wise-sms-send', [
    'uses'=>'App\Http\Controllers\SMSManagementController@divisionWiseSMSSend',
    'as'=>'division-wise-sms-send',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Site Basic Info Management Routes End===================//

//=================Site Basic Info Management Routes Start===================//
Route::any('/site-info', [
    'uses'=>'App\Http\Controllers\SiteManagementController@index',
    'as'=>'site-info',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/site-info-update', [
    'uses'=>'App\Http\Controllers\SiteManagementController@siteInfoUpdate',
    'as'=>'site-info-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

//=================Site Basic Info Management Routes End===================//

//=================User Management Routes Start===================//
Route::any('/users', [
    'uses'=>'App\Http\Controllers\UserManagementController@index',
    'as'=>'users',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/user-add', [
    'uses'=>'App\Http\Controllers\UserManagementController@store',
    'as'=>'user-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/user-update', [
    'uses'=>'App\Http\Controllers\UserManagementController@update',
    'as'=>'user-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/user-avatar-update', [
    'uses'=>'App\Http\Controllers\UserManagementController@avatarUpdate',
    'as'=>'user-avatar-update',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================User Management Routes End===================//

//=================Role Management Routes Start===================//
Route::group(['prefix'=>'admin'], function (){
    Route::resource('roles','App\Http\Controllers\RoleManagementController',['names'=>'admin.roles'])->middleware(['auth:web', 'verified']);
});

//=================Role Management Routes End===================//

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

if (App\Models\User::exists()){
    Route::get('/register', function() {
        return redirect('/login');
    });
}
