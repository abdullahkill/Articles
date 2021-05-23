<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\project_detail;
use App\Models\applid_task;
use App\Models\appliedwriter;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category::orderby('id','DESC')->get();
        return view('admin/category',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmedicine(Request $request)
    {
        $data = new category();
       $data->name = $request->category;
       $data->save();
        return response()->json($data);
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_category($id)
    {
        $data = category::find($id);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryUpdate(Request $request){
        
       
        $data = category::find($request->id);
        $data->name = $request->name;
        $data->save();
     return response()->json($data);

 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function hello(Request $request)
    {

        $data = new applid_task();
        $data->projectdetail_id=$request->projectdetail_id;
        $data->project_id=$request->project_id;
        $data->description=$request->description;
        $data->register_id =$request->user_id;
        
        $data->save();

        
        
  $hi=count($request->check);
  for ($x = 0; $x < $hi; $x++) {
    $category=$request->check[$x];
    $table= new appliedwriter();
    $table->applid_task_id=$data->id;
    $table->category_id	=$category;
   $table->save();
  }
   return back()->with('success','you have applied');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function categorydelete($id)
    {
        $data = category::find($id);
          $data->delete();
          
        return response()->json([$id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function getAppledProjectById($id)
    {
        
        $hello =[
            'data' => project_detail::find($id),
        'category' => category::all()
        ];
        return response()->json($hello);
    }
    public function appliedwriters()
    {
        $data = appliedwriter::all();
        return view('agent/category',['show'=>$data]);
    }
}
