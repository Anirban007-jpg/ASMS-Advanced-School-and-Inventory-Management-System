@extends('admin.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Authenticating Verification Code</h4>
            </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" novalidate action="{{ route('verified.user') }}">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>Verification Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="verificationcode" id="verificationcode" class="form-control">      
                                            </div>
                                        </div>
                                        @error('verificationcode')
                                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror 
                                    </div>    
                               </div>

                    
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Check Code" />
                               {{-- <input type="reset" class="btn btn-rounded btn-danger mb-5" value="Reset" /> --}}
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