@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Update User Profile</h4>
                 
            </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                               <div class="row">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Role <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input value="{{ $admin->usertype }}" disabled />
                                        </div>
                                    </div>	
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <h5>User Email <span class="text-danger">*</span></h5>
                                           <div class="controls">
                                               <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control">
                                           </div>
                                        </div>
                                        @error('email')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror  
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $admin->name }}" id="name" class="form-control">
                                            </div>
                                        </div>
                                        @error('name')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Registered Mobile No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ $admin->mobile }}" id="mobile" class="form-control">
                                            </div>
                                            @error('mobile')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror 
                                        </div>   
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="address" id="address" rows="3" class="form-control">{{ $admin->address }}</textarea>
                                            </div>
                                            @error('address')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                <div class="controls">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <input type="file" name="image" id="image" class="form-control" />
                                                </div>
                                                @error('image')
                                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                            @enderror 
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <img id="showImage" src="{{ (!empty($admin->image))? url('upload/admin_image/'.$admin->image) : " " }}" style="height: 100px; width:100px; border: 2px solid #000000;">        
                                            </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection