@extends('writer/layout/layou')
@section('content')

<main class="main-content">

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4>Notifications</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/writerDashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Notification</li>
            </ol>
        </nav>
    </div>
</div>
         <div class="container-fluid">
         
                <div class="card">
                    <div class="card-body"> 
                        <table id="example1"  class="table table-striped table-bordered " >
                            <thead>
                                <tr>
                                    <th scope="col">Project</th>
                                    <th scope="col">Project Description</th>
                                    <th scope="col">Project Start Data</th>
                                    <th scope="col">Project Delivery date</th>
                                    <th scope="col">View Task</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            
                            $idea=session()->get('LoggedUser')['id'];
                            ?>
                            @foreach($show as $shows)
                                <tr>
                                    <td><a href="/applytask/{{$shows->id}}/{{$idea}}"> {{$shows->name}}</a></td>
                                <td>{{$shows->project_dec}}</td>
                                <td>{{$shows->start_date}}</td>
                                <td>{{$shows->del_date}}</td>
                                    <td><a href="/applytask/{{$shows->id}}/{{$idea}}"><i class="fas fa-tasks btn-primary"></i></a></td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>




@endsection