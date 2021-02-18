@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Manage Profile</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Your Profile</li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      <section class="content">
          <div class="row">
              <div class="col-12">
                <div class="col-12">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black">
                          <h3 class="widget-user-username">User Name: {{ $admin->name }}</h3>

                          <a href="{{ route('profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>

                          <h6 class="widget-user-desc">User Role: {{ $admin->usertype }}</h6>
                          <h6 class="widget-user-desc">User Email: {{ $admin->email }}</h6>

                          
                        </div>
                        <div class="widget-user-image">
                          <img class="rounded-circle" src="{{ (!empty($admin->image)) ? url('upload/admin_image/'.$admin->image) : " "  }}" style="height: 80px;">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="description-block">
                                <h5 class="description-header">Mobile No</h5>
                                <span class="description-text">{{ $admin->mobile }}</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 br-1 bl-1">
                              <div class="description-block">
                                <h5 class="description-header">Address</h5>
                                <span class="description-text">{{ $admin->address }}</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                              <div class="description-block">
                                <h5 class="description-header">Gender</h5>
                                <span class="description-text">{{ $admin->gender }}</span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                 
                </div>
                
              </div>
          </div>
      </section>


    
    </div>
</div>
@endsection