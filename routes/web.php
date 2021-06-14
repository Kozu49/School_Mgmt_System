<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SetupController;
use App\Http\Controllers\backend\FeeCategoryController;
use App\Http\Controllers\backend\FeeCategoryAmountController;
use App\Http\Controllers\backend\ExamController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\DesignationController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


//Logout Route
Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');


//User Management Route
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'ViewUser'])->name('user.view');
    Route::get('/add',[UserController::class,'AddUser'])->name('users.add');
    Route::post('/store',[UserController::class,'StoreUser'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class,'EditUser'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UpdateUser'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class,'DeleteUser'])->name('users.delete');

});

//Profile Management Route
Route::prefix('profile')->group(function(){
    Route::get('/view',[ProfileController::class,'ViewProfile'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'EditProfile'])->name('profile.edit');
    Route::post('/update/{id}',[ProfileController::class,'UpdateProfile'])->name('profile.update');
    Route::get('/password/update',[ProfileController::class,'EditPassword'])->name('password.edit');
    Route::post('/password/update/{id}',[ProfileController::class,'UpdatePassword'])->name('password.update');


});

//Setup Management Route
Route::prefix('setup')->group(function(){
    // student class 
    Route::get('student/class/view',[SetupController::class,'ViewStudentClass'])->name('student.class');
    Route::get('student/class/add',[SetupController::class,'AddStudentClass'])->name('student.class.add');
    Route::post('student/class/store',[SetupController::class,'StoreStudentClass'])->name('student.class.store');
    Route::get('student/class/edit/{id}',[SetupController::class,'EditStudentClass'])->name('student.class.edit');
    Route::post('student/class/update/{id}',[SetupController::class,'UpdateStudentClass'])->name('student.class.update');
    Route::get('student/class/delete/{id}',[SetupController::class,'DeleteStudentClass'])->name('student.class.delete');

    //student year
    Route::get('student/year/view',[SetupController::class,'ViewStudentYear'])->name('student.year');
    Route::get('student/year/add',[SetupController::class,'AddStudentYear'])->name('student.year.add');
    Route::post('student/year/store',[SetupController::class,'StoreStudentyear'])->name('student.year.store');
    Route::get('student/year/edit/{id}',[SetupController::class,'EditStudentyear'])->name('student.year.edit');
    Route::post('student/year/update/{id}',[SetupController::class,'UpdateStudentYear'])->name('student.year.update');
    Route::get('student/year/delete/{id}',[SetupController::class,'DeleteStudentYear'])->name('student.year.delete');

    //student group
    Route::get('student/group/view',[SetupController::class,'ViewStudentGroup'])->name('student.group');
    Route::get('student/group/add',[SetupController::class,'AddStudentGroup'])->name('student.group.add');
    Route::post('student/group/store',[SetupController::class,'StoreStudentGroup'])->name('student.group.store');
    Route::get('student/group/edit/{id}',[SetupController::class,'EditStudentGroup'])->name('student.group.edit');
    Route::post('student/group/update/{id}',[SetupController::class,'UpdateStudentGroup'])->name('student.group.update');
    Route::get('student/group/delete/{id}',[SetupController::class,'DeleteStudentGroup'])->name('student.group.delete');

    //Student shift
    Route::get('student/shift/view',[SetupController::class,'ViewStudentShift'])->name('student.shift');
    Route::get('student/shift/add',[SetupController::class,'AddStudentShift'])->name('student.shift.add');
    Route::post('student/shift/store',[SetupController::class,'StoreStudentShift'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}',[SetupController::class,'EditStudentShift'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}',[SetupController::class,'UpdateStudentShift'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}',[SetupController::class,'DeleteStudentShift'])->name('student.shift.delete');

    //Fee category
    Route::get('fee/category/view',[FeeCategoryController::class,'ViewFeeCategory'])->name('fee.category');
    Route::get('fee/category/add',[FeeCategoryController::class,'AddFeeCategory'])->name('fee.category.add');
    Route::post('fee/category/store',[FeeCategoryController::class,'StoreFeeCategory'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}',[FeeCategoryController::class,'EditFeeCategory'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}',[FeeCategoryController::class,'UpdateFeeCategory'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}',[FeeCategoryController::class,'DeleteFeeCategory'])->name('fee.category.delete');

    //Fee category amount
    Route::get('fee/category/amount/view',[FeeCategoryAmountController::class,'ViewFeeCategoryAmount'])->name('fee.category.amount');
    Route::get('fee/category/amount/add',[FeeCategoryAmountController::class,'AddFeeCategoryAmount'])->name('fee.category.amount.add');
    Route::post('fee/category/amount/store',[FeeCategoryAmountController::class,'StoreFeeCategoryAmount'])->name('fee.category.amount.store');
    Route::get('fee/category/amount/edit/{fee_category_id}',[FeeCategoryAmountController::class,'EditFeeCategoryAmount'])->name('fee.category.amount.edit');
    Route::post('fee/category/amount/update/{fee_category_id}',[FeeCategoryAmountController::class,'UpdateFeeCategoryAmount'])->name('update.fee.amount');
    Route::get('fee/category/amount/details/{fee_category_id}',[FeeCategoryAmountController::class,'DetailsFeeCategoryAmount'])->name('fee.category.amount.details');

    //Exam Type
    Route::get('exam/type/view',[ExamController::class,'ViewExamType'])->name('exam.type.view');
    Route::get('exam/type/add',[ExamController::class,'AddExamType'])->name('exam.type.add');
    Route::post('exam/type/store',[ExamController::class,'StoreExamType'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}',[ExamController::class,'EditExamType'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}',[ExamController::class,'UpdateExamType'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}',[ExamController::class,'DeleteExamType'])->name('exam.type.delete');

    //School Subject
    Route::get('school/subject/view',[SubjectController::class,'ViewSchoolSubject'])->name('school.subject.view');
    Route::get('school/subject/add',[SubjectController::class,'AddSchoolSubject'])->name('school.subject.add');
    Route::post('school/subject/store',[SubjectController::class,'StoreSchoolSubject'])->name('school.subject.store');
    Route::get('school/subject/edit/{id}',[SubjectController::class,'EditSchoolSubject'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}',[SubjectController::class,'UpdateSchoolSubject'])->name('school.subject.update');
    Route::get('school/subject/delete/{id}',[SubjectController::class,'DeleteSchoolSubject'])->name('school.subject.delete');

    //Assign Subject
    Route::get('assign/subject/view',[SubjectController::class,'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add',[SubjectController::class,'AddAssignSubject'])->name('assign.subject.add');
    Route::post('assign/subject/store',[SubjectController::class,'StoreAssignSubject'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{class_id}',[SubjectController::class,'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{class_id}',[SubjectController::class,'UpdateAssignSubject'])->name('assign.subject.update');
    Route::get('assign/subject/details/{class_id}',[SubjectController::class,'DetailsAssignSubject'])->name('assign.subject.details');

    //Designation
    Route::get('designation/view',[DesignationController::class,'ViewDesignation'])->name('designation.view');
    Route::get('designation/add',[DesignationController::class,'AddDesignation'])->name('designation.add');
    Route::post('designation/store',[DesignationController::class,'StoreDesignation'])->name('designation.store');
    Route::get('designation/edit/{id}',[DesignationController::class,'EditDesignation'])->name('designation.edit');
    Route::post('designation/update/{id}',[DesignationController::class,'UpdateDesignation'])->name('designation.update');
    Route::get('designation/delete/{id}',[DesignationController::class,'DeleteDesignation'])->name('designation.delete');


});
