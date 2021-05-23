
@extends('admin.layout.layou')
@section('content')

<main class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>Category</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/doctor/index">Dashboard</a>
                        </li>
                        
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="card">
        <div class="card-header offset-md-9">
       
                  <a href="#" data-toggle="modal" data-target="#medicineModal" class="btn btn-success text-white">Add  Medicine </a>
        
        </div>
                        <div class="card-body">
                        @if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}

</div>
@endif
                            <table id="medicineTable" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th>N0#</th>
                                    <th>Category</th>
                                    <th>Action</th>                                  
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                            $i=1;
                                ?>
                                    @foreach($data as $datas)
<tr id="sid{{$datas->id}}">
<td>{{$i++}} </td>
<td >{{$datas->name}}</td>
<td><a href="javascript:void(0)" onclick="updateStudent({{$datas->id}})"><i class="fas fa-edit btn-sm btn-info"></i><a> &nbsp<a href="javascript:void(0)" onclick="deleteStudent({{$datas->id}})"><i class="fas fa-trash-alt btn-sm btn btn-danger"></i><a></td>
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
        <h5 class="modal-title">category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="projectUpdateForm">
          <div class="form-group">
          <input type="hidden" name="project_id" id="project_id"> 
          <lable><b>category<b></lable>
          <input type="text" name="projectUpdate_name" id="projectUpdate_name" class="form-control">
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




<!-- Modal -->
<div class="modal fade" id="medicineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="medicineForm">
          <div class="form-group">
          <lable><b>Add Category<b></lable>
          <input type="text" name="category" id="category" class="form-control" placeholder="category" required>
          </div>
       
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </div>  
    </form>
  </div>
</div>
		
@endSection
@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script>
    $("#medicineForm").submit(function(e){
 e.preventDefault();    
 let category = $("#category").val();

 
 
 $.ajax({
     url: "{{route('add_category')}}",
     type:"post",
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
     data:{
        category:category 
    
     },
      success:function(response){
         if(response){
              $("#medicineTable tbody").prepend('<tr><td>{{$i++}}</td><td>'+response.name+'</td><td><a href="javascript:void(0)" onclick="updateStudent('+response.id+')"><i class="fas fa-edit btn-sm btn-info"></i><a> &nbsp<a href="javascript:void(0)" onclick="deleteStudent('+response.id+')"><i class="fas fa-trash-alt btn-sm btn btn-danger"></i><a></td></tr>');
              $("#medicineForm")[0].reset();
              $("#medicineModal").modal('hide'); 
         }
     }
 });        
});
    </script>
@endSection


@section('edit')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    function updateStudent(id){
      $.get('/update_category/' +id, function(data){
      $("#project_id").val(data.id);
      $("#projectUpdate_name").val(data.name);
     
      $("#updateProject").modal('toggle');
    })
    }

    $("#projectUpdateForm").submit(function(e){
        e.preventDefault();

        let id = $("#project_id").val();
        let name = $("#projectUpdate_name").val();
    
        $.ajax({
            url:"/categoryUpdate",
            type:"PUT",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                id:$("#project_id").val(),
                name:$("#projectUpdate_name").val()
               
                
            },
            success:function(response){
                $('#sid' + response.id +' td:nth-child(2)').text(response.name);
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
                url:'/categorydelete/'+id,
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
