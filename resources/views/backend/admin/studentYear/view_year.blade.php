@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Student Year List</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Year</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Users List</h3>
                <a href="{{ route('student.year.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Year</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL No</th>
                              <th>Name</th>
                              <th width="25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($alldata as $key => $student)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                              @if(Auth('admin')->user()->usertype == 'Super-Admin')
                              <a href="{{ route('student.year.edit', $student->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
                              <a href="{{ route('student.year.delete', $student->id) }}" class="btn btn-rounded btn-danger mb-5" id="delete">Delete</a>
                              @endif
                                {{-- {{ route('user.delete', $user->id) }} --}}
                                {{-- {{ route('student.class.edit', $student->id) }} --}}
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box">
              
              <!-- /.box-body -->
            </div>
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection