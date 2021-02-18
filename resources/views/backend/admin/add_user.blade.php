@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add User</h4>
            </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" novalidate action="{{ route('user.store') }}">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Select User Role <span class="text-danger">*</span></h5>
                                            <select name="usertype" id="usertype" class="form-control">
                                                <option value="" selected="" disabled="">Select Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Student">Student</option>
                                                <option value="Super-Admin">Super-Admin</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Customer">Customer</option>
                                            </select>
                                    </div>	
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <h5>User Email <span class="text-danger">*</span></h5>
                                           <div class="controls">
                                               <input type="email" name="email" id="email" class="form-control">
                                           </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" id="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Registered Mobile No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" id="mobile" class="form-control">
                                            </div>
                                        </div>   
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            </div>

                    
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" />
                               <input type="reset" class="btn btn-rounded btn-danger mb-5" value="Reset" />
                           </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>
    
    </div>
</div>
@endsection