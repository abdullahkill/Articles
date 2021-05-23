<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\project_detail;
use App\Models\applid_task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_project(Request $request)
    {

        $request->validate([
            'project'=>'required'
       ]);

        $data= new project();
        $data->name = $request->project;
        $data->project_dec=$request->project_dec;
        $data->start_date=$request->start_date;
        $data->del_date=$request->del_date;
        $save=$data->save();
        if($data){
            return redirect('post_project')->with('success','You are rejecter successfully.Plz Login');
            
        }else{
            return back()->with('error','Something went Wrong');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function addtask()
    {
        $shows = project::all();
        return view('agent/taskproject',['show'=>$shows]);

    }
    public function notification()
    {
        $shows = project::orderBy('id', 'DESC')->get();
        return view('writer/notification',['show'=>$shows]);

    }

    public function applytask($id,$idea)
    {
        $shows = project_detail::where('project_id', $id)->get();
      
         $edit  = DB::table('applid_tasks')
         ->where('project_id',$id)
         ->where('register_id',$idea)->get();
       return view('writer/viewnotification',['show'=>$shows,'edits'=>$edit]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getStudentByid($id)
    {
        $student = project::find($id);
        return response()->json($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function createProjectDetail(request $request)
    {
        $student = new project_detail();
        $student->task_name = $request->project_task;
        $student->project_id = $request->project_id;
        $student->task_dec = $request->task_dec;
        $student->start_date = $request->start_date;
        $student->del_date = $request->del_date;
        $student->number_word = $request->words;
        $student->save();
        return back()->with('success','Task is added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function getId($id)
    {
        $data = project::find($id);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function getProjectId($id)
    {
        $data = project::find($id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function updateProject(Request $request){
        
       
           $data = project::find($request->id);
           $data->name = $request->name;
           $data->project_dec = $request->project_desc;
           $data->start_date = $request->start_date;
           $data->del_date = $request->end_date;
           
           $data->save();
        return response()->json($data);

    }
    public function deleteStudent($id)
    {
        $student = project::find($id);
        $student->delete();
        return response()->json(['success'=>'record has been deleted']);
    }
}
