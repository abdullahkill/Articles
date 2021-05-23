
@extends('agent.layout.layou')
@section('content')
<div class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>Project For Writer</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="agentDashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page-header -->

        <div class="container-fluid">
        @if(Session::get('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}

    </div>      
@endif
            <div class="row">
                <div class="col-md-10">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Enter Project</h6>
                            <form class="needs-validation" novalidate="" method="post" action="create_post" >
                                <div class="form-row">
                                  @csrf
                                    <div class="col-md-12">
                                        <label for="validationCustom01"><b>Project</b></label>
                                        <input type="text" name="project" class="form-control" 
                                               placeholder="Project"
                                               value="{{old('project')}}" required="">
                                               <div class="valid-feedback">
        Looks good!project
      </div>
                                    </div>
                                    
                                    <div class="col-md-12 ">
                                        Start Date: <input id="startDate" name="start_date" width="276" require/>
        End Date: <input id="endDate" name="del_date" width="276" required/>
</div>
                                <div class="col-md-12  from-group">
                        <label for="validationCustom01"><b>Description For Project</b></label>
                                        <textarea name="project_dec" id="" cols="30" rows="10" placeholder="Project"
                                               value="{{old('project')}}" required="" class="form-control"></textarea> 
                                               
                                               <div class="valid-feedback">
        Looks good!project
      </div>
                                    
</br>  <button class="btn btn-primary offset-md-4" type="submit">Submit form</button>
                                </div>
                            </form>

                            

    </div>
    @endsection
@section('script')


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