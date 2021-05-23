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
                                  
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($show as $shows)
                                <tr>
                                    <td>{{$shows->applid_task->description}}</td>
                                    <td>{{$shows->category->name}}</td>
                                    </form>
                                    </td>
                                    </tr>
                                     @endforeach
                        </tbody>     
                    </table>
                    
                </div>
            </div>
@endsection




