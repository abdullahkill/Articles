
@extends('admin.layout.layou')
@section('content')




    <!-- end::navigation -->

    <!-- begin::main-content -->
    <main class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>View Agent</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="adminindex">Dashboard</a>
                        </li>
                        
                        <li class="breadcrumb-item active" aria-current="page">View Agent</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page-header -->

        <div class="container-fluid">

            

                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>                                  
                                </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach($shows as $show)
                                <tr>
                                    <td>{{$show->name}}</td>
                                    <td>{{$show->email}}</td>
                                    <td>
@if($show->status==1)
    Waiting
@elseif($show->status==2)
    Active
@elseif($show->status==0)
    Pending
@else
    block

@endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                </table>
                            
                        </div>
                    </div>

           
    <!-- end::main-content -->

<!-- end::main -->
@endsection 