<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectDetailController;
use App\Http\Controllers\CategoryController;

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
    return view('admin/login');
});



Route::post('/registration',[RegistrationController::class,'create'])->name('save');
Route::post('/check',[RegistrationController::class,'index'])->name('save');
Route::post('mail',[RegistrationController::class,'show'])->name('save');
Route::post('agent_mail',[RegistrationController::class,'agent_mail'])->name('save');


Route::group(['middleware'=>['Authcheck']], function(){
                Route::get('/logout',[RegistrationController::class,'logout'])->name('logout');
                Route::view('adminindex','admin/index');
                
                Route::view('/signin','admin/login');
//admin
                Route::view('/signup','admin/register');
                Route::view('/writer','admin/mail_write')->name('write');
                Route::view('/agent','admin/mail_agent')->name('agent');
                Route::get('/view_writer',[RegistrationController::class,'show_writer']);
                Route::get('/view_agent',[RegistrationController::class,'show_agent']); 
                Route::view('writerDashboard','writer/dashboard');  
                Route::get('admin/category',[CategoryController::class,'index']); 
                
Route::post('admin/add_category',[CategoryController::class,'addmedicine'])->name('add_category');
Route::get('update_category/{id}',[CategoryController::class,'update_category']);
Route::put('categoryUpdate',[CategoryController::class,'categoryUpdate']);
Route::delete('/categorydelete/{id}',[CategoryController::class,'categorydelete']);


//agent
                Route::view('agentDashboard','agent/dashboard'); 
                Route::view('project','agent/project');
                Route::post('/create_post',[ProjectController::class,'post_project']);
                Route::get('/post_project',[ProjectController::class,'addtask']);
                Route::get('/students/{id}',[ProjectController::class,'getStudentByid']);
                Route::post('/create_task',[ProjectController::class,'createProjectDetail'])->name('create_task');
                Route::get('/project/{id}',[ProjectController::class,'getId']);
                Route::delete('students/{id}',[ProjectController::class,'deleteStudent']);
                Route::get('view_task/{id}',[ProjectDetailController::class,'view_task']);
                Route::get('/tasks/{id}',[ProjectDetailController::class,'getStudentByid']);
                Route::put('/tasks',[ProjectDetailController::class,'updateStudent'])->name("task.update");
                Route::delete('/tasksdelete/{id}',[ProjectDetailController::class,'deleteStudent']);
                Route::get('/project_update/{id}',[ProjectController::class,'getProjectId']);
                Route::put('/projectUpdate',[ProjectController::class,'updateProject']);
                Route::post('/selectedWriter',[ProjectDetailController::class,'selectedWriter']);
                Route::get('/appliedwriters',[CategoryController::class,'appliedwriters']);
                //writer
                Route::get('/viewnotification',[ProjectController::class,'notification']);
                Route::get('/applytask/{id}/{idea}',[ProjectController::class,'applytask']);
                Route::post('/applied_task',[ProjectDetailController::class,'appliedtask']);
                Route::get('/viewAppled_user/{id}',[ProjectDetailController::class,'viewAppled_user']);
                Route::get('/writer_update/{id}',[CategoryController::class,'getAppledProjectById']);            
            });




route::post('hello',[CategoryController::class,'hello'])->name('hello');