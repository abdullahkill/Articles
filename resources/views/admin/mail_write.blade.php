
@extends('admin.layout.layou')
@section('content')
<main class="main-content">

<!-- begin::page-header -->
<div class="page-header">
    <div class="container-fluid d-sm-flex justify-content-between">
        <h4>Add writer</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/adminindex">Dashboard</a>/


                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Writer</li>

            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
    <div class="col_md_10" style="margin-bottom:60px;">

<div class="card" style="height:100%; width:600px; ">
  <div class="card-body register-card-body">
    <form action="/mail" method="POST">
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}

</div>
@endif
@if(Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}

    </div>      
@endif
      @csrf
      <div class="input-group mb-3">
          
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="email" placeholder="Writer Email">
             
                
              
            </div>
            <div class="col-8">
                <button type="submit" class="btn btn-primary btn-block" style="margin-left:80px;">Send mail</button>
              </div>
             <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div>
</div>

</div>
@endsection
