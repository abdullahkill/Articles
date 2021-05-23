
@extends('agent.layout.layou')
@section('content')

<main class="main-content">

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4>Task</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Task</li>
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
                            <th scope="col">Deadline</th>
                            <th scope="col">Add Task</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
        
                        <tbody>
                        @foreach($show as $shows)
                        <tr id="sid{{$shows->id}}" >
                            <td ><a href="/view_task/{{$shows->id}}">{{$shows->name}}<a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
                            <td>
  {{$shows->del_date}}                            
</td>
                            <td> 
                                 <a href="javascript:void(0)" onclick="editStudent({{$shows->id}})" ><i class="fas fa-tasks btn-sm btn btn-success"></i></a>
                            </td> 
                    
                            <td> 
                           <a href="javascript:void(0)" onclick="updateStudent({{$shows->id}})"><i class="fas fa-edit btn-sm btn-info"></i><a> &nbsp<a href="javascript:void(0)" onclick="deleteStudent({{$shows->id}})"><i class="fas fa-trash-alt btn-sm btn btn-danger"></i><a> 
                            </td>




                        </tr>
                       @endforeach
</tbody>     
        </table>
                    
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
      <form id="projectUpdateForm">
          <div class="form-group">
          <input type="hidden" name="project_id" id="project_id"> 
          <lable><b>Edit Project<b></lable>
          <input type="text" name="projectUpdate_name" id="projectUpdate_name" class="form-control">
          </div>
          <div class="from-group">
      <label>Task Description</label>
      <input type="text" class="form-control" name="task_dec" id="project_dec"  required>
               </div>
               <div class="col-md-12 ">
             <center>                           Start Date: <input id="startDate" name="start_date" width="276" />
        End Date: <input id="endDate" name="del_date" width="276" />
</center>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>















<!-- bootsrap -->
<!-- B-->




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
          <input type="hidden" name="project_id" id="id">
      <div class="form-group">
      <label for="">Project Name</label>
          <input type="text" class="form-control" name="task" id="name"  disabled>
          
      </div>
      <div class="from-group">
      <label>Add Task</label>
      <input type="text" class="form-control" name="project_task" id="project_task" placeholder="Add Task" required>
               </div>
               <div class="form-group">
                                        <label>Number of words</label>
                                        <input type="number" name="words" class="form-control" placeholder="Number of words" required>
</div>
               <div class="from-group">
      <label>Task Description</label>
      <input type="text" class="form-control" name="task_dec" id="task_dask" placeholder="Task Description"  required>
               </div>
               <div class="col-md-12 ">
             <center>                           Start Date: <input id="startDate1" name="start_date" width="276" required />
        End Date: <input id="endDate1" name="del_date" width="276" required />
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

















<!-- Modal -->



@endsection

@section('jquery')


<script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate1').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate1').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
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
      $.get('/students/' +id, function(student){
      $("#id").val(student.id);
      $("#name").val(student.name);
      $("#studentEditModal").modal('toggle');
    })
    }

    </script>



@endsection

@section('edit')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    function updateStudent(id){
      $.get('/project_update/' +id, function(data){
      $("#project_id").val(data.id);
      $("#projectUpdate_name").val(data.name);
      $("#project_dec").val(data.project_dec);
      $("#startDate").val(data.start_date);
      $("#endDate").val(data.del_date);
      $("#updateProject").modal('toggle');
    })
    }

    $("#projectUpdateForm").submit(function(e){
        e.preventDefault();
        let id = $("#project_id").val();
        let name = $("#projectUpdate_name").val();
       let project_desc=$("#project_dec").val();
       let start_date=$("#startDate").val();
       let end_date=$("#endDate").val();
        $.ajax({
            url:"/projectUpdate",
            type:"PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                id:$("#project_id").val(),
                name:$("#projectUpdate_name").val(),
                project_desc:$("#project_dec").val(),
               start_date:$("#startDate").val(),
              end_date:$("#endDate").val()
                
            },
            success:function(response){
          
                 $('#sid' + response.id +' td:nth-child(1)').text(response.name);
                 $('#sid' + response.id +' td:nth-child(2)').text(response.del_date);
                 $("#updateProject").modal('toggle');
                 $("#projectUpdateForm")[0].reset();
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
                url:'students/'+id,
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
