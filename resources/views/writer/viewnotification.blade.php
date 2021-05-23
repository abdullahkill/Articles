@extends('writer/layout/layou')
@section('content')

<main class="main-content">

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4>Task</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/writerDashboard">Dashboard</a>/
                     <a href="/viewnotification">Notification</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Task</li>
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
                                <th scope="col">Project</th>
                                    <th scope="col">Task name</th>
                                    <th scope="col">Task Description</th>
                                    <th scope="col">Task Start Date</th>
                                    <th scope="col">Task Delivery Date</th>
                                    <th scope="col">View Task</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no=1;
                            ?>
                            @foreach($show as $shows)
                                <tr>
                               
                                <td>{{$shows->project->name}}</td>
                                    <td>{{$shows->task_name}}</td>
                                    <td>{{$shows->task_dec}}</td>
                                     <td>{{$shows->start_date}}</td>
                                      <td>{{$shows->del_date}}</td>
                                    <td>
                                    <?php
$id=session()->get('LoggedUser')['id'];

  ?>      

                                    @empty($shows->register_id)
<?php 
$hello=0;
?>
     @foreach($edits as $edit)
   
     <?php 
     if($shows->id==$edit->projectdetail_id){
        $hello=1; 
    }
     ?>
     @endforeach    
     @if($hello==1)

<p class="btn btn-success">You have Applied</p>
@else                                    
<a href="javascript:void(0)" onclick="updateStudent({{$shows->id}})"><i class="fas fa-edit btn-sm btn-info"></i><a>
 @endif                                   @else
                                       <b class="btn btn-danger"> Booked</b>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>


            <div class="modal" tabindex="-1" role="dialog" id="updateProject">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="projectUpdateForm" action="{{route('hello')}}" method="post">
      <?php
 $id=session()->get('LoggedUser')['id'];

  ?>      

      @csrf
          <div class="form-group">
          <input type="hidden" name="user_id" value="{{$id}}" >
          <input type="hidden" name="project_id" id="project_id"> 
          <input type="hidden" name="projectdetail_id" id="projectdetail_id"> 

          <lable><b>Edit Project<b></lable>
          <input type="text" name="projectUpdate_name" id="projectUpdate_name" class="form-control" disabled>
          </div>
          <div class="form-group"> 
          <lable><b>Description<b></lable>
          <textarea name="description" id="" cols="30" rows="10" placeholder=""
                                               value="{{old('project')}}" required="" class="form-control"></textarea></div>


<div id="International" class="col-md-12">
<lable><b>Select<b></lable></br>       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>



@endsection
@section('edit')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    function updateStudent(id){

      $.get('/writer_update/' +id, function(hello){
       $("#projectdetail_id").val(hello.data['id']);
       $("#project_id").val(hello.data['project_id']);
       $("#projectUpdate_name").val(hello.data['task_name']);
console.log(hello.category.length);
var object1=hello.category;
for(a=0; a<5; a++){
var idCategory=object1[a].id;
var nameCategory=object1[a].name;
$("#International").append("<div class='form-group form-check btn btn-outline-info btn-rounded btn-uppercase' style='padding-left:30px;'><input type='checkbox' class='form-check-input ' name='check[]' value="+idCategory+" id='exampleCheck1'><label class='form-check-label'  for='exampleCheck1'>"+nameCategory+"</label></div>&nbsp&nbsp&nbsp ")
}


      $("#updateProject").modal('toggle');
     })
    }



    </script>




@endsection
