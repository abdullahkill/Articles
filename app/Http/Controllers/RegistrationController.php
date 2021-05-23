<?php

namespace App\Http\Controllers;

use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\helper;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailceck;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
       ]);

       $userInfo = register::where('email','=',$request->email)->first();

       if(!$userInfo){
           return back()->with('fail','We do not recognize your email address');
       }else{
           //check password
           if(Hash::check($request->password, $userInfo->password)){
               if($userInfo->role==1){
                                    $request->session()->put('role',$userInfo->role);
               $request->session()->put('LoggedUser', $userInfo);
               return redirect('adminindex');
                                  }elseif($userInfo->role==2){
                                    $request->session()->put('role',$userInfo->role);
                                    $request->session()->put('LoggedUser', $userInfo);
                                    return redirect('writerDashboard');
                                  }elseif($userInfo->role==3){
                                    $request->session()->put('LoggedUser', $userInfo);
                                    $request->session()->put('role',$userInfo->role);
                                    return redirect('agentDashboard');
                                  }else{
                                    return back()->with('fail','Incorrect userType');
                                  }

           }else{
               return back()->with('fail','Incorrect password');
           }
       }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:registers',
            'password'=> 'required|min:5|max:12'
        ]);
        $data= new register;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->role= 1;
        $data->status=1;
        $save=$data->save();
        if($data){

            
            return back()->with('success','You are rejecter successfully.Plz Login');
        }else{
            return back()->with('error','error 404');
        }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            session()->pull('role');

            return redirect('/');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    
    public function agent_mail(Request $request)
    {
        
        $request->validate([
                        'email'=>'required|email|unique:registers',
            
        ]);
        $student_name = $request->email;
        $password_id = Helper::IDGenerator(new register);
        $user_password="std";
        $password=$user_password.$password_id;
        $data= new register;
        $data->email=$request->email;
        $data->password=Hash::make($password);
        $data->role= 3;
        $data->status=1;
        $save=$data->save();
        if($data){
            $maildeatils=[
                'email'=>$request->email,
                'password'=>$password
            ];
            Mail::to($request->email)->send(new Mailceck($maildeatils));
            return back()->with('success','You are mail is sented successfully');
            
        }else{
            return back()->with('error','error 404');
        }
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */ 
    public function show(Request $request)
    {
        
        $request->validate([
                        'email'=>'required|email|unique:registers',
            
        ]);
        $student_name = $request->email;
        $password_id = Helper::IDGenerator(new register);
        $user_password="std";
        $password=$user_password.$password_id;
        $data= new register;
        $data->email=$request->email;
        $data->password=Hash::make($password);
        $data->role= 2;
        $data->status=1;
        $save=$data->save();
        if($data){
            $maildeatils=[
                'email'=>$request->email,
                'password'=>$password
            ];
            Mail::to($request->email)->send(new Mailceck($maildeatils));
            return back()->with('success','You are Successful send your mail');
            
        }else{
            return back()->with('error','error 404');
        }
    
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show_writer(register $register)
    {
        
        $show = register::where('role', 2)->get();
        return view('admin/view_writer',['shows'=>$show]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show_agent(Request $request, register $register)
    {
        
        $show = register::where('role', 3)->get();
        return view('admin/view_agent',['shows'=>$show]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(register $register)
    {
        //
    }
}
