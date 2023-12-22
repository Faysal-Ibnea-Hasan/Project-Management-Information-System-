<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SupervisorController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\AssignController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\Seed_GroupController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// =================================================== ADMIN =================================================================
Route::controller(AdminController::class)->group(function () {
    Route::post('/admin_create','create_admin');
    Route::post('/admin_get','get_admin');
});
// =================================================== STUDENT =================================================================
Route::controller(StudentController::class)->group(function () {
    Route::post('/student_create','create_student');
    Route::post('/student_get','get_student');
    Route::post('/student_get_by_student_Id','get_student_by_student_Id');
    Route::post('/student_update','update_student');
    Route::delete('/student_delete','delete_student');
});
// =================================================== SUPERVISOR =================================================================
Route::controller(SupervisorController::class)->group(function () {
    Route::post('/supervisor_create','create_supervisor');
    Route::post('/supervisor_get','get_supervisor');
    Route::post('/supervisor_update','update_supervisor');
    Route::delete('/supervisor_delete','delete_supervisor');
});
// =================================================== PROJECT =================================================================
Route::controller(ProjectController::class)->group(function () {
    Route::post('/project_create','create_project');
    Route::post('/project_get','get_project');
    Route::post('/project_update','update_project');
    Route::delete('/project_delete','delete_project');
});
// =================================================== GROUP =================================================================
Route::controller(GroupController::class)->group(function () {
    Route::post('/group_create','create_group');
    Route::post('/group_get','get_group');
    Route::post('/group_update','update_group');
    Route::post('/group_delete','delete_group');
});
// =================================================== ATTENDANCE =================================================================
Route::controller(AttendanceController::class)->group(function () {
    Route::post('/attendance_create','create_attendance');
    Route::post('/attendance_get','get_attendance');
    Route::post('/attendance_update','update_attendance');
    Route::delete('/attendance_delete','delete_attendance');
});
// =================================================== ASSIGN =================================================================
Route::controller(AssignController::class)->group(function () {
    Route::post('/assign_create','create_assign');
    Route::post('/assign_get','get_assign');
    Route::post('/assign_update','update_assign');
    Route::delete('/assign_delete','delete_assign');
});
// =================================================== LOGIN =================================================================
Route::controller(LoginController::class)->group(function () {
    Route::post('/user_login','login_user');

});
// =================================================== REQUEST =================================================================
Route::controller(RequestController::class)->group(function () {
    Route::post('/request_student','send_request');
    Route::post('/accept_student','accept_request');
    Route::post('/get_request','get_request');
    Route::post('/reject_request','reject_request');

});
// =================================================== SEED_GROUP =================================================================
Route::controller(Seed_GroupController::class)->group(function () {
    Route::post('/create_seed','create_seed_group');
    Route::post('/get_seed','get_seed_group');
    Route::post('/get_seed_by_student_Id','get_seed_group_by_student_Id');

});
