<?php

use App\Models\Attendance;
use Illuminate\Support\Str;
use App\Http\Controllers\Exams\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Exams\ExamController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Students\FeeController;
// use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\ReceiptStudentsController;

use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Students\GraduatedController;
use App\Http\Controllers\Students\PromotionController;
use App\Http\Controllers\Students\FeeInvoiceController;
use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Meetings\ZoomController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\Students\ProcessingFeeController;
use App\Http\Controllers\Students\PaymentStudentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>['guest']] , function(){

    Route::get('/', function () {
        return view('auth.login');
    });

});


Route::delete('classrooms-bulk-delete' , [ClassroomController::class , 'bulkDelete'])->name('classroom.bulkdelete');



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'  ,'auth' ]
    ], function(){ 

        // Route::get('/', function()
	    // {
		//      return View('dashboard');
	    // });
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

   //==============================Grades============================
        Route::resource('Grades' , GradeController::class);
   //==============================Classrooms============================
        Route::resource('Classrooms', ClassroomController::class);
        Route::post('delete_all', [ClassroomController::class, 'delete_all'])->name('delete_all');
        Route::post('Filter_Classes', [ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');

   //==============================Sections============================
        Route::resource('Sections', SectionController::class);
        Route::get('/classes/{id}', [SectionController::class ,'getclasses']);
        
   //==============================Parent============================
        Route::view('add_parent' , 'livewire.show_form');
        
   //==============================Teachers============================
        Route::resource('Teachers' , TeacherController::class);
   //==============================Students============================
     Route::resource('Students', StudentController::class);
     Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);
     Route::get('/Get_Sections/{id}', [StudentController::class , 'Get_Sections']);
     Route::post('/StoreStudentAttachments' , [StudentController::class , 'StoreStudentAttachments']);
     Route::get('/download_studnet_attachment/{name}/{fileName}' , [StudentController::class , 'download_studnet_attachment']);
     Route::get('/show_student_attachment/{name}/{fileName}', [StudentController::class , 'show_student_attachment']);
     Route::delete('/deleteStudentImage', [StudentController::class , 'deleteStudentImage']);

     Route::controller(GraduatedController::class)->group(function(){
          Route::get('Graduated/index' , 'index')->name('Graduated.index');
          Route::get('Graduated/create' , 'create');
          Route::post('Graduated/store' , 'store');
          Route::post('Graduated/restore' , 'restore');
          Route::delete('Graduated/destroy', 'destroy'); 
               
          });
          //******************** Accounts ********************** 
     Route::resource('Fees' , FeeController::class); 
     Route::resource('Fees_Invoices' , FeeInvoiceController::class);  
     Route::resource('receipt_students' , ReceiptStudentsController::class);  
     Route::resource('ProcessingFee', ProcessingFeeController::class);
     Route::resource('Payment_students', PaymentStudentController::class);



    //============================== Promotion Student ============================== 
    // Route::resource('/promotionStudent', PromotionController::class );
     Route::group(['namespace'=>'App\Http\Controllers\Students'] , function(){
          Route::resource('/Promotion', PromotionController::class );
          Route::get('/MangementPromotion' , [PromotionController::class , 'mangement_promotion'])->name('Promotion.mangement');
          Route::post('/unDoUpgrade/{id?}/{student_id?}' , [PromotionController::class , 'unDoUpgrade']);

     }); 

     Route::group(['namespace'=>'App\Http\Controllers\Attendance'] , function(){
          Route::resource('Attendance' , AttendanceController::class);
     });
     
     Route::group(['namespace'=>'App\Http\Controllers\Subject'] , function(){
          Route::resource('Subject' , SubjectController::class);
     });

        //==============================Quizzes============================
     Route::group(['namespace' => 'App\Http\Controllers\Quizzes'], function () {
          Route::resource('Quizzes', QuizzController::class);
     });
     //==============================Questions============================
     Route::group(['namespace'=>'App\Http\Controllers\Questions'] , function(){
          Route::resource('questions' , QuestionController::class);
     });

     //==============================MettingZoom============================
     Route::group(['namespace'=>'App\Http\Controllers\Meetings'] , function(){
          Route::resource('meetings' , ZoomController::class);
     });
        

 });
  
    
 




    


Auth::routes();

