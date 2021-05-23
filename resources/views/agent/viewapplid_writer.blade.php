@extends('agent/layout/layou')
@section('content')


<main class="main-content">

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4>Add Writer</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/writerDashboard">Dashboard</a>/
                     <a href="/viewnotification">Notification</a>
                     <a href="/#">View Task</a>


                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Writer</li>

            </ol>
        </nav>
    </div>
</div>
         <div class="container-fluid">
         
                <div class="card">
                    <div class="card-body"> 
                    @if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}

</div>
@endif
                        <table id="example1"  class="table table-striped table-bordered " >
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th scope="col">Writer Name</th>
                                    <th>description</th>
                                    <th>Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($show as $shows)
                                <tr>
                                    <td>{{$shows->project->name}}</td>
                                    <td>{{$shows->register->name}}</td>
                                    <td>{{$shows->description}}</td>
                                    <td>
                                    @foreach($datas as $data)
                                    @if($data->applid_task_id==$shows->id)
                                    {{$data->category->name}},
                                    @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    <form action="/selectedWriter" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$shows->register_id}}"name="register">
                                    <input type="hidden" value="{{$shows->projectdetail_id}}"name="projectdetail">
                                    <input type="hidden" value="{{$shows->project_id}}"name="project">
                                    <input type="submit"  value="Selected" class="btn btn-primary"> 
                                    </form>
                                    </td>
                                    </tr>
                                     @endforeach
                        </tbody>     
                    </table>
                    
                </div>
            </div>
@endsection
