@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">View Users</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Users</li>
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
                <a href="{{ route('user.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Mobile No</th>
                              <th>Email</th></th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($alldata as $key => $user)
                        <tr>
                            <td>{{ $user->usertype }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                <a href="{{ route('user.delete', $user->id) }}" class="btn btn-rounded btn-danger mb-5" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @foreach ($alladmindata as $key => $admin)
                        <tr>
                            <td>{{ $admin->usertype }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->mobile }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                @if($admin->usertype == "Admin")
                                <a href="{{ route('admin.delete', $admin->id) }}" class="btn btn-rounded btn-danger mb-5" id='delete'>Delete</a>
                                @endif
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