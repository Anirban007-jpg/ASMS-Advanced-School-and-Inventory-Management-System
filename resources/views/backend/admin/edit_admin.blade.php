@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Update Admin User Data</h4>
                 
            </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" novalidate action="{{ route('admin.update', $editData->id) }}">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Select User Role <span class="text-danger">*</span></h5>
                                            <select name="usertype" id="usertype" class="form-control">
                                                <option value="" selected="" disabled="">Select Role</option>
                                                <option value="Admin" {{ ($editData->usertype == "Admin" ? "selected": "") }}>Admin</option>
                                                <option value="Super-Admin" {{ ($editData->usertype == "Super-Admin" ? "selected": "") }}>Super-Admin</option>
                                            </select>
                                    </div>	
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <h5>User Email <span class="text-danger">*</span></h5>
                                           <div class="controls">
                                               <input type="email" name="email" id="email" value="{{ $editData->email }}" class="form-control">
                                           </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $editData->name }}" id="name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Registered Mobile No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ $editData->mobile }}" id="mobile" class="form-control">
                                            </div>
                                        </div>   
                                    </div> 
                                </div>
                                
                           
                            </div>

                    
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" />
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