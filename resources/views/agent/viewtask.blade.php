@extends('agent/layout/layou')
@section('content')

 
<main class="main-content">

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4>View Task</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/agentDashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/post_project">Add Task</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View Task</li>
            </ol>
        </nav>
    </div>
</div>
<!-- end::page-header -->

<div class="container-fluid">

    

            <div class="card">
            @if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}

    </div>      
@endif

                <div class="card-body">
                    
                    <table id="example1"  class="table table-striped table-bordered " >
                        <thead>
                              <tr>
                                  <th scope="col">New Project</th>
                                  <th scope="col">Add Task</th>
                                  <th>DeadLine</th>
                                  <th>Word</th>
                                  <th scope="col">View Writer</th>
                                  <th scope="col">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                                     @foreach($show as $shows)
                                <tr id="sid{{$shows->id}}" >
                                   <td >{{$shows->task_name}}</td>
                                   <td>{{$shows->project->name}} </td>
                                    <td>{{$shows->del_date}}</td>
                                    <td>{{$shows->number_word}}</td>
                                    <td>
                                    @empty($shows->register_id)
                                      <a href="/viewAppled_user/{{$shows->id}}">View Writer</a>
                                    @else
                                    {{$shows->register->name}}
                                    @endif
                                    </td>
                                   
                                     <td> 
                                       <a href="javascript:void(0)" onclick="editStudent({{$shows->id}})" ><i class="fas fa-edit btn-sm btn-info"></i></a> &nbsp<a href="javascript:void(0)" onclick="deleteStudent({{$shows->id}})"><i class="fas fa-trash-alt btn-sm btn btn-danger"></i><a> 
                                     </td>
                                </tr>
                                     @endforeach
                        </tbody>     
                    </table>
                    
                </div>
            </div>























<!--button trigger modal -->
<!-- Modal -->


<div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="studentEditForm" action="create_task" method="post">
      <div class="modal-body">
          @csrf
          <input type="hidden" name="id" id="id">
      
      <div class="form-group mb-3">
      <label>Edit Task</label>
      <input type="text" class="form-control" name="task_name" id="task_name"  required>
      </div>
      <div class="from-group">
      <label>Task Description</label>
      <input type="text" class="form-control" name="task_dec" id="task_dec"  required>
               </div>
               <div class="col-md-12 ">
             <center>                           Start Date: <input id="startDate" name="start_date" width="276" />
        End Date: <input id="endDate" name="del_date" width="276" />
</center>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>
      </div>
      <form>
    </div>
  </div>
</div>




@endsection
@section('modal')


<script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    function editStudent(id){
      $.get('/tasks/'+id, function(student){
      $("#id").val(student.id);
      $("#task_name").val(student.task_name);
      $("#task_dec").val(student.task_dec);
      $("#startDate").val(student.start_date);
      $("#endDate").val(student.del_date);
      $("#studentEditModal").modal('toggle');
    });
    }

    $("#studentEditForm").submit(function(e){
        e.preventDefault();
        let id = $("#id").val();
        let task_name = $("#task_name").val();
        console.log(id);
        $.ajax({
            url:"/tasks",
            type:"PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                id:$("#id").val(),
                task_name:$("#task_name").val(),
                task_dec:$("#task_dec").val(),
                startDate:$("#startDate").val(),
                endDate:$("#endDate").val()
               
                
            },
            success:function(response){
                 $('#sid' + response.id +' td:nth-child(1)').text(response.task_name);
                 $('#sid' + response.id +' td:nth-child(4)').text(response.del_date);
                 $("#studentEditModal").modal('toggle');
                 $("#studentEditForm")[0].reset();
            }
        });
    });

    </script>

@endsection

@section('delete')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
   function deleteStudent(id){
       if(confirm("Do you want to delete this record")){
            
      
    $.ajax({
                url:'/tasksdelete/'+id,
                type:'DELETE',
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

                $data:{
                    _token : $("input[name=_token]").val()
                },

                success:function(response){
                    $("#sid"+id).remove();
                }
                
            });
       }
   }

    </script>



@endsection
