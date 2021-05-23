<?php

namespace App\Http\Controllers;

use App\Models\project_detail;
use App\Models\applid_task;
use Illuminate\Http\Request;
use App\Models\appliedwriter;

class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_task($id)
    {
        $shows = project_detail::where('project_id',$id)->get();
        return view('agent/viewtask',['show'=>$shows]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentByid($id)
    {
        $student = project_detail::find($id);
        return response()->json($student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(Request $request)
    {

        
        $student = project_detail::find($request->id);
         $student->task_name = $request->task_name;
         $student->task_dec = $request->task_dec;
         $student->start_date = $request->startDate;
         $student->del_date = $request->endDate;

        $student->save();
         return response()->json($student);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project_deatail  $project_deatail
     * @return \Illuminate\Http\Response
     */
    public function deleteStudent($id)
    {
        
        $student = project_detail::find($id);
       $student->delete();
        return response()->json([$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project_deatail  $project_deatail
     * @return \Illuminate\Http\Response
     */
    public function appliedtask(Request $request)
    {
        
      $data= new applid_task();
      $data->projectdetail_id=$request->projectdetail_id;
      $data->project_id	=$request->project_id;
      $data->register_id= $request->register_id;
      $data->save();
        return back()->with('success','You have Applied');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project_deatail  $project_deatail
     * @return \Illuminate\Http\Response
     */
    public function viewAppled_user($id)
    {
        $shows = applid_task::where('projectdetail_id', $id)->get();
        $data = appliedwriter::all();
        return view('agent/viewapplid_writer',['show'=>$shows,'datas'=>$data]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project_deatail  $project_deatail
     * @return \Illuminate\Http\Response
     */
    public function selectedWriter(Request $request)
    {
        $show = project_detail::find($request->projectdetail);
        $show->register_id = $request->register;
        $show->save();
        $id=$request->project;
        
         return redirect('/post_project')->with("success","User is Seleted");
    }
    public function side(Request $request)
    {
        
    dd($request);
    }

    
}
